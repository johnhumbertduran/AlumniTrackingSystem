<br>

<div class="container col">

<div class="card">

    <div class="card-header bg-primary text-light"><h2>Update Record</h2><button type="button" style="position:absolute; right:10px; top: 10px;" class="btn-close" onclick="backToAlumni()"></button></div>
    
        <div class="card-body">
            <form autocomplete="off" method="POST">
            <?php
           $id_no = $lastName = $firstName = $middleName = $address = $sex = $civilStatus = $employmentAddress =
           $workPosition = $elementary = $elementaryYearGraduate = $college = $collegeYearGraduate =
           $collegeDegree = $highSchool = $highSchoolYearGraduate = $graduate = $graduateSchoolYearGraduate =
           $graduateDegree = $officeTelephoneNo = $mobilePhoneNo = $alumniChapterMembership = "";

           $date = date("Y");
           if(isset($_GET["update"])){
               $id_no = $_GET["update"];
           }


            $check_id_no = mysqli_query($connections, "SELECT * FROM users_tbl WHERE id_no='$id_no' ");
            while($get_id_no = mysqli_fetch_assoc($check_id_no)){

                $db_id_number = $get_id_no["id_no"];
                $lastName = $get_id_no["last_name"];
                $firstName = $get_id_no["first_name"];
                $middleName = $get_id_no["middle_name"];
                $address = $get_id_no["employment_address"];
                $sex = $get_id_no["sex"];
                $civilStatus = $get_id_no["civil_status"];
                $employmentAddress = $get_id_no["employment_address"];
                $workPosition = $get_id_no["current_work"];
                // $elementary = $get_id_no[""];
                $elementaryYearGraduate = $get_id_no["elementary_graduate"];
                // $college = $get_id_no[""];
                $collegeYearGraduate = $get_id_no["college_graduate"];
                $collegeDegree = $get_id_no["college_degree"];
                // $highSchool = $get_id_no[""];
                $highSchoolYearGraduate = $get_id_no["highschool_graduate"];
                // $graduate = $get_id_no[""];
                $graduateSchoolYearGraduate = $get_id_no["graduate_graduate"];
                $graduateDegree = $get_id_no["graduate_degree"];
                $officeTelephoneNo = $get_id_no["office_telephone"];
                $mobilePhoneNo = $get_id_no["mobile_number"];
                $alumniChapterMembership = $get_id_no["alumni_chapter_membership"];


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

                if(!empty($_POST["sex"])){
                $sex = $_POST["sex"];
                }

                if(!empty($_POST["civil_status"])){
                $civilStatus = $_POST["civil_status"];
                }

                if(!empty($_POST["employment_address"])){
                    $employmentAddress = $_POST["employment_address"];
                }

                if(!empty($_POST["work_position"])){
                    $workPosition = $_POST["work_position"];
                }

                if(!empty($_POST["elementary"])){
                $elementary = $_POST["elementary"];
                }

                if(!empty($_POST["elementary_year_graduate"])){
                    $elementaryYearGraduate = $_POST["elementary_year_graduate"];
                    if(strlen($elementaryYearGraduate) < 4){
                        echo "<script> alert('Elementary Year Graduated must be 4 numbers!'); </script>";
                    }
                }

                if(!empty($_POST["college"])){
                $college = $_POST["college"];
                }

                if(!empty($_POST["college_year_graduate"])){
                    $collegeYearGraduate = $_POST["college_year_graduate"];
                    if(strlen($collegeYearGraduate) < 4){
                        echo "<script> alert('College Year Graduated must be 4 numbers!'); </script>";
                    }
                }

                if(!empty($_POST["college_degree"])){
                    $collegeDegree = $_POST["college_degree"];
                }

                if(!empty($_POST["high_school"])){
                    $highSchool = $_POST["high_school"];
                }

                if(!empty($_POST["high_school_year_graduate"])){
                    $highSchoolYearGraduate = $_POST["high_school_year_graduate"];
                    if(strlen($highSchoolYearGraduate) < 4){
                        echo "<script> alert('High School Year Graduated must be 4 numbers!'); </script>";
                    }
                }

                if(!empty($_POST["graduate_school"])){
                    $graduate = $_POST["graduate_school"];
                }

                if(!empty($_POST["graduate_school_year_graduate"])){
                    $graduateSchoolYearGraduate = $_POST["graduate_school_year_graduate"];
                    if(strlen($graduateSchoolYearGraduate) < 4){
                        echo "<script> alert('Graduate School Year Graduated must be 4 numbers!'); </script>";
                    }
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

                if(!empty($_POST["username"])){
                    $userName = $_POST["username"];
                }

                if(!empty($_POST["password"])){
                    $password = $_POST["password"];
                }
                

                    if($lastName && $firstName && $middleName && $address && $sex && $civilStatus
                        && $employmentAddress && $workPosition && $mobilePhoneNo && $alumniChapterMembership){

                        if(!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $lastName)){
                            echo "<script> alert('Last Name should not have numbers or symbols.'); </script>";
                        }else{
                            if(!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $firstName)){
                                echo "<script> alert('First Name should not have numbers or symbols.'); </script>";
                            }else{
                                if(!preg_match("/^[a-zA-Z.ñÑ\- ]*$/", $middleName)){
                                    echo "<script> alert('Middle Name should not have numbers or symbols.'); </script>";
                                }else{
                                    if($elementaryYearGraduate >= $date){
                                        echo "<script> alert('Elementary Year Graduated should not be greater than or equal to this year'); </script>";
                                    }else{
                                        if($highSchoolYearGraduate >= $date){
                                            echo "<script> alert('Hgih School Year Graduated should not be greater than or equal to this year'); </script>";
                                        }else{
                                            if($collegeYearGraduate >= $date){
                                                echo "<script> alert('College Year Graduated should not be greater than or equal to this year'); </script>";
                                            }else{
                                                if($graduateSchoolYearGraduate >= $date){
                                                    echo "<script> alert('Graduate Year Graduated should not be greater than or equal to this year'); </script>";
                                                }else{
                                                    if(empty($elementary) && empty($highSchool) && empty($college) && empty($graduate)){
                                                        echo "<script> alert('Please select school level you attended!'); </script>";
                                                    }else{
                                                        if(strlen($mobilePhoneNo) < 11){
                                                            echo "<script> alert('Mobile Phone Number must be 11 numbers!'); </script>";                                    
                                                            }else{
                                                            // mysqli_query($connections, "UPDATE users_tbl SET last_name='$lastName',first_name='$firstName',middle_name='$middleName',
                                                            // home_address='$address',sex='$sex',civil_status='$civilStatus',employment_address='$employmentAddress',current_work='$workPosition',
                                                            // elementary_graduate='$elementaryYearGraduate',highschool_graduate='$highSchoolYearGraduate',college_graduate='$collegeYearGraduate',
                                                            // graduate_graduate='$graduateSchoolYearGraduate',college_degree='$collegeDegree',graduate_degree='$graduateDegree',
                                                            // office_telephone='$officeTelephoneNo',mobile_number='$mobilePhoneNo',alumni_chapter_membership='$alumniChapterMembership' WHERE id_no='$id_no' ");
                                                            
                                                            echo "<script> alert('Successfully Registered!');
                                                            // window.location.href='auth/users'; </script>";
                                                            // header('Location: ?');
                                                    
                                                }
                                            }
                                        }
                                    }
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
                
                    <input class="form-check-input" type="radio" name="sex" value="Male" <?php if($sex == "Male"){ echo "checked "; } ?> id="male" required>
                    <label class="form-check-label" for="male">Male</label>
                    <br>
                    <input class="form-check-input" type="radio" name="sex" value="Female" <?php if($sex == "Female"){ echo "checked "; } ?> id="female" required>
                    <label class="form-check-label" for="female">Female</label>
                    

                </div>
                &nbsp;&nbsp;

                <p>Civil&nbsp;Status:&nbsp;</p>
                <div class="form-check flex-fill">
                
                    <input class="form-check-input" type="radio" name="civil_status" value="Single" <?php if($civilStatus == "Single"){ echo "checked "; } ?> id="single" required>
                    <label class="form-check-label" for="single">Single</label>
                    
                    <br>
                
                    <input class="form-check-input" type="radio" name="civil_status" value="Married" <?php if($civilStatus == "Married"){ echo "checked "; } ?> id="married" required>
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
                <input type="checkbox" class="form-check-input" id="elementary" name="elementary" <?php if($elementary == "elementary"){ echo "checked "; } if(!empty($elementaryYearGraduate)){ echo "checked "; } ?> value="elementary" onclick="elementaryDisable()">
                <label class="form-check-label" for="elementary">Elementary</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $elementaryYearGraduate; ?>" maxlength="4" placeholder="Year Graduated" name="elementary_year_graduate" class="" id="elementary_year_graduate" onkeypress='return isNumberKey(event)' autocomplete="new-elementary-graduate" <?php if($elementary != "elementary"){ echo "disabled"; } if(!empty($elementaryYearGraduate)){ echo "enabled "; } ?> required >
                    <label for="elementary_year_graduate">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="college" name="college" <?php if($college == "college"){ echo "checked "; } if(!empty($collegeYearGraduate)){ echo "checked "; } ?> value="college" onclick="collegeDisable()">
                <label class="form-check-label" for="college">College</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $collegeYearGraduate; ?>" maxlength="4" placeholder="Year Graduated" name="college_year_graduate" class="" id="college_year_graduate" onkeypress='return isNumberKey(event)' autocomplete="new-college-graduate" <?php if($college != "college"){ echo "disabled"; } if(!empty($collegeYearGraduate)){ echo "enabled "; } ?> required >
                    <label for="college_year_graduate">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $collegeDegree; ?>" placeholder="Degree" name="college_degree" class="" id="college_degree" autocomplete="new-college-degree" <?php if($college != "college"){ echo "disabled"; } if(!empty($collegeYearGraduate)){ echo "enabled "; } ?> required >
                    <label for="college_degree">Degree</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="high_school" name="high_school" <?php if($highSchool == "high_school"){ echo "checked "; } if(!empty($highSchoolYearGraduate)){ echo "checked "; } ?> value="high_school" onclick="highSchoolDisable()">
                <label class="form-check-label" for="high_school">High School</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $highSchoolYearGraduate; ?>" maxlength="4" placeholder="Year Graduated" name="high_school_year_graduate" class="" id="high_school_year_graduate" onkeypress='return isNumberKey(event)' autocomplete="new-high-school-graduate" <?php if($highSchool != "high_school"){ echo "disabled"; } if(!empty($highSchoolYearGraduate)){ echo "enabled "; } ?> required >
                    <label for="high_school_year_graduate">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-check flex-fill">
                <input type="checkbox" class="form-check-input" id="graduate_school" name="graduate_school" <?php if($graduate == "graduate_school"){ echo "checked "; } if(!empty($graduateSchoolYearGraduate)){ echo "checked "; } ?> value="graduate_school" onclick="graduateDisable()">
                <label class="form-check-label" for="graduate_school">Graduate</label>
                </div>

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $graduateSchoolYearGraduate; ?>" maxlength="4" placeholder="Year Graduated" name="graduate_school_year_graduate" class="" id="graduate_school_year_graduate" onkeypress='return isNumberKey(event)' autocomplete="new-graduate" <?php if($graduate != "graduate_school"){ echo "disabled"; } if(!empty($graduateSchoolYearGraduate)){ echo "enabled "; } ?> required >
                    <label for="graduate_school_year_graduate">Year Graduated</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $graduateDegree; ?>" placeholder="Degree" name="graduate_degree" class="" id="graduate_degree" autocomplete="new-graduate-degree" <?php if($graduate != "graduate_school"){ echo "disabled"; } if(!empty($graduateSchoolYearGraduate)){ echo "enabled "; } ?> required >
                    <label for="graduate_degree">Degree</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-floating col-3 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $officeTelephoneNo; ?>" placeholder="Office Telephone No." maxlength="7" name="office_telephone_no" class="" id="office_telephone_no" autocomplete="new-telephone" onkeypress='return isNumberKey(event)'  >
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

    
                <div style="float:right;">
                <a href="?" class="btn btn-danger" type="submit" name="submit">Cancel</a>
                <input class="btn btn-success" type="submit" name="submit" value="Update">
                </div>

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

function elementaryDisable(){
    let elementaryYearGraduate = document.getElementById("elementary_year_graduate");
    let elementary = document.getElementById("elementary");
    
    if(elementary.checked == true){
        elementaryYearGraduate.disabled = false;
    }
    
    if(elementary.checked == false){
        elementaryYearGraduate.disabled = true;
        elementaryYearGraduate.value = "";
    }
}

function collegeDisable(){
    let collegeYearGraduate = document.getElementById("college_year_graduate");
    let collegeDegree = document.getElementById("college_degree");
    let college = document.getElementById("college");
    
    if(college.checked == true){
        collegeYearGraduate.disabled = false;
        collegeDegree.disabled = false;
    }
    
    if(college.checked == false){
        collegeYearGraduate.disabled = true;
        collegeYearGraduate.value = "";
        collegeDegree.disabled = true;
        collegeDegree.value = "";
    }
}

function highSchoolDisable(){
    let high_school_year_graduate = document.getElementById("high_school_year_graduate");
    let high_school = document.getElementById("high_school");
    
    if(high_school.checked == true){
        high_school_year_graduate.disabled = false;
    }
    
    if(high_school.checked == false){
        high_school_year_graduate.disabled = true;
        high_school_year_graduate.value = "";
    }
}

function graduateDisable(){
    let graduate_school_year_graduate = document.getElementById("graduate_school_year_graduate");
    let graduate_degree = document.getElementById("graduate_degree");
    let graduate_school = document.getElementById("graduate_school");
    
    if(graduate_school.checked == true){
        graduate_school_year_graduate.disabled = false;
        graduate_degree.disabled = false;
    }
    
    if(graduate_school.checked == false){
        graduate_school_year_graduate.disabled = true;
        graduate_degree.disabled = true;
        graduate_school_year_graduate.value = "";
        graduate_degree.value ="";
    }
}

function backToAlumni(){
    window.location.href = "?";
}

</script>