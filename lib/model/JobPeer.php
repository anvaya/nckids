<?php

class JobPeer extends BaseJobPeer
{
	static public function getByName($v){
		$c = new Criteria();
		$c->add(self::NAME, $v, Criteria::LIKE);
		return self::doSelectOne($c);
	}
}
