<?php
  /*
    Plugin Name: RCache By Ruk-Com
    Plugin URI: https://help.ruk-com.in.th/topic/7773/
    Description: High performance caching management.
    Version: 1.5.9
    Author: Ruk-Com Co.,Ltd
    Author URI: https://hostings.ruk-com.in.th/
  */
  // plugin update checker
  require('vendor/plugin-update-checker/plugin-update-checker.php');
  $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://gitlab.com/rukcom-software/rcache/',
    __FILE__,
    'rcache'
  );
  
  if ((float)phpversion() >= 7.0 && (float)phpversion() <= 7.1) {
    include_once("rukcom-cache-71.php");
  } elseif ((float)phpversion() >= 7.2) {
    include_once("rukcom-cache-72.php");
  } else {
    include_once("rukcom-cache-56.php");
  }
?>