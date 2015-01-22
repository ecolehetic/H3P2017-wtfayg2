<?php
$f3=require('lib/base.php');
$f3->set('DEBUG',2);
$f3->set('UI','templates/');

$f3->route('GET /',function($f3){
  // $view=new View();
  // echo $view->render('main.html');
  echo View::instance()->render('main.html');
});

$f3->route('GET /users/@promo',function($f3,$params){
  $dB=new DB\SQL('mysql:host=127.0.0.1;port=3306;dbname=wtfay','root','');
  //$users=$dB->exec('SELECT * FROM wifiloc WHERE promo=?',array(1=>$params['promo']));
  $wifiloc=new DB\SQL\Mapper($dB,'wifiloc');
  $users=$wifiloc->find(array('promo=?',$params['promo']));
  //echo $dB->log();
  $f3->set('data',$users);
  echo View::instance()->render('main.html');
  
});













$f3->run();
?>