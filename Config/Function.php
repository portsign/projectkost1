<?php 

	//SECURE ANTI INJECTION AND ANTI XSS (Cross Site Scripting)
	function h($data) 
	{

	    $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES,'UTF-8'))));
	    return $filter_sql;
	
	}	

	// SECURE SALT PASSWORD
	$salt = '~!@#$%^&*(1111)_+ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';