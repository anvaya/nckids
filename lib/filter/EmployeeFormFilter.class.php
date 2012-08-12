<?php

/**
 * Employee filter form.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class EmployeeFormFilter extends BaseEmployeeFormFilter
{
  public function configure()
  {
    unset(
      #$this['first_name'],
      #$this['last_name'],
      $this['middle'],
      $this['address'],
      $this['address_2'],
      $this['city'],
      $this['state'],
      $this['zip'],
      $this['county'],
      $this['home_phone'],
      $this['cell_phone'],
      $this['company_email'],
      $this['personal_email'],
      $this['license_number'],
      $this['license_expiration'],
      $this['dob'],
      $this['doh'],
      $this['dof'],
      #$this['job_id']
      $this['ssn'],
      $this['health_insurance'],
      $this['retirement_plan'],
      $this['suplimental_health'],
      $this['supplemental_health_notes'],
      $this['health_type'],
      $this['tb_date'],
      $this['osha_date'],
      $this['cpr_date'],
      $this['finger_prints'],
      $this['finger_print_notes'],
      $this['clearance'],
      $this['notes'],
      $this['picture'],
      $this['tc_type'],
      $this['tc_number'],
      $this['npi'],
      $this['physical_date'],
      $this['clearance_notes'],
      $this['tc_effective'],
      $this['tc_exp'],
      $this['keys_returned'],
      $this['server_removed'],
      $this['dist_list_removed'],
      $this['email_removed'],
      $this['employee_to_location_list'],
      $this['employee_finger_to_location_list']
    );

    $this->widgetSchema['job_id'] = new sfWidgetFormPropelChoiceMany(array('model' => 'Job', 'add_empty' => true, 'order_by' => array('Name', 'asc')));

    $this->widgetSchema['job_id']->setLabel('Job Title');
    $this->widgetSchema['has_dist_list']->setLabel('On distribution list');

    $this->widgetSchema['first_name']->setOption('with_empty', false);
    $this->widgetSchema['last_name']->setOption('with_empty', false);

    $this->validatorSchema['job_id']      = new sfValidatorPass(array('required' => false));
    
  }
  
  protected function addJobIdColumnCriteria(Criteria $criteria, $field, $values) {

    if(!empty($values[0]))
      $criteria->add(EmployeePeer::JOB_ID, $values, Criteria::IN);

    return $criteria;
  }
}
