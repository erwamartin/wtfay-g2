<?php

$f3=require('lib/base.php');
$f3->set('UI','templates/');
$f3->set('dB',new DB\SQL('mysql:host=127.0.0.1;port=3306;dbname=wtfay','root',''));

$f3->route('GET /',function(){
  echo View::instance()->render('main.html');
});

$f3->route('GET /users/@alpha',function($f3){
  //print_r($f3->get('dB')->exec('select * from wifiloc where firstname like "'.$f3->get('PARAMS.alpha').'%"'));
  $users=new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
  $f3->set('users',$users->find('firstname like "'.$f3->get('PARAMS.alpha').'%"'));
  if($f3->get('AJAX')){
    echo View::instance()->render('partials/users.html');
  }
  else{
    echo View::instance()->render('main.html');
  }
  
});


$f3->route('GET /user/@userId',function($f3){
  $user=new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
  $f3->set('user',$user->load('userId="'.$f3->get('PARAMS.userId').'"'));
  if($f3->get('AJAX')){
    echo View::instance()->render('partials/user.html');
  }
  else{
    echo View::instance()->render('main.html');
  }
});











$f3->run();
?>