<?php 
include('../Config/Database.php');
include('../Config/Function.php');
header('Content-Type: text/plain');
//REGISTER ----------------------------------------------------------------------------------------------------------
if (isset($_POST['register'])) {
	
    $nama = h($_POST['nama']);
    $email    = h($_POST['email']);
    $password = h($_POST['password']);
    $repassword = h($_POST['repassword']);
    $pass     = sha1(md5($salt.$password));
    $repass     = sha1(md5($salt.$repassword));
    
    $read = mysqli_query($connecDB, "SELECT * FROM member WHERE email = '$email'")or die(mysql_error());
    $x = mysqli_fetch_array($read);
    if($pass!=$repass) {
    	header('Location: ../register/?status=wpc');
    } else if ($x['email']==$email) {
    	header('Location: ../register/?s=em');
    } else {

	    mysqli_query($connecDB, "INSERT INTO member (nama, email, password, time_reg, status, foto) 
	                             VALUES ('$nama', '$email', '$pass', NOW(), 'notconfirm', 'images/default_pic.jpeg')") or die(mysqli_error());
	    
	    header('Location: ../reg_s');
	}	
}

//LOGIN --------------------------------------------------------------------------------------------------------------
if (isset($_POST['login'])) {

    $email  = h($_POST['email']);
    $password  = h($_POST['password']);
    $pass = sha1(md5($salt.$password));
    
    $login=mysqli_query($connecDB, "SELECT * FROM member WHERE email='$email' AND password='$pass' AND status = 'accept'");
    $ketemu=mysqli_num_rows($login);
    $r=mysqli_fetch_array($login);
    if ($ketemu > 0) {
        
        session_start();
        $_SESSION['EmailKost'] = $r['email'];
    	$_SESSION['passwordKost'] = $r['password'];

        setcookie("cookname", $_SESSION['EmailKost'], time() + 9999999);
        if (empty($r['jenis_kelamin']) || empty($r['instansi']) || empty($r['alamat']) || empty($r['no_telp'])) {
        
        	header('Location: ../user/myprofile');
        
        } else {
        
        	header('location: ../user/');
    	
    	}
    } else {
        header('location: ../login/?s=false');
    }
} 

// EDIT PROFILE ----------------------------------------------------------------------------------------------------
if (isset($_POST['editProfile'])) {

    $getEmail = $_POST['email'];
    $readDB = mysqli_query($connecDB, "SELECT * FROM member WHERE email = '$getEmail'");
    $p = mysqli_fetch_array($readDB);
    if (empty($_FILES["profile_pic"]["name"])) {

        echo 'gak ganti PP';
    
    } else {
    
        echo 'ganti PP';
    
    }

}

?>