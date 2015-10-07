<?php



class ServicePeer extends BaseServicePeer
{
    CONST SERVICE_TYPE_COMMUNITY = 13;
    
 static public function getByName($v){
    $c = new Criteria();
    $c->add(self::NAME, $v, Criteria::LIKE);
    return self::doSelectOne($c);
  }
}
