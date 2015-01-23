<?php

namespace APP\MODELS;

class app_model{
  
  private $dB;
  
  function __construct(){
    $f3=\Base::instance();
    $this->dB=new \DB\SQL('mysql:host='.$f3->get('db_host').';port='.$f3->get('db_port').';dbname='.$f3->get('db_name'),
    $f3->get('db_login'),$f3->get('db_password'));
  }
  
  public function getUsers($params){
    return $this->getMapper()->find(array('promo=?',$params['promo']));
  }
  
  public function getUser($params){
    return $this->getMapper()->load(array('id=?',$params['id']));
  }
  
  public function search($name){
    $query=array(
      'firstname LIKE :name1 or lastname LIKE :name2',
      ':name1'=>'%'.$name.'%',
      ':name2'=>'%'.$name.'%'
    );
    return $this->getMapper()->find($query,array('order'=>'lastname'));
  }
  
  private function getMapper($table='wifiloc'){
    return new \DB\SQL\Mapper($this->dB,$table);
  }
  
  public function log(){
    return $this->dB->log();
  }
  
  
  
  
  
  
  
}


?>