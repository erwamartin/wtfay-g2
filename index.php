<?php

$f3=require('lib/base.php');
$f3->set('UI','templates/');

$f3->route('GET /',function(){
  //$view=new View();
  //echo $view->render('templates/main.html');
  echo View::instance()->render('main.html');
});

$f3->route('GET /users/@alpha',function($f3){
  
  $datas=array(
    'a'=>array(
      'alain dubois',
      'arnaud pumir',
      'albert einstein'
    ),
    'b'=>array(
      'benjamin niess',
      'benoit seize',
      'bibi fricotin'
    ),
    'c'=>array()
  );
  $alpha=$f3->get('PARAMS.alpha');
  if(isset($datas[$alpha])&&is_array($datas[$alpha])){
    $f3->set('users',$datas[$alpha]);
  }
  echo View::instance()->render('main.html');
});


$f3->run();
?>