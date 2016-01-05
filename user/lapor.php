<?php 
include('header.php'); 
include('navbar_admin.php'); ?>
    
<!-- DASHBOARD -->
<div class="container">
<div class="clearbr"></div>

<div class="col-md-12">
	<?php 
		if (isset($_GET['sent'])) {
			if($_GET['sent']=='scs') {
				echo '
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses!</strong> Pesan Anda Berhasil Terkirim Ke Admin
				</div>
				';
			}
		}
		?>
	<div class="widget-area no-padding blank">
			<div class="status-upload">
				<form action="<?php echo $baseUrl; ?>Machine/record" method="POST">
					<h4 style="padding:10px">Laporan ke Pemilik Kos</h4>
					<input type="hidden" name="email" value="<?php echo $_SESSION['EmailKost']; ?>" />
					<textarea name="laporan" placeholder="Lapor Ke Pemilik Kos sekarang" ></textarea>
					<button type="submit" name="lapor" class="btn btn-success green"></i>Lapor</button>
				</form>
			</div><!-- Status Upload  -->
		</div><!-- Widget Area -->
	</div>
    </div>
<div class="clearbr"></div>
</div>
<style type="text/css">
	
	.widget-area {
		background-color: #fff;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		-ms-border-radius: 4px;
		-o-border-radius: 4px;
		border-radius: 4px;
		-webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
		-moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
		-ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
		-o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
		box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
		float: left;
		margin-top: 30px;
		padding: 25px 30px;
		position: relative;
		width: 100%;
		}
		.status-upload {
		background: none repeat scroll 0 0 #f5f5f5;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		-ms-border-radius: 4px;
		-o-border-radius: 4px;
		border-radius: 4px;
		float: left;
		width: 100%;
		}
		.status-upload form {
		float: left;
		width: 100%;
		}
		.status-upload form textarea {
		background: none repeat scroll 0 0 #fff;
		border: medium none;
		-webkit-border-radius: 4px 4px 0 0;
		-moz-border-radius: 4px 4px 0 0;
		-ms-border-radius: 4px 4px 0 0;
		-o-border-radius: 4px 4px 0 0;
		border-radius: 4px 4px 0 0;
		color: #777777;
		float: left;
		font-family: Lato;
		font-size: 14px;
		height: 142px;
		letter-spacing: 0.3px;
		padding: 20px;
		width: 100%;
		resize:vertical;
		outline:none;
		border: 1px solid #F2F2F2;
		}

		.status-upload ul {
		float: left;
		list-style: none outside none;
		margin: 0;
		padding: 0 0 0 15px;
		width: auto;
		}
		.status-upload ul > li {
		float: left;
		}
		.status-upload ul > li > a {
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		-ms-border-radius: 4px;
		-o-border-radius: 4px;
		border-radius: 4px;
		color: #777777;
		float: left;
		font-size: 14px;
		height: 30px;
		line-height: 30px;
		margin: 10px 0 10px 10px;
		text-align: center;
		-webkit-transition: all 0.4s ease 0s;
		-moz-transition: all 0.4s ease 0s;
		-ms-transition: all 0.4s ease 0s;
		-o-transition: all 0.4s ease 0s;
		transition: all 0.4s ease 0s;
		width: 30px;
		cursor: pointer;
		}
		.status-upload ul > li > a:hover {
		background: none repeat scroll 0 0 #606060;
		color: #fff;
		}
		.status-upload form button {
		border: medium none;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		-ms-border-radius: 4px;
		-o-border-radius: 4px;
		border-radius: 4px;
		color: #fff;
		float: right;
		font-family: Lato;
		font-size: 14px;
		letter-spacing: 0.3px;
		margin-right: 9px;
		margin-top: 9px;
		padding: 6px 15px;
		}
		.dropdown > a > span.green:before {
		border-left-color: #2dcb73;
		}
		.status-upload form button > i {
		margin-right: 7px;
		}


</style>
<!-- DASHBOARD END -->

<?php include('footer.php'); ?>