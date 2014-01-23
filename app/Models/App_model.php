<?php
	
	class App_model{

		function _construct(){

		}

		function home(){

		}

		function getUsers($f3, $params){
			$users = new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
			return $users->find('firstname like "'.$params['name'].'%"');
		}

		function getUser($f3, $params){
			$user = new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
			return $user->load('userId = "'.$params['name'].'"');
		}

		function searchUsers($f3, $params){
			$user = new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
			return $user->find('firstname LIKE "%'.$params['keywords'].'%" OR lastname LIKE "%'.$params['keywords'].'%"');
		}

	}
?>