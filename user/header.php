<?php 
include('../Config/Database.php'); ?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Kost Putra Barito Yogyakarta</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/animate.css" />
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/owl.carousel.css"/>
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/owl.theme.css"/>
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/prettyPhoto.css"/>
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/red.css"/>
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/custom.css" />
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/responsive.css" />
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
    </head>

<body data-spy="scroll" data-target=".navbar-fixed-top">
    <header id="section_header" class="navbar-fixed-top main-nav" role="banner">
        <div class="container">
        <?php  

        session_start();
        if (empty($_SESSION['EmailKost']) && empty($_SESSION['passwordKost'])) 
        { 
        
            header('Location: ../login'); 
        
        }
        //OPEN DATA MEMBER
        $getEmail = $_SESSION['EmailKost'];
        $openDataMember = mysqli_query($connecDB, "SELECT * FROM member WHERE email = '$getEmail'");
        $dataUser = mysqli_fetch_array($openDataMember);
        //OPEN DATA MEMBER END

        ?>