<?php


/**
 * This class adds structure of 'sf_BreadNav_Application' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Mon 20 Aug 2012 12:25:02 AM EDT
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sfBreadNav2Plugin.lib.model.map
 */
class sfBreadNavApplicationMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfBreadNav2Plugin.lib.model.map.sfBreadNavApplicationMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(sfBreadNavApplicationPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(sfBreadNavApplicationPeer::TABLE_NAME);
		$tMap->setPhpName('sfBreadNavApplication');
		$tMap->setClassname('sfBreadNavApplication');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('USER_ID', 'UserId', 'INTEGER', false, null);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 255);

		$tMap->addColumn('APPLICATION', 'Application', 'VARCHAR', true, 255);

		$tMap->addColumn('CSS', 'Css', 'VARCHAR', true, 2000);

	} // doBuild()

} // sfBreadNavApplicationMapBuilder
