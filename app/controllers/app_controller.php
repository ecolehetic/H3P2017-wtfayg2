<?php

namespace APP\CONTROLLERS;

class app_controller{
  
  private $tpl;
  private $model;
  
  function __construct(){
    $this->tpl=array(
      'sync'=>'main.html',
      'async'=>''
    );
    $this->model=new \APP\MODELS\app_model();
  }
  
  function home($f3){
   
  }
  
  function getUsers($f3,$params){
    $f3->set('data',$this->model->getUsers($params));
    $this->tpl['async']='partials/users.html';
  }
  
  function  getUser($f3,$params){
    $f3->set('one',$this->model->getUser($params));
  }
  
  function search($f3){
    $f3->set('data',$this->model->search($f3->get('POST.name')));
    $this->tpl['async']='partials/users.html';
    //echo $this->model->log();
  }
  
  function afterroute($f3){
    $tpl=$f3->get('AJAX')?$this->tpl['async']:$this->tpl['sync'];
    echo \View::instance()->render($tpl);
    
    /*if($f3->get('AJAX')){
      echo \View::instance()->render($this->tpl['async']);
    }else{
      echo \View::instance()->render($this->tpl['sync']);
    }*/
    
  }
  
  
  
  
  
}

?>