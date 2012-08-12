<?php
class ReportBirthdayForm extends sfForm
{
  public function configure()
  {
    $months = array('1'=>"January", '2'=>"February", '3'=>"March", '4'=>"April", '5'=>"May", '6'=>"June", '7'=>"July", '8'=>"August", '9'=>"September", '10'=>"October", '11'=>"Novemeber", '12'=>"December");
    $this->setWidgets(array(
      'month'      => new sfWidgetFormChoice(array('choices' => $months))
    ));
    
    $this->widgetSchema->setLabels(array(
      'month'        => 'Month'
    ));

    $this->setValidators(array(
      'month'        => new sfValidatorChoice(array('choices' => array_keys($months)))
    ));

    $this->setDefaults( array('month' => date('m') ) );
    
    $this->widgetSchema->setNameFormat('birthday[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
