<?php 

final class troubleshoot extends database\model


 foreach ($_POST as $key => $value) {
  echo '<p>'.$key.'</p>';
  foreach($value as $k => $v)
  {
  echo '<p>'.$k.'</p>';
  echo '<p>'.$v.'</p>';
  echo '<hr />';
  }

} 

 ?>