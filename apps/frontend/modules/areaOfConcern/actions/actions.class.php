<?php

/**
 * areaOfConcern actions.
 *
 * @package    nckids
 * @subpackage areaOfConcern
 * @author     Your name here
 */
class areaOfConcernActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->area_of_concern_list = AreaOfConcernPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AreaOfConcernForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new AreaOfConcernForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($area_of_concern = AreaOfConcernPeer::retrieveByPk($request->getParameter('id')), sprintf('Object area_of_concern does not exist (%s).', $request->getParameter('id')));
    $this->form = new AreaOfConcernForm($area_of_concern);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($area_of_concern = AreaOfConcernPeer::retrieveByPk($request->getParameter('id')), sprintf('Object area_of_concern does not exist (%s).', $request->getParameter('id')));
    $this->form = new AreaOfConcernForm($area_of_concern);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($area_of_concern = AreaOfConcernPeer::retrieveByPk($request->getParameter('id')), sprintf('Object area_of_concern does not exist (%s).', $request->getParameter('id')));
    $area_of_concern->delete();

    $this->redirect('areaOfConcern/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $area_of_concern = $form->save();

      $this->redirect('areaOfConcern/edit?id='.$area_of_concern->getId());
    }
  }


  public function executeAddObjectiveForm(sfWebRequest $request)
  {
    $this->forward404unless($request->isXmlHttpRequest());
    $number = intval($request->getParameter("num"));

    if($aoc = AreaOfConcernPeer::retrieveByPk($request->getParameter('id'))){
      $form = new AreaOfConcernForm($aoc);
    }else{
      $form = new AreaOfConcernForm(null);
    }

    $form->addObjective($number);

    return $this->renderPartial('AddObjective',array('form' => $form, 'num' => $number));
  }
}
