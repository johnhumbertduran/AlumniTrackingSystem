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
            $medium = $large = $extralarge = $doublexl = $souvenir = $totalAmount = "";

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

            if(isset($_POST["large"])){
                $large = $_POST["large"];
            }else{
                $large = 0;
            }

            if(isset($_POST["extralarge"])){
                $extralarge = $_POST["extralarge"];
            }else{
                $extralarge = 0;
            }

            if(isset($_POST["doublexl"])){
                $doublexl = $_POST["doublexl"];
            }else{
                $doublexl = 0;
            }


            if(isset($_POST["payment"])){

                // require_once 'vendor/stripe/stripe-php/init.php';

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
                    
                    if(!empty($_POST["totalamount"])){
                        $totalAmount = intval($_POST["totalamount"]);
                        // echo $totalAmount;
                    }else{
                        echo "total empty!";
                    }
                    
                    if(!empty($_POST["souvenir"])){
                        $souvenir = $_POST["souvenir"];
                    }else{
                        // echo "souvenir empty!";
                    }
                    
                    $sizeError = 0;
                    $sizeTotal = $small + $medium + $large + $extralarge + $doublexl;

                    if($sizeTotal < $reservationQuantity){
                        $sizeError = 1;
                    }

                    if($payment_method && $reservationQuantity && ($small || $medium || $large || $extralarge || $doublexl) && $totalAmount){
                        

                        // echo "<script>alert('submit yarn');</script>";
                    }
                    
                }else{
                    echo "<script>alert('Payment Method empty!');</script>";
                }

            }

            
            ?>
                


                <!-- ######################################################################## -->
                <div class="alert alert-danger alert-dismissible <?php if($sizeError == 1){ echo 'd-block'; }else{echo 'd-none';} ?>">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Payment abort!</strong> Please check T-shirt sizes.
                </div>
                <hr>
                <!-- <form autocomplete="off" method="POST"> -->
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
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="small" onchange="smallChange()" onkeyup="smallChange()"></td>
                            </tr>
                            <tr>
                                <td>Medium</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="medium" onchange="mediumChange()" onkeyup="mediumChange()"></td>
                            </tr>
                            <tr>
                                <td>Large</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="large" onchange="largeChange()" onkeyup="largeChange()"></td>
                            </tr>
                            <tr>
                                <td>Extra Large</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="xl" onchange="xlChange()" onkeyup="xlChange()"></td>
                            </tr>
                            <tr>
                                <td>Double XL</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="xxl" onchange="xxlChange()" onkeyup="xxlChange()"></td>
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
                                  <input class="form-check-input" type="radio" name="souvenir" value="wholepage" <?php if($souvenir == "wholepage"){ echo "checked"; } ?> id="wholepage" onclick="wholePageClick()">
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
                                  <input class="form-check-input" type="radio" name="souvenir" value="halfpage" <?php if($souvenir == "halfpage"){ echo "checked"; } ?> id="halfpage" onclick="halfPageClick()">
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
                                  <input class="form-check-input" type="radio" name="souvenir" value="frontcoverpage" <?php if($souvenir == "frontcoverpage"){ echo "checked"; } ?> id="frontcoverpage" onclick="frontCoverPageClick()">
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
                                  <input class="form-check-input" type="radio" name="souvenir" value="backcoverpage" <?php if($souvenir == "backcoverpage"){ echo "checked"; } ?> id="backcoverpage" onclick="backCoverPageClick()">
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
                                  <input class="form-check-input" type="radio" name="souvenir" value="flipcoverpage" <?php if($souvenir == "flipcoverpage"){ echo "checked"; } ?> id="flipcoverpage" onclick="flipCoverPageClick()">
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
                                  <input class="form-check-input" type="radio" name="souvenir" value="oneliner" <?php if($souvenir == "oneliner"){ echo "checked"; } ?> id="oneliner" onclick="oneLinerClick()">
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
                            <?php /* echo $totalAmount; */  ?>
                            <tr>
                                <td>TOTAL AMOUNT DEPOSITED/PAID: </td>
                                <td><input type="text" class="form-control form-control-sm col-6" id="total_amount" style="width: 60px;" disabled></td>
                            </tr>
                        </table>
                    </div>


                </div>


                <hr>
                <!-- ######################################################################## -->

                
                <!-- <input style="float:right;" class="btn btn-success d-none" type="submit" id="submitPayment" name="payment" value="Submit Payment"> -->
                <!-- <input style="float:right;" class="btn btn-success d-none" type="submit" id="submitPayment" name="payment" value="Submit Payment"> -->
                <button id="submitPayment">Submit</button>
                <script src="http://js.stripe.com/v3/"></script>
                <script src="stripeScript.js"></script>
                
                
                <!-- <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_51KIeCiDMpco1oCBFwEBhCdicLQFvRz2nALSIJ8H3yd1GcRZppPuzccfrnMyjgjPmSUeZS9XCpQ3cWEuyz8epwcHt00rN5Exdsm"
                    data-amount="<?php echo $totalAmount;  ?>"
                    data-name="Test"
                    data-description="Online Payment"
                    data-email="maryjuan@gmail.com"
                    data-currency="php"
                    data-image="box.png"
                    data-locale="auto">
                </script> -->

                <!-- <button id="submit">
                  <div class="spinner hidden" id="spinner"></div>
                  <span id="button-text">Pay now</span>
                </button> -->
<?php

?>

                <div id="payment-message" class="hidden"></div>
                
                <a style="float:right;" class="btn btn-success d-none" href="#" id="downloadFile">Download File</a>
                
                    <!-- <input type="text" name="reservation" value="" id="reservationT"> -->
                    <input type="hidden" name="small" value="<?php echo $small;  ?>" id="smallT">
                    <input type="hidden" name="medium" value="<?php echo $medium;  ?>" id="mediumT">
                    <input type="hidden" name="large" value="<?php echo $large;  ?>" id="largeT">
                    <input type="hidden" name="extralarge" value="<?php echo $extralarge;  ?>" id="extralargeT">
                    <input type="hidden" name="doublexl" value="<?php echo $doublexl;  ?>" id="doublexlT">
                    <!-- <input type="text" name="souvenir" value="" id="souvenirT"> -->
                    <input type="hidden" name="totalamount" value="<?php echo $totalAmount;  ?>" id="totalamountT">
                <!-- </form> -->

        </div>
        <div class="card-footer bg-primary text-light">
        <input type="button" class="btn btn-light invisible" value="Register">
        </div>

    
    </div>

</div>

<script src="js/click.js"></script>
<script>
function isNumberKey(evt){

var charCode = (evt.which) ? evt.which : event.keyCode

if(charCode > 31 && (charCode < 40 || charCode > 41) && ( charCode < 48 || charCode > 57) && charCode != 43  && charCode != 45 )

    return false;

return true;

}


 

</script>

<br>
<br>
<br>
<br>

<?php
include("bins/footer.php");
?>
