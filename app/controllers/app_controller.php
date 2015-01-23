<?php

namespace APP\CONTROLLERS;

class app_controller{
  
  private $tpl;
  private $model;
  
  function __construct(){
    $this->tpl='main.html';
    $this->model=new \APP\MODELS\app_model();
  }
  
  function home($f3){
   
  }
  
  function getUsers($f3,$params){
    $f3->set('data',$this->model->getUsers($params));
  }
  
  function  getUser($f3,$params){
    $f3->set('one',$this->model->getUser($params));
  }
  
  function search($f3){
    $f3->set('data',$this->model->search($f3->get('POST.name')));
    //echo $this->model->log();
  }
  
  function afterroute(){
    echo \View::instance()->render($this->tpl);
  }
  
  
  
  
  
}

?>