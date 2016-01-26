<?php 
/* -----------------------------------------------------
Controller Keseluruhan Record Database                 | 
Record POST maupun GET                                 |
C0ded by @Indocreator.com                              |
:: The Most Fastest Framework based on PHP Native ::   |
------------------------------------------------------*/

include('../Config/Database.php');
include('../Config/Function.php');
header('Content-Type: text/plain');
//REGISTER ----------------------------------------------------------------------------------------------------------
if (isset($_POST['register'])) 
{
	
    $nama = ($_POST['nama']);
    $email    = ($_POST['email']);
    $password = ($_POST['password']);
    $repassword = ($_POST['repassword']);
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
if (isset($_POST['login'])) 
{

    $email  = ($_POST['email']);
    $password  = ($_POST['password']);
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
if (isset($_POST['editProfile'])) 
{

    $getEmail = $_POST['email'];
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $tempat = $_POST['tempat'];
    $no_telp = $_POST['no_telp'];
    $alamat_asal = $_POST['alamat_asal'];

    $readDB = mysqli_query($connecDB, "SELECT * FROM member WHERE email = '$getEmail'");
    $p = mysqli_fetch_array($readDB);
    if (empty($_FILES["profile_pic"]["name"])) {

        // echo 'gak ganti PP';
        mysqli_query($connecDB, "UPDATE member SET nama = '$nama',
                                                   jenis_kelamin = '$jk',
                                                   instansi = '$tempat',
                                                   alamat = '$alamat_asal',
                                                   no_telp = '$no_telp' WHERE email = '$getEmail'")or die(mysqli_error());
        header('Location: ../user/myprofile/?update=success');
    } else {
    
        // echo 'ganti PP';
        $target_dir = "../images/pp/";
        $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if(isset($_POST["editProfile"])) {
            $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["profile_pic"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["profile_pic"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $path = "images/pp/".$_FILES["profile_pic"]["name"];
        mysqli_query($connecDB, "UPDATE member SET nama = '$nama',
                                                   jenis_kelamin = '$jk',
                                                   instansi = '$tempat',
                                                   alamat = '$alamat_asal',
                                                   no_telp = '$no_telp',
                                                   foto = '$path' WHERE email = '$getEmail'")or die(mysqli_error());
        header('Location: ../user/myprofile/?update=success');

    }

}

// LAPORAN KE PEMILIK KOS ----------------------------------------------------------------------------------------

if (isset($_POST['lapor'])) 
{
    $getEmail = $_POST['email'];
    $show = mysqli_query($connecDB, "SELECT * FROM member WHERE email = '$getEmail'")or die(mysqli_error());
    $s = mysqli_fetch_array($show);
    $getID = $s['id_member'];
    $pesan = $_POST['laporan'];
    mysqli_query($connecDB, "INSERT INTO laporan (id_member, email, message, time_post) VALUES ('$getID', '$getEmail', '$pesan', NOW())")or die(mysqli_error());
    header('Location: ../user/lapor/?sent=scs');
}

// MESSAGE TO ALL

if (isset($_POST['message_to_all'])) 
{
    $getEmail = $_POST['email'];
    $message = $_POST['message'];
    $getLink = $_POST['getLink'];
    mysqli_query($connecDB, "INSERT INTO user_message (email, message, time_post) VALUES ('$getEmail', '$message', NOW())")or die(mysql_error());
    $notif = mysqli_query($connecDB, "SELECT * FROM member");
    while($n = mysqli_fetch_array($notif)) {
        $n_email = $n['email'];
        mysqli_query($connecDB, "INSERT INTO notif (email, link, status, time_notif) VALUES ('$n_email','$getLink','pending',NOW())");
    }
    header('Location: ../user/message');
}

if (isset($_POST['loginAdmin'])) 
{

    $username  = ($_POST['username']);
    $password  = ($_POST['password']);
    $pass = sha1(md5($salt.$password));

    $login=mysqli_query($connecDB, "SELECT * FROM administrator WHERE username='$username' AND password='$pass'");
    $ketemu=mysqli_num_rows($login);
    $r=mysqli_fetch_array($login);
    if ($ketemu > 0) {
        
        session_start();
        $_SESSION['AdminUsernameKost'] = $r['username'];
        $_SESSION['AdminPasswordKost'] = $r['password'];

        setcookie("cookname", $_SESSION['AdminUsernameKost'], time() + 9999999);
        header('location: ../Admin/');
        
    } else {
        header('location: ../Admin/login/?s=false');
    }

}

//FASILITAS--------------------------------------------------------------------------------------------------------

if (isset($_POST['inputFasilitas'])) 
{

    $title = $_POST['title'];
    $description = $_POST['description'];
    $path = "images/fasilitas/".$_FILES["thumb"]["name"];

    $target_dir = "../images/fasilitas/";
    $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(isset($_POST["editProfile"])) {
        $check = getimagesize($_FILES["thumb"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["thumb"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["thumb"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    mysqli_query($connecDB, "INSERT INTO fasilitas (thumb, title, description) VALUES ('$path','$title','$description')");
    header('Location: ../Admin/fasilitas');
}
if (isset($_POST['editFasilitas'])) 
{
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (empty($_FILES["thumb"]["name"])) {
        mysqli_query($connecDB, "UPDATE fasilitas SET title = '$title', 
                                       description = '$description' WHERE id_fasilitas = '$id'")or die(mysqli_error());
        header('Location: ../Admin/fasilitas');
    } else {

        $path = "images/fasilitas/".$_FILES["thumb"]["name"];
        $thumbBefore = $_POST['thumbBefore'];
        $target_dir = "../images/fasilitas/";
        $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if(isset($_POST["editProfile"])) {
            $check = getimagesize($_FILES["thumb"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["thumb"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["thumb"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        mysqli_query($connecDB, "UPDATE fasilitas SET title = '$title', 
                                       description = '$description',
                                       thumb = '$path' WHERE id_fasilitas = '$id'");
        unlink("../".$thumbBefore);
        header('Location: ../Admin/fasilitas');

    }

}
if (isset($_GET['t'])) 
{
    if ($_GET['t']=='del_fas') {
        $id = $_GET['id'];
        $showD = mysqli_query($connecDB, "SELECT * FROM fasilitas WHERE id_fasilitas = '$id'");
        $i = mysqli_fetch_array($showD);
        unlink("../".$i['thumb']);
        mysqli_query($connecDB, "DELETE FROM fasilitas WHERE id_fasilitas = '$id'");
        header('Location: ../../Admin/fasilitas');
    }
}
//Fasilitas END ---------------------------------------------------------------------------------------------------

//Profile Static Page ---------------------------------------------------------------------------------------------

if (isset($_POST['editProfileKost'])) 
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    if (empty($_FILES["thumb"]["name"])) {
        mysqli_query($connecDB, "UPDATE static_page SET title = '$title', 
                                        description = '$description' WHERE id_static_page = '1'");
        header('Location: ../Admin/profile');
    } else {
        $path = "images/".$_FILES["thumb"]["name"];
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if(isset($_POST["editProfile"])) {
            $check = getimagesize($_FILES["thumb"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["thumb"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["thumb"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        mysqli_query($connecDB, "UPDATE static_page SET title = '$title', 
                                        thumb = '$path',
                                        description = '$description' WHERE id_static_page = '1'");
        header('Location: ../Admin/profile');

    }
}

//Profile Static Page end -----------------------------------------------------------------------------------------

// PETA KOS -------------------------------------------------------------------------------------------------------

if (isset($_POST['petakos'])) 
{
    $latlong = $_POST['latlong'];
    $mapmarker = $_POST['mapMarker'];
    mysqli_query($connecDB, "UPDATE maps SET latlong = '$latlong', mapmarker = '$mapmarker'");
    header('Location: ../Admin/maps');
}

// PETA KOS END ---------------------------------------------------------------------------------------------------


//TIPEKAMAR--------------------------------------------------------------------------------------------------------

if (isset($_POST['inputTipeKamar'])) 
{

    $title = $_POST['title'];
    $description = $_POST['description'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $path = "images/tipekamar/".$_FILES["thumb"]["name"];

    $target_dir = "../images/tipekamar/";
    $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if(isset($_POST["editProfile"])) {
        $check = getimagesize($_FILES["thumb"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["thumb"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["thumb"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    mysqli_query($connecDB, "INSERT INTO reservasi (thumb, title, description, harga, stok) VALUES ('$path','$title','$description', '$harga', '$stok')");
    header('Location: ../Admin/tipekamar');
}
if (isset($_POST['editTipeKamar'])) 
{
    
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    if (empty($_FILES["thumb"]["name"])) {
        mysqli_query($connecDB, "UPDATE reservasi SET title = '$title',
                                        harga = '$harga',
                                        stok = '$stok',
                                       description = '$description' WHERE id_reservasi = '$id'")or die(mysqli_error());
        header('Location: ../Admin/tipekamar');
    } else {

        $path = "images/tipekamar/".$_FILES["thumb"]["name"];
        $thumbBefore = $_POST['thumbBefore'];
        $target_dir = "../images/tipekamar/";
        $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if(isset($_POST["editProfile"])) {
            $check = getimagesize($_FILES["thumb"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["thumb"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["thumb"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        mysqli_query($connecDB, "UPDATE reservasi SET title = '$title', 
                                       description = '$description',
                                       harga = '$harga',
                                       stok = '$stok',
                                       thumb = '$path' WHERE id_reservasi = '$id'");
        unlink("../".$thumbBefore);
        header('Location: ../Admin/tipekamar');

    }

}
if (isset($_GET['t'])) 
{
    if ($_GET['t']=='del_fas') {
        $id = $_GET['id'];
        $showD = mysqli_query($connecDB, "SELECT * FROM reservasi WHERE id_reservasi = '$id'");
        $i = mysqli_fetch_array($showD);
        unlink("../".$i['thumb']);
        mysqli_query($connecDB, "DELETE FROM reservasi WHERE id_reservasi = '$id'");
        header('Location: ../../Admin/tipekamar');
    }
}
//TIPEKAMAR END ---------------------------------------------------------------------------------------------------

//CONTACT --------------------------------------------------------------------------------------------------------

if (isset($_GET['t'])) 
{
    if ($_GET['t']=='delcont') {
        echo 'OK';
    }
}

//CONTACT END ----------------------------------------------------------------------------------------------------

// MEMBER LIST ---------------------------------------------------------------------------------------------------

if (isset($_POST['editStatus'])) 
{
    $id = $_POST['id'];
    $status = $_POST['status'];
    mysqli_query($connecDB, "UPDATE member SET status = '$status' WHERE id_member = '$id'");
    header('Location: ../Admin/memberlist');
}

// MEMBER LIST END -----------------------------------------------------------------------------------------------

// USER MESSAGE / LAPORAN ----------------------------------------------------------------------------------------

if (isset($_GET['type'])) 
{
    if ($_GET['type']=='del_lap') {
        $getID = $_GET['id'];
        mysqli_query($connecDB, "DELETE FROM laporan WHERE id_laporan = '$getID'");
        header('Location: ../../Admin/usermessage');
    }
}

// USER MESSAGE / LAPORAN END ------------------------------------------------------------------------------------

// POST MESSAGE --------------------------------------------------------------------------------------------------

if (isset($_POST['sendMessageAdmin'])) 
{
    $message = $_POST['message'];
    mysqli_query($connecDB, "INSERT INTO user_message (email, message, time_post) VALUES ('admin@putrabarito.com','$message',NOW())");

    $notif = mysqli_query($connecDB, "SELECT * FROM member");
    while($n = mysqli_fetch_array($notif)) {
        $n_email = $n['email'];
        mysqli_query($connecDB, "INSERT INTO notif (email, link, status, time_notif) VALUES ('$n_email','','pending',NOW())");
    }
    header('Location: ../Admin/postmessage');
}


// POST MESSAGE END ----------------------------------------------------------------------------------------------

// CONTACT SUPPORT -----------------------------------------------------------------------------------------------

if(isset($_POST['g-recaptcha-response'])){
    $captcha = $_POST['g-recaptcha-response'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $msg = $_POST['messege'];
    // echo $messege;exit;
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lew6xQTAAAAAJk_2CiXfYudEjgGg8NzOf1AmOCt&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $responseData = json_decode($response);
    if ($responseData->success) {
        
        mysqli_query($connecDB, "INSERT INTO contact (nama, email, no_telp, message, time) 
                                 VALUES ('$nama','$email','$no_telp','$msg',NOW())")or die(mysqli_error());
        header('Location: ../contact/?scs=true');

    } else {
        header('Location: ../contact/?recaptcha=false');
    }
}

// CONTACT SUPPORT END -------------------------------------------------------------------------------------------


// GANTI PASSWORD ADMIN ------------------------------------------------------------------------------------------

if (isset($_POST['changePasswordAdmin'])) {
    $oldpass = ($_POST['oldpass']);
    $newpass = ($_POST['newpass']);
    $renewpass = ($_POST['renewpass']);

    $old     = sha1(md5($salt.$oldpass));
    $pass     = sha1(md5($salt.$newpass));
    $repass     = sha1(md5($salt.$renewpass));

    $showPass = mysqli_query($connecDB, "SELECT * FROM administrator WHERE password = '$old'");
    $p = mysqli_fetch_array($showPass);

    if ($p['password']=='') {
        header('Location: ../Admin/settings/?val=wop');
    } else if ($pass!=$repass) {
        header('Location: ../Admin/settings/?val=wcp');
    } else {
        mysqli_query($connecDB, "UPDATE administrator SET password = '$pass'");
        session_start();
        $_SESSION['passwordKost'] = $pass;
        header('Location: ../Admin/settings/?val=true');
    }

}

// GANTI PASSWORD ADMIN END --------------------------------------------------------------------------------------
?>
