<?php
class ReportExpirationForm extends sfForm
{

   public static $choices = array(
      'license_expiration' => 'License',
      'tb_date' => 'TB',
      'osha_date' => 'OSHA',
      'cpr_date' => 'CPR',
      'physical_date' => 'Physical',
      'tc_exp' => 'Teaching Cert'
  );

  public function configure()
  {
    $this->setWidgets(array(
      'date'      => new sfWidgetFormJQueryDate(array(
                            'image' => '/images/calendar.png',
                            'config' => '{}',
                          ), array(
                            'class'=>'date'
                          )),
      'columns' => new sfWidgetFormChoiceMany(array('choices' => self::$choices, 'expanded' => true), array('class' => 'tiny_list'))
    ));

    $this->widgetSchema->setLabels(array(
      'date'        => 'Expired as of Date',
      'columns'     => 'Columns'
    ));

    $this->setValidators(array(
      'date'        => new sfValidatorPass(),
      'columns'        => new sfValidatorChoiceMany(array('choices' => array_keys(self::$choices), 'required' => false))
    ));

    $this->setDefaults( array('date' => time() ) );

    $this->widgetSchema->setNameFormat('expired[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
