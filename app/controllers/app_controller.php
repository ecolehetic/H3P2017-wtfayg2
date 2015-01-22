<?php

class app_controller{
  
  function __construct(){
    
  }
  
  function home(){
    echo View::instance()->render('main.html');
  }
  
  function getUsers($f3,$params){
    $model=new app_model();
    $users=$model->getUsers($params);
    $f3->set('data',$users);
    echo View::instance()->render('main.html');
  }
  
  function  getUser($f3,$params){
    $model=new app_model();
    $one=$model->getUser($params);
    $f3->set('one',$one);
    echo View::instance()->render('main.html');
  }
  
  
  
  
  
}

?>