<?php 

function login($username, $password, $ip){
    require_once('connect.php');
  

     //Check if username exists
	$check_exist_query = 'SELECT COUNT(*) FROM tbl_users';
	$check_exist_query .= ' WHERE user_name = :username';
	
	$user_set = $pdo->prepare($check_exist_query);
	$user_set->execute(
		array(
			':username'=>$username
		)
    );


	if($user_set->fetchColumn()>0){
        // echo "User Exists!";

        $get_user_query = 'SELECT * FROM tbl_users WHERE user_name = :username';
        
        $get_user_set = $pdo->prepare($get_user_query);

        //TODO: don't forget to bind the placeholders in here
        $get_user_set->execute(
            array(':username'=>$username
            )
        );

        while($found_user = $get_user_set->fetch(PDO::FETCH_ASSOC)){
            //pwd,admin to validate the password
            
            $id = $found_user['user_id'];
            $pwd = $found_user['user_pass'];
    
            $_SESSION['user_pass'] = $pwd;
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $found_user['user_name'];  
            $_SESSION['user_date'] = $found_user['user_date'];

            // if it's admin check if password from post match the password.

            if(password_verify($password,$pwd)){
            //Update user login IP
            $update_ip_query = 'UPDATE tbl_users SET user_ip = :ip WHERE user_id = :id';
            $update_ip_set = $pdo->prepare($update_ip_query);
            $update_ip_set->execute(
                array(
                ':id'=>$id,
                ':ip'=>$ip)
            );
         
            //set query to update the userdate as present time which is NOW().
            $queryLogintime = 'UPDATE tbl_users SET user_date = NOW() WHERE user_id = :id';

            $runLogintime = $pdo->prepare($queryLogintime);

            $runLogintime->execute(
                array(':id'=>$id
                )
            );

            //check if user is locked with column user_lock
            $check_ip_query = 'SELECT COUNT(*) FROM tbl_users WHERE user_lock = "no" AND user_id = :id';
            $user_check = $pdo->prepare($check_ip_query);
            $user_check->execute(
                array(':id'=>$id
                )
            );
            
            //if it isn't lock redirect to index.php or send message that it's locked.
            if($user_check->fetchColumn()>0){
            redirect_to('index.php');
            }else{
                $message = 'Your Account is Locked';
                return $message;
            }
            redirect_to('index.php');
        }else{
      
        // return $message; 
         return 'Check you Password';
        }
}
    } else{
        //if ID does not match
        $message = 'Login Failed! User Not Existed' ;
        return $message;
    }
}
