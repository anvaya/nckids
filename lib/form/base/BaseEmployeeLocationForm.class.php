<?php

/**
 * EmployeeLocation form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseEmployeeLocationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'name'                             => new sfWidgetFormInput(),
      'employee_finger_to_location_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Employee')),
      'employee_to_location_list'        => new sfWidgetFormPropelChoiceMany(array('model' => 'Employee')),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'EmployeeLocation', 'column' => 'id', 'required' => false)),
      'name'                             => new sfValidatorString(array('max_length' => 255)),
      'employee_finger_to_location_list' => new sfValidatorPropelChoiceMany(array('model' => 'Employee', 'required' => false)),
      'employee_to_location_list'        => new sfValidatorPropelChoiceMany(array('model' => 'Employee', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('employee_location[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmployeeLocation';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['employee_finger_to_location_list']))
    {
      $values = array();
      foreach ($this->object->getEmployeeFingerToLocations() as $obj)
      {
        $values[] = $obj->getEmployeeId();
      }

      $this->setDefault('employee_finger_to_location_list', $values);
    }

    if (isset($this->widgetSchema['employee_to_location_list']))
    {
      $values = array();
      foreach ($this->object->getEmployeeToLocations() as $obj)
      {
        $values[] = $obj->getEmployeeId();
      }

      $this->setDefault('employee_to_location_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveEmployeeFingerToLocationList($con);
    $this->saveEmployeeToLocationList($con);
  }

  public function saveEmployeeFingerToLocationList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['employee_finger_to_location_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(EmployeeFingerToLocationPeer::LOCATION_ID, $this->object->getPrimaryKey());
    EmployeeFingerToLocationPeer::doDelete($c, $con);

    $values = $this->getValue('employee_finger_to_location_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new EmployeeFingerToLocation();
        $obj->setLocationId($this->object->getPrimaryKey());
        $obj->setEmployeeId($value);
        $obj->save();
      }
    }
  }

  public function saveEmployeeToLocationList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['employee_to_location_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(EmployeeToLocationPeer::LOCATION_ID, $this->object->getPrimaryKey());
    EmployeeToLocationPeer::doDelete($c, $con);

    $values = $this->getValue('employee_to_location_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new EmployeeToLocation();
        $obj->setLocationId($this->object->getPrimaryKey());
        $obj->setEmployeeId($value);
        $obj->save();
      }
    }
  }

}
