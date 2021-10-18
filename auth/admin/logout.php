<?php

	session_start();
	
	$adminlogout = md5($_SESSION["username"]);
	$adlogs = md5($adminlogout);
    $rand_log = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $rl = md5(rand(0,3));
    $logs = substr(str_shuffle($rand_log), 0, 5);
    
	unset($_SESSION["username"]);
	
	session_unset();
	session_destroy();
	
	echo "Logging out... Please wait...";
    // echo "<script>window.location.href='index?adminlogout=$adminlogout&v_1=$adlogs';</script>";
    header('Location: ../../?adminlogout=' . $adminlogout . "&&" . $logs . "_" . $rl . "=" . $adlogs);   
    exit();


?>