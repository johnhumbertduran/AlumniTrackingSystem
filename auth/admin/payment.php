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
            $chequeBank = $chequeOfficialReceipt = $chequeDateOfPayment = $id_no = $alumni_name = $alumni_name_retain = $payment_method =
            $search = $fullName = "";


            if(isset($_POST['search'])){
                $id_no = $_POST['id_no'];
                $check_id_no = mysqli_query($connections, "SELECT * FROM users_tbl WHERE id_no='$id_no' AND account_type='2' ");
                $row_user_check = mysqli_num_rows($check_id_no);
  
                if($row_user_check > 0){


                if(!empty($_POST['id_no'])){
                    
                    $check_alumni_id = mysqli_query($connections, "SELECT * FROM users_tbl WHERE id_no='$id_no' AND account_type='2' ");
                    $get_alumni_names = mysqli_fetch_assoc($check_alumni_id);
                    $firstName = $get_alumni_names["first_name"];
                    $lastName = $get_alumni_names["last_name"];
                    $middleName = $get_alumni_names["middle_name"];
                    $fullName = $firstName . " " . ucfirst($middleName[0]) . "." . " " . $lastName;
                    
                    $search = $_POST['id_no'];
                    

                    $check_payment_record = mysqli_query($connections, "SELECT * FROM payments_tbl WHERE id_no='$search'");
                    $row_id = mysqli_num_rows($check_payment_record);
      
                        if($row_id > 0){
                            $id_no = "";
                            $fullName = "";
                            echo "<script>alert('User $search, named $fullName is already paid!');</script>";
                        }else{
                            if(empty($_POST["first_name"])){
                                $alumni_name = $fullName;
                            }else{
                                echo "<script>alert('Not empty');</script>";
                            }
                            //$alumni_name_retain = $_POST["first_name"];
                        }
                    }
                }else{
                    echo "<script>alert('User not found!');</script>";
                }
            }

            
                

            if(isset($_POST["payment"])){
                // echo "<script>alert('clicked');</script>";
                
            // if(empty($_POST["first_name"])){
            //     echo "<script>alert('Please input ID number and Payment Method!');</script>";
            // }else{
                if(!empty($_POST["payment_method"])){
                    $id_no = $_POST['id_no'];
                    $check_alumni_id = mysqli_query($connections, "SELECT * FROM users_tbl WHERE id_no='$id_no'");
                    $get_alumni_names = mysqli_fetch_assoc($check_alumni_id);
                    $firstName = $get_alumni_names["first_name"];
                    $lastName = $get_alumni_names["last_name"];
                    $middleName = $get_alumni_names["middle_name"];
                    $fullName = $firstName . " " . ucfirst($middleName[0]) . "." . " " . $lastName;
                    $payment_method = $_POST["payment_method"];
                    $search = $_POST['id_no'];
                    // if(!empty($_POST["first_name"])){
                    //     $fullName = $_POST["first_name"];
                    // }
                    // $alumni_name = $fullName;

                    if($payment_method == "Cash Payment"){
                        if(!empty($_POST["cash_official_receipt"])){
                            $cashOfficialReceipt = $_POST["cash_official_receipt"];
                        }

                        if(!empty($_POST["cash_date_of_payment"])){
                            $cashDateOfPayment = $_POST["cash_date_of_payment"];
                        }

                        if($id_no && $cashOfficialReceipt && $cashDateOfPayment){
                            mysqli_query($connections, "INSERT INTO payments_tbl (id_no,cash_official_receipt,cash_date_of_payment)
                            VALUES ('$id_no','$cashOfficialReceipt','$cashDateOfPayment')");
                            echo "<script> alert('Payment Successfully!'); window.location.href='?';</script>";
                            // header('Location: ?');
                        }
                    }elseif($payment_method == "Bank Payment"){
                        if(!empty($_POST["bank_official_receipt"])){
                            $bankOfficialReceipt = $_POST["bank_official_receipt"];
                        }

                        if(!empty($_POST["bank_date_of_payment"])){
                            $bankDateOfPayment = $_POST["bank_date_of_payment"];
                        }
                        
                        if($id_no && $bankOfficialReceipt && $bankDateOfPayment){
                            mysqli_query($connections, "INSERT INTO payments_tbl (id_no,bank_official_receipt,bank_date_of_payment)
                            VALUES ('$id_no','$bankOfficialReceipt','$bankDateOfPayment')");
                            echo "<script> alert('Payment Successfully!'); window.location.href='?';</script>";
                            // header('Location: ?');
                        }
                    }elseif($payment_method == "Cheque Payment"){
                        if(!empty($_POST["cheque_no"])){
                            $chequeNo = $_POST["cheque_no"];
                        }

                        if(!empty($_POST["cheque_bank"])){
                            $chequeBank = $_POST["cheque_bank"];
                        }
                        if(!empty($_POST["cheque_official_receipt"])){
                            $chequeOfficialReceipt = $_POST["cheque_official_receipt"];
                        }

                        if(!empty($_POST["cheque_date_of_payment"])){
                            $chequeDateOfPayment = $_POST["cheque_date_of_payment"];
                        }
                                                
                        if($id_no && $chequeNo && $chequeBank && $chequeOfficialReceipt && $chequeDateOfPayment){
                            mysqli_query($connections, "INSERT INTO payments_tbl (id_no,cheque_no,cheque_bank,
                            cheque_official_receipt,cheque_date_of_payment)
                            VALUES ('$id_no','$chequeNo','$chequeBank','$chequeOfficialReceipt','$chequeDateOfPayment')");
                            echo "<script> alert('Payment Successfully!'); window.location.href='?';</script>";
                            // header('Location: ?');
                        }
                    }
                }else{
                    echo "<script>alert('Payment Method empty!');</script>";
                }

                // echo $payment_method;

                //     if($payment_method){
                       

                    // }
                // }
            }

            
            ?>
                
                <div class="d-flex justify-content-between">
                <form method="POST">
                <div class="form-floating">
                    <input class="form-control" type="text" value="<?php echo $id_no; ?>" placeholder="ID Number" name="id_no" class="" id="id_no" onkeypress='return isEnterKey(event)'>
                    <label for="id_no">ID Number</label>
                </div>
                

                <div class="form-floating ps-3 pe-3">
                <input class="btn btn-success p-3 ps-5 pe-5" type="submit" name="search" value="Search">
                </div>
                

                <div class="form-floating flex-fill">
                    <input class="form-control" type="text" value="<?php echo $alumni_name; ?>" placeholder="First Name" name="first_name" class="" id="first_name" autocomplete="new-first" disabled>
                    <label for="first_name">Name</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->


                <!-- ######################################################################## -->

                <div class="d-flex justify-content-between">

                <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="payment_method" value="Cash Payment" <?php if($payment_method == "Cash Payment"){ echo "checked"; } ?> id="cash_payment" onclick="cashPaymentDisable()">
                <label class="form-check-label" for="cash_payment">Option 1: Cash Payment</label>
                </div>

                <div class="form-floating col-4 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $cashOfficialReceipt; ?>" placeholder="Official Recipt No." name="cash_official_receipt" class="" id="cash_official_receipt" <?php if($payment_method != "Cash Payment"){ echo "disabled"; } ?> autocomplete="new-address-cash-official-receipt" required >
                    <label for="cash_official_receipt">Official Receipt No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-4 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $cashDateOfPayment; ?>" placeholder="Date of Payment" name="cash_date_of_payment" class="" id="cash_date_of_payment" <?php if($payment_method != "Cash Payment"){ echo "disabled"; } ?> autocomplete="new-cash-date-of-payment" required >
                    <label for="cash_date_of_payment">Date of Payment</label>
                </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="payment_method" value="Bank Payment" <?php if($payment_method == "Bank Payment"){ echo "checked"; } ?> id="bank_payment" onclick="bankPaymentDisable()">
                <label class="form-check-label" for="bank_payment">Option 2: Bank Payment</label>
                </div>

                <div class="form-floating col-4 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $bankOfficialReceipt; ?>" placeholder="Official Recipt No." name="bank_official_receipt" class="" id="bank_official_receipt" <?php if($payment_method != "Bank Payment"){ echo "disabled"; } ?> autocomplete="new-bank-official-receipt" required >
                    <label for="bank_official_receipt">Official Receipt No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-4 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $bankDateOfPayment; ?>" placeholder="Date of Payment" name="bank_date_of_payment" class="" id="bank_date_of_payment" <?php if($payment_method != "Bank Payment"){ echo "disabled"; } ?> autocomplete="new-bank-date-of-payment" required >
                    <label for="bank_date_of_payment">Date of Payment</label>
                </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                <div class="form-check col-3">
                <input class="form-check-input" type="radio" name="payment_method" value="Cheque Payment" <?php if($payment_method == "Cheque Payment"){ echo "checked"; } ?> id="cheque_payment" onclick="chequePaymentDisable()">
                <label class="form-check-label" for="cheque_payment">Option 3: Cheque Payment</label>
                </div>

                <div class="form-floating col-2 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $chequeNo; ?>" placeholder="Cheque No." name="cheque_no" class="" id="cheque_no" <?php if($payment_method != "Cheque Payment"){ echo "disabled"; } ?> autocomplete="new-cheque-no" required >
                    <label for="cheque_no">Cheque No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-2 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $chequeBank; ?>" placeholder="Bank" name="cheque_bank" class="" id="cheque_bank" <?php if($payment_method != "Cheque Payment"){ echo "disabled"; } ?> autocomplete="new-cheque-bank" required >
                    <label for="cheque_bank">Bank</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-2 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $chequeOfficialReceipt; ?>" placeholder="Official Recipt No." name="cheque_official_receipt" class="" id="cheque_official_receipt" <?php if($payment_method != "Cheque Payment"){ echo "disabled"; } ?> autocomplete="new-cheque-official-receipt" required >
                    <label for="cheque_official_receipt">Official Recipt No.</label>
                </div>
                &nbsp;&nbsp;

                <div class="form-floating col-2 flex-fill">
                    <input class="form-control" type="text" value="<?php echo $chequeDateOfPayment; ?>" placeholder="Date of Payment" name="cheque_date_of_payment" class="" id="cheque_date_of_payment" <?php if($payment_method != "Cheque Payment"){ echo "disabled"; } ?> autocomplete="new-cheque-date-of-payment" required >
                    <label for="cheque_date_of_payment">Date of Payment</label>
                </div>

                </div>

                <hr>
                <!-- ######################################################################## -->

    
                <input style="float:right;" class="btn btn-success" type="submit" name="payment" value="Submit Payment">
                
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

    let cash_official_receipt = document.getElementById("cash_official_receipt");
    let cash_date_of_payment = document.getElementById("cash_date_of_payment");
    let cash_payment = document.getElementById("cash_payment");

    let bank_official_receipt = document.getElementById("bank_official_receipt");
    let bank_date_of_payment = document.getElementById("bank_date_of_payment");
    let bank_payment = document.getElementById("bank_payment");

    let cheque_official_receipt = document.getElementById("cheque_official_receipt");
    let cheque_date_of_payment = document.getElementById("cheque_date_of_payment");
    let cheque_payment = document.getElementById("cheque_payment");
    let cheque_bank = document.getElementById("cheque_bank");
    let cheque_no = document.getElementById("cheque_no");

    function cashPaymentDisable(){
        
        if(cash_payment.checked == true){
            cash_official_receipt.disabled = false;
            cash_date_of_payment.disabled = false;
            cash_official_receipt.focus();

            bank_official_receipt.disabled = true;
            bank_date_of_payment.disabled = true;

            cheque_official_receipt.disabled = true;
            cheque_date_of_payment.disabled = true;
            cheque_bank.disabled = true;
            cheque_no.disabled = true;

            bank_official_receipt.value = "";
            bank_date_of_payment.value = "";

            cheque_official_receipt.value = "";
            cheque_date_of_payment.value = "";
            cheque_bank.value = "";
            cheque_no.value = "";
        }
        
    }
    
    function bankPaymentDisable(){
        
        if(bank_payment.checked == true){
            bank_official_receipt.disabled = false;
            bank_date_of_payment.disabled = false;
            bank_official_receipt.focus();

            cheque_official_receipt.disabled = true;
            cheque_date_of_payment.disabled = true;
            cheque_bank.disabled = true;
            cheque_no.disabled = true;

            cash_official_receipt.disabled = true;
            cash_date_of_payment.disabled = true;

            cheque_official_receipt.value = "";
            cheque_date_of_payment.value = "";
            cheque_bank.value = "";
            cheque_no.value = "";

            cash_official_receipt.value = "";
            cash_date_of_payment.value = "";
        }

    
    }
    
    function chequePaymentDisable(){
        
        if(cheque_payment.checked == true){
            cheque_official_receipt.disabled = false;
            cheque_date_of_payment.disabled = false;
            cheque_bank.disabled = false;
            cheque_no.disabled = false;
            cheque_no.focus();

            cash_official_receipt.disabled = true;
            cash_date_of_payment.disabled = true;

            bank_official_receipt.disabled = true;
            bank_date_of_payment.disabled = true;

            cash_official_receipt.value = "";
            cash_date_of_payment.value = "";

            bank_official_receipt.value = "";
            bank_date_of_payment.value = "";
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
