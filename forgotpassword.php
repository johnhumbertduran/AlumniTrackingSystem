<style>


</style>

<?php

session_start();
$code = $email = $password = $confirmPassword = "";

include("bins/header.php");
include("auth/bins/connections.php");
include("bins/nav.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


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

    function secretCode($setLength = 5){
    $rand_str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $secretCode = substr(str_shuffle($rand_str), 0, $setLength);
    return $secretCode;
    }
    $emailCode = secretCode(10);

    if(!empty($_POST["email"])){
        $email = $_POST["email"];

        require 'PHPMailer/vendor/autoload.php';
        $mail = new PHPMailer(true);                              
try {

	// $headers = 'MIME-Version: 1.0'.PHP_EOL; // importante to
	// $headers .= 'Content-type: text/html; charset=iso-8859-1'.PHP_EOL; // importante to
	// $headers .= 'From: kay sender<From: kay sender>'.PHP_EOL;  // importante to
   
    $mail->isSMTP();                                    
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'aalumntracking@gmail.com';     // dito yung email ng sender mo
    $mail->Password = 'admin_AklanCatholicCollege2021';      // email password ng sender mo                     
    $mail->SMTPSecure = 'tls';                           
    $mail->Port = 587;         
	
    $mail->setFrom('aalumntracking@gmail.com', 'ACC'); // mula kanino ? editable yan bahala kana
  
    $mail->addAddress($email); // dito mo ilalagay yung email ng pag sesendan mo               
   
    $mail->isHTML(true);                                 
	
    $mail->Header = 'MIME-Version: 1.0\r\nt Content-Type: text/plain; charset=utf-8\r\n
	X-Priority: 1\r\n'; // importante to
	
        $message = "Your secret code is: <b>$emailCode</b> <br> <font color='red'>Please do not share your code to anyone!</font>";
		$mail->Subject = 'Secret Code';
		$mail->Body   = $message;
	
		$mail->send();
        mysqli_query($connections, "UPDATE users_tbl SET secret_code='$emailCode' where email_address='$email' ");
		echo "<script>alert('Please check your email for the secret code');</script>";
		echo "<script>window.location.href='?e1=$email';</script>";
        
	} catch (Exception $e) {
		echo 'Message could not be sent. </br> Mailer Error: ', $mail->ErrorInfo;
	}

            



    }else{
        echo "<script>alert('Please input your email!')</script>";
    }

}
        if(isset($_GET['e1'])){
            $email = $_GET['e1'];
            $get_code = mysqli_query($connections, "SELECT secret_code FROM users_tbl WHERE email_address='$email'");
            $retrieve_code = mysqli_fetch_assoc($get_code);
            $emailSecretCode = $retrieve_code["secret_code"];
        }


        $codeError = 0;

if(isset($_POST["ConfirmCode"])){

    // $email =  "";
    // $_POST["email"] = "";
    
    if(!empty($_POST["code"])){
        $code = $_POST["code"];

        

        if($code == $emailSecretCode){
            // change this alert
            echo "<script>alert('Correct code!')</script>";
        }else{
            $codeError = 1;
        }


        // echo "<script>window.location.href='?e2=$code';</script>";
    }else{
        echo "<script>alert('Please input your email')</script>";
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

<div class="alert alert-danger alert-dismissible col-5 <?php if($codeError == 1){ echo 'd-block'; }else{ echo 'd-none'; } ?>">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Incorrect</strong> secret code! Please check your code and try again.
</div>

<div class="container col-lg-3 foremail <?php if(isset($_GET['e1'])) {echo 'slide_email';} if(isset($_GET['e2'])) {echo 'd-none';} ?>" id="foremail">
<div class="card">

  <div class="card-header bg-primary text-light"><h6>Please input your email</h6></div>
  <div class="card-body">

  <form method="POST">
  <table border="0">
    <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
    <div class="form-group">
        <input class="form-control w-85" style="position:absolute; z-index:100; left: -100%;" type="hidden" value="<?php if(isset($_GET['e1'])){ echo $emailSecretCode; } ?>" name="hiddenCode" id="hiddenCode" autocomplete="off" placeholder="Hidden Code">
        <input class="form-control w-85" type="text" value="<?php if(isset($_GET['e1'])){ echo $_GET['e1']; }else{ echo $email; } ?>" name="email" id="email" autocomplete="off" placeholder="Email">
    </div>

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

<?php
if($codeError == 1){
    // echo "<script>alert('display?');</script>";
    echo "<script>document.getElementById('foremail').style.display='none';</script>";

}
?>

<script>

        let emailN=0, codeN=0;
        
        // ############################## EMAIL ########################################
        
            if(document.getElementById('email').value != ""){
                // if(document.getElementById('code').value == ""){
                // }
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
                return
            }
            
            function delayEmailNone(){
                clearInterval(setEmail);
                document.getElementById('digitCode').classList.remove('d-none');
                document.getElementById('digitCode').classList.add('d-block');
                document.getElementById('foremail').classList.add('d-none');
            }
        // ############################## CODE ########################################

            if(document.getElementById('code').value != ""){
                if(document.getElementById('code').value == document.getElementById('hiddenCode').value){
                  var setCode = setInterval("startCodeMovingLeft()",.05);
                }
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
