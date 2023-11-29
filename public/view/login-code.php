<?php
session_start();

$filename = 'credentials.json';
$json = file_get_contents("db/" . $filename);
//Decode JSON
$data = json_decode($json, true);

if (isset($_POST['login_button'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  foreach ($data as $key => $value) {
    if($value['username'] == $username && 
    $value['password'] == $password) {
      $_SESSION['authentication'] = true;
      $_SESSION['auth_user'] = [
        'user_name' => $value['username'],
        'user_password' => $value['password'],
      ];
      unset($_SESSION['message']);
    
      header("Location: ./"); //index.php");
      exit(0);
    }
  }
  $_SESSION['message'] = "Invalid Email or Password"; //message to show
  header("Location: /login");
  exit(0);
}
 