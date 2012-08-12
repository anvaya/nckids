<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * AreaOfConcern filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseAreaOfConcernFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'job_id' => new sfWidgetFormPropelChoice(array('model' => 'Job', 'add_empty' => true)),
      'name'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'job_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Job', 'column' => 'id')),
      'name'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('area_of_concern_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AreaOfConcern';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'job_id' => 'ForeignKey',
      'name'   => 'Text',
    );
  }
}
