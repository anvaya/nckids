<?php

/**
 * NoteEntry form.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class NoteEntryForm extends BaseNoteEntryForm
{
  public function configure()
  {
    unset(
      $this['client_id'],
      $this['created_at'],
      $this['updated_at'],
      $this['employee_id'],
      $this['time_in'],
      $this['time_out']
    );

    $this->setOption('employee_id', $this->getObject()->getEmployeeId());
    
    //Embedding at least a form
    $entry_concerns = $this->getObject()->getEntryConcerns();

    //An empty form will act as a container for all the contacts
    $entry_concerns_form = new SfForm();
    $count = 0;
    foreach ($entry_concerns as $entry_concern) {
      $entry_concern_form = new EntryConcernForm($entry_concern, array('employee_id' => $this->getOption('employee_id')));
      //Embedding each form in the container
      $entry_concerns_form->embedForm($count, $entry_concern_form);
      $count ++;
    }
    //Embedding the container in the main form
    $this->embedForm('entry_concerns', $entry_concerns_form);


    // this makes it so client service list only shows active services for this employee
    $c = new Criteria();
    ClientServicePeer::addActive($c);
    $c->add(ClientServicePeer::EMPLOYEE_ID, $this->getOption('employee_id'));

    // only classroom services
    $c->add(ClientServicePeer::OBJECT_TYPE, array(ClientServicePeer::CLASSKEY_CLASSROOM, ClientServicePeer::CLASSKEY_SEIT, ClientServicePeer::CLASSKEY_PRESCHOOL, ClientServicePeer::CLASSKEY_EI), Criteria::IN);

    $c->addJoin(ClientPeer::ID, ClientServicePeer::CLIENT_ID);
    $c->addAscendingOrderByColumn(ClientPeer::FIRST_NAME);
    $this->widgetSchema['client_service_id'] = new sfWidgetFormPropelChoiceGrouped(array('model' => 'ClientService', 'add_empty' => true, 'group_by_method' => 'getObjectType'));
    $this->widgetSchema['client_service_id']->setOption('criteria', $c);

    // this makes it so the group list only shows other kids this person is activley servicing
    $this->widgetSchema['note_entry_kids_list'] = new sfWidgetFormPropelChoiceGrouped(array('model' => 'ClientService', 'add_empty' => false, 'group_by_method' => 'getObjectType'));
    $this->widgetSchema['note_entry_kids_list']->setOption('criteria', $c);
    $this->widgetSchema['note_entry_kids_list']->setOption('expanded', true);
    $this->widgetSchema['note_entry_kids_list']->setOption('multiple', true);
    $this->widgetSchema['note_entry_kids_list']->setOption('key_method', 'getClientId');
    $this->widgetSchema['note_entry_kids_list']->setOption('method', 'getClient');
    $this->widgetSchema['note_entry_kids_list']->setOption('renderer_options', array('template' => '<div class="groupType"><strong>%group%</strong> %options%<br style="clear:both" /></div>'));

    $this->widgetSchema->setLabels(array(
        'client_service_id' => 'Client Service',
        'office_id'       => 'Service Location',
        'frequency_id'      => 'IEP Frequency',
        'note_entry_kids_list' => 'Group'
    ));

    $this->widgetSchema['service_date'] = new sfWidgetFormInput();
    $this->widgetSchema['time_in'] = new sfWidgetFormInput();
    $this->widgetSchema['time_out'] = new sfWidgetFormInput();

    $this->widgetSchema['units'] = new sfWidgetFormChoice(array('choices' => NoteEntryPeer::getUnitChoices()));
    $this->validatorSchema['units'] = new sfValidatorChoice(array('choices' => NoteEntryPeer::getUnitChoices(true)));

    $this->widgetSchema['absent'] = new sfWidgetFormChoice(array('choices' => NoteEntryPeer::getAbsentChoices()));
    $this->validatorSchema['absent'] = new sfValidatorChoice(array('choices' => NoteEntryPeer::getAbsentChoices(true)));


    $this->validatorSchema['time_in'] = new sfValidatorPass();
    $this->validatorSchema['time_out'] = new sfValidatorPass();

    /*
     * add a post validator for dates and times
     * needs to convert 12-hour to 24-hour time, anything less than 7 is afternoon
     * needs to use service date to set the times
     */
    $this->validatorSchema->setPostValidator(
      new sfValidatorCallback(array('callback' => array($this, 'validateDates')))
    );

  }

  public function validateDates($validator, $values) {

    $out_parts = explode(':', $values['time_out']);
    $out_mode = 'am';
    if(intval($out_parts[0]) < 7 || intval($out_parts[0]) == 12) {
      $out_mode = 'pm';
    }

    $in_parts = explode(':', $values['time_in']);
    $in_mode = 'am';
    if(intval($in_parts[0]) < 7 || intval($in_parts[0]) == 12) {
      $in_mode = 'pm';
    }

    $service_date = strtotime($values['service_date']);
    $time_in = strtotime(date('F j, Y', $service_date) .', '. $values['time_in'] .' '. $in_mode);
    $time_out = strtotime(date('F j, Y', $service_date) .', '. $values['time_out'] .' '. $out_mode);

    $values['service_date'] = $service_date;
    $values['time_in'] = $time_in;
    $values['time_out'] = $time_out;



    /*
      $error = new sfValidatorError($validator, 'ahahaah');
      throw new sfValidatorErrorSchema($validator, array('val' => $error));
     *
     */

    return $values;
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    $this->setDefault('service_date', $this->object->getServiceDate('m/d/Y'));
    $this->setDefault('time_in', $this->object->getTimeIn('h:i'));
    $this->setDefault('time_out', $this->object->getTimeOut('h:i'));


  }

  public function addConcern($num){
    $entry_concern = new EntryConcern();
    $entry_concern->setNoteEntry($this->getObject());
    $entry_concern_form = new EntryConcernForm($entry_concern, array('employee_id' => $this->getOption('employee_id')));

    //Embedding the new concern in the container
    $this->embeddedForms['entry_concerns']->embedForm($num, $entry_concern_form);
    //Re-embedding the container
    $this->embedForm('entry_concerns', $this->embeddedForms['entry_concerns']);
  }

  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {
    foreach($taintedValues['entry_concerns'] as $key=>$the_concern)
    {
      if (!isset($this['entry_concerns'][$key]))
      {
        $this->addConcern($key);
      }
    }

    foreach ($this->embeddedForms['entry_concerns']->getEmbeddedForms() as $key => $concernForm) {
      if (!$taintedValues['entry_concerns'][$key]['delete']) {
        // only save todos that aren't blank
      } else {

        // Remove embedded forms that are blanks here!!
        $concernForm->getObject()->delete();
        unset(
                $concernForm,
                $this->embeddedForms['entry_concerns'][$key],
                $taintedValues['entry_concerns'][$key]
        );
      }
    }
    parent::bind($taintedValues, $taintedFiles);
  }



  public function updateObject($values = null) {
    $object = parent::updateObject($values);

    $object->setClientId($object->getClientService()->getClientId());
    $object->setOfficeId($object->getClientService()->getOfficeId());
    $object->setFrequencyId($object->getClientService()->getFrequencyId());

    return $object;
  }

}
