<?php
include("bins/header.php");
include("auth/bins/connections.php");
include("bins/nav.php");
?>


<br>


<div class="container col-4">

<div class="card">

    <div class="card-header bg-primary text-light"><h3>Register</h3></div>

        <div class="card-body">
            <form autocomplete="off" method="POST">
            <table width="100%">
            <?php
            $firstName = $lastName = $address = $contactNo = $email = $userName = $password = "";

            $idNo = "20210000";

            $check_idNo = mysqli_query($connections, "SELECT idNo FROM users_tbl ORDER BY idNo DESC LIMIT 1 ");
            while($get_idNo = mysqli_fetch_assoc($check_idNo)){

                $db_id_number = $get_idNo["idNo"];
                $idNo = $db_id_number;
            
            
            if($db_id_number >= $idNo){
            
                $idNo += 1;
                
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
                                            mysqli_query($connections, "INSERT INTO users_tbl (idNo,firstName,lastName,address,
                                            contactNo,email,username,password,account_type)
                                            VALUES ('$idNo','$firstName','$lastName','$address','$contactNo',
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

                <tr><td colspan="4"><hr></td></tr>
                <!-- <p>dash sa input butangan dahil sa validation</p> -->
                <div class="form-group">
                <tr>
                <td class="label text-end"><b><label for="idNo">ID Number: &nbsp;</label></b></td>
                <td colspan="3"><input class="form-control" type="text" value="<?php echo $idNo; ?>" name="idNo" class="" id="idNo" disabled></td>
                </tr>
                </div>


                <div class="form-group">
                <tr>
                <td class="label text-end"><b><label for="first_name">First Name: &nbsp;</label></b></td>
                <td colspan="3"><input class="form-control" type="text" value="<?php echo $firstName; ?>" name="first_name" class="" id="first_name" autocomplete="new-first" required ></td>
                </tr>
                </div>


                <div class="form-group">
                <tr>
                <td class="label text-end"><b><label for="last_name">Last Name: &nbsp;</label></b></td>
                <td colspan="3"><input class="form-control" type="text" value="<?php echo $lastName; ?>" name="last_name" class="" id="last_name" autocomplete="new-last" required ></td>
                </tr>
                </div>


                <div class="form-group">
                <tr>
                <td class="label text-end"><b><label for="address">Address: &nbsp;</label></b></td>
                <td colspan="3"><input class="form-control" type="text" value="<?php echo $address; ?>" name="address" class="" id="address" autocomplete="new-address" required ></td>
                </tr>
                </div>


                <div class="form-group">
                <tr>
                <td class="label text-end"><b><label for="contact">Contact Number: &nbsp;</label></b></td>
                <td colspan="3"><input class="form-control" type="text" value="<?php echo $contactNo; ?>" maxlength="11" name="contact" class="" id="contact" autocomplete="new-contact" onkeypress='return isNumberKey(event)' required  ></td>
                </tr>
                </div>


                <div class="form-group">
                <tr>
                <td class="label text-end"><b><label for="email">Email: &nbsp;</label></b></td>
                <td colspan="3"><input class="form-control" type="email" value="<?php echo $email; ?>" name="email" class="" id="email" autocomplete="off" required ></td>
                </tr>
                </div>


                <div class="form-group">
                <tr>
                <td class="label text-end"><b><label for="user_name">User Name: &nbsp;</label></b></td>
                <td colspan="3"><input class="form-control" type="text" value="<?php echo $userName; ?>" name="user_name" class="" id="user_name" autocomplete="off" required ></td>
                </tr>
                </div>


                <div class="form-group">
                <tr>
                <td class="label text-end"><b><label for="password">Password: &nbsp;</label></b></td>
                <td colspan="3"><input class="form-control" type="password" value="<?php echo $password; ?>" name="password" class="" id="password" autocomplete="off" required ></td>
                </tr>
                </div>

                <tr><td colspan="4"><hr></td></tr>
    
                <tr>
                    <td colspan="4"><input style="float:right;" class="btn btn-success" type="submit" name="submit" value="Register"></td>
                </tr>
                
            </table>
            </form>
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