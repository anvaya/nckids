<?php
class ReportWorkloadForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'employee_id' => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => false, 'order_by' => array('LastName', 'asc'))),
    ));
    
    $this->widgetSchema->setLabels(array(
      'employee_id'        => 'Select an Employee'
    ));

    $this->setValidators(array(
      'employee_id'        => new sfValidatorPass()
    ));

    $this->widgetSchema->setNameFormat('workload[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
