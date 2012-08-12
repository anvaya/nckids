<?php
class ReportArqForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'quarter_start'      => new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    )),
      'quarter_end'      => new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ))
    ));
  
    $this->widgetSchema->setLabels(array(
      'quarter_start'        => 'Quarter Start Date',
      'quarter_end'        => 'Quarter End Date'
    ));

    $this->setValidators(array(
      'quarter_start'        => new sfValidatorPass(),
      'quarter_end'        => new sfValidatorPass()
    ));

    $now = time();
    $this->setDefaults( array('quarter_start' => strtotime('4 months ago', $now), 'quarter_end' => $now ) );
    
    $this->widgetSchema->setNameFormat('arq[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
