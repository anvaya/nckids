<?php

class ClientServicePeer extends BaseClientServicePeer
{
	public static function getClassKeys($with_blank = true){
		$keys = array(self::CLASSKEY_SEIT, self::CLASSKEY_EI, self::CLASSKEY_CLASSROOM, self::CLASSKEY_PRESCHOOL, self::CLASSKEY_SCHOOL_AGE);
    if($with_blank)
      array_push($keys, '');
		return array_combine($keys, $keys);
	}
  public static function addActive(Criteria $c, $date = null){
    $date = ($date) ? $date : time();
    // if they started before today (not in future)
    $c->add(self::START_DATE, $date, Criteria::LESS_EQUAL);  
    
    // if they have not yet ended
    $c->add(self::END_DATE, $date, Criteria::GREATER_EQUAL);

    // if they have a change date make sure it is in the future
    $cton1 = $c->getNewCriterion(self::CHANGE_DATE, $date, Criteria::GREATER_THAN);
    $cton2 = $c->getNewCriterion(self::CHANGE_DATE, null);
    $cton1->addOr($cton2);
    $c->add($cton1);

    // dont include waiting list services
    $c->add(self::WAITING_LIST, false);

    return $c;
  }
  public static function addFuture(Criteria $c, $date = null){
    $date = ($date) ? $date : time();
    // if they started before today (not in future)
    $c->add(self::START_DATE, $date, Criteria::GREATER_EQUAL);  

    // if they have a change date make sure it is in the future
    $cton1 = $c->getNewCriterion(self::CHANGE_DATE, $date, Criteria::GREATER_THAN);
    $cton2 = $c->getNewCriterion(self::CHANGE_DATE, null);
    $cton1->addOr($cton2);
    $c->add($cton1);

    // dont include waiting list services
    $c->add(self::WAITING_LIST, false);
    
    return $c;
  } 
  public static function getActiveForEmployee($employee_id){
    $c = new Criteria();
    $c->add(self::EMPLOYEE_ID, $employee_id, Criteria::EQUAL);
    $c = self::addActive($c);
    return self::doSelectJoinAll($c);
  }
  public static function getUpcomingForEmployee($employee_id){
    $c = new Criteria();
    $c->add(self::EMPLOYEE_ID, $employee_id, Criteria::EQUAL);
    $c = self::addFuture($c);
    return self::doSelectJoinAll($c);
  }
  
  public static function getWaiting($date = null){
    $date = ($date) ? $date : time();
      
    $c = new Criteria();
    #$c->addJoin(ClientServicePeer::CLIENT_ID, ClientPeer::ID, Criteria::LEFT_JOIN);
    $c->add(ClientServicePeer::START_DATE, $date, Criteria::GREATER_EQUAL);
    $c->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_CLASSROOM);
    $c->add(ClientServicePeer::WAITING_LIST, true);
    $c->addAscendingOrderByColumn(ClientServicePeer::CLIENT_ID);
    $result = ClientServicePeer::doSelectJoinAll($c);
    // select client_id from all classroom services where start date is > today group by client_id

    #return ClientPeer::populateObjects($result);
      
    return $result;
  }
  
}
