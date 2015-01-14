<?php
$f3=require('lib/base.php');
$f3->set('UI','templates/');
$f3->route('GET /',function($f3){
  echo 'Hello World!';
});
$f3->run();
?>