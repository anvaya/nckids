<?php

/**
 * program actions.
 *
 * @package    nckids
 * @subpackage program
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class programActions extends sfActions
{
  public function executeChartServices()
  {
    $data = array();
    $data[ClientServicePeer::CLASSKEY_CLASSROOM] = ClientServicePeer::doCount(ClientServicePeer::addActive(new Criteria())->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_CLASSROOM));
    $data[ClientServicePeer::CLASSKEY_SEIT] = ClientServicePeer::doCount(ClientServicePeer::addActive(new Criteria())->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_SEIT));
    $data[ClientServicePeer::CLASSKEY_PRESCHOOL] = ClientServicePeer::doCount(ClientServicePeer::addActive(new Criteria())->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_PRESCHOOL));
    $data[ClientServicePeer::CLASSKEY_EI] = ClientServicePeer::doCount(ClientServicePeer::addActive(new Criteria())->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_EI));
    $data[ClientServicePeer::CLASSKEY_SCHOOL_AGE] = ClientServicePeer::doCount(ClientServicePeer::addActive(new Criteria())->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_SCHOOL_AGE));

    //Creating a stGraph object
    $g = new stGraph();

    //set background color
    $g->bg_colour = '#FFFFFF';

    //Set the transparency, line colour to separate each slice etc.
    $g->pie(90,'#78B9EC','{font-size: 12px; color: #000000;');

    //array two arrray one containing data while other contaning labels
    $g->pie_values($data, array_keys($data));

    //Set the colour for each slice. Here we are defining three colours
    //while we need 7 colours. So, the same colours will be
    //repeated for the all remaining slices in the same order
    $g->pie_slice_colours( array('#d01f3c','#356aa0','#c79810') );

    //To display value as tool tip
    $g->set_tool_tip( '#val# Services' );

    $g->title( 'Active Client Services Break-Down', '{font-size:18px;margin-bottom:20px}' );

    echo $g->render();

    return sfView::NONE;
  }

  public function executeChartOffices()
  {
    $data = array();
    foreach(OfficePeer::doSelect(new Criteria()) as $office){
      $c = new Criteria();
      $c->add(ClientServicePeer::OFFICE_ID, $office->getId());
      $data[$office->getName()] = ClientServicePeer::doCount(ClientServicePeer::addActive($c));
    }
    
    //Creating a stGraph object
    $g = new stGraph();

    //set background color
    $g->bg_colour = '#FFFFFF';

    //Set the transparency, line colour to separate each slice etc.
    $g->pie(90,'#78B9EC','{font-size: 12px; color: #000000;');

    //array two arrray one containing data while other contaning labels
    $g->pie_values($data, array_keys($data));

    //Set the colour for each slice. Here we are defining three colours
    //while we need 7 colours. So, the same colours will be
    //repeated for the all remaining slices in the same order
    $g->pie_slice_colours( array('#d01f3c','#356aa0','#c79810') );

    //To display value as tool tip
    $g->set_tool_tip( '#val# Services' );

    $g->title( 'Active Client Services At Location', '{font-size:18px;margin-bottom:20px}' );

    echo $g->render();

    return sfView::NONE;
  }

  public function executeChartEmployees()
  {
    $data = array();
    foreach(JobPeer::doSelect(new Criteria()) as $job){
      $c = new Criteria();
      $c->add(EmployeePeer::JOB_ID, $job->getId());
      $data[$job->getName()] = EmployeePeer::doCount($c);
    }
     //To create a bar chart we need to create a stBarOutline Object
    $bar = new stBarOutline( 80, '#78B9EC', '#3495FE' );
    $bar->key( '', 10 );

    //Passing the random data to bar chart
    $bar->data = $data;

    //Creating a stGraph object
    $g = new stGraph();
    $g->title( 'Employee Job Type Break-Down', '{font-size: 20px;}' );
    $g->bg_colour = '#FFFFFF';
    $g->set_inner_background( '#E3F0FD', '#CBD7E6', 90 );
    $g->x_axis_colour( '#8499A4', '#E4F5FC' );
    $g->y_axis_colour( '#8499A4', '#E4F5FC' );

    //Pass stBarOutline object i.e. $bar to graph
    $g->data_sets[] = $bar;

    //Setting labels for X-Axis
    $g->set_x_labels(array_keys($data));

    // to set the format of labels on x-axis e.g. font, color, step
    $g->set_x_label_style( 10, '#18A6FF', 0, 2 );

    // To tick the values on x-axis
    // 2 means tick every 2nd value
    $g->set_x_axis_steps( 2 );

    //set maximum value for y-axis
    //we can fix the value as 20, 10 etc.
    //but its better to use max of data
    $g->set_y_max( max($data) );
    $g->y_label_steps( 4 );
    $g->set_y_legend( '# Employees', 12, '#18A6FF' );
    echo $g->render();

    return sfView::NONE;
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->client_service_list = ClientServicePeer::doSelect(new Criteria());
  }

  public function executeNewEi(sfWebRequest $request)
  {
  	$this->title = 'EI';
  	$client = ClientPeer::retrieveByPK($request->getParameter('client_id'));
    if(!$last_cs = $client->getLastService())
      $last_cs = new Ei();
  	$client_service = new Ei();
  	$client_service->setEmployee($last_cs->getEmployee());
  	$client_service->setStartDate($last_cs->getStartDate());
  	$client_service->setEndDate($last_cs->getEndDate());
  	$client_service->setClientId($request->getParameter('client_id'));
  	
    $this->form = new EiForm($client_service);
    $this->setTemplate('new');
  }
  
  public function executeNewClassroom(sfWebRequest $request)
  {
  	$this->title = 'Classroom';
    $client = ClientPeer::retrieveByPK($request->getParameter('client_id'));
    if(!$last_cs = $client->getLastService())
      $last_cs = new Classroom();
    $client_service = new Classroom();
    $client_service->setEmployee($last_cs->getEmployee());
    $client_service->setStartDate($last_cs->getStartDate());
    $client_service->setEndDate($last_cs->getEndDate());
    $client_service->setClientId($request->getParameter('client_id'));
    
    $this->form = new ClassroomForm($client_service);
    $this->setTemplate('new');
  }
  
  public function executeNewSeit(sfWebRequest $request)
  {
  	$this->title = 'SEIT';
    $client = ClientPeer::retrieveByPK($request->getParameter('client_id'));
    if(!$last_cs = $client->getLastService())
      $last_cs = new Seit();
    $client_service = new Seit();
    $client_service->setEmployee($last_cs->getEmployee());
    $client_service->setStartDate($last_cs->getStartDate());
    $client_service->setEndDate($last_cs->getEndDate());
    $client_service->setClientId($request->getParameter('client_id'));
    
    $this->form = new SeitForm($client_service);
    $this->setTemplate('new');
  }
  
  public function executeNewPreschool(sfWebRequest $request)
  {
  	$this->title = 'Preschool';
    $client = ClientPeer::retrieveByPK($request->getParameter('client_id'));
    if(!$last_cs = $client->getLastService())
      $last_cs = new Preschool();
    $client_service = new Preschool();
    $client_service->setEmployee($last_cs->getEmployee());
    $client_service->setStartDate($last_cs->getStartDate());
    $client_service->setEndDate($last_cs->getEndDate());
    $client_service->setClientId($request->getParameter('client_id'));
    
    $this->form = new PreschoolForm($client_service);
    $this->setTemplate('new');
  }

  public function executeNewSchoolAge(sfWebRequest $request)
  {
  	$this->title = 'School Age';
    $client = ClientPeer::retrieveByPK($request->getParameter('client_id'));
    if(!$last_cs = $client->getLastService())
      $last_cs = new SchoolAge();
    $client_service = new SchoolAge();
    $client_service->setEmployee($last_cs->getEmployee());
    $client_service->setStartDate($last_cs->getStartDate());
    $client_service->setEndDate($last_cs->getEndDate());
    $client_service->setClientId($request->getParameter('client_id'));

    $this->form = new SchoolAgeForm($client_service);
    $this->setTemplate('new');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new ClientServiceForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($client_service = ClientServicePeer::retrieveByPk($request->getParameter('id')), sprintf('Object client_service does not exist (%s).', $request->getParameter('id')));
    $service_type = sfInflector::camelize($client_service->getObjectType());
    $form_class = $service_type.'Form';
    $this->title = $service_type;
    if(!class_exists($form_class))
      $form_class = 'ClientServiceForm';
    $this->form = new $form_class($client_service);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($client_service = ClientServicePeer::retrieveByPk($request->getParameter('id')), sprintf('Object client_service does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientServiceForm($client_service);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($client_service = ClientServicePeer::retrieveByPk($request->getParameter('id')), sprintf('Object client_service does not exist (%s).', $request->getParameter('id')));
    $client_service->delete();

    $this->redirect('report/invalidServices');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $client_service = $form->save();

      $this->redirect('client/edit?id='.$client_service->getClient()->getId());
    }
  }
}
