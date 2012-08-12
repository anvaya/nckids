<?php 
sfProjectConfiguration::getActive()->loadHelpers('Asset');

function employeePictureTag($employee){	
  return '<img alt="Headshot" style="float:left;padding:0 15px;" hspace="5" src="'._compute_public_path($employee->getPicture(), 'uploads/'.sfConfig::get('app_employee_images_dir', 'employee').'/', 'png').'" />';
}

function pagination($pager)
{
    $uri = sfContext::getInstance()->getRouting()->getCurrentInternalUri();
    $html = '';
 
    if ($pager->haveToPaginate())
    {
        $uri .= strstr($uri, '?') ? '&page=' : '?page=';
 
        if ($pager->getPage() != 1)
        {
            $html .= link_to('first', $uri . '1', array('class'=>'pagelink'));
            $html .= link_to('previous', $uri . $pager->getPreviousPage(), array('class'=>'pagelink'));
        }
 
        foreach ($pager->getLinks() as $page)
        {
            if ($page == $pager->getPage())
                $html .= link_to($page, $uri . $page, array('class'=>'pagelink'));
            else
                $html .= link_to($page, $uri . $page, array('class'=>'pagelink'));
        }
 
        if ($pager->getPage() != $pager->getLastPage())
        {
            $html .= link_to('next', $uri . $pager->getNextPage(), array('class'=>'pagelink'));
            $html .= link_to('last', $uri . $pager->getLastPage(), array('class'=>'pagelink'));
        }
 
        $html = '<!-- Pagination -->'.$html.'<!-- Pagination -->';
    }
 
    return $html;
}                   