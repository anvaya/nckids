<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * NoteEntry filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseNoteEntryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'employee_id'          => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'client_id'            => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'client_service_id'    => new sfWidgetFormPropelChoice(array('model' => 'ClientService', 'add_empty' => true)),
      'office_id'            => new sfWidgetFormPropelChoice(array('model' => 'Office', 'add_empty' => true)),
      'frequency_id'         => new sfWidgetFormPropelChoice(array('model' => 'Frequency', 'add_empty' => true)),
      'service_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'time_in'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'time_out'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'cpt_code'             => new sfWidgetFormFilterInput(),
      'units'                => new sfWidgetFormFilterInput(),
      'absent'               => new sfWidgetFormFilterInput(),
      'comments'             => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'note_entry_kids_list' => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'employee_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Employee', 'column' => 'id')),
      'client_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Client', 'column' => 'id')),
      'client_service_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ClientService', 'column' => 'id')),
      'office_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Office', 'column' => 'id')),
      'frequency_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Frequency', 'column' => 'id')),
      'service_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'time_in'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'time_out'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'cpt_code'             => new sfValidatorPass(array('required' => false)),
      'units'                => new sfValidatorPass(array('required' => false)),
      'absent'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comments'             => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'note_entry_kids_list' => new sfValidatorPropelChoice(array('model' => 'Client', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('note_entry_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addNoteEntryKidsListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(NoteEntryKidsPeer::NOTE_ENTRY_ID, NoteEntryPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(NoteEntryKidsPeer::CLIENT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(NoteEntryKidsPeer::CLIENT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'NoteEntry';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'employee_id'          => 'ForeignKey',
      'client_id'            => 'ForeignKey',
      'client_service_id'    => 'ForeignKey',
      'office_id'            => 'ForeignKey',
      'frequency_id'         => 'ForeignKey',
      'service_date'         => 'Date',
      'time_in'              => 'Date',
      'time_out'             => 'Date',
      'cpt_code'             => 'Text',
      'units'                => 'Text',
      'absent'               => 'Number',
      'comments'             => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'note_entry_kids_list' => 'ManyKey',
    );
  }
}
