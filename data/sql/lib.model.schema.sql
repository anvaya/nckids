
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`employee_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `sf_guard_user_profile_FI_1` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_user_profile_FI_2` (`employee_id`),
	CONSTRAINT `sf_guard_user_profile_FK_2`
		FOREIGN KEY (`employee_id`)
		REFERENCES `employee` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- frequency
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `frequency`;


CREATE TABLE `frequency`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`weekly_hours` FLOAT(10,2) default 0,
	`description` VARCHAR(255),
	`sort_order` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- district
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `district`;


CREATE TABLE `district`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- icd9
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `icd9`;


CREATE TABLE `icd9`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- service
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `service`;


CREATE TABLE `service`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- county
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `county`;


CREATE TABLE `county`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- job
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `job`;


CREATE TABLE `job`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`alt_name` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- office
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `office`;


CREATE TABLE `office`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- employee_location
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `employee_location`;


CREATE TABLE `employee_location`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- client
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `client`;


CREATE TABLE `client`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(255)  NOT NULL,
	`last_name` VARCHAR(255)  NOT NULL,
	`dob` DATETIME,
	`parent_first` VARCHAR(255),
	`parent_last` VARCHAR(255),
	`parent2_first` VARCHAR(255),
	`parent2_last` VARCHAR(255),
	`address` VARCHAR(255),
	`address_2` VARCHAR(255),
	`city` VARCHAR(255),
	`state` VARCHAR(255),
	`zip` VARCHAR(10),
	`county_id` INTEGER,
	`district_id` INTEGER,
	`home_phone` VARCHAR(255),
	`work_phone` VARCHAR(255),
	`cell_phone` VARCHAR(255),
	`blue_card` TINYINT default 0,
	`immunizations` TINYINT default 0,
	`waiting_list` DATETIME,
	`is_iep` TINYINT default 0,
	`physical_exp` DATETIME,
	`pediatrician` VARCHAR(255),
	`notes` TEXT,
	`service_coordinator_id` INTEGER,
	`external_service` TINYINT default 0,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `client_FI_1` (`county_id`),
	CONSTRAINT `client_FK_1`
		FOREIGN KEY (`county_id`)
		REFERENCES `county` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `client_FI_2` (`district_id`),
	CONSTRAINT `client_FK_2`
		FOREIGN KEY (`district_id`)
		REFERENCES `district` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `client_FI_3` (`service_coordinator_id`),
	CONSTRAINT `client_FK_3`
		FOREIGN KEY (`service_coordinator_id`)
		REFERENCES `service_coordinator` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- employee
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `employee`;


CREATE TABLE `employee`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(255)  NOT NULL,
	`last_name` VARCHAR(255)  NOT NULL,
	`middle` VARCHAR(255),
	`address` VARCHAR(255),
	`address_2` VARCHAR(255),
	`city` VARCHAR(255),
	`state` VARCHAR(255),
	`zip` VARCHAR(10),
	`county` VARCHAR(255),
	`home_phone` VARCHAR(255),
	`cell_phone` VARCHAR(255),
	`company_email` VARCHAR(255),
	`personal_email` VARCHAR(255),
	`license_number` VARCHAR(255),
	`license_expiration` DATETIME,
	`dob` DATETIME,
	`doh` DATETIME,
	`dof` DATETIME,
	`job_id` INTEGER,
	`ssn` VARCHAR(255),
	`health_insurance` TINYINT default 0,
	`retirement_plan` TINYINT default 0,
	`suplimental_health` TINYINT default 0,
	`supplemental_health_notes` VARCHAR(255),
	`health_type` VARCHAR(255),
	`physical_date` DATETIME,
	`physical_notes` VARCHAR(255),
	`tb_date` DATETIME,
	`tb_notes` VARCHAR(255),
	`osha_date` DATETIME,
	`cpr_date` DATETIME,
	`finger_prints` TINYINT default 0,
	`finger_print_notes` VARCHAR(255),
	`clearance` TINYINT default 0,
	`clearance_notes` VARCHAR(255),
	`picture` VARCHAR(255),
	`notes` TEXT,
	`npi` VARCHAR(255),
	`tc_type` VARCHAR(255),
	`tc_effective` DATETIME,
	`tc_number` VARCHAR(255),
	`tc_exp` DATETIME,
	`has_keys` TINYINT default 0,
	`keys_returned` DATETIME,
	`has_email` TINYINT default 0,
	`email_removed` DATETIME,
	`has_dist_list` TINYINT default 0,
	`dist_list_removed` DATETIME,
	`has_server_access` TINYINT default 0,
	`server_removed` DATETIME,
	`is_team_member` TINYINT default 0,
	PRIMARY KEY (`id`),
	INDEX `employee_FI_1` (`job_id`),
	CONSTRAINT `employee_FK_1`
		FOREIGN KEY (`job_id`)
		REFERENCES `job` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- employee_finger_to_location
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `employee_finger_to_location`;


