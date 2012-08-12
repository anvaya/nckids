<?php
class ReportRs2Form extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'from_date'      => new sfWidgetFormJQueryDate(array(
                                                            'image' => '/images/calendar.png',
                                                            'config' => '{}',
                                                            'days' => nckTools::generateTwoCharsRange(1, 31),
                                                            'months' => nckTools::generateTwoCharsRange(1, 12),
                                                          ), array(
                                                            'class'=>'date'
                                                          )),
      'to_date'      => new sfWidgetFormJQueryDate(array(
                                                            'image' => '/images/calendar.png',
                                                            'config' => '{}',
                                                            'days' => nckTools::generateTwoCharsRange(1, 31),
                                                            'months' => nckTools::generateTwoCharsRange(1, 12),
                                                          ), array(
                                                            'class'=>'date'
                                                          )),
    ));
    
    $this->widgetSchema->setLabels(array(
      'from_date'        => 'From Date',
      'to_date'        => 'To Date'
    ));

    $this->setValidators(array(
      'from_date'        => new sfValidatorPass(),
      'to_date'        => new sfValidatorPass()
    ));

    $this->setDefaults( array('from_date' => strtotime('this month'), 'to_date' => strtotime('this month') ) );

    $this->widgetSchema->setNameFormat('rs2[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
