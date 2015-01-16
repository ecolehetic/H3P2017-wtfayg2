<?php
$f3=require('lib/base.php');
$f3->set('DEBUG',2);
$f3->set('UI','templates/');

$f3->route('GET /',function($f3){
  // $view=new View();
  //   echo $view->render('main.html');
  echo View::instance()->render('main.html');
});

$f3->route('GET /users/@promo',function($f3,$params){
  $data=array(
    'h1'=>array(
      array('firstname'=>'Jean Claude','lastname'=>'Dus','id'=>1),
      array('firstname'=>'Jean Michel','lastname'=>'Seize','id'=>2),
      array('firstname'=>'Francois','lastname'=>'Pumir','id'=>3)
    ),
    'h2'=>array(
      array('firstname'=>'Marie','lastname'=>'Dus','id'=>4),
      array('firstname'=>'Frédéric','lastname'=>'Seize','id'=>5),
      array('firstname'=>'Marc','lastname'=>'Pumir','id'=>6)
    ),
    'h3'=>array(
      array('firstname'=>'Michelle','lastname'=>'Mabelle','id'=>7),
      array('firstname'=>'Jean-Christophe','lastname'=>'Beaux','id'=>8),
      array('firstname'=>'Elodie','lastname'=>'Simon','id'=>9)
    )
  );
  if(is_array($data[$params['promo']])){
    $f3->set('data',$data[$params['promo']]);
  }
  echo View::instance()->render('main.html');
  
});













$f3->run();
?>