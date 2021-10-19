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
           $lastName = $firstName = $middleName = $address = $sex = $civilStatus = $employmentAddress =
           $workPosition = $elementary = $elementaryYearGraduate = $college = $collegeYearGraduate =
           $collegeDegree = $highSchool = $highSchoolYearGraduate = $graduate = $graduateSchoolYearGraduate =
           $graduateDegree = $officeTelephoneNo = $mobilePhoneNo = $alumniChapterMembership = $email = $userName = $password = "";

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

                if(!empty($_POST["last_name"])){
                    $lastName = $_POST["last_name"];
                }

                if(!empty($_POST["first_name"])){
                    $firstName = $_POST["first_name"];
                }

                if(!empty($_POST["middle_name"])){
                    $middleName = $_POST["middle_name"];
                }

                if(!empty($_POST["address"])){
                    $address = $_POST["address"];
                }

                $sex = $_POST["sex"];

                $civilStatus = $_POST["civil_status"];

                if(!empty($_POST["employment_address"])){
                    $employmentAddress = $_POST["employment_address"];
                }

                if(!empty($_POST["work_position"])){
                    $workPosition = $_POST["work_position"];
                }

                if(!empty($_POST["elementary_year_graduate"])){
                    $elementaryYearGraduate = $_POST["elementary_year_graduate"];
                }

                if(!empty($_POST["college_year_graduate"])){
                    $collegeYearGraduate = $_POST["college_year_graduate"];
                }

                if(!empty($_POST["college_degree"])){
                    $collegeDegree = $_POST["college_degree"];
                }

                if(!empty($_POST["high_school_year_graduate"])){
                    $highSchoolYearGraduate = $_POST["high_school_year_graduate"];
                }

                if(!empty($_POST["graduate_school_year_graduate"])){
                    $graduateSchoolYearGraduate = $_POST["graduate_school_year_graduate"];
                }

                if(!empty($_POST["graduate_degree"])){
                    $graduateDegree = $_POST["graduate_degree"];
                }

                if(!empty($_POST["office_telephone_no"])){
                    $officeTelephoneNo = $_POST["office_telephone_no"];
                }

                if(!empty($_POST["mobile_phone_no"])){
                    $mobilePhoneNo = $_POST["mobile_phone_no"];
                }

                if(!empty($_POST["alumni_chapter_membership"])){
                    $alumniChapterMembership = $_POST["alumni_chapter_membership"];
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

                    if($firstName && $lastName && $address && $email && $userName && $password){
                        if(!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $firstName)){
                            echo "<script> alert('First Name should not have numbers or symbols.'); </script>";
                        }else{
                            if(!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $lastName)){
                                echo "<script> alert('Last Name should not have numbers or symbols.'); </script>";
                            }else{
                                if(strlen($officeTelephoneNo) < 8){
                                // echo "<script> alert('Contact Number is insufficient!'); </script>";
                                }else{
                                    if(strlen($userName) < 8){
                                        echo "<script> alert('User Name must have atleast 8 alpha numeric character!'); </script>";
                                    }else{
                                        if(strlen($password) < 8){
                                            echo "<script> alert('Password must have atleast 8 alpha numeric character!'); </script>";
                                        }else{
                                            // mysqli_query($connections, "INSERT INTO users_tbl (id_no,firstName,lastName,address,
                                            // contactNo,email,username,password,account_type)
                                            // VALUES ('$id_no','$firstName','$lastName','$address','$contactNo',
                                            // '$email','$userName','$password','2')");
                                            echo "<script> alert('Successfully Registered!'); </script>";
                                            // header('Location: ?');
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
                    <input class="form-control" type="text" value="<?php echo $middleName; ?>" placeholder="Middle Name" name="middle_name" class="" id="middle_name" autocomplete="new-middle" required >
                    <label for="middle_name">Middle Name</label>
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
                
                    <input class="form-check-input" type="radio" name="sex" value="Male" <?php if($sex == "Male"){ echo "checked "; } ?> id="male">
                    <label class="form-check-label" for="male">Male</label>
                    <br>
                    <input class="form-check-input" type="radio" name="sex" value="Female" <?php if($sex == "Female"){ echo "checked "; } ?> id="female">
                    <label class="form-check-label" for="female">Female</label>
                    

                </div>
                &nbsp;&nbsp;

                <p>Civil&nbsp;Status:&nbsp;</p>
                <div class="form-check flex-fill">
                
                    <input class="form-check-input" type="radio" name="civil_status" value="Single" <?php if($civilStatus == "Single"){ echo "checked "; } ?> id="single">
                    <label class="form-check-label" for="single">Single</label>
                    
                    <br>
                
                    <input class="form-check-input" type="radio" name="civil_status" value="Married" <?php if($civilStatus == "Married"){ echo "checked "; } ?> id="married">
                    <label class="form-check-label" for="married">Married</label>
                    

                </div>
                
                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">
                    
                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" value="<?php echo $employmentAddress; ?>" placeholder="Employment Address" name="employment_address" class="" id="employment_address" autocomplete="new-employment" required >
                    <label for="employment_address">Employment Address</label>
                </div>
                &nbsp;&nbsp;
                
                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" value="<?php echo $workPosition; ?>" placeholder="Current Work/Position" name="work_position" class="" id="work_position" autocomplete="new-position" required >
                    <label for="work_position">Current Work/Position</label>
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
                    <input class="form-control" type="text" value="<?php echo $elementaryYearGraduate; ?>" placeholder="Year Graduated" name="elementary_year_graduate" class="" id="elementary_year_graduate" autocomplete="new-elementary-graduate" required >
                    <label for="elementary_year_graduate">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="college" name="college" value="college">
                <label class="form-check-label" for="college">College</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $collegeYearGraduate; ?>" placeholder="Year Graduated" name="college_year_graduate" class="" id="college_year_graduate" autocomplete="new-college-graduate" required >
                    <label for="college_year_graduate">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $collegeDegree; ?>" placeholder="Degree" name="college_degree" class="" id="college_degree" autocomplete="new-college-degree" required >
                    <label for="college_degree">Degree</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="high_school" name="high_school" value="high_school">
                <label class="form-check-label" for="high_school">High School</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $highSchoolYearGraduate; ?>" placeholder="Year Graduated" name="high_school_year_graduate" class="" id="high_school_year_graduate" autocomplete="new-high-school-graduate" required >
                    <label for="high_school_year_graduate">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="graduate_school" name="graduate_school" value="graduate_school">
                <label class="form-check-label" for="graduate_school">Graduate</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $graduateSchoolYearGraduate; ?>" placeholder="Year Graduated" name="graduate_school_year_graduate" class="" id="graduate_school_year_graduate" autocomplete="new-graduate" required >
                    <label for="graduate_school_year_graduate">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $graduateDegree; ?>" placeholder="Degree" name="graduate_degree" class="" id="graduate_degree" autocomplete="new-graduate-degree" required >
                    <label for="graduate_degree">Degree</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $officeTelephoneNo; ?>" placeholder="Office Telephone No." maxlength="7" name="office_telephone_no" class="" id="office_telephone_no" autocomplete="new-telephone" onkeypress='return isNumberKey(event)' required  >
                    <label for="office_telephone_no">Office Telephone No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $mobilePhoneNo; ?>" placeholder="Mobile Phone No." maxlength="11" name="mobile_phone_no" class="" id="mobile_phone_no" autocomplete="new-mobile" onkeypress='return isNumberKey(event)' required  >
                    <label for="mobile_phone_no">Mobile Phone No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $alumniChapterMembership; ?>" placeholder="Alumni Chapter Membership" name="alumni_chapter_membership" class="" id="alumni_chapter_membership" autocomplete="new-membership" required  >
                    <label for="alumni_chapter_membership">Alumni Chapter Membership</label>
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