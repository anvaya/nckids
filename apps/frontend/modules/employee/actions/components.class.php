<?php

class employeeComponents extends sfComponents
{
  public function executeSidebar(sfWebRequest $request)
  {
  }
  public function executeSidebarEdit(sfWebRequest $request)
  {
  	$this->employee = EmployeePeer::retrieveByPk($request->getParameter('id'));
  }
  
  
  
  public function executeEditbarEdit(sfWebRequest $request)
  {
  	$this->employee_id = $request->getParameter('id', 1);
  }
  public function executeEditbarNew(sfWebRequest $request)
  {
  }
}
