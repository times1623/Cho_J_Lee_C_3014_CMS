<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
// require_once 'scripts/config.php';

if (empty($_POST['username']) || empty($_POST['password'])) {
    $message = 'Please fill out all fields';
} else {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    //$_SERVER is not a very reliable varible for production
    $ip = $_SERVER["REMOTE_ADDR"];
    $message = login($username, $password, $ip);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/login.css" type="text/css">
  <title>Admin Login</title>
</head>
<body>
<div class="login-page">
    <h3>WELCOME TO SPORTSCHECK!!</h3>
    <div class="form">
    <P id="logTitle">SPORTSCHECK LOGIN</P>
     
    <form action="#" class="login-form" method="post">
        <input type="text" placeholder="username"/>
        <input type="password" placeholder="password"/>
        <button type="submit">login</button>
        <p class="message">You Need Account? <a href="admin_createuser.php">Create User Here</router-link></a>
    </form>
    
    </div>
  
    </div>
</body>
</html>