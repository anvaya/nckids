<?php
class ReportWaitlistForm extends sfForm
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
      'date'        => 'Waiting List as of Date'
    ));

    $this->setValidators(array(
      'date'        => new sfValidatorPass()
    ));

    $yr = 'this'; if (time() >= strtotime('September 1st')) { $yr = 'next'; }
    $this->setDefaults( array('date' => strtotime($yr . ' year September 1st') ) );
    
    $this->widgetSchema->setNameFormat('wait[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
