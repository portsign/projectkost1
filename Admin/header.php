<?php include('../Config/Database.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Bootstrap Admin Template</title>
    <link href="<?php echo $baseUrl; ?>Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>Admin/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>Admin/css/plugins/morris.css" rel="stylesheet">
    <link href="<?php echo $baseUrl; ?>Admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="wrapper">
    <?php 
        session_start();
        if (empty($_SESSION['AdminUsernameKost']) && empty($_SESSION['AdminPasswordKost'])) 
        { 
        
            header('Location: ../Admin/login'); 
        
        }
    ?>