<?php
include("bins/header.php");
include("auth/bins/connections.php");
include("bins/nav.php");
?>


<br>


<div class="container col">

<div class="card">

    <div class="card-header bg-primary text-light"><h2>Registration Form</h2></div>

        <div class="card-body">
            <form autocomplete="off" method="POST">
            <?php
            $firstName = $lastName = $address = $contactNo = $email = $userName = $password = "";

            $id_no = "20210000";

            $check_id_no = mysqli_query($connections, "SELECT id_no FROM users_tbl ORDER BY id_no DESC LIMIT 1 ");
            while($get_id_no = mysqli_fetch_assoc($check_id_no)){

                $db_id_number = $get_id_no["id_no"];
                $id_no = $db_id_number;
            
            
            if($db_id_number >= $id_no){
            
                $id_no += 1;
                
            }

            if(isset($_POST["submit"])){
                // echo "<script>alert('clicked');</script>";

                if(!empty($_POST["first_name"])){
                    $firstName = $_POST["first_name"];
                }

                if(!empty($_POST["last_name"])){
                    $lastName = $_POST["last_name"];
                }

                if(!empty($_POST["address"])){
                    $address = $_POST["address"];
                }

                if(!empty($_POST["contact"])){
                    $contactNo = $_POST["contact"];
                }

                if(!empty($_POST["email"])){
                    $email = $_POST["email"];
                }

                if(!empty($_POST["user_name"])){
                    $userName = $_POST["user_name"];
                }

                if(!empty($_POST["password"])){
                    $password = $_POST["password"];
                }

                    if($firstName && $lastName && $address && $contactNo && $email && $userName && $password){
                        if(!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $firstName)){
                            echo "<script> alert('First Name should not have numbers or symbols.'); </script>";
                        }else{
                            if(!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $lastName)){
                                echo "<script> alert('Last Name should not have numbers or symbols.'); </script>";
                            }else{
                                if(strlen($contactNo) < 11){
                                echo "<script> alert('Contact Number is insufficient!'); </script>";
                                }else{
                                    if(strlen($userName) < 8){
                                        echo "<script> alert('User Name must have atleast 8 alpha numeric character!'); </script>";
                                    }else{
                                        if(strlen($password) < 8){
                                            echo "<script> alert('Password must have atleast 8 alpha numeric character!'); </script>";
                                        }else{
                                            mysqli_query($connections, "INSERT INTO users_tbl (id_no,firstName,lastName,address,
                                            contactNo,email,username,password,account_type)
                                            VALUES ('$id_no','$firstName','$lastName','$address','$contactNo',
                                            '$email','$userName','$password','2')");
                                            echo "<script> alert('Successfully Registered!'); </script>";
                                            header('Location: ?');
                                        }
                                    }
                                }
                            }
                        }

                    }

                }

            }
            
            ?>
                <h4>Contact Information</h4>
                <hr>
                
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-floating ">
                    <input class="form-control" type="text" value="<?php echo $id_no; ?>" placeholder="ID Number" name="id_no" class="" id="id_no" disabled>
                    <label for="id_no">ID Number</label>
                </div>
                &nbsp;&nbsp;
                
                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" value="<?php echo $lastName; ?>" placeholder="Last Name" name="last_name" class="" id="last_name" autocomplete="new-last" required >
                    <label for="last_name">Last Name</label>
                </div>
                &nbsp;&nbsp;
                
                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" value="<?php echo $firstName; ?>" placeholder="First Name" name="first_name" class="" id="first_name" autocomplete="new-first" required >
                    <label for="first_name">First Name</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" value="<?php echo $firstName; ?>" placeholder="Middle Name" name="first_name" class="" id="first_name" autocomplete="new-first" required >
                    <label for="first_name">First Name</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" value="<?php echo $address; ?>" placeholder="Home Address" name="address" class="" id="address" autocomplete="new-address" required >
                    <label for="address">Home Address</label>
                </div>
                &nbsp;&nbsp;

                <p>Sex:&nbsp;</p>
                <div class="form-check flex-fill">
                
                    <input class="form-check-input" type="radio" name="male" id="male">
                    <label class="form-check-label" for="male">Male</label>
                    <br>
                    <input class="form-check-input" type="radio" name="female" id="female">
                    <label class="form-check-label" for="female">Female</label>
                    

                </div>
                &nbsp;&nbsp;

                <p>Civil&nbsp;Status:&nbsp;</p>
                <div class="form-check flex-fill">
                
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Single</label>
                    
                    <br>
                
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Married</label>
                    

                </div>
                
                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">
                    
                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" value="<?php echo $lastName; ?>" placeholder="Employment Address" name="last_name" class="" id="last_name" autocomplete="new-last" required >
                    <label for="last_name">Employment Address</label>
                </div>
                &nbsp;&nbsp;
                
                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" value="<?php echo $firstName; ?>" placeholder="Current Work/Position" name="first_name" class="" id="first_name" autocomplete="new-first" required >
                    <label for="first_name">Current Work/Position</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="elementary" name="elementary" value="elementary">
                <label class="form-check-label" for="elementary">Elementary</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $firstName; ?>" placeholder="Year Graduated" name="first_name" class="" id="first_name" autocomplete="new-first" required >
                    <label for="first_name">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="elementary" name="elementary" value="elementary">
                <label class="form-check-label" for="elementary">College</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $firstName; ?>" placeholder="Year Graduated" name="first_name" class="" id="first_name" autocomplete="new-first" required >
                    <label for="first_name">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $firstName; ?>" placeholder="Degree" name="first_name" class="" id="first_name" autocomplete="new-first" required >
                    <label for="first_name">Degree</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="elementary" name="elementary" value="elementary">
                <label class="form-check-label" for="elementary">High School</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $firstName; ?>" placeholder="Year Graduated" name="first_name" class="" id="first_name" autocomplete="new-first" required >
                    <label for="first_name">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="elementary" name="elementary" value="elementary">
                <label class="form-check-label" for="elementary">Graduate</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $firstName; ?>" placeholder="Year Graduated" name="first_name" class="" id="first_name" autocomplete="new-first" required >
                    <label for="first_name">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $firstName; ?>" placeholder="Degree" name="first_name" class="" id="first_name" autocomplete="new-first" required >
                    <label for="first_name">Degree</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $contactNo; ?>" placeholder="Office Telephone No." maxlength="11" name="contact" class="" id="contact" autocomplete="new-contact" onkeypress='return isNumberKey(event)' required  >
                    <label for="contact">Office Telephone No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $contactNo; ?>" placeholder="Mobile Phone No." maxlength="11" name="contact" class="" id="contact" autocomplete="new-contact" onkeypress='return isNumberKey(event)' required  >
                    <label for="contact">Mobile Phone No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $contactNo; ?>" placeholder="Alumni Chapter Membership" maxlength="11" name="contact" class="" id="contact" autocomplete="new-contact" onkeypress='return isNumberKey(event)' required  >
                    <label for="contact">Alumni Chapter Membership</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">
                    
                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="email" value="<?php echo $email; ?>" placeholder="Email" name="email" class="" id="email" autocomplete="off" required >
                    <label for="email">Email</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $userName; ?>" placeholder="Username" name="user_name" class="" id="user_name" autocomplete="off" required >
                    <label for="user_name">Username</label>
                </div>
                &nbsp;&nbsp;


                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="password" value="<?php echo $password; ?>" placeholder="Password" name="password" class="" id="password" autocomplete="off" required >
                    <label for="password">Password</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

    
                <input style="float:right;" class="btn btn-success" type="submit" name="submit" value="Register">
                

        </div>
        <div class="card-footer bg-primary text-light">
        <input type="button" class="btn btn-light invisible" value="Register">
        </div>

    
    </div>

</div>

<script>
function isNumberKey(evt){

var charCode = (evt.which) ? evt.which : event.keyCode

if(charCode > 31 && (charCode < 40 || charCode > 41) && ( charCode < 48 || charCode > 57) && charCode != 43  && charCode != 45 )

    return false;

return true;

}
</script>

<?php
include("bins/footer.php");
?>