<?php
    

           
    $c = navbarfunctions::getCredentialCriteria($credArray, $credRoles);
    $c->addAscendingOrderByColumn(sfBreadNavPeer::TREE_LEFT);
    $c->add(sfBreadNavApplicationPeer::NAME, $menu);
    $c->addJoin(sfBreadNavPeer::SCOPE, sfBreadNavApplicationPeer::ID);
    $pages = sfBreadNavPeer::doSelect($c);
    $pages = navbarfunctions::compressNavArray($pages);
    
    $outputArray = array();
    $root= sfBreadNavPeer::getMenuRoot($menu);
    //return if no root
    if(!$root) {return;}    
    $newlevel = true;
    
    echo '<ul id="navmenu">';
    if (in_array($root->getCredential(),(array) $credArray)) {
      echo "<li>". navbardisplayfunctions::link_to_valid( $root->getPage(), $root->getModule(), $root->getAction(), array('class' => 'first top'))  ."</li>\n";
    }  
   
    $nexttop = 0;
         
    for ($i=0; $i< count($pages) ; $i++ ) {  
      
      if ($i==$nexttop) {
         $havechildren = navbarfunctions::testforchildren($pages,$i);
         $nexttop = ($pages[$i]['tree_right'] + 1) / 2 - 1; 
         
         if ($havechildren){
           $open = '<li><a href="' . navbardisplayfunctions::url_for_valid(navbarfunctions::pageroute($pages[$i]['module'],$pages[$i]['action'])) . '">' . $pages[$i]['page'] .'</a><ul>';
           $close = '</ul></li>';
         }else{
           $open = '<li><a href="' . navbardisplayfunctions::url_for_valid(navbarfunctions::pageroute($pages[$i]['module'],$pages[$i]['action'])) . '">' . $pages[$i]['page'] .'</a>';
           $close = '</li>';
         }
      
      //no children   
      }elseif ($pages[$i]['tree_right'] - $pages[$i]['tree_left'] == 1) {                 
           $open = '<li><a href="' . navbardisplayfunctions::url_for_valid(navbarfunctions::pageroute($pages[$i]['module'],$pages[$i]['action'])) . '">' . $pages[$i]['page'] . '</a>';
           $close = '</li>';         
      //has children                 
      }else{
    
          $open = '<li><a href=' . navbardisplayfunctions::url_for_valid(navbarfunctions::pageroute($pages[$i]['module'],$pages[$i]['action'])) . '">'  . $pages[$i]['page'] .'</a><ul>';
          $close =  '</ul></li>';
                 
      }
       
      $outputArray[$pages[$i]['tree_left']]  = $open;
      $outputArray[$pages[$i]['tree_right']] = $close;                      
    }
      
    //perform output    
    $size = count($outputArray);
    ksort($outputArray);
        
    foreach ($outputArray as $output) {
      echo $output;
    }    
    echo '</ul>';
