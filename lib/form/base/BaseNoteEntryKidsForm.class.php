<?php

/**
 * NoteEntryKids form base class.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 */
class BaseNoteEntryKidsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'note_entry_id' => new sfWidgetFormInputHidden(),
      'client_id'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'note_entry_id' => new sfValidatorPropelChoice(array('model' => 'NoteEntry', 'column' => 'id', 'required' => false)),
      'client_id'     => new sfValidatorPropelChoice(array('model' => 'Client', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('note_entry_kids[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'NoteEntryKids';
  }


}
