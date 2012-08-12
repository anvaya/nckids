<?php
class ReportVoucherForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'client_service_type' => new sfWidgetFormChoice(array('choices' => ClientServicePeer::getClassKeys())),
      'employee_id' => new sfWidgetFormInputHidden(),
      'date'      => new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}',
      'days' => nckTools::generateTwoCharsRange(1, 31),
      'months' => nckTools::generateTwoCharsRange(1, 12),
    ), array(
      'class'=>'date'
    ))
    ));
    
    $this->widgetSchema->setLabels(array(
      'client_service_type'        => 'Voucher Type',
      'employee_id'        => 'Employee',
      'date'        => 'Vouchers as of Date'
    ));

    $this->setValidators(array(
      'client_service_type'        => new sfValidatorPass(),
      'employee_id'        => new sfValidatorPass(),
      'date'        => new sfValidatorPass()
    ));

    $this->widgetSchema->setNameFormat('voucher[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
