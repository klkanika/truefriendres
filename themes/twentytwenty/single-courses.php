<?php
$courseType = wp_get_post_terms(get_the_ID(), 'course_type');
if(!empty($courseType)){
  if ($courseType[0]->name === 'offline') {
    include 'truefriend-courses-offline-detail.php';
  } else {
    include 'truefriend-courses-online-detail.php';
  }
}else {
  include 'truefriend-courses-online-detail.php';
}
