<?php

session_start();


include("bins/header.php");
include("../bins/connections.php");
include("bins/nav.php");

if(isset($_SESSION["username"])){

    $session_user = $_SESSION["username"];
    $check_account_type = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
    $get_account_type = mysqli_fetch_assoc($check_account_type);
    $account_type = $get_account_type["account_type"];
    $name = $get_account_type["firstName"];
    
    if($account_type != 1){
    
        header('Location: ../../forbidden');

    }
    // include("../bins/sidenav.php");
}


$post = "";
?>


<br>

<center>

<div class="col-8">
    <div>
        
    
<div class="container clearfix">
<label for="posting" class="btn text-center text-primary"  data-bs-toggle="collapse" data-bs-target="#postings"><h4>POST AN EVENT</h4></label>
    <div id="postings" class="collapse hide">
<form method="POST">
    <input type="hidden" value="<?php echo $date_now; ?>">
    <input type="hidden" value="<?php echo $time_now; ?>">
    <textarea class="form-control" name="post_status" id="posting" cols="10" rows="10"><?php echo $post; ?></textarea>


    <hr>
    <input type="submit" name="post_status_btn" class="btn btn-primary floating_right" value="Post">
</form>
</div>
</div>

    </div>
</div>

</center>

<br>
<br>
<br>
<br>

<?php
include("bins/footer.php");
?>
