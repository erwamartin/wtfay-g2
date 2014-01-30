<?php
	
	class App_model extends Model{

		private $mapper;

		public function __construct(){
			parent::__construct();
			$this->mapper = $this->getMapper('wifiloc');
		}

		public function home(){

		}

		public function getUsers($params){
			return $this->mapper->find(array('promo=?',$params['promo']),array('order' => 'lastname'));
		}

		public function getUser($params){
			return  $this->mapper->load(array('userId=?',$params['name']));
		}

		public function searchUsers($params){
			return  $this->mapper->find('firstname LIKE "%'.$params['keywords'].'%" OR lastname LIKE "%'.$params['keywords'].'%"');
		}

	}
?>