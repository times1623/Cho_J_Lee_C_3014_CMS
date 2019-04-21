<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

function login($username, $password, $ip)
{
  require_once('connect.php');

  //check if user exists
  $check_user = "SELECT COUNT(*) FROM tbl_users WHERE user_name = :username";
  $user_set = $pdo->prepare($check_user);
  $user_set->execute(
    array(
      ':username'=> $username
    )
  );
  
  //Check user password
  $check_user_psw = "SELECT user_pass FROM tbl_users WHERE user_name = :username";
  $user_psw = $pdo->prepare($check_user_psw);
  $user_psw->execute(
    array(
      ':username'=> $username
    )
  );
  $user_pass = $user_psw->fetchColumn();
  // dd($user_pass);
  $hash_pass = password_verify($password, $user_pass);

  //Check user login time
  $check_user_login_time_query = "SELECT user_login_time from tbl_users WHERE user_name = :username";
  $user_login_time = $pdo->prepare($check_user_login_time_query);
  $user_login_time->execute(
    array(
      ':username'=> $username,
    )
    );
  $user_login_time = $user_login_time->fetchColumn();
  // var_dump($user_login_time);die;  
  
  
  //IF PASSWORD IS CORRECT
  if($hash_pass){
        // WAS USING THIS BEFORE TO LOCK USER EVEN WITH CORRECT PASSWORD
        // $get_user_query = "SELECT * FROM tbl_users WHERE user_pass = :psw AND user_name = :username AND user_active = 0";
        // CHECK USER CREDENCIALS
        $get_user_query = "SELECT * FROM tbl_users WHERE user_name = :username";
        $get_user_set = $pdo->prepare($get_user_query);
        $get_user_set->execute(
            array(
          // ":psw" => $password,
          ":username" => $username
          )
        );
          while ($found_user = $get_user_set->fetch(PDO::FETCH_ASSOC)) 
          {
            $id = $found_user['user_id'];
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $found_user['user_name'];
            $_SESSION['user_login_time'] = $found_user['user_login_time'];
            
            // UPDATE login ip
            $update_ip_query = "UPDATE tbl_users SET user_ip = :ip WHERE user_id = :id";
            $update_ip_set = $pdo->prepare($update_ip_query);
            $update_ip_set->execute(
              array(
                ":id" => $id,
                ":ip" => $ip
              )
            ); 
            
            date_default_timezone_set('America/Toronto');

            // SET LOGIN TIME
            $set_login_datetime = "UPDATE tbl_users SET user_login_time = NOW() WHERE user_id = :userId";
            $set_login_datetime = $pdo->prepare($set_login_datetime);
            $set_login_datetime->execute(
                    array(
                      ":userId" => $_SESSION['user_id']
                    )
                  );
            // RESET USER TO ACTIVE
            $set_user_active = "UPDATE tbl_users SET user_active = 0  WHERE user_id = :userId";
            $set_user_active = $pdo->prepare($set_user_active);
            $set_user_active->execute(
                    array(
                      ":userId" => $_SESSION['user_id']
                    )
                  );
            //RESET LOGIN ATTEMPTS
            $set_failed_login = "UPDATE tbl_users SET user_failed_login = 0 WHERE user_name = :username";
            $set_failed_login = $pdo->prepare($set_failed_login);
            $set_failed_login->execute(
                      array(
                      ":username" => $username
                    )
                  );
          if($user_login_time === NULL) 
          {
              redirect_to('../admin/admin_edituser.php');
          } else {
            redirect_to('index.php');
          }
       }
    }
     else
        { 
          
          //INCREMENT USER FAILED LOGIN
          $set_failed_login = "UPDATE tbl_users SET user_failed_login = user_failed_login +1 WHERE user_name = :username";
          $set_failed_login = $pdo->prepare($set_failed_login);
          $set_failed_login->execute(
                    array(
                    ":username" => $username
                  )
                );
          //UPDATE FAILED LOGIN TIME
          date_default_timezone_set('America/Toronto');
          $set_failed_login_time = "UPDATE tbl_users SET user_failed_login_time = NOW() WHERE user_name = :username";
          $set_failed_login_time = $pdo->prepare($set_failed_login_time);
          $set_failed_login_time->execute(
                    array(
                    ":username" => $username
                  )
                );
                $message = 'The username or password is incorrect!';
                return $message;   
        }    
  // CHECK FAILED ATTEMPTS
  $get_user_active_query = "SELECT user_failed_login FROM tbl_users WHERE user_name = :username";
  $user_active = $pdo->prepare($get_user_active_query);
  $user_active->execute(
          array(
          ":username" => $username
        )
      );
    
    while ($check_user_active = $user_active->fetch(PDO::FETCH_ASSOC))
    {
      if($check_user_active["user_failed_login"] >= 3) 
         {
          //BLOCK USER FOR 10min -  
          $block_user_query = "SELECT user_failed_login, (CASE when `user_failed_login_time` is not NULL and DATE_ADD(user_failed_login_time, INTERVAL 9 MINUTE)>NOW() then 1 else 0 end) as denied FROM tbl_users WHERE user_name = :username";
          $block_user = $pdo->prepare($block_user_query);
          $block_user->execute(
                array(
                ":username" => $username
              )
            );
            
         
          $block = $block_user->fetch(PDO::FETCH_ASSOC);
          // var_dump($block, $password);die;
            if($block["denied"] === 1)
            {
              redirect_to('blocked.php');
            }  
          }
     }
    
}   

      

     
    

