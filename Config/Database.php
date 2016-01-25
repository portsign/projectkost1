<?php
/*
SETTING DBS WITH MYSQLI
*/
	// Nama Username DBS SERVER
	$db_username = 'root';
	// Password DBS Server
    $db_passowrd = 'amikom!123';
    // Nama Database
    $db_name     = 'kost';
    // Nama Host
    $db_host     = 'localhost';
    // Prefix Table
    $prefix      = '';  // jika tidak ada dikosongkan saja
    // Base URL
    $baseUrl	 = "http://$_SERVER[HTTP_HOST]/";
    // Koneksi Ke Database
    $connecDB    = mysqli_connect($db_host, $db_username, $db_passowrd, $db_name)or die('cannot connect to database'); ?>
