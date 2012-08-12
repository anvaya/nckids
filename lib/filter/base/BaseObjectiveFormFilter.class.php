<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Objective filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseObjectiveFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'short_name'         => new sfWidgetFormFilterInput(),
      'long_name'          => new sfWidgetFormFilterInput(),
      'area_of_concern_id' => new sfWidgetFormPropelChoice(array('model' => 'AreaOfConcern', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'short_name'         => new sfValidatorPass(array('required' => false)),
      'long_name'          => new sfValidatorPass(array('required' => false)),
      'area_of_concern_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AreaOfConcern', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('objective_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Objective';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'short_name'         => 'Text',
      'long_name'          => 'Text',
      'area_of_concern_id' => 'ForeignKey',
    );
  }
}
