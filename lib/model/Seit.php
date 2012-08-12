<?php

class Seit extends ClientService {
  public function __construct()
  {
    parent::__construct();
    $this->setObjectType(ClientServicePeer::CLASSKEY_SEIT);
  }

}