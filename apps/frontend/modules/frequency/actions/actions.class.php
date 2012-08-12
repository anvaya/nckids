<?php

require_once dirname(__FILE__).'/../lib/frequencyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/frequencyGeneratorHelper.class.php';

/**
 * frequency actions.
 *
 * @package    nckids
 * @subpackage frequency
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class frequencyActions extends autoFrequencyActions
{

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $frequency = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $frequency)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@frequency_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'frequency'));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
