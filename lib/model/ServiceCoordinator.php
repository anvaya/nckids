<?php

class ServiceCoordinator extends BaseServiceCoordinator
{
  public function __toString() {
    return $this->getName();
  }
}
