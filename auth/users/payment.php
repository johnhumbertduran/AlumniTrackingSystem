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
    $id_no = $get_account_type["id_no"];
    
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
            
            <?php
            $payment_method = $fullName = $reservationQuantity = $totalReservation = $small =
            $medium = $large = $xl = $xxl = "";

            if(isset($_POST["reservationQuantity"])){
                $reservationQuantity = $_POST["reservationQuantity"];
            }else{
                $reservationQuantity = 1;
            }
            
            if(isset($_POST["totalReservation"])){
                $totalReservation = $_POST["totalReservation"];
            }else{
                $totalReservation = 1000;
            }

            if(isset($_POST["small"])){
                $small = $_POST["small"];
            }else{
                $small = 0;
            }

            if(isset($_POST["medium"])){
                $medium = $_POST["medium"];
            }else{
                $medium = 0;
            }


            if(isset($_POST["payment"])){

                if(!empty($_POST["payment_method"])){

                    // $id_no = $_POST['id_no'];
                    // $check_alumni_id = mysqli_query($connections, "SELECT * FROM users_tbl WHERE id_no='$id_no'");
                    // $get_alumni_names = mysqli_fetch_assoc($check_alumni_id);
                    // $firstName = $get_alumni_names["first_name"];
                    // $lastName = $get_alumni_names["last_name"];
                    // $middleName = $get_alumni_names["middle_name"];
                    // $fullName = $firstName . " " . ucfirst($middleName[0]) . "." . " " . $lastName;
                    // $payment_method = $_POST["payment_method"];
                    // $search = $_POST['id_no'];

                    $payment_method = $_POST["payment_method"];
                    // $totalReservation = $_POST["totalReservation"];

                    if(!empty($_POST["reservationQuantity"])){
                        $reservationQuantity = $_POST["reservationQuantity"];
                    }else{
                        echo "empty!";
                    }
                    
                    if(!empty($_POST["totalReservation"])){
                        $totalReservation = $_POST["totalReservation"];
                    }else{
                        echo "total empty!";
                    }
                    
                    if(!empty($_POST["small"])){
                        $small = $_POST["small"];
                    }else{
                        echo "small empty!";
                    }
                    
                    if(!empty($_POST["medium"])){
                        $medium = $_POST["medium"];
                    }else{
                        echo "medium empty!";
                    }

                    
                }else{
                    echo "<script>alert('Payment Method empty!');</script>";
                }

            }

            
            ?>
                


                <!-- ######################################################################## -->

                <hr>
                <form autocomplete="off" method="POST">
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
                
                <div class="d-none" id="forBank">
                <!-- <hr> -->
                
                    <div>
                        <p><b>Registration Fee</b>  per person = Php 1,000 or US$20</p>
                        <table id="myTable">
                            <tr>
                                <td>Reservation: &nbsp;</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="1" name="reservationQuantity" value="<?php echo $reservationQuantity;  ?>" width="10" id="reservationQuantity" onchange="reservationChange()" onkeyup="reservationChange()"></td>
                            </tr>
                            <tr>
                                <td>Total: </td>
                                <td><input type="text" class="form-control form-control-sm col-6" name="totalReservation" value="<?php echo $totalReservation;  ?>" id="totalReservation" style="width: 60px;" readonly></td>
                            </tr>
                            <tr>
                                <td><b>T-Shirt Size(s): </b></td>
                            </tr>
                            <tr>
                                <td>Small</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" name="small" value="<?php echo $small;  ?>" width="10" id="small" onchange="smallChange()" onkeyup="smallChange()"></td>
                            </tr>
                            <tr>
                                <td>Medium</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" name="medium" value="<?php echo $medium;  ?>" width="10" id="medium" onchange="mediumChange()" onkeyup="mediumChange()"></td>
                            </tr>
                            <tr>
                                <td>Large</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" name="large" value="<?php echo $large;  ?>" width="10" id="large" onchange="largeChange()" onkeyup="largeChange()"></td>
                            </tr>
                            <tr>
                                <td>Extra Large</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" name="xl" value="<?php echo $xl;  ?>" width="10" id="xl" onchange="xlChange()" onkeyup="xlChange()"></td>
                            </tr>
                            <tr>
                                <td>Double XL</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" name="xxl" value="<?php echo $xxl;  ?>" width="10" id="xxl" onchange="xxlChange()" onkeyup="xxlChange()"></td>
                            </tr>
                            
                        </table>
                        <br>
                        <table>
                            <tr>
                                <td><b>DIAMOND JUBILEE SOUVENIR PROGRAM</b></td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check">
                                  <!-- <input class="form-check-input" type="checkbox" id="wholepage" onclick="wholePageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="wholepage" id="wholepage" onclick="wholePageClick()">
                                  <label class="form-check-label" for="wholepage">
                                    Whole page, Php 5,000.00
                                  </label>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="halfpage" onclick="halfPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="halfpage" id="halfpage" onclick="halfPageClick()">
                                  <label class="form-check-label" for="halfpage">
                                    Half page, Php 3,000.00
                                  </label>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="frontcoverpage" onclick="frontCoverPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="frontcoverpage" id="frontcoverpage" onclick="frontCoverPageClick()">
                                  <label class="form-check-label" for="frontcoverpage">
                                    Inside Front Cover page, Php10,000.00
                                  </label>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="backcoverpage" onclick="backCoverPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="backcoverpage" id="backcoverpage" onclick="backCoverPageClick()">
                                  <label class="form-check-label" for="backcoverpage">
                                    Inside Back Cover page, Php10,000.00
                                  </label>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="flipcoverpage" onclick="flipCoverPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="flipcoverpage" id="flipcoverpage" onclick="flipCoverPageClick()">
                                  <label class="form-check-label" for="flipcoverpage">
                                    Inside Flip Front Cover page, Php10,000.00
                                  </label>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="oneliner" onclick="oneLinerClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="oneliner" id="oneliner" onclick="oneLinerClick()">
                                  <label class="form-check-label" for="oneliner">
                                    One Liner, Php 1,000.00
                                  </label>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>* with 3 free registrants plus souviner program</td>
                            </tr>
                            <tr>
                                <td>* with 1 free registrants plus souviner program</td>
                            </tr>
                            <tr>
                                <td>* with 2 free T-shirts</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>TOTAL AMOUNT DEPOSITED/PAID: </td>
                                <td><input type="text" class="form-control form-control-sm col-6" id="total_amount" style="width: 60px;" disabled></td>
                            </tr>
                        </table>
                    </div>


                </div>


                <hr>
                <!-- ######################################################################## -->

    
                <input style="float:right;" class="btn btn-success d-none" type="submit" id="submitPayment" name="payment" value="Submit Payment">
                <a style="float:right;" class="btn btn-success d-none" href="#" id="downloadFile">Download File</a>
                
                    <!-- <input type="text" name="reservation" value="" id="reservationT">
                    <input type="text" name="small" value="" id="smallT">
                    <input type="text" name="medium" value="" id="mediumT">
                    <input type="text" name="large" value="" id="largeT">
                    <input type="text" name="extralarge" value="" id="extralargeT">
                    <input type="text" name="doublexl" value="" id="doublexlT">
                    <input type="text" name="wholepage" value="" id="wholepageT">
                    <input type="text" name="totalamount" value="" id="totalamountT"> -->
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
    bankPayment();
    
    let qty = document.getElementById("reservationQuantity").value;
    let tSum = 0;
    let small = document.getElementById("small");
    let medium = document.getElementById("medium");
    let large = document.getElementById("large");
    let xl = document.getElementById("xl");
    let xxl = document.getElementById("xxl");
    let totalReservationFormula;
    let totalReservation = document.getElementById("totalReservation");
    let wholepage = document.getElementById("wholepage");
    let halfpage = document.getElementById("halfpage");
    let frontcoverpage = document.getElementById("frontcoverpage");
    let backcoverpage = document.getElementById("backcoverpage");
    let flipcoverpage = document.getElementById("flipcoverpage");
    let oneliner = document.getElementById("oneliner");
    let totalAmount = document.getElementById("total_amount");
    let totalSouvenir = 0;
    let wholepageAmount = 0;
    let halfpageAmount = 0;
    let frontcoverpageAmount = 0;
    let backcoverpageAmount = 0;
    let flipcoverpageAmount = 0;
    let onelinerAmount = 0;

    function sumShirts(){
        tSum = parseInt(small.value) + parseInt(medium.value) + parseInt(large.value) + parseInt(xl.value) + parseInt(xxl.value);
        alert(parseInt(tSum));
    }

    // function totalReservation(totalReservation){
        

    //     return totalReservation;
    // }

    function wholePageClick(){
        if(wholepage.checked == true){
            wholepageAmount = 5000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + wholepageAmount;
            return totalAmount.value
        }else{
            // wholepageAmount = 0;
            totalAmount.value = parseInt(totalAmount.value) - wholepageAmount;
        }
    }

    function halfPageClick(){

        if(halfpage.checked == true){
            halfpageAmount = 3000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + halfpageAmount;
            return totalAmount.value
        }else{
            // halfpageAmount = 0;
            totalAmount.value = parseInt(totalAmount.value) - halfpageAmount;
        }
    }

    function frontCoverPageClick(){

        if(frontcoverpage.checked == true){
            frontcoverpageAmount = 10000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + frontcoverpageAmount;
            return totalAmount.value
        }else{
            // frontcoverpageAmount = 0;
            totalAmount.value = parseInt(totalAmount.value) - frontcoverpageAmount;
        }
    }

    function backCoverPageClick(){

        if(backcoverpage.checked == true){
            backcoverpageAmount = 10000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + backcoverpageAmount;
            return totalAmount.value
        }else{
            // backcoverpageAmount = 0;
            totalAmount.value = parseInt(totalAmount.value) - backcoverpageAmount;
        }
    }

    function flipCoverPageClick(){

        if(flipcoverpage.checked == true){
            flipcoverpageAmount = 10000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + flipcoverpageAmount;
            return totalAmount.value
        }else{
            // flipcoverpageAmount = 0;
            totalAmount.value = parseInt(totalAmount.value) - flipcoverpageAmount;
        }
    }

    function oneLinerClick(){

        if(oneliner.checked == true){
            onelinerAmount = 1000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + onelinerAmount;
            return totalAmount.value
        }else{
            // onelinerAmount = 0;
            totalAmount.value = parseInt(totalAmount.value) - onelinerAmount;
        }
    }

    function reservationChange(){
        // totalReservation();
        totalReservationFormula = document.getElementById("reservationQuantity").value *1000;
        totalReservation.value = totalReservationFormula;
        if(wholepage.checked == true){
            wholepageAmount = 5000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + wholepageAmount;
            return totalAmount.value
        }else{
            // wholepageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) - wholepageAmount;
        }

        if(halfpage.checked == true){
            halfpageAmount = 3000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + halfpageAmount;
            return totalAmount.value
        }else{
            // halfpageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) - halfpageAmount;
        }

        if(frontcoverpage.checked == true){
            frontcoverpageAmount = 10000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + frontcoverpageAmount;
            return totalAmount.value
        }else{
            // frontcoverpageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) - frontcoverpageAmount;
        }

        if(backcoverpage.checked == true){
            backcoverpageAmount = 10000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + backcoverpageAmount;
            return totalAmount.value
        }else{
            // backcoverpageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) - backcoverpageAmount;
        }

        if(flipcoverpage.checked == true){
            flipcoverpageAmount = 10000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + flipcoverpageAmount;
            return totalAmount.value
        }else{
            // flipcoverpageAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) - flipcoverpageAmount;
        }

        if(oneliner.checked == true){
            onelinerAmount = 1000;
            // totalSouvenir = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) + onelinerAmount;
            return totalAmount.value
        }else{
            // onelinerAmount = wholepageAmount + halfpageAmount + frontcoverpageAmount + backcoverpageAmount + flipcoverpageAmount + onelinerAmount;
            totalAmount.value = parseInt(totalReservation.value) - onelinerAmount;
        }

        if(document.getElementById("reservationQuantity").value >= parseInt(small.value)){
            small.disabled = false;
            medium.disabled = false;
            large.disabled = false;
            xl.disabled = false;
            xxl.disabled = false;
        }
        // alert(tSum);
        if(tSum >= document.getElementById("reservationQuantity").value){
            document.getElementById("reservationQuantity").value = tSum;
            document.getElementById("reservation").value = document.getElementById("reservationQuantity").value * 1000;
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
    }
    
    function smallChange(){
        sumShirts();
        alert(tSum.value);
        if(parseInt(small.value) >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
        
        if(tSum >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
    }
    
    function mediumChange(){
        sumShirts();
        alert(tSum.value);
        if(parseInt(medium.value) >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
        sumShirts();
        if(tSum >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
    }
    
    function largeChange(){
        if(parseInt(large.value) >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
        sumShirts();
        if(tSum >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
    }
    
    function xlChange(){
        if(parseInt(xl.value) >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
        sumShirts();
        if(tSum >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
    }
    
    function xxlChange(){
        if(parseInt(xxl.value) >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
        sumShirts();
        if(tSum >= document.getElementById("reservationQuantity").value){
            small.disabled = true;
            medium.disabled = true;
            large.disabled = true;
            xl.disabled = true;
            xxl.disabled = true;
        }
    }

    function totalAmountClick(){
        totalAmount.value = totalAmount.value + totalReservation.value;
        // totalReservation = document.getElementById("reservationQuantity").value *1000;
        // document.getElementById("reservation").value = totalReservation;
    }
    totalAmountClick();

</script>

<br>
<br>
<br>
<br>

<?php
include("bins/footer.php");
?>
