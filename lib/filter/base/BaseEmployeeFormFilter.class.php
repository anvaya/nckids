<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Employee filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseEmployeeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'                       => new sfWidgetFormFilterInput(),
      'last_name'                        => new sfWidgetFormFilterInput(),
      'middle'                           => new sfWidgetFormFilterInput(),
      'address'                          => new sfWidgetFormFilterInput(),
      'address_2'                        => new sfWidgetFormFilterInput(),
      'city'                             => new sfWidgetFormFilterInput(),
      'state'                            => new sfWidgetFormFilterInput(),
      'zip'                              => new sfWidgetFormFilterInput(),
      'county'                           => new sfWidgetFormFilterInput(),
      'home_phone'                       => new sfWidgetFormFilterInput(),
      'cell_phone'                       => new sfWidgetFormFilterInput(),
      'company_email'                    => new sfWidgetFormFilterInput(),
      'personal_email'                   => new sfWidgetFormFilterInput(),
      'license_number'                   => new sfWidgetFormFilterInput(),
      'license_expiration'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'dob'                              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'doh'                              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'dof'                              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'job_id'                           => new sfWidgetFormPropelChoice(array('model' => 'Job', 'add_empty' => true)),
      'ssn'                              => new sfWidgetFormFilterInput(),
      'health_insurance'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'retirement_plan'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'suplimental_health'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'supplemental_health_notes'        => new sfWidgetFormFilterInput(),
      'health_type'                      => new sfWidgetFormFilterInput(),
      'physical_date'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'physical_notes'                   => new sfWidgetFormFilterInput(),
      'tb_date'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'tb_notes'                         => new sfWidgetFormFilterInput(),
      'osha_date'                        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'cpr_date'                         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'finger_prints'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'finger_print_notes'               => new sfWidgetFormFilterInput(),
      'clearance'                        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'clearance_notes'                  => new sfWidgetFormFilterInput(),
      'picture'                          => new sfWidgetFormFilterInput(),
      'notes'                            => new sfWidgetFormFilterInput(),
      'npi'                              => new sfWidgetFormFilterInput(),
      'tc_type'                          => new sfWidgetFormFilterInput(),
      'tc_effective'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'tc_number'                        => new sfWidgetFormFilterInput(),
      'tc_exp'                           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'has_keys'                         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'keys_returned'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'has_email'                        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'email_removed'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'has_dist_list'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'dist_list_removed'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'has_server_access'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'server_removed'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'is_team_member'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'employee_finger_to_location_list' => new sfWidgetFormPropelChoice(array('model' => 'EmployeeLocation', 'add_empty' => true)),
      'employee_to_location_list'        => new sfWidgetFormPropelChoice(array('model' => 'EmployeeLocation', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'first_name'                       => new sfValidatorPass(array('required' => false)),
      'last_name'                        => new sfValidatorPass(array('required' => false)),
      'middle'                           => new sfValidatorPass(array('required' => false)),
      'address'                          => new sfValidatorPass(array('required' => false)),
      'address_2'                        => new sfValidatorPass(array('required' => false)),
      'city'                             => new sfValidatorPass(array('required' => false)),
      'state'                            => new sfValidatorPass(array('required' => false)),
      'zip'                              => new sfValidatorPass(array('required' => false)),
      'county'                           => new sfValidatorPass(array('required' => false)),
      'home_phone'                       => new sfValidatorPass(array('required' => false)),
      'cell_phone'                       => new sfValidatorPass(array('required' => false)),
      'company_email'                    => new sfValidatorPass(array('required' => false)),
      'personal_email'                   => new sfValidatorPass(array('required' => false)),
      'license_number'                   => new sfValidatorPass(array('required' => false)),
      'license_expiration'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dob'                              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'doh'                              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'dof'                              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'job_id'                           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Job', 'column' => 'id')),
      'ssn'                              => new sfValidatorPass(array('required' => false)),
      'health_insurance'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'retirement_plan'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'suplimental_health'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'supplemental_health_notes'        => new sfValidatorPass(array('required' => false)),
      'health_type'                      => new sfValidatorPass(array('required' => false)),
      'physical_date'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'physical_notes'                   => new sfValidatorPass(array('required' => false)),
      'tb_date'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tb_notes'                         => new sfValidatorPass(array('required' => false)),
      'osha_date'                        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'cpr_date'                         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'finger_prints'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'finger_print_notes'               => new sfValidatorPass(array('required' => false)),
      'clearance'                        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'clearance_notes'                  => new sfValidatorPass(array('required' => false)),
      'picture'                          => new sfValidatorPass(array('required' => false)),
      'notes'                            => new sfValidatorPass(array('required' => false)),
      'npi'                              => new sfValidatorPass(array('required' => false)),
      'tc_type'                          => new sfValidatorPass(array('required' => false)),
      'tc_effective'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tc_number'                        => new sfValidatorPass(array('required' => false)),
      'tc_exp'                           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'has_keys'                         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'keys_returned'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'has_email'                        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'email_removed'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'has_dist_list'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'dist_list_removed'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'has_server_access'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'server_removed'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'is_team_member'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'employee_finger_to_location_list' => new sfValidatorPropelChoice(array('model' => 'EmployeeLocation', 'required' => false)),
      'employee_to_location_list'        => new sfValidatorPropelChoice(array('model' => 'EmployeeLocation', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('employee_filters[%s]');

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

    $criteria->addJoin(EmployeeFingerToLocationPeer::EMPLOYEE_ID, EmployeePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EmployeeFingerToLocationPeer::LOCATION_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EmployeeFingerToLocationPeer::LOCATION_ID, $value));
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

    $criteria->addJoin(EmployeeToLocationPeer::EMPLOYEE_ID, EmployeePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EmployeeToLocationPeer::LOCATION_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EmployeeToLocationPeer::LOCATION_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Employee';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'first_name'                       => 'Text',
      'last_name'                        => 'Text',
      'middle'                           => 'Text',
      'address'                          => 'Text',
      'address_2'                        => 'Text',
      'city'                             => 'Text',
      'state'                            => 'Text',
      'zip'                              => 'Text',
      'county'                           => 'Text',
      'home_phone'                       => 'Text',
      'cell_phone'                       => 'Text',
      'company_email'                    => 'Text',
      'personal_email'                   => 'Text',
      'license_number'                   => 'Text',
      'license_expiration'               => 'Date',
      'dob'                              => 'Date',
      'doh'                              => 'Date',
      'dof'                              => 'Date',
      'job_id'                           => 'ForeignKey',
      'ssn'                              => 'Text',
      'health_insurance'                 => 'Boolean',
      'retirement_plan'                  => 'Boolean',
      'suplimental_health'               => 'Boolean',
      'supplemental_health_notes'        => 'Text',
      'health_type'                      => 'Text',
      'physical_date'                    => 'Date',
      'physical_notes'                   => 'Text',
      'tb_date'                          => 'Date',
      'tb_notes'                         => 'Text',
      'osha_date'                        => 'Date',
      'cpr_date'                         => 'Date',
      'finger_prints'                    => 'Boolean',
      'finger_print_notes'               => 'Text',
      'clearance'                        => 'Boolean',
      'clearance_notes'                  => 'Text',
      'picture'                          => 'Text',
      'notes'                            => 'Text',
      'npi'                              => 'Text',
      'tc_type'                          => 'Text',
      'tc_effective'                     => 'Date',
      'tc_number'                        => 'Text',
      'tc_exp'                           => 'Date',
      'has_keys'                         => 'Boolean',
      'keys_returned'                    => 'Date',
      'has_email'                        => 'Boolean',
      'email_removed'                    => 'Date',
      'has_dist_list'                    => 'Boolean',
      'dist_list_removed'                => 'Date',
      'has_server_access'                => 'Boolean',
      'server_removed'                   => 'Date',
      'is_team_member'                   => 'Boolean',
      'employee_finger_to_location_list' => 'ManyKey',
      'employee_to_location_list'        => 'ManyKey',
    );
  }
}
