<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
        
		echo "<script>window.location.href='?e1=$email';</script>";
		
        
	} catch (Exception $e) {
		echo 'Message could not be sent. </br> Error: ', $mail->ErrorInfo;
	}

            



    }else{
        echo "<script>alert('Please input your email!')</script>";
    }

}

?>



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
        <input class="form-control w-85" type="email" value="<?php if(isset($_GET['e1'])){ echo $_GET['e1']; }else{ echo $email; } ?>" name="email" id="email" autocomplete="off" placeholder="Email">
    </div>

    </td>
    </tr>
    </table>
  </div>



  <div class="card-footer bg-primary">
  <input type="submit" class="btn btn-light" name="sendEmail" value="Send Email" id="sendEmail">
  </form>
  </div>
</div>
</div>