<?php

require __DIR__ . '/../vendor/autoload.php';

$f3 = \Base::instance();

$f3->route('GET /', function () {
  $view=new View;
    echo $view->render('view/index.php');
});

$f3->route('GET /login', function () {
  $view=new View;
  echo $view->render('view/login.php');
});

$f3->route('GET /spy', function () {
  $view=new View;
  echo $view->render('view/spy.php');
});

$f3->route('GET /msft', function () {
  $view=new View;
  echo $view->render('view/msft.php');
});

$f3->route('GET /contest', function () {
  $view=new View;
  echo $view->render('view/contest.php');
});

$f3->route('POST /login-credentials', function () {
  $view=new View;
  echo $view->render('view/login-code.php');
});

$f3->route('GET /logout', function () {
  $view=new View;
  echo $view->render('view/logout.php');
});

$f3->route('GET /ticker/@name', 
function ($f3, $params) {
  $f3->set('data', 
    array('username' => $params['name'],
    'nums'=> array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10)) );
    $view=new View;
    echo $view->render('view/ticker.html');
});

$f3->run();
?>