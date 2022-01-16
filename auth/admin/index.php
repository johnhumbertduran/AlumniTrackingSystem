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
    $name = $get_account_type["first_name"];
    
    if($account_type != 1){
    
        header('Location: ../../forbidden');

    }
    // include("../bins/sidenav.php");
}
date_default_timezone_set ("Asia/Manila");
$date_now = date("m/d/Y");
$time_now = date("h:i");
$post = "";

    if(isset($_POST['post_status_btn'])){
        if(!empty($_POST['post_status_btn'])){
            $post = $_POST['post_status'];
            if($post){
            mysqli_query($connections, "INSERT INTO post_tbl (post_no,post,date,time)
                                        VALUES ('20210000','$post','$date_now','$time_now')");
            echo "<script>alert('Post added!'); window.location.href='?';</script>";
            }
        }else{
        }
    }


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
<hr>
</center>

    <?php

    $post_qry = mysqli_query($connections, "SELECT * FROM post_tbl ");
    while($row_post = mysqli_fetch_assoc($post_qry)){
        // $id = $row_alumni["id"];
        $post_no = $row_post["post_no"];
        $my_post = $row_post["post"];
        $post_date = $row_post["date"];
        $post_time = $row_post["time"];
    ?>
    <div class="container-fluid col-5 border border-dark rounded">
    <h1 class="display-6 float-left">User</h1>
        <?php echo $my_post; ?>
        <p></p>
        </div>

        <br>
    <?php
    }
    ?>



<br>
<br>
<br>
<br>

<?php
include("bins/footer.php");
?>
