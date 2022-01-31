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
$target_dir = "bins/img/";
$uploadErr = "";


    if(isset($_POST['post_status_btn'])){
        if(!empty($_POST['post_status_btn'])){
            $post = $_POST['post_status'];
            if($post){

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

            // mysqli_query($connections, "UPDATE post_tbl SET img='$target_file' WHERE username='$session_user'");
            
            // echo "<script>window.location.href='?&&$wer';</script>";

            

            //   header('Location: ?&&' . $x . "_" . $qw . "=" . $r . "&&" . $o . "=" . $hg);


        }else{
            echo "Sorry, there was an error uploading your file.";
            echo 'Error:  '.$_FILES['profile_pic']['error'];
        }
    }


    $dbcon = mysqli_query($connections, "INSERT INTO post_tbl (post_no,post,date,time,img)
                                        VALUES ('20210000','$post','$date_now','$time_now','$target_file')");

            echo "<script>alert('Post added!'); window.location.href='?';</script>";


            echo "<script>alert('Post added!'); window.location.href='?';</script>";
            
            }
        }else{
            echo "<script>alert('Please write something!');</script>";
        }
    }





?>


<br>

<center>

<div class="col-8">
    <div>
<div class="container clearfix">
<label for="posting" class="btn text-center"  style="color:rgb(73, 114, 45);" data-bs-toggle="collapse" data-bs-target="#postings"><h4>POST AN EVENT</h4></label>
    <div id="postings" class="collapse hide">
    <form method="POST" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $date_now; ?>">
    <input type="hidden" value="<?php echo $time_now; ?>">
    <textarea class="form-control" name="post_status" id="posting" cols="10" rows="10"><?php echo $post; ?></textarea>

    <br><span id="preview"></span>
    <hr>
    <div class='upload'>
    <input type="submit" name="post_status_btn" class="btn btn-primary floating_right" value="Post">
        <a class="btn btn-info text-light" href='#' data-bs-toggle='modal' data-bs-target='#upload_photo'>Upload Image</a><br><br>
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

                <!-- <form method="post" enctype="multipart/form-data"> -->


                            

                            <hr>

                            <!-- <input type="file" class="custom-file-input" id="customFile"> -->
                            <input type="file" class="btn btn-info" id="profile_picID" name="profile_pic" onchange="displayPreview(this.files);">
                            <!-- <label class="custom-file-label" for="profile_pic">Choose your photo</label> -->
                            <br>

                            

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                        <center>
                            <!-- <input type="submit" name="upload_btn" class="btn btn-success" id="uploadPhotoBtn" value="Upload"> -->
                        </center>
                    <!-- </form> -->
                <span class="error"><?php  ?></span>
                </center>
            </div>
            
          </div>
        </div>
    </div>

</form>
</div>
</div>

</div>
</div>



<hr>
</center>

    <?php

    $post_qry = mysqli_query($connections, "SELECT * FROM post_tbl ORDER BY id DESC ");
    while($row_post = mysqli_fetch_assoc($post_qry)){
        // $id = $row_alumni["id"];
        $post_no = $row_post["post_no"];
        $my_post = $row_post["post"];
        $post_date = $row_post["date"];
        $post_time = $row_post["time"];
        $img = $row_post["img"];

    ?>
    <div class="container-fluid col-5 border border-dark rounded">
    <h6 class="float-left">Aklan Catholic College Official</h6>
        <?php echo nl2br($my_post); ?>
        <p></p>

        <div class="text-center">
        <?php
        if($img != ""){
        ?>
        <img src="<?php echo $img; ?>" class="post-image" alt="">
        <?php
        }
        ?>
        </div>
        <br>
        
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
