<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Prompt filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BasePromptFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormFilterInput(),
      'objective_id' => new sfWidgetFormPropelChoice(array('model' => 'Objective', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(array('required' => false)),
      'objective_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Objective', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('prompt_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Prompt';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'name'         => 'Text',
      'objective_id' => 'ForeignKey',
    );
  }
}
