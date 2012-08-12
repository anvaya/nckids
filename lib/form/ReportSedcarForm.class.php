<?php
class ReportSedcarForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'date'      => new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ))
    ));
    
    $this->widgetSchema->setLabels(array(
      'date'        => 'SEDCAR as of Date'
    ));

    $this->setValidators(array(
      'date'        => new sfValidatorPass()
    ));

    $this->widgetSchema->setNameFormat('sedcar[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
