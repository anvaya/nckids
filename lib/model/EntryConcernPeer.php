<?php

class EntryConcernPeer extends BaseEntryConcernPeer
{




  static public $accuracy_choices = array(
      ''   => '',
      '0%' => '0%',
      '10%' => '10%',
      '20%' => '20%',
      '30%' => '30%',
      '40%' => '40%',
      '50%' => '50%',
      '60%' => '60%',
      '70%' => '70%',
      '80%' => '80%',
      '90%' => '90%',
      '100%' => '100%'
      );

  public static function getAccuracyChoices($keys_only = false) {
    return ($keys_only) ? array_keys(self::$accuracy_choices) : self::$accuracy_choices;
  }

  public static function getAccuracyName($key) {
    return array_key_exists($key, self::$accuracy_choices) ? self::$accuracy_choices[$key] : false;
  }
}
