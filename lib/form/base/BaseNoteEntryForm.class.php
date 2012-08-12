<?php

/**
 * NoteEntry form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseNoteEntryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'employee_id'          => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'client_id'            => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'client_service_id'    => new sfWidgetFormPropelChoice(array('model' => 'ClientService', 'add_empty' => true)),
      'office_id'            => new sfWidgetFormPropelChoice(array('model' => 'Office', 'add_empty' => true)),
      'frequency_id'         => new sfWidgetFormPropelChoice(array('model' => 'Frequency', 'add_empty' => true)),
      'service_date'         => new sfWidgetFormDateTime(),
      'time_in'              => new sfWidgetFormDateTime(),
      'time_out'             => new sfWidgetFormDateTime(),
      'cpt_code'             => new sfWidgetFormInput(),
      'units'                => new sfWidgetFormInput(),
      'absent'               => new sfWidgetFormInput(),
      'comments'             => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'note_entry_kids_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Client')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'NoteEntry', 'column' => 'id', 'required' => false)),
      'employee_id'          => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'client_id'            => new sfValidatorPropelChoice(array('model' => 'Client', 'column' => 'id', 'required' => false)),
      'client_service_id'    => new sfValidatorPropelChoice(array('model' => 'ClientService', 'column' => 'id', 'required' => false)),
      'office_id'            => new sfValidatorPropelChoice(array('model' => 'Office', 'column' => 'id', 'required' => false)),
      'frequency_id'         => new sfValidatorPropelChoice(array('model' => 'Frequency', 'column' => 'id', 'required' => false)),
      'service_date'         => new sfValidatorDateTime(array('required' => false)),
      'time_in'              => new sfValidatorDateTime(array('required' => false)),
      'time_out'             => new sfValidatorDateTime(array('required' => false)),
      'cpt_code'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'units'                => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'absent'               => new sfValidatorInteger(array('required' => false)),
      'comments'             => new sfValidatorString(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
      'note_entry_kids_list' => new sfValidatorPropelChoiceMany(array('model' => 'Client', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('note_entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'NoteEntry';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['note_entry_kids_list']))
    {
      $values = array();
      foreach ($this->object->getNoteEntryKidss() as $obj)
      {
        $values[] = $obj->getClientId();
      }

      $this->setDefault('note_entry_kids_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveNoteEntryKidsList($con);
  }

  public function saveNoteEntryKidsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['note_entry_kids_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(NoteEntryKidsPeer::NOTE_ENTRY_ID, $this->object->getPrimaryKey());
    NoteEntryKidsPeer::doDelete($c, $con);

    $values = $this->getValue('note_entry_kids_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new NoteEntryKids();
        $obj->setNoteEntryId($this->object->getPrimaryKey());
        $obj->setClientId($value);
        $obj->save();
      }
    }
  }

}
