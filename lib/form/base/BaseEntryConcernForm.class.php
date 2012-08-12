<?php

/**
 * EntryConcern form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseEntryConcernForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'note_entry_id'      => new sfWidgetFormPropelChoice(array('model' => 'NoteEntry', 'add_empty' => false)),
      'area_of_concern_id' => new sfWidgetFormPropelChoice(array('model' => 'AreaOfConcern', 'add_empty' => true)),
      'objective_id'       => new sfWidgetFormPropelChoice(array('model' => 'Objective', 'add_empty' => true)),
      'prompt_id'          => new sfWidgetFormPropelChoice(array('model' => 'Prompt', 'add_empty' => true)),
      'level_id'           => new sfWidgetFormPropelChoice(array('model' => 'Level', 'add_empty' => true)),
      'accuracy'           => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'EntryConcern', 'column' => 'id', 'required' => false)),
      'note_entry_id'      => new sfValidatorPropelChoice(array('model' => 'NoteEntry', 'column' => 'id')),
      'area_of_concern_id' => new sfValidatorPropelChoice(array('model' => 'AreaOfConcern', 'column' => 'id', 'required' => false)),
      'objective_id'       => new sfValidatorPropelChoice(array('model' => 'Objective', 'column' => 'id', 'required' => false)),
      'prompt_id'          => new sfValidatorPropelChoice(array('model' => 'Prompt', 'column' => 'id', 'required' => false)),
      'level_id'           => new sfValidatorPropelChoice(array('model' => 'Level', 'column' => 'id', 'required' => false)),
      'accuracy'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('entry_concern[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EntryConcern';
  }


}
