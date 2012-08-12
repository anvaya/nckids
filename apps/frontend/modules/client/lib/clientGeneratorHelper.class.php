<?php

/**
 * client module helper.
 *
 * @package    nckids
 * @subpackage client
 * @author     Your name here
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class clientGeneratorHelper extends BaseClientGeneratorHelper
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
