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
    $user_id_no = $get_account_type["id_no"];
    
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

$elementaryGrad = $profile_info["elementary_graduate"];
$highschoolGrad = $profile_info["highschool_graduate"];
$collegeGrad = $profile_info["college_graduate"];
$graduateGrad = $profile_info["graduate_graduate"];
$collegeDegree = $profile_info["college_degree"];
$graduateDegree = $profile_info["graduate_degree"];

$fullName = $firstName . " " . $lastName;


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



<nav class="navbar flex-column bg-success pt-5" style="background-image: url('bins/Aklan_catholic_college.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center;">

<div class="container-fluid">
<ul class="navbar-nav">
<li class="nav-item">
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
        <br>
        </li>
        <li class="nav-item">
        <div class="text-light">
            <center>
            <h5><?php echo $fullName; ?></h5>
            <br>
            <!-- <p style="font-size: 12px;"><?php if($elementaryGrad != ""){ echo "Elementary batch: ".$elementaryGrad."</br>"; }
            if($highschoolGrad != ""){ echo "High School batch: ".$highschoolGrad."</br>"; }
            if($collegeGrad != ""){ echo "College batch: ".$collegeGrad."</br>"; }
            if($graduateGrad != ""){ echo "Graduate School batch: ".$graduateGrad."</br>"; }
            if($collegeDegree != ""){ echo "Course: ".$collegeDegree."</br>"; }
            if($graduateDegree != ""){ echo "Masters: ".$graduateDegree."</br>"; } ?>
            </p> -->
            </center>
        </div>
            </li>
            </ul>
        </div>

</nav>

<div class="container-fluid">
    <br>
        <!-- <h1>Aklan Catholic College Alumni</h1>

        <h2>Change this to facebook type with coverphoto</h2> -->

            <p style=""><?php if($elementaryGrad != ""){ echo "Elementary Batch: ".$elementaryGrad."</br>"; }
            if($highschoolGrad != ""){ echo "High School Batch: ".$highschoolGrad."</br>"; }
            if($collegeGrad != ""){ echo "College Batch: ".$collegeGrad."</br>"; }
            if($graduateGrad != ""){ echo "Graduate School Batch: ".$graduateGrad."</br>"; }
            if($collegeDegree != ""){ echo "Course: ".$collegeDegree."</br>"; }
            if($graduateDegree != ""){ echo "Masters: ".$graduateDegree."</br>"; } ?>
            </p>
            <?php
            $check_payment_id_no = mysqli_query($connections, "SELECT * FROM payments_tbl WHERE id_no='$user_id_no'");
            $row_payment_id_no = mysqli_num_rows($check_payment_id_no);
            // $payment_id_no = $get_payment_id_no["id_no"];

            if($row_payment_id_no > 0){
                // echo $user_id_no;
            ?>
                <a href="#" class="btn text-light" style="background-color:rgb(112, 173, 70);">Check Payment Status</a>
            <?php
            }else{
            ?>
            <a href="payment" class="btn text-light" style="background-color:rgb(112, 173, 70);">Pay Alumni Fee</a>
            <?php
            }
            ?>
            <br>
            <br>

        <!-- <div class="">
           <center><h2>Aklan Catholic College Alumni</h2></center>
        </div>

        <?php
        
        if($img == ""){
            echo "
            <div class='profile_cover float-right'>
                <img src='$tmp_img' class='dp' alt='profile_pic' srcset=''>
                <div class='upload'><a href='#' data-bs-toggle='modal' data-bs-target='#upload_photo'>Upload</a><br><br></div>
            </div>";
        }else{
            echo "
                    <div class='profile_cover float-right'>
                        <img src='$img' class='dp' alt='profile_pic' srcset=''>
                        <div class='upload'><a href='#' data-bs-toggle='modal' data-bs-target='#upload_photo'>Upload</a><br><br></div>
                    </div>
                    ";
        }

        ?>

        <div class="">
            
            <h6><?php echo $fullName; ?></h6>
            
            <p style="font-size: 12px;"><?php if($elementaryGrad != ""){ echo "Elementary batch: ".$elementaryGrad."</br>"; }
            if($highschoolGrad != ""){ echo "High School batch: ".$highschoolGrad."</br>"; }
            if($collegeGrad != ""){ echo "College batch: ".$collegeGrad."</br>"; }
            if($graduateGrad != ""){ echo "Graduate School batch: ".$graduateGrad."</br>"; }
            if($collegeDegree != ""){ echo "Course: ".$collegeDegree."</br>"; }
            if($graduateDegree != ""){ echo "Masters: ".$graduateDegree."</br>"; } ?>
            </p>
        </div> -->
        
</div>
       
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
