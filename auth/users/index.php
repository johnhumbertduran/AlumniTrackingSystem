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
    
    if($account_type != 2){
    
        header('Location: ../../forbidden');

    }
    // include("../bins/sidenav.php");
}

?>



<br>

<div class="position-fixed ml-auto mr-auto bg-light" style="left: 30%;">
    <center>
        <h2>Aklan Catholic College News Feeds</h2>
    </center>
</div>

    
<br>
<br>
<br>
    <?php

    $post_qry = mysqli_query($connections, "SELECT * FROM post_tbl ORDER BY id DESC ");
    while($row_post = mysqli_fetch_assoc($post_qry)){
        // $id = $row_alumni["id"];
        $post_no = $row_post["post_no"];
        $my_post = $row_post["post"];
        $post_date = $row_post["date"];
        $post_time = $row_post["time"];
    ?>
    <div class="container-fluid col-5 border border-dark rounded">
    <h6 class="float-left">Aklan Catholic College Official</h6>
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
