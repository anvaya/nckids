<?php


/**
 * This class adds structure of 'objective' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue Mar 29 20:17:55 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ObjectiveMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ObjectiveMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(ObjectivePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ObjectivePeer::TABLE_NAME);
		$tMap->setPhpName('Objective');
		$tMap->setClassname('Objective');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('SHORT_NAME', 'ShortName', 'VARCHAR', false, 255);

		$tMap->addColumn('LONG_NAME', 'LongName', 'LONGVARCHAR', false, null);

		$tMap->addForeignKey('AREA_OF_CONCERN_ID', 'AreaOfConcernId', 'INTEGER', 'area_of_concern', 'ID', true, null);

	} // doBuild()

} // ObjectiveMapBuilder
