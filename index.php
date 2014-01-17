<?php

$f3 = require('lib/base.php');
$f3->set('UI','templates/');

$f3->route('GET /', function(){

});

/*$f3->route('GET /hello/@name', function($f3){
	echo $f3->get('PARAMS.name');
});*/


$f3->route('GET /', function($f3,$params){
	//$view=new View();
	//echo $view->render('templates/main.html');
	echo View::instance()->render('main.html');
});

$f3->route('GET /users/@name', function($f3,$params){

	$datas=array(
		'a'=>array(
			'Alain1',
			'Alain2'
		),
		'b'=>array(
			'Blain1',
			'Blain2'
		),
		'c'=>array(
			'Clain1',
			'Clain2'
		),
	);

	$name=$f3->get('PARAMS.name');
	if(isset($datas[$name]) && is_array($datas[$name])){
		$f3->set('users',$datas[$name]);
	}

	echo View::instance()->render('main.html');
});

$f3->run();

?>