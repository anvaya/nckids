<?php

/**
 * EmployeeFingerToLocation form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseEmployeeFingerToLocationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'employee_id' => new sfWidgetFormInputHidden(),
      'location_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'employee_id' => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'location_id' => new sfValidatorPropelChoice(array('model' => 'EmployeeLocation', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('employee_finger_to_location[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmployeeFingerToLocation';
  }


}
