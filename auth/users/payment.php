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

    <div class="card-header text-light" style="background-color:rgb(112, 173, 70);"><h2>Registration Fee Payment</h2></div>

        <div class="card-body">
            
            <?php
            $payment_method = $fullName = $reservationQuantity = $totalReservation = $small =
            $medium = $large = $extralarge = $doublexl = $souvenir = $totalAmount = "";
            
            $reservationQuantityWalk = $totalReservationWalk = $smallWalk =
            $mediumWalk = $largeWalk = $extralargeWalk = $doublexlWalk = $souvenirWalk = 
            $id_noWalk = $totalAmountWalk = "";

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

                    if($payment_method && $reservationQuantity && ($sizeError == 0) && $totalAmount){
                        

                        // echo "<script>alert('submit yarn');</script>";
                        $_SESSION["totalAmount"] = $totalAmount;

                        if($small > 0){
                            $_SESSION["small"] = $small;
                        }
                        if($medium > 0){
                            $_SESSION["medium"] = $medium;
                        }
                        if($large > 0){
                            $_SESSION["large"] = $large;
                        }
                        if($extralarge > 0){
                            $_SESSION["extralarge"] = $extralarge;
                        }
                        if($doublexl > 0){
                            $_SESSION["doublexl"] = $doublexl;
                        }

                        $_SESSION["id_no"] = $id_no;
                        
                        $_SESSION["souvenir"] = $souvenir;
                        $_SESSION["reservationQuantity"] = $reservationQuantity;
                        // $totalAmount = $_SESSION["totalAmount"];

                        echo "<script>window.location.href='redir';</script>";
                    }
                    
                }else{
                    echo "<script>alert('Payment Method empty!');</script>";
                }

            }
            
            
            
            
            // ##################################################################################################
            // ##################################################################################################
            // ##################################################################################################
            // ##################################################################################################
            // ##################################################################################################
            //                                          FOR WALK IN PAYMENT
            
            
            
            
            
            if(isset($_POST["reservationQuantityWalk"])){
                $reservationQuantityWalk = $_POST["reservationQuantityWalk"];
            }else{
                $reservationQuantityWalk = 1;
            }
            
            if(isset($_POST["totalReservationWalk"])){
                $totalReservationWalk = $_POST["totalReservationWalk"];
            }else{
                $totalReservationWalk = 1000;
            }

            if(isset($_POST["smallWalk"])){
                $smallWalk = $_POST["smallWalk"];
            }else{
                $smallWalk = 0;
            }

            if(isset($_POST["mediumWalk"])){
                $mediumWalk = $_POST["mediumWalk"];
            }else{
                $mediumWalk = 0;
            }

            if(isset($_POST["largeWalk"])){
                $largeWalk = $_POST["largeWalk"];
            }else{
                $largeWalk = 0;
            }

            if(isset($_POST["extralargeWalk"])){
                $extralargeWalk = $_POST["extralargeWalk"];
            }else{
                $extralargeWalk = 0;
            }

            if(isset($_POST["doublexlWalk"])){
                $doublexlWalk = $_POST["doublexlWalk"];
            }else{
                $doublexlWalk = 0;
            }


            if(isset($_POST["submit-to-pdf"])){
                

                if(!empty($_POST["payment_method"])){
                    

                    $payment_method = $_POST["payment_method"];
                    
                    // $totalReservation = $_POST["totalReservation"];

                    if(!empty($_POST["reservationQuantityWalk"])){
                        $reservationQuantityWalk = $_POST["reservationQuantityWalk"];
                    }else{
                        echo "empty!";
                    }
                    
                    if(!empty($_POST["totalReservationWalk"])){
                        $totalReservationWalk = $_POST["totalReservationWalk"];
                    }else{
                        echo "total empty!";
                    }
                    
                    if(!empty($_POST["totalamountWalk"])){
                        $totalAmountWalk = intval($_POST["totalamountWalk"]);
                        // echo $totalAmount;
                    }else{
                        // echo "total empty!";
                    }
                    
                    if(!empty($_POST["souvenirWalk"])){
                        $souvenirWalk = $_POST["souvenirWalk"];
                    }else{
                        $souvenirWalk = "none";
                        // echo "souvenir empty!";
                    }
                    
                    $sizeErrorWalk = 0;
                    $sizeTotalWalk = $smallWalk + $mediumWalk + $largeWalk + $extralargeWalk + $doublexlWalk;

                    if($sizeTotalWalk < $reservationQuantityWalk){
                        $sizeErrorWalk = 1;
                    }
                    // echo "<script>alert('$sizeErrorWalk');</script>";
                    // echo "<script>alert('$sizeTotalWalk');</script>";
                    if($payment_method){

                        // $_SESSION["totalAmountWalk"] = $totalAmountWalk;

                        if($sizeErrorWalk == 0){

                            if($smallWalk > 0){
                                $_SESSION["smallWalk"] = $smallWalk;
                            }
                            if($mediumWalk > 0){
                                $_SESSION["mediumWalk"] = $mediumWalk;
                            }
                            if($largeWalk > 0){
                                $_SESSION["largeWalk"] = $largeWalk;
                            }
                            if($extralargeWalk > 0){
                                $_SESSION["extralargeWalk"] = $extralargeWalk;
                            }
                            if($doublexlWalk > 0){
                                $_SESSION["doublexlWalk"] = $doublexlWalk;
                            }

                            // $_SESSION["id_no"] = $id_noWalk;
                            // $_SESSION["souvenirWalk"] = $souvenirWalk;
                            // $_SESSION["reservationQuantityWalk"] = $reservationQuantityWalk;
                            // $totalAmountWalk = $_SESSION["totalAmount"];
                            $_SESSION["totalAmountWalk"] = $totalAmountWalk;
                            $_SESSION["res"] = $reservationQuantityWalk;
                            $_SESSION["sw"] = $smallWalk;
                            $_SESSION["mw"] = $mediumWalk;
                            $_SESSION["lw"] = $largeWalk;
                            $_SESSION["xlw"] = $extralargeWalk;
                            $_SESSION["xxlw"] = $doublexlWalk;
                            $_SESSION["spw"] = $souvenirWalk;

                            if($sizeTotalWalk == 0){
                                echo "<script>alert('$sizeTotalWalk');</script>";
                                echo "<script>alert('Please check T-Shirt Sizes!');</script>";
                            }else{
                                // mysqli_query($connections, "INSERT INTO payments_tbl (id_no,cash_official_receipt,cash_date_of_payment,bank_official_receipt,
                                //                                         bank_date_of_payment,cheque_no,cheque_bank,cheque_official_receipt,cheque_date_of_payment,
                                //                                         number_of_person,small,medium,large,extralarge,doublexl,souvenir_program,total_amount)
                                //                                         VALUES ('$id_no','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')");
                                // echo "<script>alert('$sizeTotalWalk');</script>";
                                // echo "<script>window.location.href='registration_form.php?res=$reservationQuantityWalk&_s=$smallWalk&_m=$mediumWalk&_l=$largeWalk&_xl=$extralargeWalk&_xxl=$doublexlWalk&_spr=$souvenirWalk';</script>";
                                echo "<script>window.open('registration_form.php','_blank');</script>";
                                echo "<script>window.location.href='profile';</script>";
                            }

                        }

                    }
                    
                }else{
                    echo "<script>alert('Payment Method empty!');</script>";
                }
                    // echo "<script>alert('yeah!');</script>";

            }

            
            ?>
                


                <!-- ######################################################################## -->
                <div class="alert alert-danger alert-dismissible <?php if($sizeError == 1){ echo 'd-block'; }else{echo 'd-none';} ?>">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Payment abort!</strong> Please check T-shirt sizes.
                </div>
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
                    <h5 class="text-danger">Please fill up this form, download it and submit to ACC OSA.</h5>


                    <div>
                        <p><b>Registration Fee</b>  per person = Php 1,000 or US$20</p>
                        <table id="myTableWalk">
                            <tr>
                                <td>Reservation: &nbsp;</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="1" name="reservationQuantityWalk" value="<?php echo $reservationQuantityWalk;  ?>" width="10" id="reservationQuantityWalk" onchange="reservationChangeWalk()" onkeyup="reservationChangeWalk()"></td>
                            </tr>
                            <tr>
                                <td>Total: </td>
                                <td><input type="text" class="form-control form-control-sm col-6" name="totalReservationWalk" value="<?php echo $totalReservationWalk;  ?>" id="totalReservationWalk" style="width: 60px;" readonly></td>
                            </tr>
                            <tr>
                                <td><b>T-Shirt Size(s): </b></td>
                            </tr>
                            <tr>
                                <td>Small</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="smallWalk" onchange="smallChangeWalk()" onkeyup="smallChangeWalk()"></td>
                            </tr>
                            <tr>
                                <td>Medium</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="mediumWalk" onchange="mediumChangeWalk()" onkeyup="mediumChangeWalk()"></td>
                            </tr>
                            <tr>
                                <td>Large</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="largeWalk" onchange="largeChangeWalk()" onkeyup="largeChangeWalk()"></td>
                            </tr>
                            <tr>
                                <td>Extra Large</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="xlWalk" onchange="xlChangeWalk()" onkeyup="xlChangeWalk()"></td>
                            </tr>
                            <tr>
                                <td>Double XL</td>
                                <td><input type="number" class="form-control form-control-sm col-6" min="0" value="0" width="10" id="xxlWalk" onchange="xxlChangeWalk()" onkeyup="xxlChangeWalk()"></td>
                            </tr>
                            
                        </table>
                        <br>
                        <table class="w-100">
                            <tr>
                                <td><b>DIAMOND JUBILEE SOUVENIR PROGRAM</b></td>
                            </tr>
                            <tr>
                                <td class="">
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" id="wholepage" onclick="wholePageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenirWalk" value="Whole Page" <?php if($souvenirWalk == "Whole Page"){ echo "checked"; } ?> id="wholepageWalk" onclick="wholePageClickWalk()">
                                  <label class="form-check-label flex-fill" for="wholepageWalk">
                                     &nbsp; Whole page, 
                                  </label>
                                  <p class="float-right justify-content-end">Php 5,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="halfpage" onclick="halfPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenirWalk" value="Half Page" <?php if($souvenirWalk == "Half Page"){ echo "checked"; } ?> id="halfpageWalk" onclick="halfPageClickWalk()">
                                  <label class="form-check-label flex-fill" for="halfpageWalk">
                                  &nbsp; Half page,
                                  </label>
                                  <p class="float-right justify-content-end">Php 3,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="frontcoverpage" onclick="frontCoverPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenirWalk" value="Front Cover Page" <?php if($souvenirWalk == "Front Cover Page"){ echo "checked"; } ?> id="frontcoverpageWalk" onclick="frontCoverPageClickWalk()">
                                  <label class="form-check-label flex-fill" for="frontcoverpageWalk">
                                  &nbsp; Inside Front Cover page, 
                                  </label>
                                  <p class="float-right justify-content-end">Php10,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="backcoverpage" onclick="backCoverPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenirWalk" value="Back Cover Page" <?php if($souvenirWalk == "Back Cover Page"){ echo "checked"; } ?> id="backcoverpageWalk" onclick="backCoverPageClickWalk()">
                                  <label class="form-check-label flex-fill" for="backcoverpageWalk">
                                  &nbsp; Inside Back Cover page, 
                                  </label>
                                  <p class="float-right justify-content-end">Php10,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="flipcoverpage" onclick="flipCoverPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenirWalk" value="Flip Cover Page" <?php if($souvenirWalk == "Flip Cover Page"){ echo "checked"; } ?> id="flipcoverpageWalk" onclick="flipCoverPageClickWalk()">
                                  <label class="form-check-label flex-fill" for="flipcoverpageWalk">
                                  &nbsp; Inside Flip Front Cover page, 
                                  </label>
                                  <p class="float-right justify-content-end">Php10,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="oneliner" onclick="oneLinerClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenirWalk" value="One Liner" <?php if($souvenirWalk == "One Liner"){ echo "checked"; } ?> id="onelinerWalk" onclick="oneLinerClickWalk()">
                                  <label class="form-check-label flex-fill" for="onelinerWalk">
                                  &nbsp; One Liner, 
                                  </label>
                                  <p class="float-right justify-content-end">Php 1,000.00</p>
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
                                <td><input type="text" class="form-control form-control-sm col-6" id="total_amountWalk" style="width: 60px;" disabled></td>
                            </tr>
                        </table>
                    </div>



                    <!-- <a href="bins/alumniRegistrationForm.pdf" class="btn text-light col-4" id="downloadFile" style="background-color:rgb(112, 173, 70);">DOWNLOAD FORM HERE</a> -->
                    <input type="submit" class="btn text-light" id="downloadFile" style="background-color:rgb(112, 173, 70);" value="submit" name="submit-to-pdf">
                </div>

                    <input type="hidden" name="smallWalk" value="<?php echo $smallWalk;  ?>" id="smallTWalk">
                    <input type="hidden" name="mediumWalk" value="<?php echo $mediumWalk;  ?>" id="mediumTWalk">
                    <input type="hidden" name="largeWalk" value="<?php echo $largeWalk;  ?>" id="largeTWalk">
                    <input type="hidden" name="extralargeWalk" value="<?php echo $extralargeWalk;  ?>" id="extralargeTWalk">
                    <input type="hidden" name="doublexlWalk" value="<?php echo $doublexlWalk;  ?>" id="doublexlTWalk">
                    <input type="hidden" name="totalamountWalk" value="<?php echo $totalAmountWalk;  ?>" id="totalamountTWalk">
                
                    

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
                        <table class="w-100">
                            <tr>
                                <td><b>DIAMOND JUBILEE SOUVENIR PROGRAM</b></td>
                            </tr>
                            <tr>
                                <td class="">
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" id="wholepage" onclick="wholePageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="Whole Page" <?php if($souvenir == "Whole Page"){ echo "checked"; } ?> id="wholepage" onclick="wholePageClick()">
                                  <label class="form-check-label flex-fill" for="wholepage">
                                     &nbsp; Whole page, 
                                  </label>
                                  <p class="float-right justify-content-end">Php 5,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="halfpage" onclick="halfPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="Half Page" <?php if($souvenir == "Half Page"){ echo "checked"; } ?> id="halfpage" onclick="halfPageClick()">
                                  <label class="form-check-label flex-fill" for="halfpage">
                                  &nbsp; Half page,
                                  </label>
                                  <p class="float-right justify-content-end">Php 3,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="frontcoverpage" onclick="frontCoverPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="Front Cover Page" <?php if($souvenir == "Front Cover Page"){ echo "checked"; } ?> id="frontcoverpage" onclick="frontCoverPageClick()">
                                  <label class="form-check-label flex-fill" for="frontcoverpage">
                                  &nbsp; Inside Front Cover page, 
                                  </label>
                                  <p class="float-right justify-content-end">Php10,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="backcoverpage" onclick="backCoverPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="Back Cover Page" <?php if($souvenir == "Back Cover Page"){ echo "checked"; } ?> id="backcoverpage" onclick="backCoverPageClick()">
                                  <label class="form-check-label flex-fill" for="backcoverpage">
                                  &nbsp; Inside Back Cover page, 
                                  </label>
                                  <p class="float-right justify-content-end">Php10,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="flipcoverpage" onclick="flipCoverPageClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="Flip Cover Page" <?php if($souvenir == "Flip Cover Page"){ echo "checked"; } ?> id="flipcoverpage" onclick="flipCoverPageClick()">
                                  <label class="form-check-label flex-fill" for="flipcoverpage">
                                  &nbsp; Inside Flip Front Cover page, 
                                  </label>
                                  <p class="float-right justify-content-end">Php10,000.00</p>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-check d-flex">
                                  <!-- <input class="form-check-input" type="checkbox" value="" id="oneliner" onclick="oneLinerClick()"> -->
                                  <input class="form-check-input" type="radio" name="souvenir" value="One Liner" <?php if($souvenir == "One Liner"){ echo "checked"; } ?> id="oneliner" onclick="oneLinerClick()">
                                  <label class="form-check-label flex-fill" for="oneliner">
                                  &nbsp; One Liner, 
                                  </label>
                                  <p class="float-right justify-content-end">Php 1,000.00</p>
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
                <input style="float:right; background-color:rgb(112, 173, 70);" class="btn d-none text-light" type="submit" id="submitPayment" name="payment" value="Submit Payment">
                <!-- <button id="submitPayment">Submit</button> -->
                <!-- <script src="http://js.stripe.com/v3/"></script>
                <script src="js/stripeScript.js"></script> -->
                
                
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
                
                <!-- <a style="float:right;" class="btn btn-success d-none" href="#" id="downloadFile">Download File</a> -->
                
                    <!-- <input type="text" name="reservation" value="" id="reservationT"> -->
                    <input type="hidden" name="small" value="<?php echo $small;  ?>" id="smallT">
                    <input type="hidden" name="medium" value="<?php echo $medium;  ?>" id="mediumT">
                    <input type="hidden" name="large" value="<?php echo $large;  ?>" id="largeT">
                    <input type="hidden" name="extralarge" value="<?php echo $extralarge;  ?>" id="extralargeT">
                    <input type="hidden" name="doublexl" value="<?php echo $doublexl;  ?>" id="doublexlT">
                    <!-- <input type="text" name="souvenir" value="" id="souvenirT"> -->
                    <input type="hidden" name="totalamount" value="<?php echo $totalAmount;  ?>" id="totalamountT">
                </form>

        </div>
        <div class="card-footer text-light" style="background-color:rgb(112, 173, 70);">
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
