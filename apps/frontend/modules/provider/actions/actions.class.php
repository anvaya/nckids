<?php

/**
 * provider actions.
 *
 * @package    nckids
 * @subpackage provider
 * @author     Your name here
 */
class providerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->employee_list = EmployeePeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EmployeeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new EmployeeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($employee = EmployeePeer::retrieveByPk($request->getParameter('id')), sprintf('Object employee does not exist (%s).', $request->getParameter('id')));
    $this->form = new EmployeeForm($employee);
    $this->employee = $employee;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($employee = EmployeePeer::retrieveByPk($request->getParameter('id')), sprintf('Object employee does not exist (%s).', $request->getParameter('id')));
    $this->form = new EmployeeForm($employee);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($employee = EmployeePeer::retrieveByPk($request->getParameter('id')), sprintf('Object employee does not exist (%s).', $request->getParameter('id')));
    $employee->delete();

    $this->redirect('provider/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $employee = $form->save();

      $this->redirect('provider/edit?id='.$employee->getId());
    }
  }


  public function executePrintBadge(sfWebRequest $request){
    $this->employee = EmployeePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->employee);

    // initiate FPDI
    $pdf = new FPDI('P', 'pt');

    // set the sourcefile
    $pdf->setSourceFile(sfConfig::get('sf_upload_dir').'/badges/ID_new.pdf');

    // import page 1
    $tplIdx = $pdf->importPage(1);

    // add a new page based on size of the badge
    $s = $pdf->getTemplatesize($tplIdx);
    $pdf->AddPage('P', array($s['w'], $s['h']));

    $pdf->useTemplate($tplIdx);
    $pdf->setMargins(0, 0, 0, 0);
    $pdf->SetAutoPageBreak(false);


    if($this->employee->getPicture())
      $pdf->Image(sfConfig::get('sf_upload_dir').'/'.sfConfig::get('app_employee_images_dir').'/'.$this->employee->getPicture(), 29.5, 25.5, 60.3, 74.3);
    else
      $pdf->Image(sfConfig::get('sf_upload_dir').'/badges/picture_missing.jpg', 29.5, 25.5, 60.3, 74.3);

    // now write some text above the imported page
    $pdf->SetFont('freesans', 'B', 12);
    $pdf->SetTextColor(82,78,134);
    $pdf->SetXY(22,110);
    $pdf->Cell(0, 12, $this->employee->getFullName());

    $pdf->Ln();
    $pdf->SetX(22);
    $pdf->SetFont('freesans', 'BI', 10);
    $pdf->Cell(0, 14, $this->employee->getJob());

    $pdf->SetDisplayMode('real');
    return $pdf->Output('newpdf.pdf', 'D');

  }
}
