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


if(isset($_GET['e1'])){
    $email = $_GET['e1'];
    $get_code = mysqli_query($connections, "SELECT secret_code FROM users_tbl WHERE email_address='$email'");
    $check_code_rows = mysqli_num_rows($get_code);
    if($check_code_rows > 0){
        // echo "<script>alert('Please check your email for the secret code');</script>";
        $retrieve_code = mysqli_fetch_assoc($get_code);
        $emailSecretCode = $retrieve_code["secret_code"];        
    }else{
        echo "<script>alert('Email not registered! Please try again.');</script>";
        echo "<script>window.location.href='?';</script>";
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


<!-- ############################################################################################### -->
<?php
if(isset($_GET["e1"]) && !isset($_GET["e2"])){
    sleep(1);
    include("fcode.php");
}elseif(isset($_GET["e2"])){
    sleep(1);
    include("fnewpass.php");
}else{
    include("femail.php");
}
?>
<!-- ############################################################################################### -->


</center>


<br>
<br>
<br>
<br>



<script>

        let emailN=0, codeN=0;
        
        // ############################## EMAIL ########################################
        
            if(document.getElementById('email').value != ""){
                if(document.getElementById('code').value == ""){
                    var setEmail = setInterval("startEmailMovingLeft()",.05);
                }else{
                    document.getElementById('foremail').style.display="none";
                }
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

            let hiddenCheck = 0;
            if(document.getElementById('code').value != ""){
                if(document.getElementById('code').value == document.getElementById('hiddenCode').value){
                        var setCode = setInterval("startCodeMovingLeft()",.05);
                }else{
                    alert("not equal");
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
