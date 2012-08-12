<?php

class County extends BaseCounty
{

  public function __toString(){
    return $this->getName();
  }

}
