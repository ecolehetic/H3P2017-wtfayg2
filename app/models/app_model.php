<?php

class app_model{
  
  var $dB;
  
  function __construct(){
    $this->dB=new DB\SQL('mysql:host=127.0.0.1;port=3306;dbname=wtfay','root','');
  }
  
  function getUsers($params){
    $wifiloc=new DB\SQL\Mapper($this->dB,'wifiloc');
    return $wifiloc->find(array('promo=?',$params['promo']));
  }
  
  function getUser($params){
    $wifiloc=new DB\SQL\Mapper($this->dB,'wifiloc');
    return $wifiloc->load(array('id=?',$params['id']));
  }
  
  
  
  
  
  
  
}


?>