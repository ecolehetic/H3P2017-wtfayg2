<?php

namespace APP\CONTROLLERS;

class app_controller{
  
  private $tpl;
  private $model;
  private $dataset;
  
  function __construct(){
    $this->model=new \APP\MODELS\app_model();
    new \DB\SQL\Session($this->model->dB,'sess_handler',true);
    $f3=\Base::instance();
    if($f3->get('PATTERN')!='/signin'&&!$f3->get('SESSION.id')){
      $f3->reroute('/signin');
    }
    
    $this->tpl=array(
      'sync'=>'main.html',
      'async'=>''
    );
    
    
  }
  
  function home($f3){
   
  }
  
  function getUsers($f3,$params){
    $this->dataset=$this->model->getUsers($params);
    $f3->set('data',$this->dataset);
    $this->tpl['async']='partials/users.html';
  }
  
  function  getUser($f3,$params){
    $this->dataset=$this->model->getUser($params);
    $f3->set('one',$this->dataset);
  }
  
  function search($f3){
    $f3->set('data',$this->model->search($f3->get('POST.name')));
    $this->tpl['async']='partials/users.html';
    //echo $this->model->log();
  }
  
  public function upload($f3){
    \Web::instance()->receive(function($file){},true,false);
  }
  
  public function request($f3){
    $options=array(
      'header' => array(
        'Authorization: token c05569a93130fe8a817455c703d109218eccc1c5'
      )
    );
    $response=\Web::instance()->request('https://api.github.com/repos/fpumir/wtfay/issues',$options);
    print_r(json_decode($response['body']));
    exit;
  }
  
  public function signin($f3){
    $this->tpl['sync']='signin.html';
    if($f3->get('VERB')=='POST'){
      $auth=$this->model->signin($f3->get('POST'));
      if($auth){
        $user=array(
          'id'=>$auth->id,
          'firstname'=>$auth->firstname,
          'lastname'=>$auth->lastname
        );
        $f3->set('SESSION',$user);
        $f3->reroute('/');
      }
      else{
        $f3->set('error','Vous n\'avez pas les credentials nécessaires.');
      }
      
    }
  }
  
  public function signout($f3){
    $f3->clear('SESSION');
    $f3->reroute('/signin');
  }
  
  
  function afterroute($f3){
    if(isset($_GET['format'])&&$_GET['format']=='json'){
      if(is_array($this->dataset)){
        $this->dataset=array_map(function($data){return $data->cast();},$this->dataset);
      }elseif(is_object($this->dataset)){
        $this->dataset=$this->dataset->cast();
      }else{
        $this->dataset=array('error'=>'no dataset');
      }
      
      if(isset($_GET['callback'])){
        header('Content-Type: application/javascript');
        echo $_GET['callback'].'('.json_encode($this->dataset).')';
      }else{
        header('Content-Type: application/json');
        echo json_encode($this->dataset);
      }
    }
    else{
      $tpl=$f3->get('AJAX')?$this->tpl['async']:$this->tpl['sync'];
      echo \View::instance()->render($tpl);
    }
  }
  
  
  
  
  
}

?>