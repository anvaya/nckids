<?php

/**
 * AreaOfConcern form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseAreaOfConcernForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'job_id' => new sfWidgetFormPropelChoice(array('model' => 'Job', 'add_empty' => true)),
      'name'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorPropelChoice(array('model' => 'AreaOfConcern', 'column' => 'id', 'required' => false)),
      'job_id' => new sfValidatorPropelChoice(array('model' => 'Job', 'column' => 'id', 'required' => false)),
      'name'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('area_of_concern[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AreaOfConcern';
  }


}
