<?php

class NoteEntry extends BaseNoteEntry
{
  public function __toString() {
    return $this->getClient() .' ('. $this->getServiceDate('m/d/Y').')';
  }

  public function getLocation() {
    return $this->getOffice();
  }

  public function getGroup() {
    $result = '';
    $kids = $this->getNoteEntryKidssJoinClient();
    foreach($kids as $kid) {
      $result .= $kid->getClient()->getFullName().', ';
    }
    return substr($result, 0, -2);
  }

  public function inGroup()
  {
    foreach($this->getNoteEntryKidss() as $group_member) {
      if($group_member->getClientId() != $this->getClientId()) {
        return true;
      }
    }

    return false;
  }

  public function getGroupedConcerns() {
    $concerns = array();

    foreach($this->getEntryConcerns() as $entry_concern) {
      if(!array_key_exists($entry_concern->getAreaOfConcernId(), $concerns)) {
        $concerns[$entry_concern->getAreaOfConcernId()]['entries'] = array();
        $concerns[$entry_concern->getAreaOfConcernId()]['name'] = ($entry_concern->getAreaOfConcern()) ? $entry_concern->getAreaOfConcern()->getName():'Unknown';
      }
      $concerns[$entry_concern->getAreaOfConcernId()]['entries'][] = $entry_concern;
    }

    return $concerns;
  }

  public function getOverlaps() {
    $c = new Criteria();

    // start date is after this start, and start date is before this one
    $cton1 = $c->getNewCriterion(NoteEntryPeer::TIME_IN, $this->getTimeIn(), Criteria::GREATER_THAN);
    $cton2 = $c->getNewCriterion(NoteEntryPeer::TIME_IN, $this->getTimeOut(), Criteria::LESS_THAN);
    $cton1->addAnd($cton2);
    
    // end date is after start date, and end date is before this end date
    $cton3 = $c->getNewCriterion(NoteEntryPeer::TIME_OUT, $this->getTimeIn(), Criteria::GREATER_THAN);
    $cton4 = $c->getNewCriterion(NoteEntryPeer::TIME_OUT, $this->getTimeOut(), Criteria::LESS_THAN);
    $cton3->addAnd($cton4);
    
    $cton1->addOr($cton3);

    $c->add($cton1);

    $c->add(NoteEntryPeer::CLIENT_ID, $this->getClientId());
    $c->add(NoteEntryPeer::ID, $this->getId(), Criteria::NOT_EQUAL);

    return NoteEntryPeer::doSelect($c);
  }

  // does this entry overlap with the provided entry
  public function overlaps(NoteEntry $compare)
  {
    $overlap_padding = 60;
    if($this->getClientId() == $compare->getClientId() || $this->getEmployeeId() == $compare->getEmployeeId()) {
      if(
          // if they overlap times
          (
            ( $compare->getTimeIn('U') > $this->getTimeIn('U')-$overlap_padding && $compare->getTimeIn('U') < $this->getTimeOut('U')+$overlap_padding )
                    ||
            ( $compare->getTimeOut('U') > $this->getTimeIn('U')-$overlap_padding && $compare->getTimeOut('U') < $this->getTimeOut('U')+$overlap_padding )
          )
          // if grouped then overlap is fine TODO
          && !$this->countNoteEntryKidss() && !$compare->countNoteEntryKidss()
        ) {
        return true;
      }
    }

    return false;
  }
}
