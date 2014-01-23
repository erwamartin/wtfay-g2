<?php

	class App_controller{
		function _construct(){

		}

		function home(){
			echo View::instance()->render('main.html');
		}

		function getUsers($f3){
			$model = new App_model();
			$f3->set('users', $model->getUsers($f3, array('name'=>$f3->get('PARAMS.name'))));

			echo View::instance()->render(($f3->get('AJAX'))?'partials/users.html':'main.html');
		}

		function getUser($f3){

			$model = new App_model();
			$f3->set('user', $model->getUser($f3, array('name'=>$f3->get('PARAMS.name'))));

			echo View::instance()->render(($f3->get('AJAX'))?'partials/user.html':'main.html');
		}

		function searchUsers($f3){
			$model = new App_model();
			$f3->set('users', $model->searchUsers($f3, array('keywords' => $f3->get('POST.name'))));

			//echo $f3->get('dB')->log();
			echo View::instance()->render(($f3->get('AJAX'))?'partials/users.html':'main.html');
		}
	}

?>