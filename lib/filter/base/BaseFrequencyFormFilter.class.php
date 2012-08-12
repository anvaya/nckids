<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Frequency filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseFrequencyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormFilterInput(),
      'weekly_hours' => new sfWidgetFormFilterInput(),
      'description'  => new sfWidgetFormFilterInput(),
      'sort_order'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(array('required' => false)),
      'weekly_hours' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'description'  => new sfValidatorPass(array('required' => false)),
      'sort_order'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('frequency_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Frequency';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'name'         => 'Text',
      'weekly_hours' => 'Number',
      'description'  => 'Text',
      'sort_order'   => 'Text',
    );
  }
}
