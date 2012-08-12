<?php

/**
 * entry actions.
 *
 * @package    nckids
 * @subpackage entry
 * @author     Your name here
 */
class entryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(NoteEntryPeer::EMPLOYEE_ID, $this->getUser()->getProfile()->getEmployeeId());
    $c->addAscendingOrderByColumn(NoteEntryPeer::SERVICE_DATE);

    if(!$request->getParameter('show_all', false)) {
      // only show entries for current month
      $c->add(NoteEntryPeer::SERVICE_DATE, mktime(0, 0, 0, date('n'), 1, date('Y')), Criteria::GREATER_EQUAL);
      $c->addAnd(NoteEntryPeer::SERVICE_DATE, strtotime('+1 MONTH -1 SECOND', mktime(0, 0, 0, date('n'), 1, date('Y'))), Criteria::LESS_EQUAL);
    } else {
      $c->add(NoteEntryPeer::SERVICE_DATE, mktime(0, 0, 0, date('n', strtotime('last month')), 1, date('Y', strtotime('last month'))), Criteria::GREATER_EQUAL);
    }

    $this->client_entries = NoteEntryPeer::getByClient($c);
  }

  public function executeShowClient(sfWebRequest $request)
  {
    $this->client = ClientPeer::retrieveByPK($request->getParameter('id'));

    $c = new Criteria();
    $c->addAscendingOrderByColumn(NoteEntryPeer::SERVICE_DATE);
    
    // only show entries for current month
    $c->add(NoteEntryPeer::SERVICE_DATE, mktime(0, 0, 0, date('n'), 1, date('Y')), Criteria::GREATER_EQUAL);
    $c->addAnd(NoteEntryPeer::SERVICE_DATE, strtotime('+1 MONTH -1 SECOND', mktime(0, 0, 0, date('n'), 1, date('Y'))), Criteria::LESS_EQUAL);

    $this->entries = $this->client->getNoteEntrys($c);
  }

  public function executeNew(sfWebRequest $request)
  {
    $entry = new NoteEntry();
    $entry->setEmployee($this->getUser()->getProfile()->getEmployee());
    $this->form = new NoteEntryForm($entry);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $entry = new NoteEntry();
    $entry->setEmployee($this->getUser()->getProfile()->getEmployee());
    $this->form = new NoteEntryForm($entry);

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($note_entry = NoteEntryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object note_entry does not exist (%s).', $request->getParameter('id')));
    $this->form = new NoteEntryForm($note_entry);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($note_entry = NoteEntryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object note_entry does not exist (%s).', $request->getParameter('id')));
    $this->form = new NoteEntryForm($note_entry);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($note_entry = NoteEntryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object note_entry does not exist (%s).', $request->getParameter('id')));
    $note_entry->delete();

    $this->redirect('entry/index');
  }

  public function executeMonthlyNotes(sfWebRequest $request)
  {

    $this->form = new ReportMonthlyNotesForm();
    if($request->hasParameter('client_id')) {
      $this->form->setDefault('client_id', $request->getParameter('client_id'));
    }

    if($request->isMethod('post')){
      $this->form->bind(
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName())
      );

      if ($this->form->isValid()){

        $c = new Criteria();

        // limit to this provider
        $c->add(NoteEntryPeer::EMPLOYEE_ID, $this->getUser()->getProfile()->getEmployeeId());

        // don't include absent services
        #$c->add(NoteEntryPeer::ABSENT, 0);

        // limit to month selected
        $month = $this->form->getValue('date_month');
        $year = $this->form->getValue('date_year');

        $this->first_day = mktime(0,0,0,$month,1,$year);
        $this->last_day = strtotime('+1 month -1 second', $this->first_day);
        $c->add(NoteEntryPeer::SERVICE_DATE, $this->first_day, Criteria::GREATER_EQUAL);
        $c->addAnd(NoteEntryPeer::SERVICE_DATE, $this->last_day, Criteria::LESS_EQUAL);

        $c->addJoin(NoteEntryPeer::CLIENT_SERVICE_ID, ClientServicePeer::ID);
        $c->add(ClientServicePeer::OBJECT_TYPE, $this->form->getValue('service_type'));

        // oldest first
        $c->addAscendingOrderByColumn(NoteEntryPeer::SERVICE_DATE);

        // limit to single client?
        if($this->form->getValue('client_id') > 0) {
          $c->add(NoteEntryPeer::CLIENT_ID, $this->form->getValue('client_id'));
        }

        $entries = NoteEntryPeer::doSelectJoinAll($c);

        // go over each entry to create groups by service, each service gets a monthly "voucher" with multiple note entries
        $services = array();
        foreach($entries as $entry) {
          if(!array_key_exists($entry->getClientServiceId(), $services)) {
            // all of this only happens once for each service type
            $services[$entry->getClientServiceId()]['entries'] = array();
            $services[$entry->getClientServiceId()]['units'] = 0.00;

            $services[$entry->getClientServiceId()]['client'] = $entry->getClientService()->getClient()->getFullName();
            $services[$entry->getClientServiceId()]['dob'] = $entry->getClientService()->getClient()->getDob('U');
            $services[$entry->getClientServiceId()]['district'] = ($entry->getClientService()->getClient()->getDistrict())?$entry->getClientService()->getClient()->getDistrict()->getName():'';
            $services[$entry->getClientServiceId()]['service'] = $entry->getClientService()->getService()->getName();
            $services[$entry->getClientServiceId()]['location'] = ($entry->getLocation())?$entry->getLocation()->getName():'';
            $services[$entry->getClientServiceId()]['frequency'] = ($entry->getFrequencyId())?$entry->getFrequency()->getName():'';
            $services[$entry->getClientServiceId()]['type'] = $entry->getClientService()->getObjectType();


            $services[$entry->getClientServiceId()]['provider'] = $entry->getEmployee()->getFullName();
            $services[$entry->getClientServiceId()]['license'] = $entry->getEmployee()->getLicenseNumber();
            $services[$entry->getClientServiceId()]['npi'] = $entry->getEmployee()->getNpi();
            $services[$entry->getClientServiceId()]['authorization'] = $entry->getClientService()->getAuthorization();

          }
          $services[$entry->getClientServiceId()]['entries'][] = $entry;
          $services[$entry->getClientServiceId()]['units'] += $entry->getUnits();
        }

        $this->services = $services;

        return 'Report'.ucfirst($this->form->getValue('service_type'));
      }
    }



  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $note_entry = $form->save();

      $this->redirect('entry/index');
    }
  }

  public function executeAddConcernForm(sfWebRequest $request)
  {
    $this->forward404unless($request->isXmlHttpRequest());
    $number = intval($request->getParameter("num"));

    if($note_entry = NoteEntryPeer::retrieveByPk($request->getParameter('id'))){
      $form = new NoteEntryForm($note_entry);
    }else{
      $entry = new NoteEntry();
      $entry->setEmployee($this->getUser()->getProfile()->getEmployee());
      $form = new NoteEntryForm($entry);
    }

    $form->addConcern($number);

    return $this->renderPartial('AddConcern',array('form' => $form, 'num' => $number));
  }

  public function executeAjaxFillClient(sfWebRequest $request) {
    $client_service = ClientServicePeer::retrieveByPK($request->getParameter('id'));

    $fields = array();

    $fields[] = array(
        'id' => 'entry_location',
        'value' => ($client_service->getOffice())?$client_service->getOffice()->getName():''
       );

    $fields[] = array(
        'id' => 'entry_frequency',
        'value' => $client_service->getFrequency()->getName()
    );

    return $this->jsonify($fields);
  }

  public function executeAjaxGetObjectives(sfWebRequest $request) {
    $aoc = AreaOfConcernPeer::retrieveByPK($request->getParameter('id'));

    $objectives = $aoc->getObjectives();
    $objectives = nckTools::asArray($objectives);

    $result = array(
        'target' => $request->getParameter('target'),
        'options' => $objectives
    );

    return $this->jsonify($result);
  }

  protected function jsonify($stuff) {
    $this->getResponse()->setHttpHeader('Cache-Control','no-cache, must-revalidate');
    $this->getResponse()->setHttpHeader('Expires','0');
    $this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');

    return $this->renderText(json_encode($stuff));
  }


}
