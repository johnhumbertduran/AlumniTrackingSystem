<?php
session_start();
include("bins/header.php");
include("../bins/connections.php");

date_default_timezone_set ("Asia/Manila");
$date_now = date("m/d/Y");
$time_now = date("h:i");

$random_receipt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$receipt = substr(str_shuffle($random_receipt), 0, 62);

if(isset($_SESSION["totalAmount"])){
    $totalAmount = $_SESSION["totalAmount"];
}

if(isset($_SESSION["small"])){
    $small = $_SESSION["small"];
}else{
   $small = 0;
}
if(isset($_SESSION["medium"])){
    $medium = $_SESSION["medium"];
}else{
   $medium = 0;
}
if(isset($_SESSION["large"])){
    $large = $_SESSION["large"];
}else{
   $large = 0;
}
if(isset($_SESSION["extralarge"])){
    $extralarge = $_SESSION["extralarge"];
}else{
   $extralarge = 0;
}
if(isset($_SESSION["doublexl"])){
    $doublexl = $_SESSION["doublexl"];
}else{
   $doublexl = 0;
}
if(isset($_SESSION["souvenir"])){
    $souvenir = $_SESSION["souvenir"];
}
if(isset($_SESSION["reservationQuantity"])){
    $reservationQuantity = $_SESSION["reservationQuantity"];
}


mysqli_query($connections, "INSERT INTO payments_tbl (id_no,bank_official_receipt,bank_date_of_payment,number_of_person,small,
                                                      medium,large,extralarge,doublexl,souvenir_program,total_amount)
                                                      VALUES ('$id_no','$receipt','$date_now', '$number_of_person','$small','$medium',
                                                      '$large','$extralarge','$doublexl','$souvenir_program','$total_amount')");


// echo "<script>alert('Successfully paid!'); window.location.href='profile';</script>";

?>