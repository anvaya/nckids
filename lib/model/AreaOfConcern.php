<?php

class AreaOfConcern extends BaseAreaOfConcern
{
  public function __toString() {
    return $this->getName();
  }
}
