<?php

class importTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'frontend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      new sfCommandOption('source', null, sfCommandOption::PARAMETER_REQUIRED, 'The import source connection name', 'import'),
      // add your own options here
    ));

    $this->namespace        = '';
    $this->name             = 'import';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [import|INFO] task does things.
Call it with:

  [php symfony import|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();
    
    // create connection to import database
    $this->logSection('connection', 'creating connection to import source');
    $source = Propel::getConnection($options['source'] ? $options['source'] : null);
    
    
    // create static counties and offices    
    $this->logSection('static', 'creating static counties and offices');
    $connection->beginTransaction();
		try {
			OfficePeer::doDeleteAll($connection);
      $o1 = new Office();
      $o1->setName('Plattsburgh');
      $o1->save($connection);
      $o1 = new Office();
      $o1->setName('Rouses Point');
      $o1->save($connection);

      CountyPeer::doDeleteAll($connection);
      $c1 = new County();
      $c1->setName('Clinton');
      $c1->save($connection);
      $c1 = new County();
      $c1->setName('Essex');
      $c1->save($connection);
      
		  $connection->commit();
		} catch (PropelException $e) {
		  $connection->rollBack();
		  throw $e;
		}
		
    // read in and create objects for district, frequency, icd9, job, services tables
    // DISTRICT
		$query = 'SELECT * FROM %s';
		$query = sprintf($query, 'tbl_district');
		$statement = $source->prepare($query);
		$statement->execute();
		$districts = $statement->fetchAll();
		$connection->beginTransaction();
    try {
    	DistrictPeer::doDeleteAll($connection);
			foreach($districts as $district){
			  $this->logSection('district', 'creating district '. $district['district_name']);
	      $d1 = new District();
	      $d1->setName($district['district_name']);
	      $d1->save($connection);
			}
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }

		// FREQUENCY
    $query = 'SELECT * FROM %s';
    $query = sprintf($query, 'tbl_frequency');
    $statement = $source->prepare($query);
    $statement->execute();
    $frequencies = $statement->fetchAll();
    $connection->beginTransaction();
    try {
      FrequencyPeer::doDeleteAll($connection);
	    foreach($frequencies as $freq){
	      $this->logSection('freq', 'reading frequency '. $freq['freq_title']);
	      $f1 = new Frequency();
        $f1->setName($freq['freq_title']);
        $f1->setDescription($freq['freq_description']);
        $f1->save($connection);
      }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }
    
    // ICD9
    $query = 'SELECT * FROM %s';
    $query = sprintf($query, 'tbl_icd9');
    $statement = $source->prepare($query);
    $statement->execute();
    $icd9s = $statement->fetchAll();
    $connection->beginTransaction();
    try {
      Icd9Peer::doDeleteAll($connection);
	    foreach($icd9s as $icd9){
	      $this->logSection('icd9', 'reading icd9 '. $icd9['icd9_value']);
	      $i1 = new Icd9();
        $i1->setName($icd9['icd9_value']);
        $i1->save($connection);
      }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }
    
    // JOB
    $query = 'SELECT * FROM %s';
    $query = sprintf($query, 'tbl_job');
    $statement = $source->prepare($query);
    $statement->execute();
    $jobs = $statement->fetchAll();
    $connection->beginTransaction();
    try {
      JobPeer::doDeleteAll($connection);
	    foreach($jobs as $job){
	      $this->logSection('job', 'reading job '. $job['job_title']);
	      $j1 = new Job();
        $j1->setName($job['job_title']);
        $j1->save($connection);
      }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }
    
    // SERVICES
    $query = 'SELECT * FROM %s';
    $query = sprintf($query, 'tbl_services');
    $statement = $source->prepare($query);
    $statement->execute();
    $services = $statement->fetchAll();
    $connection->beginTransaction();
    try {
      ServicePeer::doDeleteAll($connection);
	    foreach($services as $service){
	      $this->logSection('service', 'reading service '. $service['service_title']);
	      $s1 = new Service();
        $s1->setName($service['service_title']);
        $s1->save($connection);
      }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }
    
  
    // EMPLOYEES
    $query = 'SELECT * FROM %s LEFT JOIN (%s) ON (%s.emp_job_title = %s.job_id)';
    $query = sprintf($query, 'tbl_employee', 'tbl_job', 'tbl_employee', 'tbl_job');
    $statement = $source->prepare($query);
    $statement->execute();
    $employees = $statement->fetchAll();
    $connection->beginTransaction();
    try {
      EmployeePeer::doDeleteAll($connection);
	    foreach($employees as $employee){
	      $this->logSection('employee', 'reading employee '. $employee['emp_id']);
	      $emp = new Employee();
	      $emp_fields = array(
													'clearance' => $employee['emp_scr_clearance'],
													'first_name' => $employee['emp_fn'],
													'middle' => $employee['emp_mi'],
													'last_name' => $employee['emp_ln'],
													'address' => $employee['emp_address'],
													'address_2' => $employee['emp_address2'],
													'city' => $employee['emp_city'],
													'state' => $employee['emp_state'],
													'zip' => $employee['emp_zip'],
													'home_phone' => $employee['emp_phone'],
													'cell_phone' => $employee['emp_cell'],
													'company_email' => $employee['emp_email'],
													'personal_email' => $employee['emp_p_email'],
													'license_number' => $employee['emp_license_number'],
													'license_expiration' => $employee['emp_license_exp'],
													'dob' => $employee['emp_dob'],
													'doh' => $employee['emp_hire_date'],
													'dof' => $employee['emp_end_date'],
													'ssn' => $employee['emp_ssn'],
													'health_insurance' => $employee['emp_health'],
													'retirement_plan' => $employee['emp_401k'],
													'suplimental_health' => $employee['emp_health_sup'],
													'health_type' => $employee['emp_health_type'],
													'tb_date' => $employee['emp_tb'],
													'osha_date' => $employee['emp_osha'],
													'cpr_date' => $employee['emp_cpr'],
													'finger_prints' => $employee['emp_fp'],
													'finger_print_notes' => $employee['emp_fp_n'],
													'notes' => $employee['emp_notes']
                       );
	      $emp->fromArray($emp_fields, BasePeer::TYPE_FIELDNAME);
	      
	      // find the job - check for errors
	      $emp->setJob(JobPeer::getByName($employee['job_title']));
	      
	      // if physical has a date then create a new physical object for employee
	      if($employee['emp_physical']){
	        $this->logSection('physical', 'employee '. $employee['emp_fn'] .' had a physical on '. $employee['emp_physical']);
	        $ph1 = new Physical();
	        $ph1->setEmployee($emp);
	        $ph1->setDateGiven($employee['emp_physical']);
	        $ph1->save($connection);
	      }
	      $emp->save($connection);
	    }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }

    
    // read in and create client objects - linking to employee 
    // CLIENTS
    $query = 'SELECT * FROM %s LEFT JOIN (%s) ON (%s.client_district = %s.district_id)';
    $query = sprintf($query, 'tbl_client', 'tbl_district', 'tbl_client', 'tbl_district');
    $statement = $source->prepare($query);
    $statement->execute();
    $clients = $statement->fetchAll();
    $connection->beginTransaction();
    try {
      ClientPeer::doDeleteAll($connection);
	    foreach($clients as $client){
	      $this->logSection('client', 'reading client '. $client['client_ln']);
	      $cl = new Client();
	      $client_fields = array(
															'first_name' => $client['client_fn'],
															'last_name' => $client['client_ln'],
															'dob' => $client['client_dob'],
															'parent_first' => $client['client_parent_fn'],
															'parent_last' => $client['client_parent_ln'],
															'address' => $client['client_address'],
															'address_2' => $client['client_address2'],
															'city' => $client['client_city'],
															'state' => $client['client_state'],
															'zip' => $client['client_zip'],
															'home_phone' => $client['home_phone'],
															'work_phone' => $client['work_phone'],
															'cell_phone' => $client['cell_phone'],
															'blue_card' => $client['blue_card'],
															'physical_exp' => $client['physical_exp_date'],
															'immunizations' => $client['immunizations'],
															'waiting_list' => $client['waiting_list']
	                       );
	      // county 
	      $cl->setCounty(CountyPeer::getByName($client['client_county']));
	      
        // district
        $cl->setDistrict(DistrictPeer::getByName($client['district_name']));
        
        $cl->fromArray($client_fields, BasePeer::TYPE_FIELDNAME);
        $cl->save($connection);
	    }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }
    
    
    // CLIENT SERVICES
    // CLASSROOM
    $query = 'SELECT * FROM tbl_classroom LEFT JOIN (tbl_client) ON (tbl_classroom.class_client_id = tbl_client.client_id)
    LEFT JOIN (tbl_employee) ON (tbl_classroom.class_provider_id = tbl_employee.emp_id)
    LEFT JOIN (tbl_services) ON (tbl_classroom.class_service_id = tbl_services.service_id)
    LEFT JOIN (tbl_frequency) ON (tbl_classroom.class_freq_id = tbl_frequency.freq_id)';
    $statement = $source->prepare($query);
    $statement->execute();
    $classrooms = $statement->fetchAll();
    $connection->beginTransaction();
    $c = new Criteria();
    $c->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_CLASSROOM);
    try {
      ClientServicePeer::doDelete($c, $connection);
	    foreach($classrooms as $classroom){
	      $this->logSection('classroom', 'reading service '. $classroom['class_id']);
	      $cr_cl = new Classroom();
	      $cr_cl->setStartDate($classroom['class_start_date']);
	      $cr_cl->setEndDate($classroom['class_exp_date']);
	      $cr_cl->setChangeDate($classroom['class_chng_date']);
	      $cr_cl->setNotes($classroom['class_notes']);
	      
	      // client
	      $cr_cl->setClient(ClientPeer::getByFullName($classroom['client_fn'], $classroom['client_ln']));
	      // employee
	      $cr_cl->setEmployee(EmployeePeer::getByFullName($classroom['emp_fn'], $classroom['emp_ln']));
	      // service
	      $cr_cl->setService(ServicePeer::getByName($classroom['service_title']));
	      // frequency
	      $cr_cl->setFrequency(FrequencyPeer::getByName($classroom['freq_title']));
	      // office
	      $cr_cl->setOffice(OfficePeer::getByName($classroom['class_location']));
	      
	      $cr_cl->save($connection);
	    }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }
   
 
    // EI
    $query = 'SELECT * FROM tbl_ei LEFT JOIN (tbl_client) ON (tbl_ei.ei_client_id = tbl_client.client_id)
    LEFT JOIN (tbl_employee) ON (tbl_ei.ei_provider_id = tbl_employee.emp_id)
    LEFT JOIN (tbl_services) ON (tbl_ei.ei_service_id = tbl_services.service_id)
    LEFT JOIN (tbl_frequency) ON (tbl_ei.ei_freq_id = tbl_frequency.freq_id)
    LEFT JOIN (tbl_icd9) ON (tbl_ei.ei_icd9_id = tbl_icd9.icd9_id)';
    $statement = $source->prepare($query);
    $statement->execute();
    $eis = $statement->fetchAll();
    $connection->beginTransaction();
    $c = new Criteria();
    $c->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_EI);
    try {
      ClientServicePeer::doDelete($c, $connection);
      foreach($eis as $ei){
        $this->logSection('ei', 'reading service '. $ei['ei_id']);
        $ei_cl = new Ei();
        $ei_cl->setStartDate($ei['ei_start_date']);
        $ei_cl->setEndDate($ei['ei_exp_date']);
        $ei_cl->setChangeDate($ei['ei_chng_date']);
        $ei_cl->setNotes($ei['ei_serv_notes']);
        $ei_cl->setAuthorization($ei['ei_auth']);
        $ei_cl->setPhysiciansOrder($ei['ei_p_order']);
        
        // client
        $ei_cl->setClient(ClientPeer::getByFullName($ei['client_fn'], $ei['client_ln']));
        // employee
        $ei_cl->setEmployee(EmployeePeer::getByFullName($ei['emp_fn'], $ei['emp_ln']));
        // service
        $ei_cl->setService(ServicePeer::getByName($ei['service_title']));
        // frequency
        $ei_cl->setFrequency(FrequencyPeer::getByName($ei['freq_title']));
        // office
        $ei_cl->setIcd9(Icd9Peer::getByName($ei['icd9_value']));
        
        $ei_cl->save($connection);
      }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }
 
    // PRESCHOOL
    $query = 'SELECT * FROM tbl_preschool LEFT JOIN (tbl_client) ON (tbl_preschool.pre_client_id = tbl_client.client_id)
    LEFT JOIN (tbl_employee) ON (tbl_preschool.pre_provider_id = tbl_employee.emp_id)
    LEFT JOIN (tbl_services) ON (tbl_preschool.pre_service_id = tbl_services.service_id)
    LEFT JOIN (tbl_frequency) ON (tbl_preschool.pre_freq_id = tbl_frequency.freq_id)';
    $statement = $source->prepare($query);
    $statement->execute();
    $preschools = $statement->fetchAll();
    $connection->beginTransaction();
    $c = new Criteria();
    $c->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_PRESCHOOL);
    try {
      ClientServicePeer::doDelete($c, $connection);
      foreach($preschools as $preschool){
        $this->logSection('preschool', 'reading service '. $preschool['pre_id']);
        $pr_cl = new Preschool();
        $pr_cl->setStartDate($preschool['pre_start_date']);
        $pr_cl->setEndDate($preschool['pre_exp_date']);
        $pr_cl->setChangeDate($preschool['pre_chng_date']);
        
        // client
        $pr_cl->setClient(ClientPeer::getByFullName($preschool['client_fn'], $preschool['client_ln']));
        // employee
        $pr_cl->setEmployee(EmployeePeer::getByFullName($preschool['emp_fn'], $preschool['emp_ln']));
        // service
        $pr_cl->setService(ServicePeer::getByName($preschool['service_title']));
        // frequency
        $pr_cl->setFrequency(FrequencyPeer::getByName($preschool['freq_title']));
        
        $pr_cl->save($connection);
      }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }
    
    // SEIT
    $query = 'SELECT * FROM tbl_seit LEFT JOIN (tbl_client) ON (tbl_seit.seit_client_id = tbl_client.client_id)
    LEFT JOIN (tbl_employee) ON (tbl_seit.seit_provider_id = tbl_employee.emp_id)
    LEFT JOIN (tbl_services) ON (tbl_seit.seit_service_id = tbl_services.service_id)
    LEFT JOIN (tbl_frequency) ON (tbl_seit.seit_freq_id = tbl_frequency.freq_id)';
    $statement = $source->prepare($query);
    $statement->execute();
    $seits = $statement->fetchAll();
    $connection->beginTransaction();
    $c = new Criteria();
    $c->add(ClientServicePeer::OBJECT_TYPE, ClientServicePeer::CLASSKEY_SEIT);
    try {
      ClientServicePeer::doDelete($c, $connection);
      foreach($seits as $seit){
        $this->logSection('seit', 'reading service '. $seit['seit_id']);
        $seit_cl = new Seit();
        $seit_cl->setStartDate($seit['seit_start_date']);
        $seit_cl->setEndDate($seit['seit_exp_date']);
        $seit_cl->setChangeDate($seit['seit_chng_date']);
        $seit_cl->setNotes($seit['seit_notes']);
        
        // client
        $seit_cl->setClient(ClientPeer::getByFullName($seit['client_fn'], $seit['client_ln']));
        // employee
        $seit_cl->setEmployee(EmployeePeer::getByFullName($seit['emp_fn'], $seit['emp_ln']));
        // service
        $seit_cl->setService(ServicePeer::getByName($seit['service_title']));
        // frequency
        $seit_cl->setFrequency(FrequencyPeer::getByName($seit['freq_title']));
        
        $seit_cl->save($connection);
      }
      $connection->commit();
    } catch (PropelException $e) {
      $connection->rollBack();
      throw $e;
    }

  }
}
