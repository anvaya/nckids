<?php

class Icd9 extends BaseIcd9
{
  public function __toString(){
    return $this->getName();
  }

}
