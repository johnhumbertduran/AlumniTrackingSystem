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


$post = "";
?>


<br>


<div class="container col">

<div class="card">

    <div class="card-header bg-primary text-light"><h2>Registration Fee Payment</h2></div>

        <div class="card-body">
            <form autocomplete="off" method="POST">
            <?php
            $cashOfficialReceipt = $cashDateOfPayment = $bankOfficialReceipt = $bankDateOfPayment = $chequeNo =
            $chequeBank = $chequeOfficialReceipt = $chequeDateOfPayment = $id_no = "";



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
            
            ?>
                
                <div class="form-floating ">
                    <input class="form-control" type="text" value="<?php echo $id_no; ?>" placeholder="ID Number" name="id_no" class="" id="id_no" >
                    <label for="id_no">ID Number</label>
                </div>

                <hr>
                <!-- ######################################################################## -->


                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="male" id="male" onclick="cashPaymentDisable()">
                <label class="form-check-label" for="male">Option 1: Cash Payment</label>
            </div>

                <div class="form-floating col-4 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $cashOfficialReceipt; ?>" placeholder="Official Recipt No." name="cash_official_receipt" class="" id="cash_official_receipt" autocomplete="new-address-cash-official-receipt" disabled required >
                    <label for="cash_official_receipt">Official Receipt No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-4 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $cashDateOfPayment; ?>" placeholder="Date of Payment" name="cash_date_of_payment" class="" id="cash_date_of_payment" autocomplete="new-cash-date-of-payment" disabled required >
                    <label for="cash_date_of_payment">Date of Payment</label>
                </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="male" id="male">
                <label class="form-check-label" for="male">Option 2: Bank Payment</label>
            </div>

                <div class="form-floating col-4 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $bankOfficialReceipt; ?>" placeholder="Official Recipt No." name="bank_official_receipt" class="" id="bank_official_receipt" autocomplete="new-bank-official-receipt" disabled required >
                    <label for="bank_official_receipt">Official Receipt No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-4 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $bankDateOfPayment; ?>" placeholder="Date of Payment" name="bank_date_of_payment" class="" id="bank_date_of_payment" autocomplete="new-bank-date-of-payment" disabled required >
                    <label for="bank_date_of_payment">Date of Payment</label>
                </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                <div class="form-check col-3">
                <input class="form-check-input" type="radio" name="male" id="male">
                <label class="form-check-label" for="male">Option 3: Cheque Payment</label>
            </div>

                <div class="form-floating col-2 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $chequeNo; ?>" placeholder="Cheque No." name="cheque_no" class="" id="cheque_no" autocomplete="new-cheque-no" disabled required >
                    <label for="cheque_no">Cheque No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-2 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $chequeBank; ?>" placeholder="Bank" name="cheque_bank" class="" id="cheque_bank" autocomplete="new-cheque-bank" disabled required >
                    <label for="cheque_bank">Bank</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-2 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $chequeOfficialReceipt; ?>" placeholder="Official Recipt No." name="cheque_official_receipt" class="" id="cheque_official_receipt" autocomplete="new-cheque-official-receipt" disabled required >
                    <label for="cheque_official_receipt">Official Recipt No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-2 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $chequeDateOfPayment; ?>" placeholder="Date of Payment" name="cheque_date_of_payment" class="" id="cheque_date_of_payment" autocomplete="new-cheque-date-of-payment" disabled required >
                    <label for="cheque_date_of_payment">Date of Payment</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

    
                <input style="float:right;" class="btn btn-success" type="submit" name="submit" value="Submit Payment">
                

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

function cashPaymentDisable(){
    let cashOfficialReceipt = document.getElementById("cash_official_receipt");
    let cashDateOfPayment = document.getElementById("cash_date_of_payment");
    
    if(elementary.checked == true){
        elementaryYearGraduate.disabled = false;
    }
    
    if(elementary.checked == false){
        elementaryYearGraduate.disabled = true;
        elementaryYearGraduate.value = "";
    }
}

</script>

<br>
<br>
<br>
<br>

<?php
include("bins/footer.php");
?>
