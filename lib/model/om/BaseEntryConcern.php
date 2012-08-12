<?php

/**
 * Base class that represents a row from the 'entry_concern' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue Mar 29 20:17:55 2011
 *
 * @package    lib.model.om
 */
abstract class BaseEntryConcern extends BaseObject  implements Persistent {


  const PEER = 'EntryConcernPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        EntryConcernPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the note_entry_id field.
	 * @var        int
	 */
	protected $note_entry_id;

	/**
	 * The value for the area_of_concern_id field.
	 * @var        int
	 */
	protected $area_of_concern_id;

	/**
	 * The value for the objective_id field.
	 * @var        int
	 */
	protected $objective_id;

	/**
	 * The value for the prompt_id field.
	 * @var        int
	 */
	protected $prompt_id;

	/**
	 * The value for the level_id field.
	 * @var        int
	 */
	protected $level_id;

	/**
	 * The value for the accuracy field.
	 * @var        string
	 */
	protected $accuracy;

	/**
	 * @var        NoteEntry
	 */
	protected $aNoteEntry;

	/**
	 * @var        AreaOfConcern
	 */
	protected $aAreaOfConcern;

	/**
	 * @var        Objective
	 */
	protected $aObjective;

	/**
	 * @var        Prompt
	 */
	protected $aPrompt;

	/**
	 * @var        Level
	 */
	protected $aLevel;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Initializes internal state of BaseEntryConcern object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [note_entry_id] column value.
	 * 
	 * @return     int
	 */
	public function getNoteEntryId()
	{
		return $this->note_entry_id;
	}

	/**
	 * Get the [area_of_concern_id] column value.
	 * 
	 * @return     int
	 */
	public function getAreaOfConcernId()
	{
		return $this->area_of_concern_id;
	}

	/**
	 * Get the [objective_id] column value.
	 * 
	 * @return     int
	 */
	public function getObjectiveId()
	{
		return $this->objective_id;
	}

	/**
	 * Get the [prompt_id] column value.
	 * 
	 * @return     int
	 */
	public function getPromptId()
	{
		return $this->prompt_id;
	}

	/**
	 * Get the [level_id] column value.
	 * 
	 * @return     int
	 */
	public function getLevelId()
	{
		return $this->level_id;
	}

	/**
	 * Get the [accuracy] column value.
	 * 
	 * @return     string
	 */
	public function getAccuracy()
	{
		return $this->accuracy;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     EntryConcern The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EntryConcernPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [note_entry_id] column.
	 * 
	 * @param      int $v new value
	 * @return     EntryConcern The current object (for fluent API support)
	 */
	public function setNoteEntryId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->note_entry_id !== $v) {
			$this->note_entry_id = $v;
			$this->modifiedColumns[] = EntryConcernPeer::NOTE_ENTRY_ID;
		}

		if ($this->aNoteEntry !== null && $this->aNoteEntry->getId() !== $v) {
			$this->aNoteEntry = null;
		}

