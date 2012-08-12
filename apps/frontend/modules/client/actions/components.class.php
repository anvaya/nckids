<?php

class clientComponents extends sfComponents
{
  public function executeSidebar(sfWebRequest $request)
  {
  }
  public function executeSidebarEdit(sfWebRequest $request)
  {
  	$this->client = ClientPeer::retrieveByPk($request->getParameter('id'));
  }
  
  
  
  public function executeEditbarEdit(sfWebRequest $request)
  {
  	$this->client_id = $request->getParameter('id', 1);
  }
  public function executeEditbarNew(sfWebRequest $request)
  {
  }
}
