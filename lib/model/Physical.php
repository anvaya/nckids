<?php

class Physical extends BasePhysical
{
  public function __toString(){
    return $this->getDateGiven();
  }

}
