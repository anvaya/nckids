<?php
class ReportClientExpirationForm extends sfForm
{

   public static $choices = array(
      'true' => 'true',
      'false' => 'false'
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
      'blue_card' => new sfWidgetFormSelectCheckbox(array('choices' => array('true' => 'Check It'))),
      'immunizations' => new sfWidgetFormSelectCheckbox(array('choices' => array('true' => 'Check It')))
    ));

    $this->widgetSchema->setLabels(array(
      'date'            => 'Physical expiration date',
      'blue_card'       => 'Check Blue Card',
      'immunizations'   => 'Check Immunizations'
    ));

    $this->setValidators(array(
      'date'        => new sfValidatorPass(),
      'blue_card'        => new sfValidatorPass(),
      'immunizations'        => new sfValidatorPass()
    ));

    $this->setDefaults( array('date' => time() ) );

    $this->widgetSchema->setNameFormat('expired[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }

}
