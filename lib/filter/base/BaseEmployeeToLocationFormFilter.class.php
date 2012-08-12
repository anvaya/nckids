<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmployeeToLocation filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseEmployeeToLocationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('employee_to_location_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmployeeToLocation';
  }

  public function getFields()
  {
    return array(
      'employee_id' => 'ForeignKey',
      'location_id' => 'ForeignKey',
    );
  }
}
