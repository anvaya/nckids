<?php

class ClientPeer extends BaseClientPeer
{
  static public function getByFullName($fn, $ln){
    $c = new Criteria();
    $c->add(self::FIRST_NAME, $fn, Criteria::LIKE);
    $c->add(self::LAST_NAME, $ln, Criteria::LIKE);
    return self::doSelectOne($c);
  }
  
	public static function searchByName($name = null, $limit = 20){
		$c = new Criteria;
		$c1 = $c->getNewCriterion(ClientPeer::FIRST_NAME, $name.'%', Criteria::LIKE);
		$c2 = $c->getNewCriterion(ClientPeer::LAST_NAME, $name.'%', Criteria::LIKE);
		$c1->addOr($c2);
		$c->add($c1);
		$c->setLimit($limit);
		return self::doSelect($c);
	}
	
	/**
	 * @param $date unix epoch timestamp - null for current server time
	 * @param $c optional criteria object to be combined with date
	 * @return array of Client objects
	 */
	public static function getActiveAsOfDate($date = null, Criteria $c = null){
		$date = ($date) ? $date : time();
		
		if(!$c)
		  $c = new Criteria();
		  
		// active = there exists one of 4 services that is within date range
		  
		return self::doSelectJoinAll($c);
	}
	
}
