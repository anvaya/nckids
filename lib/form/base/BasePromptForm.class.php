<?php

/**
 * Prompt form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BasePromptForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInput(),
      'objective_id' => new sfWidgetFormPropelChoice(array('model' => 'Objective', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Prompt', 'column' => 'id', 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'objective_id' => new sfValidatorPropelChoice(array('model' => 'Objective', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('prompt[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Prompt';
  }


}
