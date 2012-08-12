<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmployeeLocation filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseEmployeeLocationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                             => new sfWidgetFormFilterInput(),
      'employee_finger_to_location_list' => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'employee_to_location_list'        => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                             => new sfValidatorPass(array('required' => false)),
      'employee_finger_to_location_list' => new sfValidatorPropelChoice(array('model' => 'Employee', 'required' => false)),
      'employee_to_location_list'        => new sfValidatorPropelChoice(array('model' => 'Employee', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('employee_location_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addEmployeeFingerToLocationListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(EmployeeFingerToLocationPeer::LOCATION_ID, EmployeeLocationPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EmployeeFingerToLocationPeer::EMPLOYEE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EmployeeFingerToLocationPeer::EMPLOYEE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addEmployeeToLocationListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(EmployeeToLocationPeer::LOCATION_ID, EmployeeLocationPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EmployeeToLocationPeer::EMPLOYEE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EmployeeToLocationPeer::EMPLOYEE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'EmployeeLocation';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'name'                             => 'Text',
      'employee_finger_to_location_list' => 'ManyKey',
      'employee_to_location_list'        => 'ManyKey',
    );
  }
}
