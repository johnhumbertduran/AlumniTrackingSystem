<?php

	session_start();
	
	$loadout = md5($_SESSION["username"]);
	$mmd11 = md5($loadout);
    $rands = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $vr = md5(rand(0,3));
    $en = substr(str_shuffle($rands), 0, 5);
    
	unset($_SESSION["username"]);
	
	session_unset();
	session_destroy();
	
	echo "Logging out... Please wait...";
    // echo "<script>window.location.href='index?loadout=$loadout&v_1=$mmd11';</script>";
    header('Location: ../../?loadout=' . $loadout . "&&" . $en . "_" . $vr . "=" . $mmd11);   
    exit();


?>