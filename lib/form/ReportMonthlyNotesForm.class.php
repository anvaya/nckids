<?php
class ReportMonthlyNotesForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'service_type'      =>  new sfWidgetFormSelect(array('choices' => ClientServicePeer::getClassKeys(false))),
      'date_month'      =>  new sfWidgetFormSelect(array('choices' => array_combine(range(1, 12), range(1, 12)))),
      'date_year'      =>  new sfWidgetFormSelect(array('choices' => array_combine(range(date('Y')-1, date('Y')+2), range(date('Y')-1, date('Y')+2)))),
      'client_id'     => new sfWidgetFormInputHidden()
    ));
    
    $this->widgetSchema->setLabels(array(
      'service_type'      => 'Service Type',
      'date_month'        => 'Month',
      'date_year'         => 'Year'
    ));

    $this->setValidators(array(
      'service_type'       => new sfValidatorPass(),
      'date_month'       => new sfValidatorPass(),
      'date_year'        => new sfValidatorPass(),
      'client_id'        => new sfValidatorPass()
    ));

    $this->setDefaults( array(
        'service_type' => ClientServicePeer::CLASSKEY_CLASSROOM,
        'date_month' => date('n'),
        'date_year' => date('Y')
        ) );

    $this->widgetSchema->setNameFormat('monthlynotes[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
