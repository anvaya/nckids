<?php

class entryComponents extends sfComponents
{
  public function executeSidebar(sfWebRequest $request)
  {
  }

  public function executeClientSidebar(sfWebRequest $request)
  {
    $this->client = ClientPeer::retrieveByPK($request->getParameter('id'));
  }

}
