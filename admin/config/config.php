<?php
	$connect = mysqli_connect('localhost', 'root', '', 'nhom8_qlbh_thucphamchucnang');
	if(mysqli_error($connect))
	{
		die("Kết nối thất bại ! " . mysqli_error($connect));
	}
?>