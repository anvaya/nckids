<?php

class Client extends BaseClient
{
	protected $first_service_time;
	protected $first_service;
	protected $last_service;
	protected $services;

  protected $aServiceCoord;

	public function __toString(){
		return $this->getFullName();
	}
	
  public function getFullName(){
    return $this->getFirstName() .' '. $this->getLastName();
  }
  
  public function getParent(){
  	return $this->getParentFirst() .' '. $this->getParentLast();
  }

  public function getMailingAddress(){
    $address = '';
    $address .= $this->getParent() ."\n";
    $address .= $this->getAddress()."\n";
    if($this->getAddress2() != '')
      $address .= $this->getAddress2()."\n";
    $address .= $this->getCity().", ". $this->getState() ." ". $this->getZip() ."\n";

    return $address;
  }
  
  // overrides generated method to include a join for all
  public function getClientServices($criteria = null, PropelPDO $con = null)
  {
    if ($criteria === null) {
      $criteria = new Criteria(ClientPeer::DATABASE_NAME);
    }
    elseif ($criteria instanceof Criteria)
    {
      $criteria = clone $criteria;
    }

    if ($this->collClientServices === null) {
      if ($this->isNew()) {
         $this->collClientServices = array();
      } else {

        $criteria->add(ClientServicePeer::CLIENT_ID, $this->id);

        #ClientServicePeer::addSelectColumns($criteria);
        $this->collClientServices = ClientServicePeer::doSelectJoinAll($criteria, $con);
      }
    } else {
      // criteria has no effect for a new object
      if (!$this->isNew()) {
        // the following code is to determine if a new query is
        // called for.  If the criteria is the same as the last
        // one, just return the collection.


        $criteria->add(ClientServicePeer::CLIENT_ID, $this->id);

        #ClientServicePeer::addSelectColumns($criteria);
        if (!isset($this->lastClientServiceCriteria) || !$this->lastClientServiceCriteria->equals($criteria)) {
          $this->collClientServices = ClientServicePeer::doSelectJoinAll($criteria, $con);
        }
      }
    }
    $this->lastClientServiceCriteria = $criteria;
    return $this->collClientServices;
  }
  
  public function getFirstServiceDate($format = 'Y-m-d H:i:s'){
  	if(!$this->first_service_time){
      if($fs = $this->getFirstService()){
        $this->first_service_time = $fs->getStartDate('U');
      }
  	}
    return date($format, $this->first_service_time);
  }
  
  public function getFirstService(){
    if(!$this->first_service){
    	$c = new Criteria();
    	$c->add(ClientServicePeer::START_DATE, null, Criteria::ISNOTNULL);
    	$c->addAscendingOrderByColumn(ClientServicePeer::START_DATE);
    	$c->setLimit(1);
    	$result = $this->getClientServices($c);
    	$this->first_service = array_shift($result);
    }
    return $this->first_service;
  }

  public function getLastService(){
    if(!$this->last_service){
      $c = new Criteria();
      $c->addDescendingOrderByColumn(ClientServicePeer::START_DATE);
      $c->setLimit(1);
      $result = $this->getClientServices($c);
      $this->last_service = array_shift($result);
    }
    return $this->last_service;
  }

	public function getServiceCoord(PropelPDO $con = null)
	{
		if ($this->aServiceCoord === null && ($this->service_coord_id !== null)) {
			$c = new Criteria(EmployeePeer::DATABASE_NAME);
			$c->add(EmployeePeer::ID, $this->service_coord_id);
			$this->aServiceCoord = EmployeePeer::doSelectOne($c, $con);
		}
		return $this->aServiceCoord;
	}
}
