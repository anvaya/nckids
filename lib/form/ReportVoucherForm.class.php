<?php
class ReportVoucherForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'client_service_type' => new sfWidgetFormChoice(array('choices' => ClientServicePeer::getClassKeys())),
      'employee_id'      => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'client_id' => new sfWidgetFormInputHidden(),
      'client_name' => new sfWidgetFormInput(),
        
      'date'      => new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}',
      /*'days' => nckTools::generateTwoCharsRange(1, 31),
      'months' => nckTools::generateTwoCharsRange(1, 12),*/
    ), array(
      'class'=>'date'
    ))
    ));
    
    $this->widgetSchema->setLabels(array(
      'client_service_type'        => 'Voucher Type',
      'employee_id'        => 'Therapist',
      'date'        => 'Vouchers as of Date',
      'client_name'  => 'For Client',
      ''  
    ));

    $this->setValidators(array(
      'client_service_type'        => new sfValidatorPass(),      
      'client_id'         => new sfValidatorPass(),  
      'client_name'         => new sfValidatorPass(),    
      'date'        => new sfValidatorPass(),
      'employee_id'      => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema['employee_id']->setOption('order_by', array('LastName', 'asc'));
    $this->widgetSchema->setNameFormat('voucher[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
