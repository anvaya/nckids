<?php

class EmployeeLocation extends BaseEmployeeLocation
{
  public function __toString(){
    return $this->getName();
  }
}
