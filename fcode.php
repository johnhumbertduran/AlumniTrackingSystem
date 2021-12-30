<?php

$codeError = $forCheckEmail = 0;



if(isset($_POST["ConfirmCode"])){

    // $email =  "";
    // $_POST["email"] = "";
    $_POST["forCheckEmail"] = "1";
    $forCheckEmail = $_POST["forCheckEmail"];

    if(!empty($_POST["code"])){
        $code = $_POST["code"];
        

        
            $rand_str1 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $rl = md5(rand(0,9));
            $reder1 = substr(str_shuffle($rand_str1), 0, 50);

        if($code == $emailSecretCode){
            // change this alert
            // echo "<script>alert('Correct code!')</script>";
            echo "<script>window.location.href='?e1=$email&res=$reder1&e2=$code&?';</script>";
        }else{
            
            $codeError = 1;
            // echo "<script>alert($codeError)</script>";
        }


        


    }else{
        echo "<script>alert('Please input your secret code')</script>";
    }

}

if(isset($_GET['e1'])){
    if($code == ""){
        if($forCheckEmail == 0){
            echo "<script>alert('Please check your email for the secret code!')</script>";
        }
    }
}

?>


<div class="alert alert-danger alert-dismissible col-6 <?php if($codeError == 1){ echo 'd-block'; }else{ echo 'd-none'; } ?>" style="position: absolute; z-index:1; left:350; ">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Incorrect</strong> secret code! Please check your code and try again.
</div>

<div class="container col-lg-3 forcode" id="digitCode">
<div class="card">

  <div class="card-header bg-primary text-light"><h6>Please input the 6 digit code</h6></div>
  <div class="card-body">

  <form method="POST">
  <table border="0">
    <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
    <input type="hidden" value="<?php echo $forCheckEmail; ?>" name="forCheckEmail">
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

<?php
if($codeError == 1){
    echo "<script>document.getElementById('foremail').style.display='none';</script>";
}
?>