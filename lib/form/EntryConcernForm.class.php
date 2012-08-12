<?php

/**
 * EntryConcern form.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class EntryConcernForm extends BaseEntryConcernForm
{
  public function configure()
  {
    unset($this['note_entry_id']);
    $this->widgetSchema['delete'] = new sfWidgetFormInputHidden(array('default' => '0'));
    $this->validatorSchema['delete'] = new sfValidatorBoolean();

    $employee = EmployeePeer::retrieveByPK($this->getOption('employee_id'));
    $c = new Criteria();
    $c->add(AreaOfConcernPeer::JOB_ID, $employee->getJobId());
    
    // if job_id = special instruction (7), they also need to see speech (8)
    if ($employee->getJobId() == 7) {
      $c->addOr(AreaOfConcernPeer::JOB_ID, 8);
    }
    
    $this->widgetSchema['area_of_concern_id']->setOption('criteria', $c);

    $c = new Criteria();
    $c->add(PromptPeer::ID, 44, Criteria::GREATER_EQUAL);
    $this->widgetSchema['prompt_id']->setOption('criteria', $c);

    $this->widgetSchema['accuracy'] = new sfWidgetFormSelect(array('choices' => EntryConcernPeer::getAccuracyChoices()));

    $this->widgetSchema->setLabels(array(
        'area_of_concern_id' => 'Area of concern',
        'objective_id'       => 'Objective',
        'prompt_id'      => 'Prompt',
        'level_id'      => 'Level',
        'accuracy' => 'Accuracy'
    ));
  }
}
