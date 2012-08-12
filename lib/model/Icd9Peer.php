<?php

class Icd9Peer extends BaseIcd9Peer
{
  static public function getByName($v){
    $c = new Criteria();
    $c->add(self::NAME, $v, Criteria::LIKE);
    return self::doSelectOne($c);
  }
}
