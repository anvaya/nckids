<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EntryConcern filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseEntryConcernFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'note_entry_id'      => new sfWidgetFormPropelChoice(array('model' => 'NoteEntry', 'add_empty' => true)),
      'area_of_concern_id' => new sfWidgetFormPropelChoice(array('model' => 'AreaOfConcern', 'add_empty' => true)),
      'objective_id'       => new sfWidgetFormPropelChoice(array('model' => 'Objective', 'add_empty' => true)),
      'prompt_id'          => new sfWidgetFormPropelChoice(array('model' => 'Prompt', 'add_empty' => true)),
      'level_id'           => new sfWidgetFormPropelChoice(array('model' => 'Level', 'add_empty' => true)),
      'accuracy'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'note_entry_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'NoteEntry', 'column' => 'id')),
      'area_of_concern_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AreaOfConcern', 'column' => 'id')),
      'objective_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Objective', 'column' => 'id')),
      'prompt_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Prompt', 'column' => 'id')),
      'level_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Level', 'column' => 'id')),
      'accuracy'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('entry_concern_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EntryConcern';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'note_entry_id'      => 'ForeignKey',
      'area_of_concern_id' => 'ForeignKey',
      'objective_id'       => 'ForeignKey',
      'prompt_id'          => 'ForeignKey',
      'level_id'           => 'ForeignKey',
      'accuracy'           => 'Text',
    );
  }
}
