<?php

/**
 * Preschool form.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class SchoolAgeForm extends ClientServiceForm
{
  public function configure()
  {
  	parent::configure();
  	unset($this['icd9_id'], $this['authorization'], $this['physicians_order'], $this['office_id'], $this['waiting_list']);
  	
  	$this->widgetSchema['object_type'] = new sfWidgetFormInputHidden();
  	$this->setDefault('object_type', 'school_age');
  }
}
