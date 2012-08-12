<?php

require_once dirname(__FILE__).'/../lib/clientGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/clientGeneratorHelper.class.php';

/**
 * client actions.
 *
 * @package    nckids
 * @subpackage client
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class clientActions extends autoClientActions
{
  public function executeAutocompleteName(sfWebRequest $request)
  {
    #$this->getResponse()->setHttpHeader('Content-type', 'application/json');
    $this->clients = ClientPeer::searchByName($request->getParameter('q'), $request->getParameter('limit'));
    $this->setLayout(false);
    return sfView::SUCCESS;
  }
  
  public function executeEdit(sfWebRequest $request){
  	$this->client = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->client);
    $c = new Criteria();
    $c->addAscendingOrderByColumn(ClientServicePeer::START_DATE);
    $this->client_services = $this->client->getClientServices($c);
    #if(){
	  #  sfLoader::loadHelpers(array('Url', 'Tag'));
	  #  $this->getResponse()->addHttpMeta('refresh', '0; url=' . url_for('client/odtMerge?id='.$this->client->getId()));
    #}
  }
  
  public function executeEiSummary(sfWebRequest $request){
    $this->client = ClientPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->client);

    if($request->isMethod('post')){
      $emp1 = EmployeePeer::retrieveByPk($request->getParameter('emp1'));
      $emp2 = EmployeePeer::retrieveByPk($request->getParameter('emp2'));
      $emp3 = EmployeePeer::retrieveByPk($request->getParameter('emp3'));

      set_include_path(sfConfig::get('sf_lib_dir').'/SetaPDF/');
      // define Font-Path
      define('SETAPDF_FORMFILLER_FONT_PATH',sfConfig::get('sf_lib_dir').'/SetaPDF/FormFiller/font/');

      // require API
      require_once('FormFiller/SetaPDF_FormFiller.php');

      /**
       * init a new instance of the FormFiller
       */
      $FormFiller =& SetaPDF_FormFiller::factory(
          sfConfig::get('sf_app_module_dir')."/client/templates/core_summary.pdf",
          "",
          "I"
      );

      $FormFiller->setUseUpdate(false);

      // Get all Form Fields
      $fields =& $FormFiller->getFields();
      // Check for errors
      if (SetaPDF::isError($fields)) {
          die($fields->message);
      }

      // Fill in Textfields
      $fields['child_last']->setValue($this->client->getLastName());
      $fields['child_first']->setValue($this->client->getFirstName());
      $fields['child_middle']->setValue('');
      $fields['dob1']->setValue($this->client->getDob('m'));
      $fields['dob2']->setValue($this->client->getDob('d'));
      $fields['dob3']->setValue($this->client->getDob('Y'));
      $fields['ev_name']->setValue("North Country Kids");
      $fields['ev_id']->setValue("");
      $fields['contact']->setValue("Stephanie Girard");
      $fields['phone']->setValue("518-561-3803");
      $fields['fax']->setValue("518-561-3805");

      $fields['c_name1']->setValue(($emp1)?$emp1->getFullName():"");
      $fields['c_special1']->setValue(($emp1)?$emp1->getJob()->getAltName():"");
      $fields['c_instrument1']->setValue(($emp1)?"DAYC":"");

      $fields['c_name2']->setValue(($emp2)?$emp2->getFullName():"");
      $fields['c_special2']->setValue(($emp2)?$emp2->getJob()->getAltName():"");
      $fields['c_instrument2']->setValue(($emp2)?"DAYC":"");

      $fields['c_name3']->setValue(($emp3)?$emp3->getFullName():"");
      $fields['c_special3']->setValue(($emp3)?$emp3->getJob()->getAltName():"");
      $fields['c_instrument3']->setValue(($emp3)?"DAYC":"");

      // Ouput the new PDF
      return $FormFiller->fillForms('core_summary.pdf');
    }else{
      $this->form = new TeamForm();
    }
  }

  public function executeEiMulti(sfWebRequest $request){
    $client = ClientPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($client);
    
    set_include_path(sfConfig::get('sf_lib_dir').'/SetaPDF/');
    // define Font-Path
    define('SETAPDF_FORMFILLER_FONT_PATH',sfConfig::get('sf_lib_dir').'/SetaPDF/FormFiller/font/');
    
    // require API
    require_once('FormFiller/SetaPDF_FormFiller.php');
    
    /**
     * init a new instance of the FormFiller
     */
    $FormFiller =& SetaPDF_FormFiller::factory(
        sfConfig::get('sf_app_module_dir')."/client/templates/multidisciplinary_summary.pdf", 
        "", 
        "I"
    );
    
    $FormFiller->setUseUpdate(false);
    
    // Get all Form Fields
    $fields =& $FormFiller->getFields();
    // Check for errors
    if (SetaPDF::isError($fields)) {
        die($fields->message);
    }

    // Fill in Textfields
    $fields['child_last']->setValue($client->getLastName());
    $fields['child_first']->setValue($client->getFirstName());
    $fields['child_middle']->setValue('');
    $fields['dob1']->setValue($client->getDob('m'));
    $fields['dob2']->setValue($client->getDob('d'));
    $fields['dob3']->setValue($client->getDob('Y'));
    
    // Ouput the new PDF
    return $FormFiller->fillForms('core_summary.pdf');
    
  }
  
	public function executeBatchAddressLabels(sfWebRequest $request){
	  if($ids = $request->getParameter('ids'))
	    $clients = ClientPeer::retrieveByPks($ids);
	  else
	    $clients = ClientPeer::getActiveAsOfDate();
	    
    #$this->filters = new ClientFormFilter($this->getUser()->getAttribute('client.filters', $this->configuration->getFilterDefaults(), 'admin_module'));
    #$c = $this->filters->buildCriteria($this->getFilters());
	  
    #$c->add(ClientPeer::ID, $ids, Criteria::IN);
    #$clients = ClientPeer::doSelectJoinAll($c);
    // Standard format
    $pdf = new Avery('5160');
    
    $pdf->AddPage();
    
    // Print labels
    foreach($clients as $client) {
        $text = sprintf("%s\n%s\n", $client->getParent(), $client->getAddress());
        if($client->getAddress2())
          $text .= sprintf("%s\n", $client->getAddress2());
        $text .= sprintf("%s %s, %s", $client->getCity(), $client->getState(), $client->getZip());
        $pdf->Add_Label($text);
    }
    
    //Close and output PDF document
    $pdf->SetDisplayMode('real');
    return $pdf->Output('address_labels.pdf', 'D');
	}
	
  public function executeBatchAttendance(sfWebRequest $request){
    if($ids = $request->getParameter('ids'))
      $clients = ClientPeer::retrieveByPks($ids);
    else
      $clients = ClientPeer::getActiveAsOfDate();
    
		// create new PDF document
		$pdf = new attendanceSheetPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		$pdf->setOffice($request->getParameter('office'));
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, 10);
		
		// ---------------------------------------------------------
		
		// set font
		$pdf->SetFont('helvetica', '', 12);
		
		// add a page
		$pdf->AddPage();

		// print colored table
		$pdf->ColoredTable($clients);
		
		// ---------------------------------------------------------
		
		//Close and output PDF document
    return $pdf->Output('attendance_sheet.pdf', 'D');
  }
  
  public function executeBatchClassroomTimesheet(sfWebRequest $request){
  	
  	// using the filters and the selected ID's get the set of provider ID's
    $ids = $request->getParameter('ids');

    // apply filter
    $this->filters = new ClientFormFilter($this->getUser()->getAttribute('client.filters', array(), 'admin_module'));
    $c = $this->filters->buildCriteria($this->getFilters(), true);

    // limit to only the selected clients (save for later use in loop)
    $filter_crit = $c->add(ClientServicePeer::CLIENT_ID, $ids, Criteria::IN);
    
    // only get the set of employees
    $c->addGroupByColumn(ClientServicePeer::EMPLOYEE_ID);
    
    // get employees for all services
    $c->addJoin(ClientServicePeer::EMPLOYEE_ID, EmployeePeer::ID);

    $employees = EmployeePeer::doSelect($c);
    
    // for each provider, use the filter criteria to get just their timesheets
    $this->filters = new ClientFormFilter($this->getUser()->getAttribute('client.filters', array(), 'admin_module'));
    $filter_crit = $this->filters->buildCriteria($this->getFilters());
    $filter_crit->add(ClientPeer::ID, $ids, Criteria::IN);
    $timesheet = array();
    $i=0;
    foreach($employees as $employee){
    	$temp = clone $filter_crit;
    	$timesheet[$i]['employee'] = $employee->getFullName();    
    	$temp->add(ClientServicePeer::EMPLOYEE_ID, $employee->getId());
    	$client_servs = ClientServicePeer::doSelect($temp);

	    $timesheet[$i]['clients_right'] = '';
	    $timesheet[$i]['clients_left'] = '';
	    $num = 0;
	    foreach($client_servs as $acs)
	      if($num++ % 2)
	        $timesheet[$i]['clients_right'] .= $acs->getClient()->getFullName() ." - ". $acs->getFrequency() ."\n";
	      else
	        $timesheet[$i]['clients_left'] .= $acs->getClient()->getFullName() ." - ". $acs->getFrequency() ."\n";
	    
	    $timesheet[$i]['office'] = $acs->getOffice();
      $timesheet[$i]['service'] = $acs->getService();
      $timesheet[$i]['date'] = $acs->getStartDate('Y') .' - '. $acs->getEndDate('Y');
	    
    	$i++;
    }
/*
    foreach($timesheet as $asheet){
    	echo $asheet['employee'].'<br />';
    	foreach($asheet['clients'] as $kid){
    		echo $kid->getClient().'<br />';
    	}
    	echo '<br />';
    }
die();
*/
    
    // create the document
    $doc = new sfTinyDoc();
    $doc->createFrom(array('basename' => 'batchClassroomTimesheet'));
    $doc->loadXml('content.xml');
    
    $doc->mergeXmlBlock('timesheet', $timesheet);
    
    $doc->saveXml();
    $doc->close();
   
    // send and remove the document
    $doc->sendResponse();
    $doc->remove();
   
    throw new sfStopException;
  }
  
  public function executeBatchMedicaidVoucher(sfWebRequest $request){
  	$ids = $request->getParameter('ids');

  	$this->filters = new ClientFormFilter($this->getUser()->getAttribute('client.filters', array(), 'admin_module'));
    $c = $this->filters->buildCriteria($this->getFilters(), true);

    $c->add(ClientServicePeer::CLIENT_ID, $ids, Criteria::IN);

    $services = ClientServicePeer::doSelectJoinAll($c);

    
    // create the document
    $doc = new sfTinyDoc();
    $doc->createFrom(array('basename' => 'batchMedicaidVoucher'));
    $doc->loadXml('content.xml');

    #$doc->mergeXmlField('client', $client);

    $doc->mergeXmlBlock('service', $services);    
    
    $doc->saveXml();
    $doc->close();
   
    // send and remove the document
    $doc->sendResponse();
    $doc->remove();
   
    throw new sfStopException;
  }

  public function executeBatchAideVoucher(sfWebRequest $request){
  	$ids = $request->getParameter('ids');

  	$this->filters = new ClientFormFilter($this->getUser()->getAttribute('client.filters', array(), 'admin_module'));
    $c = $this->filters->buildCriteria($this->getFilters(), true);

    $c->add(ClientPeer::ID, $ids, Criteria::IN);

    $c->add(ClientServicePeer::SERVICE_ID, sfConfig::get('app_service_type_aide_id'));

    // join

    $pages = ClientServicePeer::doSelectJoinAll($c);

    // create the document
    $doc = new sfTinyDoc();
    $doc->createFrom(array('basename' => 'batchAideVoucher'));
    $doc->loadXml('content.xml');

    #$doc->mergeXmlField('client', $client);

    $doc->mergeXmlBlock('service', $pages);

    $doc->saveXml();
    $doc->close();

    // send and remove the document
    $doc->sendResponse();
    $doc->remove();

    throw new sfStopException;
  }

  public function executeBillingVoucher(sfWebRequest $request){
    $client = ClientPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($client);
    
    // create the document
    $doc = new sfTinyDoc();
    $doc->createFrom();
    $doc->loadXml('content.xml');

    $doc->mergeXmlField('client', $client);    
    
    $doc->saveXml();
    $doc->close();
   
    // send and remove the document
    $doc->sendResponse();
    $doc->remove();
   
    throw new sfStopException;
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
    	$is_new = $form->getObject()->isNew();
      $notice = $is_new ? 'The item was created successfully.' : 'The item was updated successfully.';
      
      $client = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $client)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@client_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);
        $this->getUser()->setFlash('is_new', $is_new);

        $this->redirect(array('sf_route' => 'client_edit', 'sf_subject' => $client));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
