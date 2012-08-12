<?php
/*
if (eregi("MSIE",getenv("HTTP_USER_AGENT")) ||
  eregi("Internet Explorer",getenv("HTTP_USER_AGENT"))) {
  Header("Location: /ie_reject.html");
  exit;
}


*/
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
