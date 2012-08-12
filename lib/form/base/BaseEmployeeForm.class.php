<?php

/**
 * Employee form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseEmployeeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'first_name'                       => new sfWidgetFormInput(),
      'last_name'                        => new sfWidgetFormInput(),
      'middle'                           => new sfWidgetFormInput(),
      'address'                          => new sfWidgetFormInput(),
      'address_2'                        => new sfWidgetFormInput(),
      'city'                             => new sfWidgetFormInput(),
      'state'                            => new sfWidgetFormInput(),
      'zip'                              => new sfWidgetFormInput(),
      'county'                           => new sfWidgetFormInput(),
      'home_phone'                       => new sfWidgetFormInput(),
      'cell_phone'                       => new sfWidgetFormInput(),
      'company_email'                    => new sfWidgetFormInput(),
      'personal_email'                   => new sfWidgetFormInput(),
      'license_number'                   => new sfWidgetFormInput(),
      'license_expiration'               => new sfWidgetFormDateTime(),
      'dob'                              => new sfWidgetFormDateTime(),
      'doh'                              => new sfWidgetFormDateTime(),
      'dof'                              => new sfWidgetFormDateTime(),
      'job_id'                           => new sfWidgetFormPropelChoice(array('model' => 'Job', 'add_empty' => true)),
      'ssn'                              => new sfWidgetFormInput(),
      'health_insurance'                 => new sfWidgetFormInputCheckbox(),
      'retirement_plan'                  => new sfWidgetFormInputCheckbox(),
      'suplimental_health'               => new sfWidgetFormInputCheckbox(),
      'supplemental_health_notes'        => new sfWidgetFormInput(),
      'health_type'                      => new sfWidgetFormInput(),
      'physical_date'                    => new sfWidgetFormDateTime(),
      'physical_notes'                   => new sfWidgetFormInput(),
      'tb_date'                          => new sfWidgetFormDateTime(),
      'tb_notes'                         => new sfWidgetFormInput(),
      'osha_date'                        => new sfWidgetFormDateTime(),
      'cpr_date'                         => new sfWidgetFormDateTime(),
      'finger_prints'                    => new sfWidgetFormInputCheckbox(),
      'finger_print_notes'               => new sfWidgetFormInput(),
      'clearance'                        => new sfWidgetFormInputCheckbox(),
      'clearance_notes'                  => new sfWidgetFormInput(),
      'picture'                          => new sfWidgetFormInput(),
      'notes'                            => new sfWidgetFormTextarea(),
      'npi'                              => new sfWidgetFormInput(),
      'tc_type'                          => new sfWidgetFormInput(),
      'tc_effective'                     => new sfWidgetFormDateTime(),
      'tc_number'                        => new sfWidgetFormInput(),
      'tc_exp'                           => new sfWidgetFormDateTime(),
      'has_keys'                         => new sfWidgetFormInputCheckbox(),
      'keys_returned'                    => new sfWidgetFormDateTime(),
      'has_email'                        => new sfWidgetFormInputCheckbox(),
      'email_removed'                    => new sfWidgetFormDateTime(),
      'has_dist_list'                    => new sfWidgetFormInputCheckbox(),
      'dist_list_removed'                => new sfWidgetFormDateTime(),
      'has_server_access'                => new sfWidgetFormInputCheckbox(),
      'server_removed'                   => new sfWidgetFormDateTime(),
      'is_team_member'                   => new sfWidgetFormInputCheckbox(),
      'employee_finger_to_location_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'EmployeeLocation')),
      'employee_to_location_list'        => new sfWidgetFormPropelChoiceMany(array('model' => 'EmployeeLocation')),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
      'first_name'                       => new sfValidatorString(array('max_length' => 255)),
      'last_name'                        => new sfValidatorString(array('max_length' => 255)),
      'middle'                           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address_2'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'                             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'state'                            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'zip'                              => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'county'                           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'home_phone'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cell_phone'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'company_email'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'personal_email'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'license_number'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'license_expiration'               => new sfValidatorDateTime(array('required' => false)),
      'dob'                              => new sfValidatorDateTime(array('required' => false)),
      'doh'                              => new sfValidatorDateTime(array('required' => false)),
      'dof'                              => new sfValidatorDateTime(array('required' => false)),
      'job_id'                           => new sfValidatorPropelChoice(array('model' => 'Job', 'column' => 'id', 'required' => false)),
      'ssn'                              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'health_insurance'                 => new sfValidatorBoolean(array('required' => false)),
      'retirement_plan'                  => new sfValidatorBoolean(array('required' => false)),
      'suplimental_health'               => new sfValidatorBoolean(array('required' => false)),
      'supplemental_health_notes'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'health_type'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'physical_date'                    => new sfValidatorDateTime(array('required' => false)),
      'physical_notes'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tb_date'                          => new sfValidatorDateTime(array('required' => false)),
      'tb_notes'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'osha_date'                        => new sfValidatorDateTime(array('required' => false)),
      'cpr_date'                         => new sfValidatorDateTime(array('required' => false)),
      'finger_prints'                    => new sfValidatorBoolean(array('required' => false)),
      'finger_print_notes'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'clearance'                        => new sfValidatorBoolean(array('required' => false)),
      'clearance_notes'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'picture'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'notes'                            => new sfValidatorString(array('required' => false)),
      'npi'                              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tc_type'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tc_effective'                     => new sfValidatorDateTime(array('required' => false)),
      'tc_number'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tc_exp'                           => new sfValidatorDateTime(array('required' => false)),
      'has_keys'                         => new sfValidatorBoolean(array('required' => false)),
      'keys_returned'                    => new sfValidatorDateTime(array('required' => false)),
      'has_email'                        => new sfValidatorBoolean(array('required' => false)),
      'email_removed'                    => new sfValidatorDateTime(array('required' => false)),
      'has_dist_list'                    => new sfValidatorBoolean(array('required' => false)),
      'dist_list_removed'                => new sfValidatorDateTime(array('required' => false)),
      'has_server_access'                => new sfValidatorBoolean(array('required' => false)),
      'server_removed'                   => new sfValidatorDateTime(array('required' => false)),
      'is_team_member'                   => new sfValidatorBoolean(array('required' => false)),
      'employee_finger_to_location_list' => new sfValidatorPropelChoiceMany(array('model' => 'EmployeeLocation', 'required' => false)),
      'employee_to_location_list'        => new sfValidatorPropelChoiceMany(array('model' => 'EmployeeLocation', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('employee[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Employee';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['employee_finger_to_location_list']))
    {
      $values = array();
      foreach ($this->object->getEmployeeFingerToLocations() as $obj)
      {
        $values[] = $obj->getLocationId();
      }

      $this->setDefault('employee_finger_to_location_list', $values);
    }

    if (isset($this->widgetSchema['employee_to_location_list']))
    {
      $values = array();
      foreach ($this->object->getEmployeeToLocations() as $obj)
      {
        $values[] = $obj->getLocationId();
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
    $c->add(EmployeeFingerToLocationPeer::EMPLOYEE_ID, $this->object->getPrimaryKey());
    EmployeeFingerToLocationPeer::doDelete($c, $con);

    $values = $this->getValue('employee_finger_to_location_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new EmployeeFingerToLocation();
        $obj->setEmployeeId($this->object->getPrimaryKey());
        $obj->setLocationId($value);
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
    $c->add(EmployeeToLocationPeer::EMPLOYEE_ID, $this->object->getPrimaryKey());
    EmployeeToLocationPeer::doDelete($c, $con);

    $values = $this->getValue('employee_to_location_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new EmployeeToLocation();
        $obj->setEmployeeId($this->object->getPrimaryKey());
        $obj->setLocationId($value);
        $obj->save();
      }
    }
  }

}
