<?php

/**
 * Client filter form.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class ClientFormFilter extends BaseClientFormFilter
{
  public function configure()
  {
    unset(
      $this['first_name'],
	    $this['last_name'],
      $this['parent2_first'],
      $this['parent2_last'],
	    $this['dob'],
	    $this['parent_first'],
	    $this['parent_last'],
	    $this['address'],
	    $this['address_2'],
	    $this['city'],
	    $this['state'],
	    $this['zip'],
	    $this['county_id'],
	    $this['district_id'],
	    $this['home_phone'],
	    $this['work_phone'],
	    $this['cell_phone'],
	    $this['blue_card'],
	    $this['immunizations'],
	    $this['waiting_list'],
      $this['is_iep'],
	    $this['physical_exp'],
	    $this['notes'],
	    $this['created_at'],
	    $this['updated_at'],
      $this['service_coordinator_id'],
      $this['note_entry_kids_list'],
      $this['pediatrician']
    );


   
      $this->widgetSchema['employee_id']      = new sfWidgetFormPropelChoiceMany(array('model' => 'Employee', 'add_empty' => true, 'order_by' => array('LastName', 'asc')));
      $this->widgetSchema['service_id']       = new sfWidgetFormPropelChoiceMany(array('model' => 'Service', 'add_empty' => true, 'order_by' => array('Name', 'asc')));
      #$this->widgetSchema['frequency_id']     = new sfWidgetFormPropelChoice(array('model' => 'Frequency', 'add_empty' => true));
      $this->widgetSchema['start_date']       = new sfWidgetFormFilterDate(array(
          'template' => 'between  - 
                        <a href="#" id="prefill_start_date_summer" title="Summer" onclick="javascript:prefillDate(\'client_filters_start_date_from\', \'7\', \'1\', \''.((date('m') < '7')?date('Y'):date('Y')).'\');prefillDate(\'client_filters_start_date_to\', \'7\', \'15\', \''.((date('m') < '7')?date('Y'):date('Y')).'\');return false;">(S)</a>&nbsp;
                        <a href="#" id="prefill_start_date_fall" title="Fall" onclick="javascript:prefillDate(\'client_filters_start_date_from\', \'9\', \'1\', \''.((date('m') < '9')?date('Y'):date('Y')).'\');prefillDate(\'client_filters_start_date_to\', \'9\', \'30\', \''.((date('m') < '9')?date('Y'):date('Y')).'\');return false;">(F)</a><br />%from_date%<br />and <br />%to_date%',
          'from_date' => new sfWidgetFormJQueryDate(array('image' => '/images/calendar.png', 'config' => '{}'),array('class'=>'filter_date')),
          'to_date' => new sfWidgetFormJQueryDate(array('image' => '/images/calendar.png', 'config' => '{}'),array('class'=>'filter_date')),
          'with_empty' => false
        ));
            
      
      $widget = new sfWidgetFormJQueryDate(array('image' => '/images/calendar.png', 'config' => '{}'),array('class'=>'filter_date'));
      
      //new sfWidgetFormJQueryDate(array('image' => '/images/calendar.png', 'config' => '{}'),array('class'=>'filter_date'))
      
      
      $this->widgetSchema['end_date']         = new sfWidgetFormFilterDate(array(
        'template' => 'between  -
                      <a href="#" id="prefill_end_date_summer" title="Summer" onclick="javascript:prefillDate(\'client_filters_end_date_from\', \'8\', \'1\', \''.((date('m') < '8')?date('Y'):date('Y')).'\');prefillDate(\'client_filters_end_date_to\', \'8\', \'30\', \''.((date('m') < '8')?date('Y'):date('Y')).'\');return false;">(S)</a>&nbsp;
                      <a href="#" id="prefill_end_date_fall" title="Fall" onclick="javascript:prefillDate(\'client_filters_end_date_from\', \'6\', \'1\', \''.((date('m') < '6')?date('Y')+1:date('Y')).'\');prefillDate(\'client_filters_end_date_to\', \'6\', \'30\', \''.((date('m') < '6')?date('Y')+1:date('Y')).'\');return false;">(F)</a><br />%from_date%<br />and <br />%to_date%',
        'from_date' => $widget,
        'to_date' => new sfWidgetFormJQueryDate(array('image' => '/images/calendar.png', 'config' => '{}'),array('class'=>'filter_date')),
        'with_empty' => false
        ));
      #$this->widgetSchema['change_date']      = new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormJQueryDate(array('config' => '{}')), 'to_date' => new sfWidgetFormJQueryDate(array('config' => '{}')), 'with_empty' => true));
      #$this->widgetSchema['icd9_id']          = new sfWidgetFormPropelChoice(array('model' => 'Icd9', 'add_empty' => true));
      #$this->widgetSchema['authorization']    = new sfWidgetFormFilterInput();
      #$this->widgetSchema['physicians_order'] = new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no')));
      $this->widgetSchema['office_id']        = new sfWidgetFormPropelChoiceMany(array('model' => 'Office', 'add_empty' => true));
      $this->widgetSchema['object_type']      = new sfWidgetFormChoice(array('choices' => ClientServicePeer::getClassKeys(), 'multiple' => true));


      $this->validatorSchema['employee_id']      = new sfValidatorPass(array('required' => false));
      $this->validatorSchema['service_id']       = new sfValidatorPass(array('required' => false));
      #$this->validatorSchema['frequency_id']     = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Frequency', 'column' => 'id'));
      $this->validatorSchema['start_date']       = new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false))));
      $this->validatorSchema['end_date']         = new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false))));
      #$this->validatorSchema['change_date']      = new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false))));
      #$this->validatorSchema['icd9_id']          = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Icd9', 'column' => 'id'));
      #$this->validatorSchema['authorization']    = new sfValidatorPass(array('required' => false));
      #$this->validatorSchema['physicians_order'] = new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0)));
      $this->validatorSchema['office_id']        = new sfValidatorPass(array('required' => false));
      $this->validatorSchema['object_type']      = new sfValidatorPass(array('required' => false));

    #$this->widgetSchema['district_id']->setOption('expanded', false);
    $this->widgetSchema['employee_id']->setLabel('Provider');
    $this->widgetSchema['start_date']->setLabel('Start Date Range:');
    $this->widgetSchema['end_date']->setLabel('End Date Range:');
    $this->widgetSchema['service_id']->setLabel('Service Type');
    $this->widgetSchema['office_id']->setLabel('Office');
    $this->widgetSchema['object_type']->setLabel('Client Service');

    if(!sfContext::getInstance()->getUser()->hasCredential('admin'))
      unset($this['end_date']);
    
  }


  public function getFields() {
    return array_merge(array(
        'employee_id'      => 'ForeignKey',
	      'service_id'       => 'ForeignKey',
	      'frequency_id'     => 'ForeignKey',
	      'start_date'       => 'Date',
	      'end_date'         => 'Date',
	      'change_date'      => 'Date',
	      'icd9_id'          => 'ForeignKey',
	      'authorization'    => 'Text',
	      'physicians_order' => 'Boolean',
	      'office_id'        => 'ForeignKey',
	      'object_type'      => 'ForeignKey',
      ), parent::getFields()
    );
  } //getFields

  protected function addServiceIdColumnCriteria(Criteria $criteria, $field, $values) {
  	
  	if(!empty($values[0]))
      $criteria->add(ClientServicePeer::SERVICE_ID,$values, Criteria::IN);
    
  	return $criteria;
  }
  protected function addFrequencyIdColumnCriteria(Criteria $criteria, $field, $values) {
  	return $criteria;
  }
  protected function addStartDateColumnCriteria(Criteria $criteria, $field, $values) {
  	
  	if(!empty($values)){
	    if(!empty($values['from']))
	      $crit1 = $criteria->getNewCriterion(ClientServicePeer::START_DATE, $values['from'], Criteria::GREATER_EQUAL);
	      
	    if(!empty($values['to']))
	      $crit2 = $criteria->getNewCriterion(ClientServicePeer::START_DATE, $values['to'], Criteria::LESS_EQUAL);
	      
	    if(isset($crit1) && isset($crit2))
	      $crit1->addAnd($crit2);
	    elseif(!isset($crit1) && isset($crit2))
	      $crit1 = $crit2;
	    else
	      return $criteria;
	    
	    $criteria->add($crit1);
  	}
    
    return $criteria;
  }
  protected function addEndDateColumnCriteria(Criteria $criteria, $field, $values) {
    
    if(!empty($values)){
      if(!empty($values['from']))
        $crit1 = $criteria->getNewCriterion(ClientServicePeer::END_DATE, $values['from'], Criteria::GREATER_EQUAL);
        
      if(!empty($values['to']))
        $crit2 = $criteria->getNewCriterion(ClientServicePeer::END_DATE, $values['to'], Criteria::LESS_EQUAL);
        
      if(isset($crit1) && isset($crit2))
        $crit1->addAnd($crit2);
      elseif(!isset($crit1) && isset($crit2))
        $crit1 = $crit2;
      else
        return $criteria;
      
      $criteria->add($crit1);
    }
    
    return $criteria;
  }
  protected function addChangeDateColumnCriteria(Criteria $criteria, $field, $values) {
  	return $criteria;
  }
  protected function addIcd9IdColumnCriteria(Criteria $criteria, $field, $values) {
  	return $criteria;
  }
  protected function addAuthorizationColumnCriteria(Criteria $criteria, $field, $values) {
  	return $criteria;
  }
  protected function addOfficeIdColumnCriteria(Criteria $criteria, $field, $values) {

  	if(!empty($values[0]))
      $criteria->add(ClientServicePeer::OFFICE_ID, $values, Criteria::IN);
    
  	return $criteria;
  }
  protected function addObjectTypeColumnCriteria(Criteria $criteria, $field, $values) {
  	
  	if(!empty($values[0]))
  	 $criteria->add(ClientServicePeer::OBJECT_TYPE, $values, Criteria::IN);
  	 
  	return $criteria;
  }
  protected function addEmployeeIdColumnCriteria(Criteria $criteria, $field, $values) {

  	if(!empty($values[0]))
      $criteria->add(ClientServicePeer::EMPLOYEE_ID, $values, Criteria::IN);

    return $criteria;
  }
  public function buildCriteria(array $values, $skip = false){
  	$c = parent::buildCriteria($values);
  	if(!$skip){
	  	$c->addJoin(ClientPeer::ID, ClientServicePeer::CLIENT_ID, Criteria::LEFT_JOIN );
	  	$c->setDistinct();
    }
  	return $c;
  }
  
  
}
