<?php

/**
 * Objective form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseObjectiveForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'short_name'         => new sfWidgetFormInput(),
      'long_name'          => new sfWidgetFormTextarea(),
      'area_of_concern_id' => new sfWidgetFormPropelChoice(array('model' => 'AreaOfConcern', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Objective', 'column' => 'id', 'required' => false)),
      'short_name'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'long_name'          => new sfValidatorString(array('required' => false)),
      'area_of_concern_id' => new sfValidatorPropelChoice(array('model' => 'AreaOfConcern', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('objective[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Objective';
  }


}
