<?php

/**
 * AreaOfConcern form.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class AreaOfConcernForm extends BaseAreaOfConcernForm
{
  public function configure()
  {
    //Embedding at least a form
    $objectives = $this->getObject()->getObjectives();

    //An empty form will act as a container for all the objectives
    $objectives_form = new SfForm();
    $count = 0;
    foreach ($objectives as $objective) {
      $objective_form = new ObjectiveForm($objective);
      //Embedding each form in the container
      $objectives_form->embedForm($count, $objective_form);
      $count ++;
    }
    //Embedding the container in the main form
    $this->embedForm('objectives', $objectives_form);

  }

  public function addObjective($num){
    $objective = new Objective();
    $objective->setAreaOfConcern($this->getObject());
    $objective_form = new ObjectiveForm($objective);

    //Embedding the new concern in the container
    $this->embeddedForms['objectives']->embedForm($num, $objective_form);
    //Re-embedding the container
    $this->embedForm('objectives', $this->embeddedForms['objectives']);
  }

  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {
    foreach($taintedValues['objectives'] as $key=>$the_objective)
    {
      if (!isset($this['objectives'][$key]))
      {
        $this->addObjective($key);
      }
    }

    foreach ($this->embeddedForms['objectives']->getEmbeddedForms() as $key => $objectiveForm) {
      if (!$taintedValues['objectives'][$key]['delete']) {
        // only save todos that aren't blank
      } else {

        // Remove embedded forms that are blanks here!!
        $objectiveForm->getObject()->delete();
        unset(
                $objectiveForm,
                $this->embeddedForms['objectives'][$key],
                $taintedValues['objectives'][$key]
        );
      }
    }
    parent::bind($taintedValues, $taintedFiles);
  }

}
