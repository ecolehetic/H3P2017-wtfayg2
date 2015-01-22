<?php

class app_controller{
  
  private $tpl;
  private $model;
  
  function __construct(){
    $this->tpl='main.html';
    $this->model=new app_model();
  }
  
  function home(){
  }
  
  function getUsers($f3,$params){
    $f3->set('data',$this->model->getUsers($params));
  }
  
  function  getUser($f3,$params){
    $f3->set('one',$this->model->getUser($params));
  }
  
  function afterroute(){
    echo View::instance()->render($this->tpl);
  }
  
  
  
  
  
}

?>