<?php
$courseType = wp_get_post_terms(get_the_ID(), 'course_type');
if ($courseType[0]->name === 'offline') {
  include 'page-courses-offline-detail.php';
} else {
  include 'page-courses-online-detail.php';
}
