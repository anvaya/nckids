<?php
class TeamForm extends sfForm
{
  public function configure()
  {
    $c = new Criteria();
    $c->add(EmployeePeer::IS_TEAM_MEMBER, true);
    $this->setWidgets(array(
      'emp1' => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'criteria' => $c, 'add_empty' => true, 'order_by' => array('LastName', 'asc'))),
      'emp2' => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'criteria' => $c, 'add_empty' => true, 'order_by' => array('LastName', 'asc'))),
      'emp3' => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'criteria' => $c, 'add_empty' => true, 'order_by' => array('LastName', 'asc')))
    ));
    
    $this->widgetSchema->setLabels(array(
      'emp1'        => 'Team member 1',
      'emp2'        => 'Team member 2',
      'emp3'        => 'Team member 3'
    ));

    $this->setValidators(array(
      'emp1'        => new sfValidatorPass(),
      'emp2'        => new sfValidatorPass(),
      'emp3'        => new sfValidatorPass()
    ));

    $this->widgetSchema->setFormFormatterName('list');
  }

}
