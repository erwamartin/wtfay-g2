<?php

$f3 = require('lib/base.php');
$f3->set('UI','templates/');
$f3->set('dB', new DB\SQL('mysql:host=127.0.0.1;port=3306;dbname=wtfay','root',''));


$f3->route('GET /', function($f3,$params){
	
	echo View::instance()->render('main.html');
});

$f3->route('GET /users/@name', function($f3,$params){

	//$f3->get('dB')->exec('SELECT * FROM wifiloc where firstname LIKE "'.$f3->get('PARAMS.name').'%"');

	$users = new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
	$f3->set('users', $users->find('firstname like "'.$f3->get('PARAMS.name').'%"'));

	echo View::instance()->render(($f3->get('AJAX'))?'partials/users.html':'main.html');
});

$f3->route('GET /user/@name', function($f3,$params){

	$user = new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
	$f3->set('user', $user->load('userId = "'.$f3->get('PARAMS.name').'"'));

	echo View::instance()->render(($f3->get('AJAX'))?'partials/user.html':'main.html');
});

$f3->run();

?>