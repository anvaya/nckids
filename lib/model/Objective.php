<?php

class Objective extends BaseObjective
{
  public function __toString() {
    return $this->getShortName();
  }
}
