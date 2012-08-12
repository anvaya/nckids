<?php
class ReportDailyLogForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'date_month'      =>  new sfWidgetFormSelect(array('choices' => array_combine(range(1, 12), range(1, 12)))),
      'date_year'       =>  new sfWidgetFormSelect(array('choices' => array_combine(range(date('Y')-1, date('Y')+2), range(date('Y')-1, date('Y')+2)))),
      'employee_id'     =>  new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => 'All', 'order_by' => array('LastName', 'asc'))),
      'service_type'      =>  new sfWidgetFormSelect(array('choices' => ClientServicePeer::getClassKeys(false)))
    ));
    
    $this->widgetSchema->setLabels(array(
      'service_type'      => 'Service Type',
      'date_month'        => 'Month',
      'date_year'         => 'Year',
      'employee_id'       => 'Employee'
    ));

    $this->setValidators(array(
      'service_type'       => new sfValidatorPass(),
      'date_month'        => new sfValidatorPass(),
      'date_year'         => new sfValidatorPass(),
      'employee_id'       => new sfValidatorPropelChoice(array('model' => 'Employee', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dailylog[%s]');
    $this->widgetSchema->setFormFormatterName('list');

    $this->setDefault('date_year', date('Y'));
    $this->setDefault('date_month', date('n'));
  }

}