		return $this;
	} // setNoteEntryId()

	/**
	 * Set the value of [area_of_concern_id] column.
	 * 
	 * @param      int $v new value
	 * @return     EntryConcern The current object (for fluent API support)
	 */
	public function setAreaOfConcernId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->area_of_concern_id !== $v) {
			$this->area_of_concern_id = $v;
			$this->modifiedColumns[] = EntryConcernPeer::AREA_OF_CONCERN_ID;
		}

		if ($this->aAreaOfConcern !== null && $this->aAreaOfConcern->getId() !== $v) {
			$this->aAreaOfConcern = null;
		}

		return $this;
	} // setAreaOfConcernId()

	/**
	 * Set the value of [objective_id] column.
	 * 
	 * @param      int $v new value
	 * @return     EntryConcern The current object (for fluent API support)
	 */
	public function setObjectiveId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->objective_id !== $v) {
			$this->objective_id = $v;
			$this->modifiedColumns[] = EntryConcernPeer::OBJECTIVE_ID;
		}

		if ($this->aObjective !== null && $this->aObjective->getId() !== $v) {
			$this->aObjective = null;
		}

		return $this;
	} // setObjectiveId()

	/**
	 * Set the value of [prompt_id] column.
	 * 
	 * @param      int $v new value
	 * @return     EntryConcern The current object (for fluent API support)
	 */
	public function setPromptId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->prompt_id !== $v) {
			$this->prompt_id = $v;
			$this->modifiedColumns[] = EntryConcernPeer::PROMPT_ID;
		}

		if ($this->aPrompt !== null && $this->aPrompt->getId() !== $v) {
			$this->aPrompt = null;
		}

		return $this;
	} // setPromptId()

	/**
	 * Set the value of [level_id] column.
	 * 
	 * @param      int $v new value
	 * @return     EntryConcern The current object (for fluent API support)
	 */
	public function setLevelId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->level_id !== $v) {
			$this->level_id = $v;
			$this->modifiedColumns[] = EntryConcernPeer::LEVEL_ID;
		}

		if ($this->aLevel !== null && $this->aLevel->getId() !== $v) {
			$this->aLevel = null;
		}

		return $this;
	} // setLevelId()

	/**
	 * Set the value of [accuracy] column.
	 * 
	 * @param      string $v new value
	 * @return     EntryConcern The current object (for fluent API support)
	 */
	public function setAccuracy($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->accuracy !== $v) {
			$this->accuracy = $v;
			$this->modifiedColumns[] = EntryConcernPeer::ACCURACY;
		}

		return $this;
	} // setAccuracy()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->note_entry_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->area_of_concern_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->objective_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->prompt_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->level_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->accuracy = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 7; // 7 = EntryConcernPeer::NUM_COLUMNS - EntryConcernPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating EntryConcern object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aNoteEntry !== null && $this->note_entry_id !== $this->aNoteEntry->getId()) {
			$this->aNoteEntry = null;
		}
		if ($this->aAreaOfConcern !== null && $this->area_of_concern_id !== $this->aAreaOfConcern->getId()) {
			$this->aAreaOfConcern = null;
		}
		if ($this->aObjective !== null && $this->objective_id !== $this->aObjective->getId()) {
			$this->aObjective = null;
		}
		if ($this->aPrompt !== null && $this->prompt_id !== $this->aPrompt->getId()) {
			$this->aPrompt = null;
		}
		if ($this->aLevel !== null && $this->level_id !== $this->aLevel->getId()) {
			$this->aLevel = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EntryConcernPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = EntryConcernPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aNoteEntry = null;
			$this->aAreaOfConcern = null;
			$this->aObjective = null;
			$this->aPrompt = null;
			$this->aLevel = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseEntryConcern:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EntryConcernPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			EntryConcernPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseEntryConcern:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseEntryConcern:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EntryConcernPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseEntryConcern:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			EntryConcernPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aNoteEntry !== null) {
				if ($this->aNoteEntry->isModified() || $this->aNoteEntry->isNew()) {
					$affectedRows += $this->aNoteEntry->save($con);
				}
				$this->setNoteEntry($this->aNoteEntry);
			}

			if ($this->aAreaOfConcern !== null) {
				if ($this->aAreaOfConcern->isModified() || $this->aAreaOfConcern->isNew()) {
					$affectedRows += $this->aAreaOfConcern->save($con);
				}
				$this->setAreaOfConcern($this->aAreaOfConcern);
			}

			if ($this->aObjective !== null) {
				if ($this->aObjective->isModified() || $this->aObjective->isNew()) {
					$affectedRows += $this->aObjective->save($con);
				}
				$this->setObjective($this->aObjective);
			}

			if ($this->aPrompt !== null) {
				if ($this->aPrompt->isModified() || $this->aPrompt->isNew()) {
					$affectedRows += $this->aPrompt->save($con);
				}
				$this->setPrompt($this->aPrompt);
			}

			if ($this->aLevel !== null) {
				if ($this->aLevel->isModified() || $this->aLevel->isNew()) {
					$affectedRows += $this->aLevel->save($con);
				}
				$this->setLevel($this->aLevel);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = EntryConcernPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EntryConcernPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += EntryConcernPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aNoteEntry !== null) {
				if (!$this->aNoteEntry->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNoteEntry->getValidationFailures());
				}
			}

			if ($this->aAreaOfConcern !== null) {
				if (!$this->aAreaOfConcern->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAreaOfConcern->getValidationFailures());
				}
			}

			if ($this->aObjective !== null) {
				if (!$this->aObjective->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aObjective->getValidationFailures());
				}
			}

			if ($this->aPrompt !== null) {
				if (!$this->aPrompt->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPrompt->getValidationFailures());
				}
			}

			if ($this->aLevel !== null) {
				if (!$this->aLevel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLevel->getValidationFailures());
				}
			}


			if (($retval = EntryConcernPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EntryConcernPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNoteEntryId();
				break;
			case 2:
				return $this->getAreaOfConcernId();
				break;
			case 3:
				return $this->getObjectiveId();
				break;
			case 4:
				return $this->getPromptId();
				break;
			case 5:
				return $this->getLevelId();
				break;
			case 6:
				return $this->getAccuracy();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = EntryConcernPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNoteEntryId(),
			$keys[2] => $this->getAreaOfConcernId(),
			$keys[3] => $this->getObjectiveId(),
			$keys[4] => $this->getPromptId(),
			$keys[5] => $this->getLevelId(),
			$keys[6] => $this->getAccuracy(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EntryConcernPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNoteEntryId($value);
				break;
			case 2:
				$this->setAreaOfConcernId($value);
				break;
			case 3:
				$this->setObjectiveId($value);
				break;
			case 4:
				$this->setPromptId($value);
				break;
			case 5:
				$this->setLevelId($value);
				break;
			case 6:
				$this->setAccuracy($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EntryConcernPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNoteEntryId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAreaOfConcernId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObjectiveId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPromptId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLevelId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAccuracy($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(EntryConcernPeer::DATABASE_NAME);

		if ($this->isColumnModified(EntryConcernPeer::ID)) $criteria->add(EntryConcernPeer::ID, $this->id);
		if ($this->isColumnModified(EntryConcernPeer::NOTE_ENTRY_ID)) $criteria->add(EntryConcernPeer::NOTE_ENTRY_ID, $this->note_entry_id);
		if ($this->isColumnModified(EntryConcernPeer::AREA_OF_CONCERN_ID)) $criteria->add(EntryConcernPeer::AREA_OF_CONCERN_ID, $this->area_of_concern_id);
		if ($this->isColumnModified(EntryConcernPeer::OBJECTIVE_ID)) $criteria->add(EntryConcernPeer::OBJECTIVE_ID, $this->objective_id);
		if ($this->isColumnModified(EntryConcernPeer::PROMPT_ID)) $criteria->add(EntryConcernPeer::PROMPT_ID, $this->prompt_id);
		if ($this->isColumnModified(EntryConcernPeer::LEVEL_ID)) $criteria->add(EntryConcernPeer::LEVEL_ID, $this->level_id);
		if ($this->isColumnModified(EntryConcernPeer::ACCURACY)) $criteria->add(EntryConcernPeer::ACCURACY, $this->accuracy);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EntryConcernPeer::DATABASE_NAME);

		$criteria->add(EntryConcernPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of EntryConcern (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNoteEntryId($this->note_entry_id);

		$copyObj->setAreaOfConcernId($this->area_of_concern_id);

		$copyObj->setObjectiveId($this->objective_id);

		$copyObj->setPromptId($this->prompt_id);

		$copyObj->setLevelId($this->level_id);

		$copyObj->setAccuracy($this->accuracy);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     EntryConcern Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     EntryConcernPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EntryConcernPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a NoteEntry object.
	 *
	 * @param      NoteEntry $v
	 * @return     EntryConcern The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setNoteEntry(NoteEntry $v = null)
	{
		if ($v === null) {
			$this->setNoteEntryId(NULL);
		} else {
			$this->setNoteEntryId($v->getId());
		}

		$this->aNoteEntry = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the NoteEntry object, it will not be re-added.
		if ($v !== null) {
			$v->addEntryConcern($this);
		}

		return $this;
	}


	/**
	 * Get the associated NoteEntry object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     NoteEntry The associated NoteEntry object.
	 * @throws     PropelException
	 */
	public function getNoteEntry(PropelPDO $con = null)
	{
		if ($this->aNoteEntry === null && ($this->note_entry_id !== null)) {
			$c = new Criteria(NoteEntryPeer::DATABASE_NAME);
			$c->add(NoteEntryPeer::ID, $this->note_entry_id);
			$this->aNoteEntry = NoteEntryPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aNoteEntry->addEntryConcerns($this);
			 */
		}
		return $this->aNoteEntry;
	}

	/**
	 * Declares an association between this object and a AreaOfConcern object.
	 *
	 * @param      AreaOfConcern $v
	 * @return     EntryConcern The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAreaOfConcern(AreaOfConcern $v = null)
	{
		if ($v === null) {
			$this->setAreaOfConcernId(NULL);
		} else {
			$this->setAreaOfConcernId($v->getId());
		}

		$this->aAreaOfConcern = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the AreaOfConcern object, it will not be re-added.
		if ($v !== null) {
			$v->addEntryConcern($this);
		}

		return $this;
	}


	/**
	 * Get the associated AreaOfConcern object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     AreaOfConcern The associated AreaOfConcern object.
	 * @throws     PropelException
	 */
	public function getAreaOfConcern(PropelPDO $con = null)
	{
		if ($this->aAreaOfConcern === null && ($this->area_of_concern_id !== null)) {
			$c = new Criteria(AreaOfConcernPeer::DATABASE_NAME);
			$c->add(AreaOfConcernPeer::ID, $this->area_of_concern_id);
			$this->aAreaOfConcern = AreaOfConcernPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAreaOfConcern->addEntryConcerns($this);
			 */
		}
		return $this->aAreaOfConcern;
	}

	/**
	 * Declares an association between this object and a Objective object.
	 *
	 * @param      Objective $v
	 * @return     EntryConcern The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setObjective(Objective $v = null)
	{
		if ($v === null) {
			$this->setObjectiveId(NULL);
		} else {
			$this->setObjectiveId($v->getId());
		}

		$this->aObjective = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Objective object, it will not be re-added.
		if ($v !== null) {
			$v->addEntryConcern($this);
		}

		return $this;
	}


	/**
	 * Get the associated Objective object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Objective The associated Objective object.
	 * @throws     PropelException
	 */
	public function getObjective(PropelPDO $con = null)
	{
		if ($this->aObjective === null && ($this->objective_id !== null)) {
			$c = new Criteria(ObjectivePeer::DATABASE_NAME);
			$c->add(ObjectivePeer::ID, $this->objective_id);
			$this->aObjective = ObjectivePeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aObjective->addEntryConcerns($this);
			 */
		}
		return $this->aObjective;
	}

	/**
	 * Declares an association between this object and a Prompt object.
	 *
	 * @param      Prompt $v
	 * @return     EntryConcern The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPrompt(Prompt $v = null)
	{
		if ($v === null) {
			$this->setPromptId(NULL);
		} else {
			$this->setPromptId($v->getId());
		}

		$this->aPrompt = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Prompt object, it will not be re-added.
		if ($v !== null) {
			$v->addEntryConcern($this);
		}

		return $this;
	}


	/**
	 * Get the associated Prompt object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Prompt The associated Prompt object.
	 * @throws     PropelException
	 */
	public function getPrompt(PropelPDO $con = null)
	{
		if ($this->aPrompt === null && ($this->prompt_id !== null)) {
			$c = new Criteria(PromptPeer::DATABASE_NAME);
			$c->add(PromptPeer::ID, $this->prompt_id);
			$this->aPrompt = PromptPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aPrompt->addEntryConcerns($this);
			 */
		}
		return $this->aPrompt;
	}

	/**
	 * Declares an association between this object and a Level object.
	 *
	 * @param      Level $v
	 * @return     EntryConcern The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLevel(Level $v = null)
	{
		if ($v === null) {
			$this->setLevelId(NULL);
		} else {
			$this->setLevelId($v->getId());
		}

		$this->aLevel = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Level object, it will not be re-added.
		if ($v !== null) {
			$v->addEntryConcern($this);
		}

		return $this;
	}


	/**
	 * Get the associated Level object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Level The associated Level object.
	 * @throws     PropelException
	 */
	public function getLevel(PropelPDO $con = null)
	{
		if ($this->aLevel === null && ($this->level_id !== null)) {
			$c = new Criteria(LevelPeer::DATABASE_NAME);
			$c->add(LevelPeer::ID, $this->level_id);
			$this->aLevel = LevelPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aLevel->addEntryConcerns($this);
			 */
		}
		return $this->aLevel;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

			$this->aNoteEntry = null;
			$this->aAreaOfConcern = null;
			$this->aObjective = null;
			$this->aPrompt = null;
			$this->aLevel = null;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseEntryConcern:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseEntryConcern::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} // BaseEntryConcern