<?php

class District extends BaseDistrict
{
  public function __toString(){
    return $this->getName();
  }

}
