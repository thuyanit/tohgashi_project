<?php
$get_click=$_POST['click_button'];
$togashi_id=$_POST['togashi_id'];
$email_dk=$_POST['email_dk'];
$location=$_POST['location'];

$d=getdate();
$date=$d['year']."-".$d['mon']."-".$d['mday'];

//echo "<script>alert($get_click);</script>";

$conn = mysqli_connect('mysql2203.xserver.jp', 'tohgashi_ag', 'zuq7eihv', 'tohgashi_2017') or die ('{error:"bad_request"}');

//Cache dangrous
if(isset($get_click) && $get_click=='send1'){
	$cache_dangrous= mysqli_query($conn, 'select count(*) as count from cache_dangrous where location=\''.addslashes($location).'\' and email_dk = \''.  addslashes($email_dk).'\'');
	$row1 = mysqli_fetch_array($cache_dangrous, MYSQLI_ASSOC);
	if ((int)$row1['count'] == 0){
	    mysqli_query($conn, "insert into cache_dangrous(togashi_id, email_dk, location,status,date_send) value ($togashi_id,'".$email_dk."','".$location."','1','".$date."')");
	}
}

//Cache drainage
if(isset($get_click) && $get_click=='send2'){
	$cache_drainage= mysqli_query($conn, 'select count(*) as count from cache_drainage where location=\''.addslashes($location).'\' and email_dk = \''.  addslashes($email_dk).'\'');
	$row2 = mysqli_fetch_array($cache_drainage, MYSQLI_ASSOC);
	if ((int)$row2['count'] == 0){
	    mysqli_query($conn, "insert into cache_drainage(togashi_id, email_dk, location,status,date_send) value ($togashi_id,'".$email_dk."','".$location."','1','".$date."')");
	}
}

//Cache Gar Air
if(isset($get_click) && $get_click=='send3'){
	$cache_gar_air= mysqli_query($conn, 'select count(*) as count from cache_gar_air where location=\''.addslashes($location).'\' and email_dk = \''.  addslashes($email_dk).'\'');
	$row3 = mysqli_fetch_array($cache_gar_air, MYSQLI_ASSOC);
	if ((int)$row3['count'] == 0){
	    mysqli_query($conn, "insert into cache_gar_air(togashi_id, email_dk, location,status,date_send) value ($togashi_id,'".$email_dk."','".$location."','1','".$date."')");
	}
}

//Cache ceiling cache_ceiling
if(isset($get_click) && $get_click=='send4'){
	$cache_ceiling= mysqli_query($conn, 'select count(*) as count from cache_ceiling where location=\''.addslashes($location).'\' and email_dk = \''.  addslashes($email_dk).'\'');
	$row4 = mysqli_fetch_array($cache_ceiling, MYSQLI_ASSOC);
	if ((int)$row4['count'] == 0){
	    mysqli_query($conn, "insert into cache_ceiling(togashi_id, email_dk, location,status,date_send) value ($togashi_id,'".$email_dk."','".$location."','1','".$date."')");
	}
}

//Cache anchor
if(isset($get_click) && $get_click=='send5'){
	$cache_anchor= mysqli_query($conn, 'select count(*) as count from cache_anchor where location=\''.addslashes($location).'\' and email_dk = \''.  addslashes($email_dk).'\'');
	$row5 = mysqli_fetch_array($cache_anchor, MYSQLI_ASSOC);
	if ((int)$row5['count'] == 0){
	    mysqli_query($conn, "insert into cache_anchor(togashi_id, email_dk, location,status,date_send) value ($togashi_id,'".$email_dk."','".$location."','1','".$date."')");
	}
}

//Cache foods
if(isset($get_click) && $get_click=='send6'){
	$cache_foods= mysqli_query($conn, 'select count(*) as count from cache_foods where location=\''.addslashes($location).'\' and email_dk = \''.  addslashes($email_dk).'\'');
	$row6 = mysqli_fetch_array($cache_foods, MYSQLI_ASSOC);
	if ((int)$row6['count'] == 0){
	    mysqli_query($conn, "insert into cache_foods(togashi_id, email_dk, location,status,date_send) value ($togashi_id,'".$email_dk."','".$location."','1','".$date."')");
	}
}
?>