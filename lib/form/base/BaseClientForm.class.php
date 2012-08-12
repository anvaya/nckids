<?php

/**
 * Client form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseClientForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'first_name'             => new sfWidgetFormInput(),
      'last_name'              => new sfWidgetFormInput(),
      'dob'                    => new sfWidgetFormDateTime(),
      'parent_first'           => new sfWidgetFormInput(),
      'parent_last'            => new sfWidgetFormInput(),
      'parent2_first'          => new sfWidgetFormInput(),
      'parent2_last'           => new sfWidgetFormInput(),
      'address'                => new sfWidgetFormInput(),
      'address_2'              => new sfWidgetFormInput(),
      'city'                   => new sfWidgetFormInput(),
      'state'                  => new sfWidgetFormInput(),
      'zip'                    => new sfWidgetFormInput(),
      'county_id'              => new sfWidgetFormPropelChoice(array('model' => 'County', 'add_empty' => true)),
      'district_id'            => new sfWidgetFormPropelChoice(array('model' => 'District', 'add_empty' => true)),
      'home_phone'             => new sfWidgetFormInput(),
      'work_phone'             => new sfWidgetFormInput(),
      'cell_phone'             => new sfWidgetFormInput(),
      'blue_card'              => new sfWidgetFormInputCheckbox(),
      'immunizations'          => new sfWidgetFormInputCheckbox(),
      'waiting_list'           => new sfWidgetFormDateTime(),
      'is_iep'                 => new sfWidgetFormInputCheckbox(),
      'physical_exp'           => new sfWidgetFormDateTime(),
      'pediatrician'           => new sfWidgetFormInput(),
      'notes'                  => new sfWidgetFormTextarea(),
      'service_coordinator_id' => new sfWidgetFormPropelChoice(array('model' => 'ServiceCoordinator', 'add_empty' => true)),
      'external_service'       => new sfWidgetFormInputCheckbox(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'note_entry_kids_list'   => new sfWidgetFormPropelChoiceMany(array('model' => 'NoteEntry')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Client', 'column' => 'id', 'required' => false)),
      'first_name'             => new sfValidatorString(array('max_length' => 255)),
      'last_name'              => new sfValidatorString(array('max_length' => 255)),
      'dob'                    => new sfValidatorDateTime(array('required' => false)),
      'parent_first'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'parent_last'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'parent2_first'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'parent2_last'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address_2'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'state'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'zip'                    => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'county_id'              => new sfValidatorPropelChoice(array('model' => 'County', 'column' => 'id', 'required' => false)),
      'district_id'            => new sfValidatorPropelChoice(array('model' => 'District', 'column' => 'id', 'required' => false)),
      'home_phone'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'work_phone'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cell_phone'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'blue_card'              => new sfValidatorBoolean(array('required' => false)),
      'immunizations'          => new sfValidatorBoolean(array('required' => false)),
      'waiting_list'           => new sfValidatorDateTime(array('required' => false)),
      'is_iep'                 => new sfValidatorBoolean(array('required' => false)),
      'physical_exp'           => new sfValidatorDateTime(array('required' => false)),
      'pediatrician'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'notes'                  => new sfValidatorString(array('required' => false)),
      'service_coordinator_id' => new sfValidatorPropelChoice(array('model' => 'ServiceCoordinator', 'column' => 'id', 'required' => false)),
      'external_service'       => new sfValidatorBoolean(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
      'note_entry_kids_list'   => new sfValidatorPropelChoiceMany(array('model' => 'NoteEntry', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Client';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['note_entry_kids_list']))
    {
      $values = array();
      foreach ($this->object->getNoteEntryKidss() as $obj)
      {
        $values[] = $obj->getNoteEntryId();
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
    $c->add(NoteEntryKidsPeer::CLIENT_ID, $this->object->getPrimaryKey());
    NoteEntryKidsPeer::doDelete($c, $con);

    $values = $this->getValue('note_entry_kids_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new NoteEntryKids();
        $obj->setClientId($this->object->getPrimaryKey());
        $obj->setNoteEntryId($value);
        $obj->save();
      }
    }
  }

}
