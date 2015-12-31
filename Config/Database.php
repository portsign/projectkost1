<?php
		$db_username = 'root';
	    $db_passowrd = 'amikom!123';
	    $db_name     = 'kost';
	    $db_host     = 'localhost';
	    $prefix      = ''; //jika tidak ada dikosongkan saja
	    $baseUrl	 = "http://$_SERVER[HTTP_HOST]/";
	    $connecDB    = mysqli_connect($db_host, $db_username, $db_passowrd, $db_name)or die('cannot connect to database'); ?>
