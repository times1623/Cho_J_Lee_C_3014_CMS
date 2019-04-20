<?php 
	require_once('scripts/config.php');
	if(empty($_POST['username']) || empty($_POST['password'])){
		$message = 'Missing Fields';
	}else{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$ip = $_SERVER['REMOTE_ADDR'];

		$message = login($username,$password,$ip);
	}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/login.css">
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