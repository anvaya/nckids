<?php

/**
 * Objective form.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class ObjectiveForm extends BaseObjectiveForm
{
  public function configure()
  {
    unset($this['area_of_concern_id']);
    $this->widgetSchema['delete'] = new sfWidgetFormInputHidden(array('default' => '0'));
    $this->validatorSchema['delete'] = new sfValidatorBoolean();
  }
}
