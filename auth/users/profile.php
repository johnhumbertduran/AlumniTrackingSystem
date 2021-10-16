<?php

session_start();


include("../bins/header.php");
include("../bins/connections.php");
include("bins/nav.php");

if(isset($_SESSION["username"])){

    $session_user = $_SESSION["username"];
    $check_account_type = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
    $get_account_type = mysqli_fetch_assoc($check_account_type);
    $account_type = $get_account_type["account_type"];
    $name = $get_account_type["firstName"];
    
    if($account_type != 2){
    
        header('Location: ../../forbidden');

    }
    // include("../bins/sidenav.php");
}


$query_info = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
$profile_info = mysqli_fetch_assoc($query_info);
// $account_type = $profile_info["account_type"];
$img = $profile_info["img"];
$firstName = ucfirst($profile_info["firstName"]);
$lastName = ucfirst($profile_info["lastName"]);
$address = ucfirst($profile_info["address"]);
$contact = ucfirst($profile_info["contactNo"]);
$email = $profile_info["email"];


$tmp_img = "bins/avatardefault.png";
?>
<style>
.sidebar {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  /* top: 0; */
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  /* padding-top: 20px; */
}


.profile_cover{
    border-radius: 50%;
    /* background-color: blueviolet; */
    width: 130px;
    height: 130px;
    overflow: hidden;
    border: 5px solid rgb(42, 196, 67);
    
    /* object-fit: contain; */
}

.dp{
    object-fit: cover;
    width: 120px;
    height: 120px;
}

.upload{
    display: none;
    background-color: rgba(0, 0, 0, 0.671);
    text-align: center;
    position: relative;
    padding: 1% 3.3%;
    bottom: 35%;
    text-overflow: hidden;
}

.profile_cover:hover .upload{
    display: block;
}

.profile_cover:hover .dp{
    opacity: 0.8;
    filter: alpha(opacity=80); /* For IE8 and earlier */
}
</style>

<nav class="nav flex-column bg-primary sidebar fixed">

<div class="container">
        <div>
        <?php
        
        if($img == ""){
            echo "<center>
            <div class='profile_cover'>
                <img src='$tmp_img' class='dp' alt='profile_pic' srcset=''>
                <div class='upload'><a href='#' data-bs-toggle='modal' data-bs-target='#upload_photo'>Upload</a><br><br></div>
            </div>
        </center>";
        }else{
            echo "<center>
                    <div class='profile_cover'>
                        <img src='$img' class='dp' alt='profile_pic' srcset=''>
                        <div class='upload'><a href='#' data-toggle='modal' data-target='#upload_photo'>Upload</a><br><br></div>
                    </div>
                </center>";
        }

        ?>
        </div>

  <a class="nav-link text-light" aria-current="page" href="#">Active</a>
  <a class="nav-link text-light" href="#">Link</a>
  <a class="nav-link text-light" href="#">Link</a>
</nav>

       
<!-- The Modal -->
<div class="modal fade" id="upload_photo">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
                <h4>Upload Profile Picture</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <center>

                <form method="post" enctype="multipart/form-data">


                            <center><br><span id="preview"></span></center>

                            <hr>

                            <!-- <input type="file" class="custom-file-input" id="customFile"> -->
                            <input type="file" class="btn btn-info" id="profile_picID" name="profile_pic" onchange="displayPreview(this.files);">
                            <!-- <label class="custom-file-label" for="profile_pic">Choose your photo</label> -->
                            <br>

                            

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                        <center>
                            <input type="submit" name="btnUpload" class="btn btn-success" id="uploadPhotoBtn" value="Upload">
                        </center>
                    </form>
                <span class="error"><?php  ?></span>
                </center>
            </div>
            
          </div>
        </div>
    </div>
<center>
</center>

<br>
<br>
<br>
<br>
<script src="../../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script> <!-- Bootstrap4 for offline -->
<?php
include("../bins/footer.php");
?>
