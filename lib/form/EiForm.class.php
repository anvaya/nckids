<?php

/**
 * Ei form.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EiForm extends ClientServiceForm
{
  public function configure()
  {
  	parent::configure();
  	unset($this['office_id'], $this['waiting_list']);
  	
  	$this->widgetSchema['object_type'] = new sfWidgetFormInputHidden();
  	$this->setDefault('object_type', 'ei');
  	
  }
}
