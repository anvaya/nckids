<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Client filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseClientFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'             => new sfWidgetFormFilterInput(),
      'last_name'              => new sfWidgetFormFilterInput(),
      'dob'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'parent_first'           => new sfWidgetFormFilterInput(),
      'parent_last'            => new sfWidgetFormFilterInput(),
      'parent2_first'          => new sfWidgetFormFilterInput(),
      'parent2_last'           => new sfWidgetFormFilterInput(),
      'address'                => new sfWidgetFormFilterInput(),
      'address_2'              => new sfWidgetFormFilterInput(),
      'city'                   => new sfWidgetFormFilterInput(),
      'state'                  => new sfWidgetFormFilterInput(),
      'zip'                    => new sfWidgetFormFilterInput(),
      'county_id'              => new sfWidgetFormPropelChoice(array('model' => 'County', 'add_empty' => true)),
      'district_id'            => new sfWidgetFormPropelChoice(array('model' => 'District', 'add_empty' => true)),
      'home_phone'             => new sfWidgetFormFilterInput(),
      'work_phone'             => new sfWidgetFormFilterInput(),
      'cell_phone'             => new sfWidgetFormFilterInput(),
      'blue_card'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'immunizations'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'waiting_list'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'is_iep'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'physical_exp'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'pediatrician'           => new sfWidgetFormFilterInput(),
      'notes'                  => new sfWidgetFormFilterInput(),
      'service_coordinator_id' => new sfWidgetFormPropelChoice(array('model' => 'ServiceCoordinator', 'add_empty' => true)),
      'external_service'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'note_entry_kids_list'   => new sfWidgetFormPropelChoice(array('model' => 'NoteEntry', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'first_name'             => new sfValidatorPass(array('required' => false)),
      'last_name'              => new sfValidatorPass(array('required' => false)),
      'dob'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'parent_first'           => new sfValidatorPass(array('required' => false)),
      'parent_last'            => new sfValidatorPass(array('required' => false)),
      'parent2_first'          => new sfValidatorPass(array('required' => false)),
      'parent2_last'           => new sfValidatorPass(array('required' => false)),
      'address'                => new sfValidatorPass(array('required' => false)),
      'address_2'              => new sfValidatorPass(array('required' => false)),
      'city'                   => new sfValidatorPass(array('required' => false)),
      'state'                  => new sfValidatorPass(array('required' => false)),
      'zip'                    => new sfValidatorPass(array('required' => false)),
      'county_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'County', 'column' => 'id')),
      'district_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'District', 'column' => 'id')),
      'home_phone'             => new sfValidatorPass(array('required' => false)),
      'work_phone'             => new sfValidatorPass(array('required' => false)),
      'cell_phone'             => new sfValidatorPass(array('required' => false)),
      'blue_card'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'immunizations'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'waiting_list'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'is_iep'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'physical_exp'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'pediatrician'           => new sfValidatorPass(array('required' => false)),
      'notes'                  => new sfValidatorPass(array('required' => false)),
      'service_coordinator_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ServiceCoordinator', 'column' => 'id')),
      'external_service'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'note_entry_kids_list'   => new sfValidatorPropelChoice(array('model' => 'NoteEntry', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client_filters[%s]');

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

    $criteria->addJoin(NoteEntryKidsPeer::CLIENT_ID, ClientPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(NoteEntryKidsPeer::NOTE_ENTRY_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(NoteEntryKidsPeer::NOTE_ENTRY_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Client';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'first_name'             => 'Text',
      'last_name'              => 'Text',
      'dob'                    => 'Date',
      'parent_first'           => 'Text',
      'parent_last'            => 'Text',
      'parent2_first'          => 'Text',
      'parent2_last'           => 'Text',
      'address'                => 'Text',
      'address_2'              => 'Text',
      'city'                   => 'Text',
      'state'                  => 'Text',
      'zip'                    => 'Text',
      'county_id'              => 'ForeignKey',
      'district_id'            => 'ForeignKey',
      'home_phone'             => 'Text',
      'work_phone'             => 'Text',
      'cell_phone'             => 'Text',
      'blue_card'              => 'Boolean',
      'immunizations'          => 'Boolean',
      'waiting_list'           => 'Date',
      'is_iep'                 => 'Boolean',
      'physical_exp'           => 'Date',
      'pediatrician'           => 'Text',
      'notes'                  => 'Text',
      'service_coordinator_id' => 'ForeignKey',
      'external_service'       => 'Boolean',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
      'note_entry_kids_list'   => 'ManyKey',
    );
  }
}
