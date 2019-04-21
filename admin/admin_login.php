<?php
	require_once('scripts/config.php');

	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$ip = $_SERVER['REMOTE_ADDR'];

		$message = login($username, $password, $ip);	
	}else{
		if(isset($_POST['username']) || isset($_POST['password'])){
			$message = 'Please fill the required fields';
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/login.css" type="text/css">
  <title>Admin Login</title>
</head>
<body>
<?php if(!empty($message)):?>
	<p><?php echo $message;?></p>
	<?php endif;?>
<div class="login-page">
    <h3>WELCOME TO SPORTSCHECK!!</h3>
    <div class="form">
    <P id="logTitle">SPORTSCHECK LOGIN</P>
     
    <form action="admin_login.php" class="login-form" method="post">
    <label for="username" required autofocus>Username
    <input type="text" name="username" placeholder="username"/>
    </label>    
    <label for="inputPassword" required>Password
    <input type="password" name="password" placeholder="password"/>
    </label>
    <button type="submit">login</button>
    </form>
    
    </div>
  
    </div>
</body>
</html>