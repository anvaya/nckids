<?php

class ServicePeer extends BaseServicePeer
{
 static public function getByName($v){
    $c = new Criteria();
    $c->add(self::NAME, $v, Criteria::LIKE);
    return self::doSelectOne($c);
  }
}
