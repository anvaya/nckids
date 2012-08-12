<?php

/**
 * Physical form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BasePhysicalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'employee_id' => new sfWidgetFormInputHidden(),
      'date_given'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'employee_id' => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'date_given'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('physical[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Physical';
  }


}
