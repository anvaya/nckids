<?php

class ClientService extends BaseClientService
{	
	public function isComplete($date = null){
    if($date == null)
      $date = time();
    return ($this->getEndDate('U') < $date);
	}
  public function isActive($date = null){
    if($date == null)
      $date = time();
    return ($this->getStartDate('U') < $date) && ($date < $this->getEndDate('U'));
  }
  
  public function getServiceType(){
    $ret = strtoupper(sfInflector::camelize($this->getObjectType()));
    if($this->getObjectType() == ClientServicePeer::CLASSKEY_CLASSROOM)
      $ret .= ' ('. $this->getOffice() .')';
    if($this->getObjectType() == ClientServicePeer::CLASSKEY_SEIT || $this->getObjectType() == ClientServicePeer::CLASSKEY_PRESCHOOL)
      $ret .= ($this->getClient() && $this->getClient()->getDistrict())?' ('. $this->getClient()->getDistrict() .')':'';
  	return $ret;
  }
  
  public function getEmployee(PropelPDO $con = null){
  	if($emp = parent::getEmployee($con))
  	 return $emp;
  	return new Employee();
  }

  public function __toString() {
    return $this->getClient() .' / '. $this->getService() .' ('. $this->getFrequency() .')';
  }
}
