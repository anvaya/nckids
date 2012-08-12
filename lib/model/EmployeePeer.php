<?php

class EmployeePeer extends BaseEmployeePeer
{
  static protected $TC_TYPE_INTEGERS = array(null, 'Initial', 'Provisional', 'Permanent', 'Professional');
  static protected $TC_TYPE_VALUES = null;

  public static function getAllExpired($date = null){
    $c = new Criteria();

    // license_expiration
    $ex1 = $c->getNewCriterion(self::LICENSE_EXPIRATION, $date, Criteria::LESS_EQUAL);

    // tb_date
    $ex2 = $c->getNewCriterion(self::TB_DATE, $date, Criteria::LESS_EQUAL);
    $ex1->addOr($ex2);

    // osha_date
    $ex3 = $c->getNewCriterion(self::OSHA_DATE, $date, Criteria::LESS_EQUAL);
    $ex1->addOr($ex3);

    // cpr_date
    $ex4 = $c->getNewCriterion(self::CPR_DATE, $date, Criteria::LESS_EQUAL);
    $ex1->addOr($ex4);

    // tc_exp
    $ex5 = $c->getNewCriterion(self::TC_EXP, $date, Criteria::LESS_EQUAL);
    $ex1->addOr($ex5);

    $c->add($ex1);

    return self::doSelect($c);
  }
  /**
   * Returns a user type label from an index value.
   *
   * @param integer $index
   * @return string user type label
   * @author Scott Meves
   */
  static public function getTcTypeFromIndex($index)
  {
    return self::$TC_TYPE_INTEGERS[$index];
  }

  /**
   * Returns the TC type index from a string value
   *
   * @param string $value
   * @return integer $index
   */
  static public function getTcTypeFromValue($value)
  {
    if (!self::$TC_TYPE_VALUES)
    {
      self::$TC_TYPE_VALUES = array_flip(self::$TC_TYPE_INTEGERS);
    }

    $values = strtolower($value);

    if (!isset(self::$TC_TYPE_VALUES[$value]))
    {
      throw new PropelException(sprintf('TC type cannot take "%s" as a value', $value));
    }

    return self::$TC_TYPE_VALUES[strtolower($value)];
  }

  public static function getTcTypeOptions()
  {
    return self::$TC_TYPE_INTEGERS;
  }
  
  static public function getByFullName($fn, $ln){
    $c = new Criteria();
    $c->add(self::FIRST_NAME, $fn, Criteria::LIKE);
    $c->add(self::LAST_NAME, $ln, Criteria::LIKE);
    return self::doSelectOne($c);
  }
}