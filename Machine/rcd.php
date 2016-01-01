<?php 
include('../Config/Database.php');
	
//REGISTER ----------------------------------------------------------------------------------------------------------
if (isset($_POST['register'])) {
	
    header('Content-Type: text/plain');
    function antiinjection($data){
        $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES,'UTF-8'))));
        return $filter_sql;
    }
    
    $nama = antiinjection($_POST['nama']);
    $email    = antiinjection($_POST['email']);
    $password = antiinjection($_POST['password']);
    $repassword = antiinjection($_POST['repassword']);
    $salt     = '~!@#$%^&*(1111)_+ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass     = sha1(md5($salt.$password));
    $repass     = sha1(md5($salt.$repassword));
    
    $read = mysqli_query($connecDB, "SELECT * FROM member WHERE email = '$email'")or die(mysql_error());
    $x = mysqli_fetch_array($read);
    if($pass!=$repass) {
    	header('Location: ../register/?status=wpc');
    } else if ($x['email']==$email) {
    	header('Location: ../register/?s=em');
    } 
    else {

	    session_start();
	    $_SESSION['userNameKost'] = $email;
	    $_SESSION['passwordKost'] = $pass;
	    setcookie("cookname", $_SESSION['userNameKost'], time() + 9999999);
	    mysqli_query($connecDB, "INSERT INTO member (nama, email, password, time_reg, status) 
	                             VALUES ('$nama', '$email', '$pass', NOW(), 'notconfirm')") or die(mysqli_error());
	    
	    header('Location: ../reg_s');
	}	
}

?>