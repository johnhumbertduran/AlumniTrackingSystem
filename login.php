<?php

// session_start();
$session_user = $session_pass = "";

include("bins/header.php");
// include("accounts/bins/connections.php");
include("bins/nav.php");


if(isset($_SESSION["username"])){

    $session_user = $_SESSION["username"];
    $check_account_type = mysqli_query($connections, "SELECT * FROM _user_tbl_ WHERE username='$session_user'");
    $get_account_type = mysqli_fetch_assoc($check_account_type);
    $account_type = $get_account_type["account_type"];
    
    if($account_type == 1){
    
        header('Location: private/admin');
    
    }elseif($account_type == 2){
    
        header('Location: private/user');

    }elseif($account_type == 3){
    
        header('Location: private/teacher');

    }

}



// Log in Here
if(isset($_POST["login"])){


  if(empty($_POST["password"]) && empty($_POST["username"]) ){

    // $logErr = "User Name and Password are empty!";
    echo"<script>alert('User Name and Password are empty');</script>";

    }else{

    if(empty($_POST["username"])){
    
    // $logErr = "Usern Name is empty!";
    echo"<script>alert('User Name is empty');</script>";

    }else{

    // $you = $_POST["useN"];
    $session_user = $_POST["username"];
    
    }

    if(empty($_POST["password"])){

        // $logErr = "Password is empty!";
        echo"<script>alert('Password is empty');</script>";         
    
    }else{
    
        // $pass = $_POST["pas"];
        $session_pass = $_POST["password"];
    

    }

    }





    if($session_user && $session_pass){

      $userCheck = mysqli_query($connections, "SELECT * FROM _user_tbl_ WHERE username='$session_user' ");
      $userRow = mysqli_num_rows($userCheck);
      
      if($userRow > 0){
      
          $fetch = mysqli_fetch_assoc($userCheck);
          $db_pass = $fetch["password"];
          
          $account_type = $fetch["account_type"];
      
      if($account_type == "1"){
      
          
          if($db_pass == $session_pass){
              
                  $_SESSION["username"] = $session_user;

                  header('Location: private/admin');

              
              }else{
              
                  $session_pass = ""; 
                  echo"<script>alert('Your Password is incorrect!');</script>";
              
              }

      
      }elseif ($account_type == "2") {

          if ($db_pass == $session_pass) {

              $_SESSION["username"] = $session_user;
              
              header('Location: private/user');

              }else{
              
                  $session_pass = "";
                  echo"<script>alert('Your Password is incorrect!');</script>";
              
              }   
      }elseif ($account_type == "3") {

          if ($db_pass == $session_pass) {

              $_SESSION["username"] = $session_user;
              
              header('Location: private/teacher');

              }else{
              
                  $session_pass = "";
                  echo"<script>alert('Your Password is incorrect!');</script>";
              
              }   
    }   
          
      }else{

          $session_user = "";
          echo"<script>alert('Sorry, the User Name you entered is not registered.');</script>";
      }
  }
}


?>


<br>
<br>
<center>
<h1 class="py-3 text-primary px-1">Alumni Tracking System</h1>
</center>

<br>

<center>
<div class="container col-lg-3">
<div class="card">

  <div class="card-header bg-primary text-light"><h3>Log in</h3></div>
  <div class="card-body">
  
    <!-- <div class="float-left">
    <img src="logo.png" width="100px" class="float-left" alt="">
    </div> -->
  <form method="POST">
  <table border="0">
    <tr>
    <!-- <td><img src="logo.png" width="100px" class="float-left" alt=""></td> -->
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
    <div class="form-group"><input class="form-control w-85" type="text" value="<?php echo $session_user; ?>" name="username" id="" autocomplete="off" placeholder="User Name"></div>
    
    <br>
    <div class="form-group"><input class="form-control w-85" type="password" value="<?php echo $session_pass; ?>" name="password" id="" autocomplete="off" placeholder="Password"></div>
    
    
    </td>
    </tr>
    </table>
  </div>



  <div class="card-footer bg-primary">
  <input type="submit" class="btn btn-light float-right" name="login" value="Log me in">
  </form>
  </div>
</div>
</div>

</center>

<br>
<br>
<br>
<br>

<?php
include("bins/loginfooter.php");
?>
