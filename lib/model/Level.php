<?php

class Level extends BaseLevel
{
  public function __toString() {
    return $this->getName();
  }
}
