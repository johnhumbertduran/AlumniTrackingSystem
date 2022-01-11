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
$post = "";
?>
<style>
    input[type='number']{
    width: 60px;
}
</style>

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

            if(isset($_POST["payment"])){

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

                    
                }else{
                    echo "<script>alert('Payment Method empty!');</script>";
                }

            }

            
            ?>
                


                <!-- ######################################################################## -->

                <hr>

                <div class="d-flex justify-content-between">

                <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="payment_method" value="Cash Payment" <?php if($payment_method == "Cash Payment"){ echo "checked"; } ?> id="cash_payment" onclick="cashPayment()">
                <label class="form-check-label" for="cash_payment">Option 1: Walk-In Payment (Cash or Cheque)</label>
                </div>

                <div class="form-check col-4">
                <input class="form-check-input" type="radio" name="payment_method" value="Bank Payment" <?php if($payment_method == "Bank Payment"){ echo "checked"; } ?> id="bank_payment" onclick="bankPayment()">
                <label class="form-check-label" for="bank_payment">Option 2: Bank Payment</label>
                </div>

                </div>

                <hr class="" id="forHr">
                
                <div class="d-none" id="forWalkIn">
                <!-- <hr> -->
                    <h6>Please download the form and submit to ACC OSA.</h6>
                    <a href="bins/alumniRegistrationForm.pdf" class="btn btn-primary">DOWNLOAD FORM HERE</a>
                </div>
                
                <div class="" id="forBank">
                <!-- <hr> -->

                    <div>
                        <p><b>Registration Fee</b>  per person = Php 1,000 or US$20</p>
                        <table>
                            <tr>
                                <td>Reservation: &nbsp;</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="1" value="1" width="10"></td>
                            </tr>
                            <tr>
                                <td>Total: </td>
                                <td><input type="text" class="form-control form-control-sm col-6" min="1" style="width: 60px;" disabled></td>
                            </tr>
                        </table>
                    </div>


                </div>


                <hr>
                <!-- ######################################################################## -->

    
                <input style="float:right;" class="btn btn-success d-none" type="submit" id="submitPayment" name="payment" value="Submit Payment">
                <a style="float:right;" class="btn btn-success d-none" href="#" id="downloadFile">Download File</a>
                
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


    let cash_payment = document.getElementById("cash_payment");
    let bank_payment = document.getElementById("bank_payment");



    function cashPayment(){
        
        if(cash_payment.checked == true){
            document.getElementById("forWalkIn").classList.remove('d-none');
            document.getElementById("forWalkIn").classList.add('d-block');
            document.getElementById("forHr").classList.remove('d-none');
            document.getElementById("forHr").classList.add('d-block');
            document.getElementById("downloadFile").classList.remove('d-none');
            document.getElementById("downloadFile").classList.add('d-block');
            document.getElementById("forBank").classList.remove('d-block');
            document.getElementById("forBank").classList.add('d-none');
            document.getElementById("submitPayment").classList.remove('d-block');
            document.getElementById("submitPayment").classList.add('d-none');
        }
        
    }
    
    function bankPayment(){
        
        if(bank_payment.checked == true){
            document.getElementById("forBank").classList.remove('d-none');
            document.getElementById("forBank").classList.add('d-block');
            document.getElementById("forHr").classList.remove('d-none');
            document.getElementById("forHr").classList.add('d-block');
            document.getElementById("submitPayment").classList.remove('d-none');
            document.getElementById("submitPayment").classList.add('d-block');
            document.getElementById("forWalkIn").classList.remove('d-block');
            document.getElementById("forWalkIn").classList.add('d-none');
            document.getElementById("downloadFile").classList.remove('d-block');
            document.getElementById("downloadFile").classList.add('d-none');
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
