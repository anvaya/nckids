<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ClientService filter form base class.
 *
 * @package    nckids
 * @subpackage filter
 * @author     Your name here
 */
class BaseClientServiceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'        => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'employee_id'      => new sfWidgetFormPropelChoice(array('model' => 'Employee', 'add_empty' => true)),
      'service_id'       => new sfWidgetFormPropelChoice(array('model' => 'Service', 'add_empty' => true)),
      'frequency_id'     => new sfWidgetFormPropelChoice(array('model' => 'Frequency', 'add_empty' => true)),
      'start_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'end_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'change_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'notes'            => new sfWidgetFormFilterInput(),
      'icd9_id'          => new sfWidgetFormPropelChoice(array('model' => 'Icd9', 'add_empty' => true)),
      'authorization'    => new sfWidgetFormFilterInput(),
      'physicians_order' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'office_id'        => new sfWidgetFormPropelChoice(array('model' => 'Office', 'add_empty' => true)),
      'waiting_list'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'object_type'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'client_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Client', 'column' => 'id')),
      'employee_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Employee', 'column' => 'id')),
      'service_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Service', 'column' => 'id')),
      'frequency_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Frequency', 'column' => 'id')),
      'start_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'end_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'change_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'notes'            => new sfValidatorPass(array('required' => false)),
      'icd9_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Icd9', 'column' => 'id')),
      'authorization'    => new sfValidatorPass(array('required' => false)),
      'physicians_order' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'office_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Office', 'column' => 'id')),
      'waiting_list'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'object_type'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client_service_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientService';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'client_id'        => 'ForeignKey',
      'employee_id'      => 'ForeignKey',
      'service_id'       => 'ForeignKey',
      'frequency_id'     => 'ForeignKey',
      'start_date'       => 'Date',
      'end_date'         => 'Date',
      'change_date'      => 'Date',
      'notes'            => 'Text',
      'icd9_id'          => 'ForeignKey',
      'authorization'    => 'Text',
      'physicians_order' => 'Boolean',
      'office_id'        => 'ForeignKey',
      'waiting_list'     => 'Boolean',
      'object_type'      => 'Text',
    );
  }
}
