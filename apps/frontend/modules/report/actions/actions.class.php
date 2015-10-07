<?php

/**
 * report actions.
 *
 * @package    nckids
 * @subpackage report
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class reportActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeOrphans(sfWebRequest $request)
  {
    $c = new Criteria();
    $cton1 = $c->getNewCriterion(ClientServicePeer::CLIENT_ID, null, Criteria::ISNULL);
    #$cton2 = $c->getNewCriterion(ClientServicePeer::EMPLOYEE_ID, null, Criteria::ISNULL);
    #$cton1->addOr($cton2);
    $c->add($cton1);
    $this->services = ClientServicePeer::doSelect($c);
  }

  public function executeInvalidServices(sfWebRequest $request)
  {
    $c = new Criteria();

    // end date before start date
      $cton1 = $c->getNewCriterion(ClientServicePeer::END_DATE, ClientServicePeer::END_DATE.'<'.ClientServicePeer::START_DATE, Criteria::CUSTOM);

    // start date more than 2 years in future
      $cton2 = $c->getNewCriterion(ClientServicePeer::START_DATE, strtotime('+2 years', time()), Criteria::GREATER_THAN);
      $cton1->addOr($cton2);

    // object_type not valid
      $cton3 = $c->getNewCriterion(ClientServicePeer::OBJECT_TYPE, array_keys(ClientServicePeer::getClassKeys(false)), Criteria::NOT_IN);
      $cton1->addOr($cton3);

    // service type not set
      $cton4 = $c->getNewCriterion(ClientServicePeer::SERVICE_ID, null, Criteria::ISNULL);
      $cton1->addOr($cton4);

    $c->add($cton1);
    $this->services = ClientServicePeer::doSelectJoinAll($c);
  }

  public function executeInvalidClients(sfWebRequest $request)
  {
    $c = new Criteria();

    // first name empty
      $cton1 = $c->getNewCriterion(ClientPeer::FIRST_NAME, '');

    // last name empty
      $cton2 = $c->getNewCriterion(ClientPeer::LAST_NAME, '');
      $cton1->addOr($cton2);

    $c->add($cton1);
    $this->clients = ClientPeer::doSelect($c);
  }

  public function executeInvalidEmployees(sfWebRequest $request)
  {
    $c = new Criteria();

    // first name empty
      $cton1 = $c->getNewCriterion(EmployeePeer::FIRST_NAME, '');

    // last name empty
      $cton2 = $c->getNewCriterion(EmployeePeer::LAST_NAME, '');
      $cton1->addOr($cton2);

    // job title empty
      $cton3 = $c->getNewCriterion(EmployeePeer::JOB_ID, null, Criteria::ISNULL);
      $cton1->addOr($cton3);

    $c->add($cton1);
    $this->employees = EmployeePeer::doSelect($c);
  }

  public function executeBirthday(sfWebRequest $request){
  	$this->form = new ReportBirthdayForm();

    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid())
      {
        $month = $this->form->getValue('month');
        $c = new Criteria();
        $c->add(EmployeePeer::DOB, 'MONTH('.EmployeePeer::DOB .') = '.$month, Criteria::CUSTOM);
        $c->addAscendingOrderByColumn(EmployeePeer::DOB);
      	$this->employees = EmployeePeer::doSelect($c);

        $this->month_name = date('F', mktime(null,null,null,$month));
      	$this->setTemplate('birthdayReport');
      }
    }
  }

  public function executeWaitlist(sfWebRequest $request){
  	$this->form = new ReportWaitlistForm();
  
    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid())
      {
        $date = $this->form->getValue('date');
        $date = mktime(0,0,0,$date['month'],$date['day'],$date['year']);

        $clientservices = ClientServicePeer::getWaiting($date);
        
        $this->wait_lists = array();
        foreach($clientservices as $client_service){
          $this->wait_lists[$client_service->getOfficeId()]['location'] = ($client_service->getOffice()) ? $client_service->getOffice()->getName():'n/a';
          $this->wait_lists[$client_service->getOfficeId()]['clientservices'][] = $client_service;
        }
      	
      	$this->setTemplate('waitlistReport');
      }
    }
    
  }
  
  public function executeEmployeeWorkload(sfWebRequest $request){
    $this->form = new ReportWorkloadForm();

    if($request->isMethod('post') || $request->getParameter('employee_id')){
    	if($request->isMethod('post')){
    		 $form = $request->getParameter('workload');
    	   $employee_id = $form['employee_id'];
    	}else
        $employee_id = $request->getParameter('employee_id');
        
      $this->employee = EmployeePeer::retrieveByPk($employee_id);
      $this->forward404Unless($this->employee);

      $this->current_services_total = 0;
      $this->future_services_total = 0;
      
      $this->current_services = ClientServicePeer::getActiveForEmployee($this->employee->getId());
      foreach($this->current_services as $current_service){
        if($frequency = $current_service->getFrequency())
          $this->current_services_total += $frequency->getWeeklyHours();
      }

      $this->future_services = ClientServicePeer::getUpcomingForEmployee($this->employee->getId());
      foreach($this->future_services as $future_service)
        if($frequency = $future_service->getFrequency())
          $this->future_services_total += $frequency->getWeeklyHours();
      
      $this->setTemplate('employeeWorkloadReport');
    }
    
  }

  public function executeInactiveEmployees(sfWebRequest $request)
  {
    $c = new Criteria();

    // dof is set
    $c->add(EmployeePeer::DOF, null, Criteria::ISNOTNULL);

    $c->addAscendingOrderByColumn(EmployeePeer::LAST_NAME);

    sfPropelParanoidBehavior::disable();
    $this->employees = EmployeePeer::doSelect($c);
  }

  public function executeEmployeeExpiration(sfWebRequest $request){
    $this->form = new ReportExpirationForm();

    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid())
      {
        $date = $this->form->getValue('date');
        $date = mktime(0,0,0,$date['month'],$date['day'],$date['year']);


        $this->columns = ($this->form->getValue('columns')) ? $this->form->getValue('columns') : array();
        
        $c = new Criteria();

        $cton = $c->getNewCriterion(EmployeePeer::ID, null, Criteria::ISNULL);

        foreach($this->columns as $column){
          $ex = $c->getNewCriterion('employee.'.$column, $date, Criteria::LESS_EQUAL);
          $cton->addOr($ex);
        }

        $c->add($cton);
        $c->addAscendingOrderByColumn(EmployeePeer::LAST_NAME);

      	$this->employees = EmployeePeer::doSelect($c);
        $this->date = $date;

      	$this->setTemplate('employeeExpirationReport');
      }
    }

  }

  public function executeClientExpiration(sfWebRequest $request){
    $this->form = new ReportClientExpirationForm();

    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid())
      {
        $date = $this->form->getValue('date');
        $date = mktime(0,0,0,$date['month'],$date['day'],$date['year']);

        $this->check_bluecard = $this->form->getValue('blue_card');
        $this->check_immunizations = $this->form->getValue('immunizations');
        $c = new Criteria();

        $cton = $c->getNewCriterion(ClientPeer::PHYSICAL_EXP, $date, Criteria::LESS_EQUAL);

        if($this->check_bluecard){
          $ex = $c->getNewCriterion(ClientPeer::BLUE_CARD, false, Criteria::EQUAL);
          $cton->addOr($ex);
        }

        if($this->check_immunizations){
          $ex = $c->getNewCriterion(ClientPeer::IMMUNIZATIONS, false, Criteria::EQUAL);
          $cton->addOr($ex);
        }
        $c->add($cton);

        // this removes kids that do not require bc/immun, ie. non-classroom kids. although it does make it impossible to validate kids with empty physical expr's
        $ex = $c->getNewCriterion(ClientPeer::PHYSICAL_EXP, null, Criteria::ISNOTNULL);
        $c->addAnd($ex);

        // 1-27-10 - only get kids with active services (although it seems you would want to know if future kids are expired too?)
        $c->addJoin(ClientPeer::ID, ClientServicePeer::CLIENT_ID);
        $c = ClientServicePeer::addActive($c);
        $c->setDistinct();

        $c->addAscendingOrderByColumn(ClientPeer::LAST_NAME);

      	$clients = ClientPeer::doSelect($c);

        $this->offices = array();
        foreach($clients as $client) {
          $office = ($client->getLastService() && $client->getLastService()->getOffice()) ? $client->getLastService()->getOffice()->getName() : '*No Classroom*';
          $this->offices[$office][] = $client;
        }

        $this->date = date(sfConfig::get('app_settings_date_format', 'm/d/Y'), $date);
      	$this->setTemplate('clientExpirationReport');
      }
    }

  }

  public function executeArq(sfWebRequest $request)
  {   
   $this->form = new ReportArqForm();
  
    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid())
      {
        $quarter_end = $this->form->getValue('quarter_end');
        $quarter_start = $this->form->getValue('quarter_start');
        
        $quarter_start = mktime(0,0,0,$quarter_start['month'],$quarter_start['day'],$quarter_start['year']);
        $quarter_end = mktime(0,0,0,$quarter_end['month'],$quarter_end['day'],$quarter_end['year']);
        
        $c = new Criteria();
        
        // only for seit and preschool services
        $c->add(ClientServicePeer::OBJECT_TYPE, array(ClientServicePeer::CLASSKEY_PRESCHOOL, ClientServicePeer::CLASSKEY_SEIT, ClientServicePeer::CLASSKEY_CLASSROOM), Criteria::IN);
        
        // ACTIVE DURING RANGE
        // if service end date is after range start date and service start date is before range end date
        // OR if service start date is before range end date and after range start date
        // OR if service start date is before range start date and service end date is after range end date
        $cton1 = $c->getNewCriterion(ClientServicePeer::END_DATE, $quarter_start, Criteria::GREATER_EQUAL);
        $cton2 = $c->getNewCriterion(ClientServicePeer::START_DATE, $quarter_end, Criteria::LESS_EQUAL);
        $cton1->addAnd($cton2);
        $c->addOr($cton1);
        $cton3 = $c->getNewCriterion(ClientServicePeer::START_DATE, $quarter_end, Criteria::LESS_EQUAL);
        $cton4 = $c->getNewCriterion(ClientServicePeer::END_DATE, $quarter_start, Criteria::GREATER_EQUAL);
        $cton3->addAnd($cton4);
        $c->addOr($cton3);
        $cton5 = $c->getNewCriterion(ClientServicePeer::START_DATE, $quarter_start, Criteria::LESS_EQUAL);
        $cton6 = $c->getNewCriterion(ClientServicePeer::END_DATE, $quarter_end, Criteria::GREATER_EQUAL);
        $cton5->addAnd($cton6);
        $c->addOr($cton5);
        #$c = ClientServicePeer::addActive($c, $date);
        
        // add criterion for change date is set or null
        $cton7 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, $quarter_start, Criteria::GREATER_EQUAL);
        $cton9 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, $quarter_end, Criteria::LESS_EQUAL);
        $cton7->addAnd($cton9);
        $cton8 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, null);
        $cton7->addOr($cton8);
        $c->add($cton7);

        // dont include waiting list kids
        $c->add(ClientServicePeer::WAITING_LIST, false);

        $c->addAscendingOrderByColumn(ClientPeer::DISTRICT_ID);
        $c->addAscendingOrderByColumn(ClientPeer::LAST_NAME);
        $c->addAscendingOrderByColumn(ClientPeer::FIRST_NAME);
        $this->services = ClientServicePeer::doSelectJoinAll($c);

        $this->quarter_start = $quarter_start;
        $this->quarter_end = $quarter_end;
        
        $this->setTemplate('arqReport');
      }
    }
  }

  public function executeCrq(sfWebRequest $request)
  {
   $this->form = new ReportArqForm();

    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid())
      {
        $quarter_end = $this->form->getValue('quarter_end');
        $quarter_start = $this->form->getValue('quarter_start');

        $quarter_start = mktime(0,0,0,$quarter_start['month'],$quarter_start['day'],$quarter_start['year']);
        $quarter_end = mktime(0,0,0,$quarter_end['month'],$quarter_end['day'],$quarter_end['year']);

        $c = new Criteria();

        // only for classroom services
        $c->add(ClientServicePeer::OBJECT_TYPE, array(ClientServicePeer::CLASSKEY_CLASSROOM), Criteria::IN);

        // ACTIVE DURING RANGE
        // if service end date is after range start date and service start date is before range end date
        // OR if service start date is before range end date and after range start date
        // OR if service start date is before range start date and service end date is after range end date
        $cton1 = $c->getNewCriterion(ClientServicePeer::END_DATE, $quarter_start, Criteria::GREATER_EQUAL);
        $cton2 = $c->getNewCriterion(ClientServicePeer::START_DATE, $quarter_end, Criteria::LESS_EQUAL);
        $cton1->addAnd($cton2);
        $c->addOr($cton1);
        $cton3 = $c->getNewCriterion(ClientServicePeer::START_DATE, $quarter_end, Criteria::LESS_EQUAL);
        $cton4 = $c->getNewCriterion(ClientServicePeer::END_DATE, $quarter_start, Criteria::GREATER_EQUAL);
        $cton3->addAnd($cton4);
        $c->addOr($cton3);
        $cton5 = $c->getNewCriterion(ClientServicePeer::START_DATE, $quarter_start, Criteria::LESS_EQUAL);
        $cton6 = $c->getNewCriterion(ClientServicePeer::END_DATE, $quarter_end, Criteria::GREATER_EQUAL);
        $cton5->addAnd($cton6);
        $c->addOr($cton5);
        #$c = ClientServicePeer::addActive($c, $date);

        // add criterion for change date is set or null
        $cton7 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, $quarter_start, Criteria::GREATER_EQUAL);
        $cton9 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, $quarter_end, Criteria::LESS_EQUAL);
        $cton7->addAnd($cton9);
        $cton8 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, null);
        $cton7->addOr($cton8);
        $c->add($cton7);

        // dont include waiting list kids
        $c->add(ClientServicePeer::WAITING_LIST, false);
        $c->add(ClientServicePeer::SERVICE_ID, ServicePeer::SERVICE_TYPE_COMMUNITY , Criteria::NOT_EQUAL );

        $c->addAscendingOrderByColumn(ClientServicePeer::OFFICE_ID);
        $c->addAscendingOrderByColumn(ClientPeer::LAST_NAME);
        $this->services = ClientServicePeer::doSelectJoinAll($c);

        $this->quarter_start = $quarter_start;
        $this->quarter_end = $quarter_end;

        $this->setTemplate('crqReport');
      }
    }
  }

  public function executeCoreEval(sfWebRequest $request)
  {
   
   $this->form = new ReportCoreEvalForm();
  
    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid())
      {
        $start_date = $this->form->getValue('start_date');
        $end_date = $this->form->getValue('end_date');
        $this->start_date = strtotime($start_date);
        $this->end_date = strtotime($end_date);
        
        $c = new Criteria();
        $c->add(ClientPeer::CREATED_AT, $this->start_date, Criteria::GREATER_EQUAL);
        $c->addAnd(ClientPeer::CREATED_AT, $this->end_date, Criteria::LESS_EQUAL);
        $this->clients= ClientPeer::doSelect($c);


        
        $this->setTemplate('coreEvalReport');
      }
    }
  }
  public function executeSedcar(sfWebRequest $request)
  {
   
   $this->form = new ReportSedcarForm();
  
    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid())
      {
        $date = $this->form->getValue('date');
        $date = mktime(0,0,0,$date['month'],$date['day'],$date['year']);

        // sedcar criteria
        $c = new Criteria();
        
        // make sure there are no null entries
        $c->add(ClientServicePeer::CLIENT_ID, null, Criteria::ISNOTNULL);
        $c->add(ClientServicePeer::EMPLOYEE_ID, null, Criteria::ISNOTNULL);
         
        
        // in date range (some weird previous month deal)
        $c->add(ClientServicePeer::START_DATE, $date, Criteria::LESS_EQUAL);    
        $c->add(ClientServicePeer::END_DATE, strtotime( '-1 month' , $date), Criteria::GREATER_EQUAL);
        
        // add criterion for change date is set or null
        $cton1 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, $date, Criteria::GREATER_THAN);
        $cton2 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, null);
        $cton1->addOr($cton2);
        $c->add($cton1); 

        // add criterion for classroom services
        $cton3 = $c->getNewCriterion(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_CLASSROOM);
        $cton4 = $c->getNewCriterion(ClientServicePeer::SERVICE_ID, sfConfig::get('app_settings_classroom_service_id', 10));
        $cton3->addAnd($cton4);
        $cton5 = $c->getNewCriterion(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_SEIT);
        $cton5->addOr($cton3);
        $c->add($cton5);

        // dont include waiting list kids
        $c->add(ClientServicePeer::WAITING_LIST, false);

        // group for distinct and sort by lastname
        $c->addGroupByColumn(ClientServicePeer::CLIENT_ID);
        $c->addAscendingOrderByColumn(ClientPeer::LAST_NAME);
        $results = ClientServicePeer::doSelectJoinAll($c, null, Criteria::LEFT_JOIN);

        // store results in an assoc array for each district
        $this->districts = array();
        foreach($results as $seit){
          if($client = $seit->getClient())
            $d = $client->getDistrict();
          if(is_object($d))
            $this->districts[$d->getName()][] = $seit;
        }

        ksort($this->districts);
        $this->date = $date;
        
        $this->setTemplate('sedcarReport');
      }
    }
  }
  public function executeSedcar2(sfWebRequest $request)
  {
   
   $this->form = new ReportSedcarForm();
  
    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid())
      {
        $date = $this->form->getValue('date');
        $as_of_date = mktime(0,0,0,$date['month'],$date['day'],$date['year']);
        $mysql_as_of_date = date('Y-m-d H:i:s', $as_of_date);
        
        $c = new Criteria();
        
        // limit to preschool
        $c->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_PRESCHOOL);
        
        // only active services
        $c = ClientServicePeer::addActive($c, $as_of_date);
        
		    // only for related services
		    $c->add(ClientServicePeer::SERVICE_ID, sfConfig::get('app_settings_related_service_ids', array('1', '2', '4', '8')), Criteria::IN);
		    
		    // no duplicate children
		    $c->addGroupByColumn(ClientServicePeer::CLIENT_ID);
		
		    // subselect to remove all children in seit - (seit.CHANGE_DATE>\''. $mysql_as_of_date .'\' OR seit.CHANGE_DATE IS NULL ) AND seit.START_DATE<=\''. $mysql_as_of_date .'\' AND seit.END_DATE>=\''. $mysql_as_of_date .'\'
		    $seit_select = ClientServicePeer::CLIENT_ID.' NOT IN ( SELECT '. ClientServicePeer::CLIENT_ID .' FROM `'. ClientServicePeer::TABLE_NAME .'` WHERE '. ClientServicePeer::CLIENT_ID .' IS NOT NULL AND '. ClientServicePeer::OBJECT_TYPE .' = \''. ClientServicePeer::CLASSKEY_SEIT .'\' AND ('. ClientServicePeer::CHANGE_DATE .'>\''. $mysql_as_of_date .'\' OR '. ClientServicePeer::CHANGE_DATE .' IS NULL ) AND '. ClientServicePeer::START_DATE .'<=\''. $mysql_as_of_date .'\' AND '. ClientServicePeer::END_DATE .'>=\''. $mysql_as_of_date .'\' GROUP BY '. ClientServicePeer::CLIENT_ID .' )';
		    $c->add(ClientServicePeer::CLIENT_ID, $seit_select, Criteria::CUSTOM);		    

        // dont include waiting list kids
        $c->add(ClientServicePeer::WAITING_LIST, false);

        $results = ClientServicePeer::doSelectJoinAll($c);

        $this->districts = array();
        foreach($results as $seit){
          $d = $seit->getClient()->getDistrict();
          if(is_object($d))
            $this->districts[$d->getName()][] = $seit;
        }

        ksort($this->districts);
        $this->date = $as_of_date;
        
        $this->setTemplate('sedcarReport');
      }
    }
  }
  
  public function executeVoucher(sfWebRequest $request){      
    $this->form = new ReportVoucherForm();
    if($request->getParameter('employee_id')) {
      $this->form->setDefault('employee_id', $request->getParameter('employee_id'));
    }
    
    if($request->getParameter('is_substitute'))
    {
        $this->form->setDefault('is_substitute', 1);
    }
    
    if( ($client_id = $request->getParameter('client_id')) )
    {        
        $this->form->setDefault('client_id', $client_id );
        $client = ClientPeer::retrieveByPK($client_id);
        $this->form->setDefault('client_name', $client->getFirstName()." ".$client->getLastName() );
    }

    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid()){
        $date = $this->form->getValue('date');
        $as_of_date = mktime(0,0,0,$date['month'],$date['day'],$date['year']);

      	$c = new Criteria();

      	// only chose client service types of the selected type
      	$c->add(ClientServicePeer::OBJECT_TYPE, $this->form->getValue('client_service_type'));

      	// make sure client and provider are not null
      	$c->add(ClientServicePeer::CLIENT_ID, null, Criteria::ISNOTNULL);
        // if an employee is selected - only show vouchers for that provider
        if($this->form->getValue('employee_id'))
          $c->add(ClientServicePeer::EMPLOYEE_ID, $this->form->getValue('employee_id'));
        else
          $c->add(ClientServicePeer::EMPLOYEE_ID, null, Criteria::ISNOTNULL);

        
        if($this->form->getValue('client_id') && $this->form->getValue('client_name'))
        {
           $c->add(ClientServicePeer::CLIENT_ID, $this->form->getValue('client_id') );
        }
        
      	// check that the service was active at any point during the selected month of the selected year
        $c->add(ClientServicePeer::START_DATE, ClientServicePeer::START_DATE.' <=\''. $date['year'].'-'.$date['month'].'-31\'', Criteria::CUSTOM);

        // if they have an end date make sure it is in the selected month or later of the selected year
        $cton1 = $c->getNewCriterion(ClientServicePeer::END_DATE, ClientServicePeer::END_DATE.'>=\''. $date['year'].'-'.$date['month'].'-1\'', Criteria::CUSTOM);
        $cton2 = $c->getNewCriterion(ClientServicePeer::END_DATE, null);
        $cton1->addOr($cton2);
        $c->add($cton1);

		    // if they have a change date make sure it is in the selected month or later of the selected year
		    $cton3 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, ClientServicePeer::CHANGE_DATE.'>=\''. $date['year'].'-'.$date['month'].'-1\'', Criteria::CUSTOM);
		    $cton4 = $c->getNewCriterion(ClientServicePeer::CHANGE_DATE, null);
		    $cton3->addOr($cton4);
		    $c->add($cton3);

        // remove any services of irrelevant types
        $c->add(ClientServicePeer::SERVICE_ID, array_keys(sfConfig::get('app_voucher_ignore_services', 0)), Criteria::NOT_IN);

        // dont include waiting list kids
        $c->add(ClientServicePeer::WAITING_LIST, false);

      	// sort by provider to group in list
      	$c->addAscendingOrderByColumn(ClientServicePeer::EMPLOYEE_ID);
      	// then sort by client to group them in provider list
      	$c->addAscendingOrderByColumn(ClientServicePeer::CLIENT_ID);

      	$this->services = ClientServicePeer::doSelectJoinAll($c);

        $is_substitute = $this->form->getValue('is_substitute');
        if($is_substitute)
        {
            $template = $this->form->getValue('client_service_type').'SubstituteVoucher';
        }
        else
        {
            $template = $this->form->getValue('client_service_type').'Voucher';
        }
        
		    // create the document
		    $doc = new sfTinyDoc();
		    $doc->createFrom(array('basename' => $template) );
		    $doc->loadXml('content.xml');

		    $doc->mergeXmlField('cal_prev', $this->generateCalImage($date['day'],$date['month']-1,$date['year']));
		    $doc->mergeXmlField('cal_next', $this->generateCalImage($date['day'],$date['month'],$date['year']));

		    $doc->mergeXmlField('billing_period', date("M", $as_of_date) .' 1 - '. date("M", $as_of_date) .' '. date("t", $as_of_date));
		    $doc->mergeXmlField('due_date', date("M", mktime(0,0,0,$date['month']+1,$date['day'],$date['year'])).' 3rd');

		    $doc->mergeXmlBlock('service', $this->services);

		    $doc->saveXml();
		    $doc->close();

		    // send and remove the document
		    $doc->sendResponse();
		    $doc->remove();

		    throw new sfStopException;
      }
    }
  }

  protected function get_months($date1, $date2) {
    $time1 = $date1;
    $time2 = $date2;
    $my = date('mY', $time2);

    $empty_month = array('units' => array(), 'absent' => array());

    $months = array(date('F', $time1) => $empty_month);
    $f = '';

    while ($time1 < $time2) {
      $time1 = strtotime((date('Y-m-d', $time1) . ' +15days'));
      if (date('F', $time1) != $f) {
        $f = date('F', $time1);
        if (date('mY', $time1) != $my && ($time1 < $time2))
          $months[date('F', $time1)] = $empty_month;
      }
    }

    $months[date('F', $time2)] = $empty_month;
    return $months;
  }

   public function executeRs2(sfWebRequest $request){
    $this->form = new ReportRs2Form();

    if($request->isMethod('post')){
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

      if ($this->form->isValid()){
        $from_date = $this->form->getValue('from_date');
        $from_date = mktime(0,0,0,$from_date['month'],1,$from_date['year']);
        $to_date = $this->form->getValue('to_date');
        $to_date = mktime(0,0,0,$to_date['month'],1,$to_date['year']);
        $to_date = strtotime('+1 month -1 second', $to_date);

        $c = new Criteria();
        $c->add(NoteEntryPeer::SERVICE_DATE, $from_date, Criteria::GREATER_EQUAL);
        $c->addAnd(NoteEntryPeer::SERVICE_DATE, $to_date, Criteria::LESS_EQUAL);

        // sort by kid last name
        $c->addJoin(NoteEntryPeer::CLIENT_ID, ClientPeer::ID);
        $c->addAscendingOrderByColumn(ClientPeer::LAST_NAME);

        $note_entries = NoteEntryPeer::doSelectJoinAll($c);

        $this->months = $this->get_months($from_date, $to_date);
        $default_array = array(
                'Physical Therapist' => $this->months,
                'Occupational Therapist' => $this->months,
                'Speech Language Pathologist' => $this->months,
                'Psychologist' => $this->months,
            );
        
        $this->report = array();
        foreach($note_entries as $entry) {
          $client_id = $entry->getClient()->getFullName();
          $service_month = $entry->getServiceDate('F');

          $job = $entry->getEmployee()->getJob()->getName();

          if(!array_key_exists($client_id, $this->report)) {
            $this->report[$client_id] = $default_array;
          }

          if($entry->getAbsent()) {
            if( is_array($this->report[$client_id][$job]) && array_key_exists($service_month, $this->report[$client_id][$job]) ) {
              $this->report[$client_id][$job][$service_month]['absent'][NoteEntryPeer::getAbsentName($entry->getAbsent())] += $entry->getUnits();
            } else {
              $this->report[$client_id][$job][$service_month]['absent'][NoteEntryPeer::getAbsentName($entry->getAbsent())] = $entry->getUnits();
            }
          } else {
            if( is_array($this->report[$client_id][$job]) && array_key_exists($service_month, $this->report[$client_id][$job]) ) {

if(is_object($entry->getFrequency())) {
  $freq = $entry->getFrequency()->getName();
} else {
  $freq = 'Units';
}


if(!array_key_exists($freq, $this->report[$client_id][$job][$service_month]['units'])) {
$this->report[$client_id][$job][$service_month]['units'][$freq] = 0.00;
}
$this->report[$client_id][$job][$service_month]['units'][$freq] += $entry->getUnits();

            } else {
              $this->report[$client_id][$job][$service_month]['units'][$freq] = $entry->getUnits();
            }
          }

        }

        array(
            'client_id' => array(
                'ot' => array(
                    'month' => array(
                          'units' => array(
                              'frequency' => 'unit count',
                          ),
                          'absent' => array(
                            '1' => 'teacher absent count',
                            '2' => 'student absent count',
                            '3' => 'school closing count',
                          )

                      )
                    ),
            )
        );

        return 'Report';
      }
    }
  }

  public function executeDailyLog(sfWebRequest $request){
    $this->form = new ReportDailyLogForm();

    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid()){
        $month = $this->form->getValue('date_month');
        $this->year = $year = $this->form->getValue('date_year');

        $first_day = mktime(0,0,0,$month,1,$year);
        $last_day = strtotime('+1 month -1 second', $first_day);

      	$c = new Criteria();
        
        // only in this date range (the month selected)
        $c->add(NoteEntryPeer::SERVICE_DATE, $first_day, Criteria::GREATER_EQUAL);
        $c->addAnd(NoteEntryPeer::SERVICE_DATE, $last_day, Criteria::LESS_EQUAL);
        
        // include absent? lets go with no
        $c->add(NoteEntryPeer::ABSENT, 0);

        // sort by kids name
        $c->addAscendingOrderByColumn(ClientPeer::LAST_NAME);
        $c->addAscendingOrderByColumn(NoteEntryPeer::SERVICE_DATE);
        $c->addAscendingOrderByColumn(NoteEntryPeer::TIME_IN);
        
        // only the selected type
        if($this->form->getValue('service_type')) {
          $c->add(ClientServicePeer::OBJECT_TYPE, $this->form->getValue('service_type'));
        }

        $entries = NoteEntryPeer::doSelectJoinAll($c);

        // build array of all entries in the selected time period indexed by ID
        $this->all_entries = array();
        foreach($entries as $entry) {
          $this->all_entries[$entry->getId()] = $entry;
        }




        // build an array of overlaps of client
        $this->overlaps = array();
        $client_entry_times = array();
        $provider_entry_times = array();
        foreach($this->all_entries as $anEntry) {

          // skip grouped kids, for now
          if(!$anEntry->inGroup()) {
            if(!array_key_exists($anEntry->getEmployeeId(), $provider_entry_times)) {
              $provider_entry_times[$anEntry->getEmployeeId()] = array();
            }
            $provider_entry_times[$anEntry->getEmployeeId()][$anEntry->getId()] = array($anEntry->getTimeIn('U'), $anEntry->getTimeOut('U'));
          }
            if(!array_key_exists($anEntry->getClientId(), $client_entry_times)) {
              $client_entry_times[$anEntry->getClientId()] = array();
            }
            $client_entry_times[$anEntry->getClientId()][$anEntry->getId()] = array($anEntry->getTimeIn('U'), $anEntry->getTimeOut('U'));



        }

        // find clients with overlapping times
        foreach($client_entry_times as $client_id => $client_entries) {
          $entry_times[$client_id] = sort2d($client_entries, 0);

          $previous = array(0, 0, 0);
          foreach($entry_times[$client_id] as $entry_id => $times) {

            // this in time happened before previous out time.. we have a overlap
            if( $times[0] < $previous[1] && $entry_id != $previous[2]) {
              $this->overlaps[$entry_id] = $previous[2];
              $this->overlaps[$previous[2]] = $entry_id;
            }

            $previous = array($times[0], $times[1], $entry_id);
          }
        }

        // find providers with overlapping times
        foreach($provider_entry_times as $client_id => $client_entries) {
          $entry_times[$client_id] = sort2d($client_entries, 0);

          $previous = array(0, 0, 0);
          foreach($entry_times[$client_id] as $entry_id => $times) {

            // this in time happened before previous out time.. we have a overlap
            if( $times[0] < $previous[1] && $entry_id != $previous[2] ) {
              $this->overlaps[$entry_id] = $previous[2];
              $this->overlaps[$previous[2]] = $entry_id;
            }

            $previous = array($times[0], $times[1], $entry_id);

          }
        }



        // initialize
        $this->classrooms = array();



//        foreach($this->overlaps as $key => $blah) { echo $key .' => '. $blah->getId() .'<br />'; }
//        die();

        foreach($this->all_entries as $entry) {

          // only kids that have been serviced by this employee
          if(!$this->form->getValue('employee_id') || $this->form->getValue('employee_id') == $entry->getEmployeeId()) {
            $office = $entry->getOffice();
            $client = $entry->getClient();
            $week = $entry->getServiceDate('W');

            if(!is_object($office)) {
              $office = new Office();
              $office->setName('N/A');
            }

            // let's see if we have entered any for this classroom yet
            if(!array_key_exists($office->getName(), $this->classrooms)) {
              $this->classrooms[$office->getName()] =
                      array_fill_keys(range(date('W', $first_day), date('W', $last_day)), array());
            }

            // initialize the row for this kid
            if(!array_key_exists($week, $this->classrooms[$office->getName()]) || !array_key_exists($client->getFullName(), $this->classrooms[$office->getName()][$week])) {
              $days = array();
              for($day=1; $day<=5; $day++) {
                  $days[date('m/d/Y', strtotime($entry->getServiceDate('Y')."W".$week.$day))] = array();
              }

              $this->classrooms
                [$office->getName()]
                [$week]
                [$client->getFullName()]
                = $days;
            }

            // save the entry to the appropriate cell in the table
            $this->classrooms
              [$office->getName()]
              [$week]
              [$client->getFullName()]
              [$entry->getServiceDate('m/d/Y')]
              []
              = $entry;
          }

        }


//        $weeks = array(
//            'week_num' => array(
//                'client_name' => array(
//                    'date' => array(
//                        'service_type' => 'cell data, time, absent, etc.'
//                    )
//                )
//            )
//        );


        return 'Report';
      }
    }
  }

  protected function generateCalImage($d, $m, $y){
  	
		#Header( "Content-type: image/png");
		$imgWidth = 140;
		$imgHeight = 160;
		$grid = 20;
		
		$im = ImageCreate($imgWidth, $imgHeight);
		
		# set colors
		$white = ImageColorAllocate($im, 255, 255, 255);
		$black = ImageColorAllocate($im, 50, 50, 50);
		$orange = ImageColorAllocate($im, 255, 200, 0);
		$yellow = ImageColorAllocate($im, 255, 255, 0);
		$tan = ImageColorAllocate($im, 255, 255, 190);
		$grey = ImageColorAllocate($im, 205, 205, 205);
		$dkgrey = ImageColorAllocate($im, 140, 140, 140);
		
		// Create border around image
		imageline($im, 0, 0, 0, $imgHeight, $grey);
		imageline($im, 0, 0, $imgWidth, 0, $grey);
		imageline($im, $imgWidth-1, 0, $imgWidth-1, $imgHeight-1, $grey);
		imageline($im, 0, $imgHeight-1, $imgWidth-1, $imgHeight-1, $grey);
		
		// vert
		for ($i=1; $i<($imgWidth/$grid); $i++)
		    {imageline($im, $i*$grid, $grid*2, $i*$grid, $imgHeight, $grey);}
		
		// horiz
		for ($i=1; $i<($imgHeight/$grid); $i++)
		    {imageline($im, 0, $i*$grid, $imgWidth, $i*$grid, $grey);}
		
		### Put numbers on the calendar
		$today = $d;
		$month = $m;
		$year = $y;
		$datecode = $y.$m.$d;
		$gif = '.png';
		$first=mktime(0,0,0,$month,1,$year);
		$mon_yr=date("F Y", $first);
		$wd=date("w",$first);
		$lastday=date("d",mktime(0,0,0,$month+1,0,$year));
		$cur=-$wd+0;
		$ver_position = $grid*2.6;
		  
		for ($k=0;$k<6;$k++) {
		  $day_position = 4;
		  $last_row_used = 0;
		  
		  for ($i=0;$i<7;$i++ ) {
		    $cur++;
		    $sing_add = 0;
		    if (($cur<=0) || ($cur>$lastday) ) 
		      $day_position = ($day_position + $grid);
		    else{
		      $day_color = $black;
		      if ($day_position<10) $day_color = $grey;
		      if ($cur==$today) $day_color = $dkgrey;
		      if (strlen($cur)<2) {$sing_add = 3;}
		      $fin_position = ($day_position + $sing_add);
		        
		      ImageTTFText($im, 10, 0, $fin_position, $ver_position, $day_color, "../lib/tcpdf/fonts/arial.ttf", "$cur");
		        
		      $day_position = ($day_position + $grid);
		      $last_row_used = 1;
		    }
		  }
		  
		  $day_position = 5;
		  if ($last_row_used) $ver_position = ($ver_position + $grid);
		}
		  
		# month and year (centered in Arial Bold)
		$spc = $grid/2;
		$st_add = 0;
		$st = "$mon_yr";
		$st_len = strlen($st);
		$st_margin = (14 - $st_len);
		
		if ($st_margin > 0) {$st_add = ($st_margin * 4);}
		
		$spc = ($spc + $st_add);
		ImageTTFText($im, 14, 0, $spc, $grid/1.3, $black, "../lib/tcpdf/fonts/arialbd.ttf", "$st");
		
		# weekday names
		ImageString($im, 5, $grid*.5, $grid*1.2, "S", $orange);
		ImageString($im, 5, $grid*1.5, $grid*1.2, "M", $orange);
		ImageString($im, 5, $grid*2.5, $grid*1.2, "T", $orange);
		ImageString($im, 5, $grid*3.5, $grid*1.2, "W", $orange);
		ImageString($im, 5, $grid*4.5, $grid*1.2, "T", $orange);
		ImageString($im, 5, $grid*5.5, $grid*1.2, "F", $orange);
		ImageString($im, 5, $grid*6.5, $grid*1.2, "S", $orange);
		
		
		
		if ($ver_position<$imgHeight){
		  $im_out = ImageCreate($imgWidth, $imgHeight-($grid-1));
		  ImageCopyResized($im_out, $im, 0, 0, 0, 0, $imgWidth, $imgHeight, $imgWidth, $imgHeight);
		  ImagePng($im_out, sfConfig::get('sf_template_cache_dir').'/'.$datecode.$gif);
		  #ImagePng($im_out);
		  ImageDestroy($im);
		  ImageDestroy($im_out);
		}
		else{
		  ImagePng($im, sfConfig::get('sf_template_cache_dir').'/'.$datecode.$gif);
		  #ImagePng($im);
		  ImageDestroy($im);
		}
		return sfConfig::get('sf_template_cache_dir').'/'.$datecode.$gif;
  }
}



function sort2d($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}
