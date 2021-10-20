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


$query_info = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
$profile_info = mysqli_fetch_assoc($query_info);
// $account_type = $profile_info["account_type"];
$img = $profile_info["img"];
$firstName = ucfirst($profile_info["first_name"]);
$lastName = ucfirst($profile_info["last_name"]);
$address = ucfirst($profile_info["home_address"]);
$contact = ucfirst($profile_info["mobile_number"]);
$email = $profile_info["email_address"];


$tmp_img = "bins/avatardefault.png";




$target_dir = "bins/img/";
$uploadErr = "";

if(isset($_POST["upload_btn"])){

    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    $uploadOk = 1;

    if(file_exists($target_file)){
        $target_file = $target_dir . rand(1,9) . rand(1,9) . rand(1,9) . rand(1,9) . "_" . basename($_FILES["profile_pic"]["name"]);

        $uploadOk = 1;
    }

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if($_FILES["profile_pic"]["size"]>1000000000000000000000000){

        $uploadErr = "Sorry, your file is too large!";
        // echo "<script>alert('Too large');</script>";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF"){

        $uploadErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed!";
        // echo "<script>alert('File type');</script>";
        $uploadOk = 0;
    }

    if($uploadOk == 1){

        if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)){

            // echo "<font color=green> The file " . basename($_FILES["profile_pic"]["name"]) . " has been uploaded.</font>";
            $ran_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $amp = md5(rand(1,5));
            $wer = substr(str_shuffle($ran_chars), 0, 15);
            $pon = substr(str_shuffle($ran_chars), 0, 19);
            $text = substr(str_shuffle($ran_chars), 0, 4);
            $ver = sha1(rand(1,9));

            mysqli_query($connections, "UPDATE users_tbl SET img='$target_file' WHERE username='$session_user'");
            
            echo "<script>window.location.href='?&&$wer';</script>";
            //   header('Location: ?&&' . $x . "_" . $qw . "=" . $r . "&&" . $o . "=" . $hg);


        }else{
            echo "Sorry, there was an error uploading your file.";
            echo 'Error:  '.$_FILES['profile_pic']['error'];
        }
    }

}




?>



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
                        <div class='upload'><a href='#' data-bs-toggle='modal' data-bs-target='#upload_photo'>Upload</a><br><br></div>
                    </div>
                </center>";
        }

        ?>
        </div>

  <!-- <a class="nav-link text-light" aria-current="page" href="#">Active</a>
  <a class="nav-link text-light" href="#">Link</a>
  <a class="nav-link text-light" href="#">Link</a> -->
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
                            <input type="submit" name="upload_btn" class="btn btn-success" id="uploadPhotoBtn" value="Upload">
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
include("bins/footer.php");
?>
