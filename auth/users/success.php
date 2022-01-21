<?php
session_start();
include("bins/header.php");
include("../bins/connections.php");

echo "<script>alert('Successfully paid!'); window.location.href='profile';</script>";

?>