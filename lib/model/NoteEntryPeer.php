<?php

class NoteEntryPeer extends BaseNoteEntryPeer
{


  static public $unit_choices = array(
      '0.00' => '0.00',
      '0.50' => '0.50',
      '0.75' => '0.75',
      '1.00' => '1.00',
      '1.25' => '1.25',
      '1.50' => '1.50',
      '1.75' => '1.75',
      '2.00' => '2.00',
      '2.25' => '2.25',
      '2.50' => '2.50',
      '2.75' => '2.75',
      '3.00' => '3.00',
      '3.25' => '3.25',
      '3.50' => '3.50',
      '3.75' => '3.75',
      '4.00' => '4.00',
      '4.25' => '4.25',
      '4.50' => '4.50',
      '4.75' => '4.75',
      '5.00' => '5.00'
  );

  static public $absent_choices = array(
      '0' => '',
      '1' => 'Teacher Absent',
      '2' => 'Student Absent',
      '3' => 'School Closing'
  );

  public static function getUnitChoices($keys_only = false) {
    return ($keys_only) ? array_keys(self::$unit_choices) : self::$unit_choices;
  }

  public static function getUnitName($key) {
    return array_key_exists($key, self::$unit_choices) ? self::$unit_choices[$key] : false;
  }

  public static function getAbsentChoices($keys_only = false) {
    return ($keys_only) ? array_keys(self::$absent_choices) : self::$absent_choices;
  }

  public static function getAbsentName($key) {
    return array_key_exists($key, self::$absent_choices) ? self::$absent_choices[$key] : false;
  }


  public static function getByClient($c) {
    $entries = self::doSelect($c);

    $result = array();
    foreach($entries as $entry) {
      if(!array_key_exists($entry->getClientId(), $result))
      {
        $result[$entry->getClientId()]['client'] = $entry->getClient();
      }
      $result[$entry->getClientId()]['entries'][] = $entry;
    }

    return $result;
  }
}
