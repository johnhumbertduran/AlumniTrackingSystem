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

}

?>
<style>
    .text-over:hover{
        overflow: visible;
        background-color: #fff;
        width:100%;
        margin: 0 10px;
    }

    .text-over{
        white-space: nowrap;
        width:50%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="container text-center">
<br>
<h2 style="color:rgb(112, 173, 70);">Alumni Payments</h2>
<br>
<table class="table table-hover table-success table-striped">
    <thead class="table-dark">
      <tr class="text-center">
        <th>ID Number</th>
        <th>Mode of Payment</th>
        <th>Date of Payment</th>
        <th>Receipt</th>
        <th>Souvenir Program</th>
        <th>Total Amount</th>
      </tr>
    </thead>
    <tbody id="myTable">
<?php

    $payment_qry = mysqli_query($connections, "SELECT * FROM payments_tbl");
    
    while($row_payments = mysqli_fetch_assoc($payment_qry)){
          $id_no = $row_payments["id_no"];
          $cash_official_receipt = $row_payments["cash_official_receipt"];
          $cash_date_of_payment = $row_payments["cash_date_of_payment"];
          $bank_official_receipt = $row_payments["bank_official_receipt"];
          $bank_date_of_payment = $row_payments["bank_date_of_payment"];
          $cheque_no = $row_payments["cheque_no"];
          $cheque_bank = $row_payments["cheque_bank"];
          $cheque_official_receipt = $row_payments["cheque_official_receipt"];
          $cheque_date_of_payment = $row_payments["cheque_date_of_payment"];
          $number_of_person = $row_payments["number_of_person"];
          $small = $row_payments["small"];
          $medium = $row_payments["medium"];
          $large = $row_payments["large"];
          $extralarge = $row_payments["extralarge"];
          $doublexl = $row_payments["doublexl"];
          $souvenir_program = $row_payments["souvenir_program"];
          $total_amount = $row_payments["total_amount"];

            $mode_of_payment = "";
            $receipt_of_payment = "";
            if($cash_official_receipt != ""){
              $mode_of_payment = "Cash";
              $receipt_of_payment = $cash_official_receipt;
            }elseif($bank_official_receipt != ""){
              $mode_of_payment = "Online";
              $receipt_of_payment = $bank_official_receipt;
            }elseif($cheque_official_receipt != ""){
              $mode_of_payment = "Cheque";
              $receipt_of_payment = $cheque_official_receipt;
            }
          
            $date_of_payment = "";
            if($cash_date_of_payment != ""){
            $date_of_payment = $cash_date_of_payment;
            }elseif($bank_date_of_payment != ""){
              $date_of_payment = $bank_date_of_payment;
            }elseif($cheque_date_of_payment != ""){
              $date_of_payment = $cheque_date_of_payment;
            }
?>

<tr>
    <td><?php echo $id_no; ?></td>
    <td><?php echo $mode_of_payment; ?></td>
    <td><?php echo $date_of_payment; ?></td>
    <td><center><p class="text-over" style=""><?php echo $receipt_of_payment; ?></p></center></td>
    <td><?php echo $souvenir_program; ?></td>
    <td><?php echo "&#8369; " . number_format($total_amount, 2, '.', ','); ?></td>
</tr>

<?php
    }
?>
    </table>

</div>

<?php
include("bins/footer.php");
?>
