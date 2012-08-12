<?php

/**
 * Client form.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ClientForm extends BaseClientForm
{
	
  public function configure()
  {  	
	  $years = range(1990, date('Y')); //Creates array of years between 1920-2000
	  $years_list = array_combine($years, $years); //Creates new array where key and value are both values from $years list
	 
	  sfProjectConfiguration::getActive()->loadHelpers('Global');
  
  	unset($this['created_at'], $this['updated_at'], $this['waiting_list'], $this['note_entry_kids_list']);
  	
    $this->widgetSchema->moveField('district_id', sfWidgetFormSchema::BEFORE, 'dob');
  	$this->widgetSchema['dob'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{changeYear:true, yearRange: \''.min($years).':'.max($years).'\'}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['physical_exp'] = new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));

    $this->widgetSchema['service_coordinator_id']->setOption('order_by', array('Name', 'asc'));

  	$this->widgetSchema->setLabels(array(
		  'first_name'    => 'First Name',
  	  'last_name'    => 'Last Name',
  	  'district_id'    => 'District',
  	  'dob'    => 'DOB',
      'zip' => 'ZIP',
  	  'county_id'    => 'County',
  	  'physical_exp'    => 'Physical Expiration',
  	  'is_iep'    => 'IEP Child',
      'service_coordinator_id' => 'Service Coordinator',
      'external_service' => 'External Service'
		));

    $this->widgetSchema->setHelp('external_service', 'client has a service provided by another agency');

    #$this->widgetSchema->setHelp('parent_first', 'This is the name that will show on address labels and in most reports');
        
  }
}
