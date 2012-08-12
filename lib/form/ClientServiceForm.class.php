<?php

/**
 * ClientService form.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ClientServiceForm extends BaseClientServiceForm
{
	static protected $object_types = array('classroom'=>'classroom', 'seit'=>'seit', 'ei'=>'ei', 'preschool'=>'preschool');
  public function configure()
  {
  	$this->widgetSchema['employee_id']->setOption('order_by', array('LastName', 'asc'));
  	$this->widgetSchema['object_type'] = new sfWidgetFormSelect(array('choices' => self::$object_types));
    $this->widgetSchema['client_id'] = new sfWidgetFormInputHidden();

		$this->widgetSchema['start_date'] = new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    
    $this->widgetSchema['end_date'] = new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    
    $this->widgetSchema['change_date'] = new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));

    $c = new Criteria();
    $c->addAscendingOrderByColumn(FrequencyPeer::SORT_ORDER);
    $c->addAscendingOrderByColumn(FrequencyPeer::NAME);
    $this->widgetSchema['frequency_id']->setOption('criteria', $c);
    
    $this->validatorSchema['start_date'] = new sfValidatorDateTime(array('required' => true));
    $this->validatorSchema['service_id']->setOption('required', true);
    $this->validatorSchema['client_id']->setOption('required', true);
    $this->validatorSchema['employee_id']->setOption('required', true);

  	$this->widgetSchema->setLabels(array(
		  'object_type'    => 'Program Type',
  	  'client_id'    => 'Client',
  	  'employee_id'    => 'Provider <em>*</em>',
  	  'service_id'    => 'Service <em>*</em>',
      'start_date' => 'Start date <em>*</em>',
  	  'frequency_id'    => 'Frequency',
  	  'office_id'    => 'Office',
  	  'icd9_id'    => 'ICD9',
      'waiting_list' => 'Waiting List'
		));
    
    $this->widgetSchema->setPositions(array(
    'employee_id',
    'service_id',
    'office_id',
    'icd9_id',
    'authorization',
    'frequency_id',
    'start_date',
    'end_date',
    'change_date',
    'physicians_order',
    'notes',
    'client_id',
    'waiting_list',
    'object_type',
    'id'
    ));

    $this->widgetSchema->setHelps(array(
      'start_date' => '<div class="dates"><span>Pre-defined dates: </span> <a href="#" title="Summer" onclick="javascript:prefillDate(\'client_service_start_date\', 07, 05, '.((date('m') < '07')?date('Y'):date('Y')+1).');prefillDate(\'client_service_end_date\', 08, 13, '.((date('m') < '07')?date('Y'):date('Y')+1).');return false;">(S)</a> <a href="#" title="Summer" onclick="javascript:prefillDate(\'client_service_start_date\', 09, 07, '.(date('Y')).');prefillDate(\'client_service_end_date\', 06, 24, '.(date('Y')+1).');return false;">(F)</a></div>'
    ));

		$this->widgetSchema->setFormFormatterName('list');
  }
}
