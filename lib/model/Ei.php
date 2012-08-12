<?php

class Ei extends ClientService {
  public function __construct()
  {
    parent::__construct();
    $this->setObjectType(ClientServicePeer::CLASSKEY_EI);
  }

}