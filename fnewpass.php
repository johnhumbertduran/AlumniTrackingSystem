<?php

// Log in Here
if(isset($_POST["confirmNewPassword"])){


    if(empty($_POST["password"]) && empty($_POST["confirmPassword"]) ){
  
      // $logErr = "User Name and Password are empty!";
      echo"<script>alert('Input fields are empty');</script>";
  
      }else{
  
      if(empty($_POST["confirmPassword"])){
      
      // $logErr = "Usern Name is empty!";
      echo"<script>alert('Please input again your password to confirm');</script>";
  
      }else{
  
      // $you = $_POST["useN"];
      $confirmPassword = $_POST["confirmPassword"];
  
      $email_address = $_GET['e1'];
      $check_user_using_gmail = mysqli_query($connections, "SELECT * FROM users_tbl WHERE email_address='$email_address'");
      $get_user_by_email = mysqli_fetch_assoc($check_user_using_gmail);
      $user_by_email = $get_user_by_email["username"];
  
      $session_user = $user_by_email;
      
      }
  
      if(empty($_POST["password"])){
  
          // $logErr = "Password is empty!";
          echo"<script>alert('Password is empty');</script>";         
      
      }else{
      
          // $pass = $_POST["pas"];
          $password = $_POST["password"];
      
  
      }
  
      }
  
  
  
  
  
      if($confirmPassword && $password){
  
        $check_users = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user' ");
        $row_users = mysqli_num_rows($check_users);
        
        if($row_users > 0){
        
            $fetch = mysqli_fetch_assoc($check_users);
            $db_pass = $fetch["password"];
            
            $account_type = $fetch["account_type"];
        
        if($account_type == "1"){
        
            
            if($password == $confirmPassword){
                  
                  mysqli_query($connections, "UPDATE users_tbl SET password='$password',secret_code='' where email_address='$email_address' ");
                  
                  $_SESSION["username"] = $session_user;
  
                  header('Location: auth/admin');
  
                
                }else{
                
                    $password = ""; 
                    $confirmPassword = ""; 
                    echo"<script>alert('Password mismatched!');</script>";
                
                }
  
        
        }elseif ($account_type == "2") {
  
            if ($password == $confirmPassword) {
  
              mysqli_query($connections, "UPDATE users_tbl SET password='$password',secret_code='' where email_address='$email_address' ");
              $_SESSION["username"] = $session_user;
              
              header('Location: auth/users');
  
                }else{
                
                    $password = "";
                    $confirmPassword = "";
                    echo"<script>alert('Password mismatched!');</script>";
                
                }   
     
          }   
            
        }else{
  
            $confirmPassword = "";
            $password = "";
            echo"<script>alert('Sorry, the user not matched in our system.');</script>";
        }
    }
  }

?>

<div class="container col-lg-3 forNewPass" id="newPass">
<div class="card">

  <div class="card-header bg-primary text-light"><h6>Please input your new password</h6></div>
  <div class="card-body">
  <form method="POST">
  <table border="0">
    <tr>
        
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
    <div class="form-group"><input class="form-control w-85" type="password" value="<?php echo $password; ?>" name="password" id="pass" autocomplete="off" placeholder="Password"></div>
    
    <br>
    <div class="form-group"><input class="form-control w-85" type="password" value="<?php echo $confirmPassword; ?>" name="confirmPassword" id="cpass" autocomplete="off" placeholder="Confirm Password"></div>
    
    
    </td>
    </tr>
    </table>
  </div>



  <div class="card-footer bg-primary">
  <input type="submit" class="btn btn-light" name="confirmNewPassword" value="Create new password">
  </form>
  </div>
</div>
</div>