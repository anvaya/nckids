<?php

/**
 * Setting form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseSettingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      's_key'   => new sfWidgetFormInput(),
      's_value' => new sfWidgetFormInput(),
      'id'      => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      's_key'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      's_value' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id'      => new sfValidatorPropelChoice(array('model' => 'Setting', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Setting', 'column' => array('s_key')))
    );

    $this->widgetSchema->setNameFormat('setting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Setting';
  }


}
