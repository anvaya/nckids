<?php

/**
 * Frequency form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseFrequencyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInput(),
      'weekly_hours' => new sfWidgetFormInput(),
      'description'  => new sfWidgetFormInput(),
      'sort_order'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Frequency', 'column' => 'id', 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'weekly_hours' => new sfValidatorNumber(array('required' => false)),
      'description'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sort_order'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('frequency[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Frequency';
  }


}
