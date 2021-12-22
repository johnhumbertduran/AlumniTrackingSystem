<style>


</style>

<?php

session_start();
$code = $email = $password = $confirmPassword = "";

include("bins/header.php");
include("auth/bins/connections.php");
include("bins/nav.php");


if(isset($_SESSION["username"])){

    $session_user = $_SESSION["username"];
    $check_account_type = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
    $get_account_type = mysqli_fetch_assoc($check_account_type);
    $account_type = $get_account_type["account_type"];
    
    if($account_type == 1){
    
        header('Location: auth/admin');
    
    }elseif($account_type == 2){
    
        header('Location: auth/users');

    }else{
    
        header('Location: forbidden');

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

      $check_users = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user' ");
      $row_users = mysqli_num_rows($check_users);
      
      if($row_users > 0){
      
          $fetch = mysqli_fetch_assoc($check_users);
          $db_pass = $fetch["password"];
          
          $account_type = $fetch["account_type"];
      
      if($account_type == "1"){
      
          
          if($db_pass == $session_pass){
              
                  $_SESSION["username"] = $session_user;

                  header('Location: auth/admin');

              
              }else{
              
                  $session_pass = ""; 
                  echo"<script>alert('Your Password is incorrect!');</script>";
              
              }

      
      }elseif ($account_type == "2") {

          if ($db_pass == $session_pass) {

              $_SESSION["username"] = $session_user;
              
              header('Location: auth/users');

              }else{
              
                  $session_pass = "";
                  echo"<script>alert('Your Password is incorrect!');</script>";
              
              }   
   
        }   
          
      }else{

          $session_user = "";
          $session_pass = "";
          echo"<script>alert('Sorry, the User Name you entered is not registered.');</script>";
      }
  }
}


if(isset($_POST["sendEmail"])){

    if(!empty($_POST["email"])){
        $email = $_POST["email"];
        echo "<script>window.location.href='?e1=$email';</script>";
    }else{
        echo "<script>alert('Please input your email!')</script>";
    }

}




if(isset($_POST["ConfirmCode"])){

    $email =  "";
    $_POST["email"] = "";
    if(!empty($_POST["code"])){
        $code = $_POST["code"];
        echo "<script>window.location.href='?e2=$code';</script>";
    }else{
        echo "<script>alert('Please input your email!')</script>";
    }

}



?>


<br>
<br>
<br>
<center>
<h2 class="py-3 text-primary px-1">Forgot Password</h2>
</center>

<br>

<center>
<div class="container col-lg-3 foremail <?php if(isset($_GET['e1'])) {echo 'slide_email';} if(isset($_GET['e2'])) {echo 'd-none';} ?>" id="foremail">
<div class="card">

  <div class="card-header bg-primary text-light"><h6>Please input your email</h6></div>
  <div class="card-body">

  <form method="POST">
  <table border="0">
    <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
    <div class="form-group"><input class="form-control w-85" type="text" value="<?php if(isset($_GET['e1'])){ echo $_GET['e1']; }else{ echo $email; } ?>" name="email" id="email" autocomplete="off" placeholder="Email"></div>

    </td>
    </tr>
    </table>
  </div>



  <div class="card-footer bg-primary">
  <input type="submit" class="btn btn-light" name="sendEmail" value="Send Email" id="sendEmail">

  </div>
</div>
</div>


<!-- ############################################################################################### -->

<div class="container col-lg-3 forcode <?php if(isset($_GET['e2'])) {echo 'd-block';}else{ echo 'd-none'; } ?>" id="digitCode">
<div class="card">

  <div class="card-header bg-primary text-light"><h6>Please input the 6 digit code</h6></div>
  <div class="card-body">


  <table border="0">
    <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
    <div class="form-group"><input class="form-control w-85" type="text" value="<?php if(isset($_GET['e2'])){ echo $_GET['e2']; }else{ echo $code; } ?>" name="code" id="code" autocomplete="off" placeholder="Code"></div>

    </td>
    </tr>
    </table>
  </div>



  <div class="card-footer bg-primary">
  <input type="submit" class="btn btn-light" name="ConfirmCode" value="Confirm">
  </form>
  </div>
</div>
</div>

<!-- ############################################################################################### -->


<div class="container col-lg-3 forNewPass d-none" id="newPass">
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


</center>


<br>
<br>
<br>
<br>

<script>

        let emailN=0, codeN=0;
        
        // ############################## EMAIL ########################################
        
            if(document.getElementById('email').value != ""){
              var setEmail = setInterval("startEmailMovingLeft()",.05);
            }

            function startEmailMovingLeft(){
                emailN = emailN + 10;
                document.getElementById('foremail').style.transform="translate(-" + emailN + "px,0px)";
                document.getElementById('foremail').style.webkitTransform="translate(-" + emailN + "px,0px)";
                document.getElementById('foremail').style.OTransform="translate(-" + emailN + "px,0px)";
                document.getElementById('foremail').style.MozTransform="translate(-" + emailN + "px,0px)";
                document.getElementById('foremail').style.MozTransform="translate(-" + emailN + "px,0px)";
                setTimeout(delayEmailNone, 600);
            }
            
            function delayEmailNone(){
                clearInterval(setEmail);
                document.getElementById('digitCode').classList.remove('d-none');
                document.getElementById('digitCode').classList.add('d-block');
                document.getElementById('foremail').classList.add('d-none');
            }
        // ############################## CODE ########################################

            if(document.getElementById('code').value != ""){
              var setCode = setInterval("startCodeMovingLeft()",.05);
            }

            function startCodeMovingLeft(){
                codeN = codeN + 10;
                document.getElementById('digitCode').style.transform="translate(-" + codeN + "px,0px)";
                document.getElementById('digitCode').style.webkitTransform="translate(-" + codeN + "px,0px)";
                document.getElementById('digitCode').style.OTransform="translate(-" + codeN + "px,0px)";
                document.getElementById('digitCode').style.MozTransform="translate(-" + codeN + "px,0px)";
                document.getElementById('digitCode').style.MozTransform="translate(-" + codeN + "px,0px)";
                setTimeout(delayCodeNone, 600);
            }
            function delayCodeNone(){
                clearInterval(setCode);
                document.getElementById('newPass').classList.remove('d-none');
                document.getElementById('newPass').classList.add('d-block');
                document.getElementById('digitCode').classList.add('d-none');
            }


</script>
<?php
include("bins/loginfooter.php");
?>
