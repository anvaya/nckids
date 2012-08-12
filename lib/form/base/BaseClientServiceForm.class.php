<?php

/**
 * ClientService form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseClientServiceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'client_id'        => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'employee_id'      => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'service_id'       => new sfWidgetFormPropelChoice(array('model' => 'Service', 'add_empty' => true)),
      'frequency_id'     => new sfWidgetFormPropelChoice(array('model' => 'Frequency', 'add_empty' => true)),
      'start_date'       => new sfWidgetFormDateTime(),
      'end_date'         => new sfWidgetFormDateTime(),
      'change_date'      => new sfWidgetFormDateTime(),
      'notes'            => new sfWidgetFormTextarea(),
      'icd9_id'          => new sfWidgetFormPropelChoice(array('model' => 'Icd9', 'add_empty' => true)),
      'authorization'    => new sfWidgetFormInput(),
      'physicians_order' => new sfWidgetFormInputCheckbox(),
      'office_id'        => new sfWidgetFormPropelChoice(array('model' => 'Office', 'add_empty' => true)),
      'waiting_list'     => new sfWidgetFormInputCheckbox(),
      'object_type'      => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'ClientService', 'column' => 'id', 'required' => false)),
      'client_id'        => new sfValidatorPropelChoice(array('model' => 'Client', 'column' => 'id', 'required' => false)),
      'employee_id'      => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'service_id'       => new sfValidatorPropelChoice(array('model' => 'Service', 'column' => 'id', 'required' => false)),
      'frequency_id'     => new sfValidatorPropelChoice(array('model' => 'Frequency', 'column' => 'id', 'required' => false)),
      'start_date'       => new sfValidatorDateTime(array('required' => false)),
      'end_date'         => new sfValidatorDateTime(array('required' => false)),
      'change_date'      => new sfValidatorDateTime(array('required' => false)),
      'notes'            => new sfValidatorString(array('required' => false)),
      'icd9_id'          => new sfValidatorPropelChoice(array('model' => 'Icd9', 'column' => 'id', 'required' => false)),
      'authorization'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'physicians_order' => new sfValidatorBoolean(array('required' => false)),
      'office_id'        => new sfValidatorPropelChoice(array('model' => 'Office', 'column' => 'id', 'required' => false)),
      'waiting_list'     => new sfValidatorBoolean(array('required' => false)),
      'object_type'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client_service[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientService';
  }


}
