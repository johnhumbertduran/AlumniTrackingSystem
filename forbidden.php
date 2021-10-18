<?php
session_start();
include("auth/bins/connections.php");
if(isset($_SESSION["username"])){

    $session_user = $_SESSION["username"];
    $check_account_type = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
    $get_account_type = mysqli_fetch_assoc($check_account_type);
    $account_type = $get_account_type["account_type"];
    $name = $get_account_type["firstName"];
    // include("../bins/sidenav.php");
}
include("bins/header.php");
?>



<center class="d-flex align-content-center" style="height:100vh">
<div class="container mt-3">
    <div class="mt-4 p-5 bg-danger text-white rounded">
    <h1 class="display-1">#404 NOT FOUND!</h1>
    </div>
    <br>
    <br>
    <br>
    <h1 class="text-danger">THIS AREA IS FORBIDDEN!</h1>
    <a href="../alumnitrackingsystem/auth/<?php if($account_type == '1'){ echo 'admin';}else{echo 'users';}?>">Go Back</a>
</div>
</center>


<?php
include("bins/loginfooter.php");
?>
