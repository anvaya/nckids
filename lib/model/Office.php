<?php

class Office extends BaseOffice
{
  public function __toString(){
    return $this->getName();
  }

}
