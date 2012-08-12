<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Setting filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseSettingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      's_key'   => new sfWidgetFormFilterInput(),
      's_value' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      's_key'   => new sfValidatorPass(array('required' => false)),
      's_value' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('setting_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Setting';
  }

  public function getFields()
  {
    return array(
      's_key'   => 'Text',
      's_value' => 'Text',
      'id'      => 'Number',
    );
  }
}
