<?php
function antispam_email_tag($emailaddress, $content=null, $options = array())
  {
    $options = _parse_attributes($options);
    $options['href'] = 'mailto:'.$emailaddress;
    if($content===null) $content=$emailaddress; 
    return antispam_js_encrypt(content_tag('a',$content,$options),rand(-8,5));
  }
 
function antispam_js_encrypt($content,$chr_adjust=-1)
  {
    $encoded_content='';
    for ($n = 0; $n < strlen($content); $n++)
    {
      $encoded_content .= dechex(ord(substr($content,$n,1))+ $chr_adjust) ; // + $chr_adjust
    }
 
    $rdm_function_name = '';
    while(strlen($rdm_function_name)<8)
    {
      $tmp = rand ( 65, 122);
      if($tmp > 96 || $tmp < 91 ) $rdm_function_name .= chr($tmp);
    }
 
    $js_function='function '.$rdm_function_name."(e) { for (i = 0; i <= e.length; i+=2) { document.write(String.fromCharCode((parseInt((('0x') + e.substring(i,i+2)),16)) - (".$chr_adjust.")));}}";
 
    return "<script type=\"text/javascript\">".$js_function."\n".$rdm_function_name."('" .$encoded_content. "');</script>";
  }
 
function antispam_auto_link_email_addresses($text)
  {
    $found=true; $offset=0;
    while($found)
    {
        $found=preg_match('/[\w\.!#\$%\-+.]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/',$text,$matches, PREG_OFFSET_CAPTURE,$offset);
      if ($found)
      {
        $antispam_email_link=antispam_email_tag($matches[0][0]);
        $text=substr_replace ($text,$antispam_email_link,$matches[0][1],strlen($matches[0][0]));
        $offset=$matches[0][1]+strlen($antispam_email_link);
      }
    }
    return $text;
  }

function antispam_email_in_html($html)
  {
  $regex = '#<([aA])(\s)*(href|HREF)(\s)*=(\s)*[\"|\'](mailto:|MAILTO:)(.*?)[\"|\'](.*?)>(.*?)</\1>#is'; 
 
    $found=true; $offset=0;
    while($found)
    {
      $found=preg_match($regex,$html,$matches, PREG_OFFSET_CAPTURE,$offset);
      if ($found)
      {
        $antispam_email_link=antispam_email_tag($matches[7][0],$matches[9][0]);
        $html=substr_replace ($html,$antispam_email_link,$matches[0][1],strlen($matches[0][0]));
        $offset=$matches[0][1]+strlen($antispam_email_link);
      }
    }
    return $html;
  }
 
?>
