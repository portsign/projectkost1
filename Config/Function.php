<?php 

	//ANTI INJECTION
	function h($data) 
	{

	    $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES,'UTF-8'))));
	    return $filter_sql;
	
	}	

	// SALT PASSWORD
	$salt = '~!@#$%^&*(1111)_+ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';