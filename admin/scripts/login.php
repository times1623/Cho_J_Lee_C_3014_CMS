<?php 
function login($username, $password, $ip){
	require_once('connect.php');

	//Check if user exists
	
	$check_exist_query = 'SELECT COUNT(*) FROM tbl_users WHERE user_name=:user_name';

	$user_set = $pdo->prepare($check_exist_query);

	$user_set->execute(
		array(
			':user_name'=>$username
		)
	);

	if($user_set->fetchColumn()>0){
		//When user exists, then check if user info is validated

		// update query to find an account which is not blocked 
		// When new user do not login for 30 sec -> their account will be blocked
		// No longer able to login 
		$get_user_query = 'SELECT * FROM tbl_users WHERE user_name = :username AND user_pass = :password';
		$get_user_set = $pdo->prepare($get_user_query);

		$get_user_set->execute(
			array(
				':username'=>$username,
				':password'=>$password
			)
		);

		while($found_user = $get_user_set->fetch(PDO::FETCH_ASSOC)){
			$id = $found_user['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name'] = $found_user['user_name'];
			$_SESSION['user_login_time'] = $found_user['user_login_time'];
	

			$update_ip_query = 'UPDATE tbl_users SET user_ip=:ip WHERE user_id = :id';
			$update_ip_set = $pdo->prepare($update_ip_query);
			$update_ip_set->execute(
				array(
					':ip'=>$ip,
					':id'=>$id
				)
			);

			// if user login first time -> go to admin_edituser.php
			// if user login isn't first time -> go to index.php

		}

		if(empty($id)){
			$message = 'Login Failed';
			return $message;
		}

		redirect_to('index.php');
	}else{
		$message = 'User does not exists';
		return $message;
	}
}