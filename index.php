<?php 

define('BASE_DIR', __DIR__);
define('DS', DIRECTORY_SEPARATOR);
define('BASE_URL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


$сonfig = [
  'db'=>[
    'host'=>'localhost',
    'db'=>'ls2019_vp1',
    'username'=>'root',
    'password'=>'vertrigo'    
  ]
];
require_once(BASE_DIR.DS.'functions.php');
//require_once(BASE_DIR.DS.'MysqliDb.php');
require_once(BASE_DIR.DS.'models.php');

/*$dbObj = new MysqliDb(
  [
    'host' => $сonfig['db']['host'],
    'username' => $сonfig['db']['username'], 
    'password' => $сonfig['db']['password'],
    'db'=> $сonfig['db']['db']       
  ]
);*/

$dbObj = new PDO(
  'mysql:host=' . $сonfig['db']['host'] . ';dbname=' . $сonfig['db']['db'],  
  $сonfig['db']['username'],
  $сonfig['db']['password'],
  [
    PDO::ATTR_PERSISTENT => true
  ]  
);


if (isset($_POST) && count($_POST)) {
  require_once(BASE_DIR.DS.'process_form.php');
}

$layout = 'homepage.php';

require_once(BASE_DIR.DS.'router.php');

?>



<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная страница
    </title>
    <link rel="stylesheet" href="css/vendors.min.css">
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    
    <?php require_once(BASE_DIR.DS.'layouts'.DS.$layout); ?>

    <script src="js/vendors.min.js"></script>    
    <script src="js/main.min.js"></script>
    <script src="js/orderForm.js"></script>

  </body>
</html>
