<?php

/**
 * sfGuardUser module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage sfGuardUser
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 17109 2009-04-07 18:27:23Z Kris.Wallsmith $
 */
class sfGuardUserGeneratorHelper extends BaseSfGuardUserGeneratorHelper
{

  public function linkToEdit($object, $params)
  {
    return link_to(__($params['label'], array( ), 'sf_admin'), $this->getUrlForAction('edit'), $object, $params['params']);
  }

  public function linkToDelete($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }

    return link_to(__($params['label'], array( ), 'sf_admin'), $this->getUrlForAction('delete'), $object, array_merge($params['params'], array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])));
  }

}
