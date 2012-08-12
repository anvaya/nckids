<?php

class Employee extends BaseEmployee
{

  public function getMailingAddress(){
    $address = '';
    $address .= $this->getFullName() ."\n";
    $address .= $this->getAddress()."\n";
    if($this->getAddress2() != '')
      $address .= $this->getAddress2()."\n";
    $address .= $this->getCity().", ". $this->getState() ." ". $this->getZip() ."\n";

    return $address;
  }

  public function getActiveClientServices(Criteria $c = null){
    if(!$c)
      $c = new Criteria();
    return $this->getClientServicesJoinClient(ClientServicePeer::addActive($c));
  }
  public function getHomePhoneFormatted(){
    return nckTools::format_phone($this->getHomePhone());
  }

  public function getCellPhoneFormatted(){
    return nckTools::format_phone($this->getCellPhone());
  }

  public function getFullName(){
    return $this->getFirstName() .' '. $this->getLastName();
  }
  public function __toString(){
    return $this->getFullName();
  }
    
  public function getPicture(){
    if(!$pic = parent::getPicture())
      return 'picture_missing.jpg';
    return $pic;
  }
  
  public function delete(PropelPDO $con = null){
  	$this->setDof(time());
  	return $this->save($con);
  }
  
  public function getTimesheetClients(Criteria $c){
  	$c->add(ClientServicePeer::EMPLOYEE_ID, $this->getId());
  	return ClientPeer::doSelect($c);
  }
}
if(sfConfig::get('app_employee_hide_inactive'))
  sfPropelBehavior::add('Employee', array('paranoid' => array('column' => 'dof')));