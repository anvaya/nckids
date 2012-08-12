<?php

class Prompt extends BasePrompt
{
  public function __toString() {
    return $this->getName();
  }
}
