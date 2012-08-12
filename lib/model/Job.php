<?php

class Job extends BaseJob
{

  public function getShortName() {
    $name = $this->getName();

    switch($name) {
      case 'Occupational Therapist':
        $name = 'OT';
        break;
      case 'Speech Language Pathologist':
        $name = 'ST';
        break;
      case 'Physical Therapist':
        $name = 'PT';
        break;
    }

    return $name;
  }

  public function __toString(){
    return $this->getName();
  }

}
