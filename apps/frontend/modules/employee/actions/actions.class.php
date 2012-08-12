<?php

require_once dirname(__FILE__).'/../lib/employeeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/employeeGeneratorHelper.class.php';

/**
 * employee actions.
 *
 * @package    nckids
 * @subpackage employee
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class employeeActions extends autoEmployeeActions
{
  public function preExecute(){
    $this->dispatcher->connect('admin.save_object', 'disableParanoid');
    return parent::preExecute();
  }
  public function executeEdit(sfWebRequest $request)
  {
    sfPropelParanoidBehavior::disable();
    return parent::executeEdit($request);
  }
  public function executeUpdate(sfWebRequest $request)
  {
    sfPropelParanoidBehavior::disable();
    $this->employee = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->employee);

    sfPropelParanoidBehavior::disable();
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  protected function disableParanoid(sfEvent $event, $result){
    sfPropelParanoidBehavior::disable();
    return true;
  }

  public function executeEmailExpirationNotice(sfWebRequest $request) {
    $notices = $request->getParameter('expired');
    $mail_count = 0;

    // prepare swift mailer
    require_once(sfConfig::get('sf_lib_dir').'/vendor/swift/swift_required.php'); # needed due to symfony autoloader
    $mailer = Swift_Mailer::newInstance(Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -t'));

    foreach($notices as $emp_id => $notices) {
      $employee = EmployeePeer::retrieveByPK($emp_id);
      if($employee) {
        foreach($notices as $notice => $expired) {
          // queue an email of type $notice with this $employee's info
          switch($notice) {
            case 'tb_date':
              $type = 'Tb';
              break;
            case 'physical_date':
              $type = 'Physical';
              break;
          }

          $mailBody = $this->getPartial('employee/emailExpired'.$type, array('name' => $employee->getFullname(), 'expiration' => $expired));

          $to_address = ($employee->getCompanyEmail()) ? $employee->getCompanyEmail() : $employee->getPersonalEmail();
          $message = Swift_Message::newInstance('Expired '.$type.' Notice')
                   ->setFrom(array('noreply@nckidsinc.com' => 'North Country Kids, Inc.'))
                   ->setTo(array($to_address, 'm.decker@nckidsinc.com'))
                   ->setBody($mailBody, 'text/html');

          // queue it up
          $mailer->send($message);

          $mail_count++;
        }
      }
    }

    return $this->renderText($mail_count. ' messages have been sent.');
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

  public function executeBatchPrintBadge(sfWebRequest $request){
    $ids = $request->getParameter('ids');

    // initiate FPDI
    $pdf = new FPDI('P', 'pt');
    // set the sourcefile
    $pdf->setSourceFile(sfConfig::get('sf_upload_dir').'/badges/ID_new.pdf');

    foreach($ids as $id){
      $this->employee = EmployeePeer::retrieveByPk($id);

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

    }
    return $pdf->Output('newpdf.pdf', 'D');


  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $employee = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $employee)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@employee_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'employee'));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

}
