<?php

/**
 * Employee form.
 *
 * @package    nckids
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EmployeeForm extends BaseEmployeeForm
{

  public function configure()
  {
  
  $years = range(date('Y')-100, date('Y')+5); //Creates array of years between 1920-2000
  $years_list = array_reverse(array_combine($years, $years), true); //Creates new array where key and value are both values from $years list
 
  sfProjectConfiguration::getActive()->loadHelpers('Global');
  
  unset($this['created_at'], $this['updated_at'], $this['clearance'], $this['keys_returned'], $this['email_removed'], $this['server_removed'], $this['dist_list_removed']);

    $this->widgetSchema['dob'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{changeYear:true, yearRange: \'1920:2009\'}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['license_expiration'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['doh'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['physical_date'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['tb_date'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['osha_date'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['cpr_date'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['dof'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['tc_effective'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));
    $this->widgetSchema['tc_exp'] = new sfWidgetFormJQueryDate(array(
      'years' => $years_list,
      'image' => '/images/calendar.png',
      'config' => '{}',
    ), array(
      'class'=>'date'
    ));

  	$this->widgetSchema['tc_type'] = new sfWidgetFormChoice(array(
                                        'expanded' => false,
                                        'multiple' => false,
                                        'choices'  => EmployeePeer::getTcTypeOptions(),
                                      ));
    $this->validatorSchema['tc_type'] = new sfValidatorChoice(array('required' => false, 'multiple' => false, 'choices' => array_keys(EmployeePeer::getTcTypeOptions())));

  	$this->widgetSchema['employee_to_location_list']->setOption('expanded', true);
    $this->widgetSchema['employee_finger_to_location_list']->setOption('expanded', true);
    
    $this->widgetSchema['tc_type']->setLabel('Teacher Cert. Type');
    $this->widgetSchema['tc_effective']->setLabel('Teacher Cert. Effective');
    $this->widgetSchema['tc_number']->setLabel('Teacher Cert. Number');
    $this->widgetSchema['tc_exp']->setLabel('Cert. Through (expires)');
    $this->widgetSchema['has_dist_list']->setLabel('On distribution list');
    // $this->widgetSchema['clearance']->setLabel('SCR Clearance');

    $this->widgetSchema['first_name']->setLabel('First Name');
    $this->widgetSchema['last_name']->setLabel('Last Name');
    $this->widgetSchema['job_id']->setLabel('Job Title');
    $this->widgetSchema['home_phone']->setLabel('Home Phone');
    $this->widgetSchema['cell_phone']->setLabel('Cell Phone');
    $this->widgetSchema['company_email']->setLabel('Company Email');
    $this->widgetSchema['personal_email']->setLabel('Personal Email');
    $this->widgetSchema['zip']->setLabel('ZIP');
    $this->widgetSchema['ssn']->setLabel('SSN');
    $this->widgetSchema['npi']->setLabel('NPI');
    $this->widgetSchema['doh']->setLabel('Date of Hire');
    $this->widgetSchema['dof']->setLabel('Date of Termination');
    $this->widgetSchema['dob']->setLabel('DOB');
    $this->widgetSchema['license_number']->setLabel('License Number');
    $this->widgetSchema['license_expiration']->setLabel('License Expires');

    $this->widgetSchema['physical_date']->setLabel('Physical Expiration Date');
    $this->widgetSchema['physical_notes']->setLabel('Physical Notes');
    $this->widgetSchema['tb_date']->setLabel('TB Expiration Date');
    $this->widgetSchema['tb_notes']->setLabel('TB Notes');
    $this->widgetSchema['osha_date']->setLabel('OSHA Expiration Date');
    $this->widgetSchema['cpr_date']->setLabel('CPR Expiration Date');
    $this->widgetSchema['suplimental_health']->setLabel('Supplemental health');




    $this->widgetSchema['employee_finger_to_location_list']->setLabel('Fingerprints');
    $this->widgetSchema['finger_print_notes']->setLabel('Fingerprint Notes');
    $this->widgetSchema['employee_to_location_list']->setLabel('SCR Clearance');

    
    $this->widgetSchema['picture'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Picture',
      'file_src'  => '/uploads/'.sfConfig::get('app_employee_images_dir', 'employee').'/'.$this->getObject()->getPicture(),
      'is_image'  => false,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div><label>Delete the picture?</label> %delete%<br /><label>New Picture</label> %input%</div>',
    ));

    $this->validatorSchema['picture'] = new sfValidatorFile();
    $this->validatorSchema['picture']->setOption('required', false);
    $this->validatorSchema['picture_delete'] = new sfValidatorBoolean();
    
    
  }
  
  /**
  * Here I'm making deleting the old file on save if it exists, makingthe filename, and setting the filename in the database on save
  */
  public function doSave($con = null)
  {
    if($this->getValue('picture')){
      if ($this->getObject()->getPicture() != '' && file_exists(sfConfig::get('sf_upload_dir').'/'.sfConfig::get('app_employee_images_dir', 'employee').'/'.$this->getObject()->getPicture()))
      {
        unlink(sfConfig::get('sf_upload_dir').'/'.sfConfig::get('app_employee_images_dir', 'employee').'/'.$this->getObject()->getPicture());
      }
      $file = $this->getValue('picture');
      $filename = sha1($file->getOriginalName()).$file->getExtension($file->getOriginalExtension());
      $file->save(sfConfig::get('sf_upload_dir').'/'.sfConfig::get('app_employee_images_dir', 'employee').'/'.$filename);
      
      //create thumbnail here
      $thumbnail = new sfThumbnail(120, 160, false, true, 75, 'sfImageMagickAdapter', array('method' => 'shave_all'));
      $thumbnail->loadFile(sfConfig::get('sf_upload_dir').'/'.sfConfig::get('app_employee_images_dir', 'employee').'/'.$filename);
      $thumbnail->save(sfConfig::get('sf_upload_dir').'/'.sfConfig::get('app_employee_images_dir', 'employee').'/'.$filename);
    }
    
    if($this->getValue('picture_delete')){
      if($this->getObject()->getPicture() != 'picture_missing.jpg' && file_exists(sfConfig::get('sf_upload_dir').'/'.sfConfig::get('app_employee_images_dir', 'employee').'/'.$this->getObject()->getPicture()))
      {
        unlink(sfConfig::get('sf_upload_dir').'/'.sfConfig::get('app_employee_images_dir', 'employee').'/'.$this->getObject()->getPicture());
      }    
    }

    return parent::doSave($con);
  }

  /**
  * Here I'm changing the full absolute file path to just the relativepath on update
  */
  public function updateObject($values = null)
  {
    $beforeValues = clone $this->getObject();

    $object = parent::updateObject($values);
    $object->setPicture(str_replace(sfConfig::get('sf_upload_dir').'/'.sfConfig::get('app_employee_images_dir').'/', '', $object->getPicture()));

    // if has_keys is unchecked, timestamp it
    if($beforeValues->getHasKeys()!== $object->getHasKeys()){
      if(!$object->getHasKeys()){
        $object->setKeysReturned(mktime());
      }else{
        $object->setKeysReturned(null);
      }
    }else{
      $object->setKeysReturned($beforeValues->getKeysReturned());
    }
    
    // if has_email is unchecked, timestamp it
    if($beforeValues->getHasEmail()!== $object->getHasEmail()){
      if(!$object->getHasEmail()){
        $object->setEmailRemoved(mktime());
      }else{
        $object->setEmailRemoved(null);
      }
    }else{
      $object->setEmailRemoved($beforeValues->getEmailRemoved());
    }

    // if has_dist_list is unchecked, timestamp it
    if($beforeValues->getHasDistList()!== $object->getHasDistList()){
      if(!$object->getHasDistList()){
        $object->setDistListRemoved(mktime());
      }else{
        $object->setDistListRemoved(null);
      }
    }else{
      $object->setDistListRemoved($beforeValues->getDistListRemoved());
    }

    // if has_server_access is unchecked, timestamp it
    if($beforeValues->getHasServerAccess()!== $object->getHasServerAccess()){
      if(!$object->getHasServerAccess()){
        $object->setServerRemoved(mktime());
      }else{
        $object->setServerRemoved(null);
      }
    }else{
      $object->setServerRemoved($beforeValues->getServerRemoved());
    }

    // if DOF has been modified, send a notification email
    if($object->getDof() && $beforeValues->getDof() !== $object->getDof()){
      require_once(sfConfig::get('sf_lib_dir').'/vendor/swift/swift_required.php'); # needed due to symfony autoloader
      $mailer = Swift_Mailer::newInstance(Swift_MailTransport::newInstance());
      sfLoader::loadHelpers('Partial');
      $mailBody = get_partial('employee/emailTerminatedEmployee', array('employee' => $object));
      $message = Swift_Message::newInstance('Employee Termination Notice')
               ->setFrom(array('noreply@nckidsinc.com' => 'North Country Kids, Inc.'))
               ->setTo(array('brian@kbscomputer.com', 's.girard@nckidsinc.com', 'm.decker@nckidsinc.com'))
               ->setBody($mailBody, 'text/html');
      $mailer->send($message);
    }

    return $object;
  } 

}
