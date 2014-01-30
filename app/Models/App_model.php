<?php
class App_model extends Model{
  
private $mapper;
  
 function __construct(){
   parent::__construct();
   $this->mapper=$this->getMapper('wifiloc');
 } 
 
 function home(){
  
 }

 function getUsers($params){
   return $this->mapper->find(array('promo=?',$params['promo']),array('order'=>'lastname'));
 }
 
 function getUser($params){
   return $this->mapper->load(array('userId=?',$params['userId']));
 }
 
 function searchUsers($params){
   return $this->mapper->find('firstname like "%'.$params['keywords'].'%" or lastname  like "%'.$params['keywords'].'%"');
 }
  
  
  
  
  
  
  
  
}
?>