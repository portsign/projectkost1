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
<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">

    <form action="<?php echo $baseUrl; ?>Machine/record" method="POST" class="form-signin">
		<h1 class="form-signin-heading text-muted">Sign In</h1>
		<?php 
			if (isset($_GET['s'])) {
				if ($_GET['s']=='false') {
					echo '
						<div class="alert alert-warning" role="alert">
						  <a href="#" class="alert-link" style="font-size:12px;"><i class="glyphicon glyphicon-remove"></i> Wrong Username or Password</a>
						</div>
					';
				}
			}
		?>
		
		<input type="text" name="username" class="form-control" placeholder="Email address" required="" autofocus="">
		<input type="password" name="password" class="form-control" placeholder="Password" required="">
		<button name="loginAdmin" class="btn btn-lg btn-primary btn-block" type="submit">
			Sign In
		</button>
	</form>

</div>