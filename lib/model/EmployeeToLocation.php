<?php

class EmployeeToLocation extends BaseEmployeeToLocation
{
  public function __toString(){
    return $this->getLocationId();
  }
}
