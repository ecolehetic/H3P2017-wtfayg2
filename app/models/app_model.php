<?php

class app_model{
  
  private $dB;
  
  function __construct(){
    $this->dB=new DB\SQL('mysql:host=127.0.0.1;port=3306;dbname=wtfay','root','');
  }
  
  function getUsers($params){
    return $this->getMapper('wifiloc')->find(array('promo=?',$params['promo']));
  }
  
  function getUser($params){
    return $this->getMapper('wifiloc')->load(array('id=?',$params['id']));
  }
  
  private function getMapper($table){
    return new DB\SQL\Mapper($this->dB,$table);
  }
  
  
  
  
  
  
  
}


?>