CREATE TABLE `employee_finger_to_location`
(
	`employee_id` INTEGER  NOT NULL,
	`location_id` INTEGER  NOT NULL,
	PRIMARY KEY (`employee_id`,`location_id`),
	CONSTRAINT `employee_finger_to_location_FK_1`
		FOREIGN KEY (`employee_id`)
		REFERENCES `employee` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `employee_finger_to_location_FI_2` (`location_id`),
	CONSTRAINT `employee_finger_to_location_FK_2`
		FOREIGN KEY (`location_id`)
		REFERENCES `employee_location` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- employee_to_location
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `employee_to_location`;


CREATE TABLE `employee_to_location`
(
	`employee_id` INTEGER  NOT NULL,
	`location_id` INTEGER  NOT NULL,
	PRIMARY KEY (`employee_id`,`location_id`),
	CONSTRAINT `employee_to_location_FK_1`
		FOREIGN KEY (`employee_id`)
		REFERENCES `employee` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `employee_to_location_FI_2` (`location_id`),
	CONSTRAINT `employee_to_location_FK_2`
		FOREIGN KEY (`location_id`)
		REFERENCES `employee_location` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- physical
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `physical`;


CREATE TABLE `physical`
(
	`employee_id` INTEGER  NOT NULL,
	`date_given` DATETIME  NOT NULL,
	PRIMARY KEY (`employee_id`),
	CONSTRAINT `physical_FK_1`
		FOREIGN KEY (`employee_id`)
		REFERENCES `employee` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- client_service
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `client_service`;


CREATE TABLE `client_service`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`client_id` INTEGER,
	`employee_id` INTEGER,
	`service_id` INTEGER,
	`frequency_id` INTEGER,
	`start_date` DATETIME,
	`end_date` DATETIME,
	`change_date` DATETIME,
	`notes` TEXT,
	`icd9_id` INTEGER,
	`authorization` VARCHAR(255),
	`physicians_order` TINYINT default 0,
	`office_id` INTEGER,
	`waiting_list` TINYINT default 0,
	`object_type` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `client_service_FI_1` (`client_id`),
	CONSTRAINT `client_service_FK_1`
		FOREIGN KEY (`client_id`)
		REFERENCES `client` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `client_service_FI_2` (`employee_id`),
	CONSTRAINT `client_service_FK_2`
		FOREIGN KEY (`employee_id`)
		REFERENCES `employee` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `client_service_FI_3` (`service_id`),
	CONSTRAINT `client_service_FK_3`
		FOREIGN KEY (`service_id`)
		REFERENCES `service` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `client_service_FI_4` (`frequency_id`),
	CONSTRAINT `client_service_FK_4`
		FOREIGN KEY (`frequency_id`)
		REFERENCES `frequency` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `client_service_FI_5` (`icd9_id`),
	CONSTRAINT `client_service_FK_5`
		FOREIGN KEY (`icd9_id`)
		REFERENCES `icd9` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `client_service_FI_6` (`office_id`),
	CONSTRAINT `client_service_FK_6`
		FOREIGN KEY (`office_id`)
		REFERENCES `office` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- setting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `setting`;


CREATE TABLE `setting`
(
	`s_key` VARCHAR(255),
	`s_value` VARCHAR(255),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `setting_U_1` (`s_key`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- service_coordinator
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `service_coordinator`;


CREATE TABLE `service_coordinator`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`is_active` TINYINT default 1,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- area_of_concern
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `area_of_concern`;


CREATE TABLE `area_of_concern`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`job_id` INTEGER,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `area_of_concern_FI_1` (`job_id`),
	CONSTRAINT `area_of_concern_FK_1`
		FOREIGN KEY (`job_id`)
		REFERENCES `job` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- objective
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `objective`;


CREATE TABLE `objective`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`short_name` VARCHAR(255),
	`long_name` TEXT,
	`area_of_concern_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `objective_FI_1` (`area_of_concern_id`),
	CONSTRAINT `objective_FK_1`
		FOREIGN KEY (`area_of_concern_id`)
		REFERENCES `area_of_concern` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- prompt
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `prompt`;


CREATE TABLE `prompt`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`objective_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `prompt_FI_1` (`objective_id`),
	CONSTRAINT `prompt_FK_1`
		FOREIGN KEY (`objective_id`)
		REFERENCES `objective` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- level
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `level`;


CREATE TABLE `level`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- note_entry
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `note_entry`;


CREATE TABLE `note_entry`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`employee_id` INTEGER,
	`client_id` INTEGER,
	`client_service_id` INTEGER,
	`office_id` INTEGER,
	`frequency_id` INTEGER,
	`service_date` DATETIME,
	`time_in` DATETIME,
	`time_out` DATETIME,
	`cpt_code` VARCHAR(255),
	`units` VARCHAR(25),
	`absent` INTEGER default 0,
	`comments` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `note_entry_FI_1` (`employee_id`),
	CONSTRAINT `note_entry_FK_1`
		FOREIGN KEY (`employee_id`)
		REFERENCES `employee` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `note_entry_FI_2` (`client_id`),
	CONSTRAINT `note_entry_FK_2`
		FOREIGN KEY (`client_id`)
		REFERENCES `client` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `note_entry_FI_3` (`client_service_id`),
	CONSTRAINT `note_entry_FK_3`
		FOREIGN KEY (`client_service_id`)
		REFERENCES `client_service` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `note_entry_FI_4` (`office_id`),
	CONSTRAINT `note_entry_FK_4`
		FOREIGN KEY (`office_id`)
		REFERENCES `office` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `note_entry_FI_5` (`frequency_id`),
	CONSTRAINT `note_entry_FK_5`
		FOREIGN KEY (`frequency_id`)
		REFERENCES `frequency` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- note_entry_kids
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `note_entry_kids`;


CREATE TABLE `note_entry_kids`
(
	`note_entry_id` INTEGER  NOT NULL,
	`client_id` INTEGER  NOT NULL,
	PRIMARY KEY (`note_entry_id`,`client_id`),
	CONSTRAINT `note_entry_kids_FK_1`
		FOREIGN KEY (`note_entry_id`)
		REFERENCES `note_entry` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `note_entry_kids_FI_2` (`client_id`),
	CONSTRAINT `note_entry_kids_FK_2`
		FOREIGN KEY (`client_id`)
		REFERENCES `client` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- entry_concern
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `entry_concern`;


CREATE TABLE `entry_concern`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`note_entry_id` INTEGER  NOT NULL,
	`area_of_concern_id` INTEGER,
	`objective_id` INTEGER,
	`prompt_id` INTEGER,
	`level_id` INTEGER,
	`accuracy` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `entry_concern_FI_1` (`note_entry_id`),
	CONSTRAINT `entry_concern_FK_1`
		FOREIGN KEY (`note_entry_id`)
		REFERENCES `note_entry` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `entry_concern_FI_2` (`area_of_concern_id`),
	CONSTRAINT `entry_concern_FK_2`
		FOREIGN KEY (`area_of_concern_id`)
		REFERENCES `area_of_concern` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `entry_concern_FI_3` (`objective_id`),
	CONSTRAINT `entry_concern_FK_3`
		FOREIGN KEY (`objective_id`)
		REFERENCES `objective` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `entry_concern_FI_4` (`prompt_id`),
	CONSTRAINT `entry_concern_FK_4`
		FOREIGN KEY (`prompt_id`)
		REFERENCES `prompt` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `entry_concern_FI_5` (`level_id`),
	CONSTRAINT `entry_concern_FK_5`
		FOREIGN KEY (`level_id`)
		REFERENCES `level` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
