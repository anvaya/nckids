<?php
class ReportCoreEvalForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'start_date'      => new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}'
      ), array(
      'class'=>'date'
    )),
      'end_date'      => new sfWidgetFormJQueryDate(array(
      'image' => '/images/calendar.png',
      'config' => '{}'
      ), array(
      'class'=>'date'
    ))
    ));
    
    $this->widgetSchema->setLabels(array(
      'start_date'        => 'From',
      'end_date'        => 'To'
    ), array(
      'class'=>'date'
    ));

    $this->setValidators(array(
      'start_date'        => new sfValidatorDate(),
      'end_date'        => new sfValidatorDate()
    ), array(
      'class'=>'date'
    ));

    
    $this->setDefaults( array('start_date' => strtotime('-60 days', time()), 'end_date' => strtotime('-30 days', time()) ) );
    
    $this->widgetSchema->setNameFormat('coreeval[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
