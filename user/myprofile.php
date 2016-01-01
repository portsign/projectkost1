<?php 
include('header.php'); 
include('navbar_admin.php'); ?>

<!-- DASHBOARD -->
<div class="container">
<div class="clearbr"></div>
<h3 class="h3custom">Profile Anda</h3>
	<?php 
		if (empty($dataUser['jenis_kelamin']) || empty($dataUser['instansi']) || empty($dataUser['alamat']) || empty($dataUser['no_telp'])) {
			echo '
			<div class="alert alert-warning" role="alert">
			  <a href="#" class="alert-link"><i class="glyphicon glyphicon-info-sign"></i> Anda Belum Melengkapi Profile Anda, Silahkan Lengkapi Data diri anda.</a>
			</div>
			';
		}
	?>
	
	<div class="span3 well">
	 	<form action="<?php echo $baseUrl; ?>Machine/record" method="POST" enctype="multipart/form-data">
	 	<input type="hidden" name="email" value="<?php echo $getEmail; ?>" />
	    <center>
	        <a href="#" data-toggle="modal"><img src="<?php echo $baseUrl.$dataUser['foto']; ?>" name="aboutme" width="140" height="140" class="img-circle"></a>
	        <input type="file" name="profile_pic" value="<?php echo $dataUser['foto']; ?>" />
	        <h3><?php echo $dataUser['nama']; ?></h3>
	    </center>
	       
    	<input type="text" name="nama" class="form-control" value="<?php echo $dataUser['nama']; ?>" placeholder="Nama Lengkap Anda" />
    	<br />
    	<b>Jenis Kelamin</b> &nbsp;&nbsp;&nbsp;
  		
		<input type="radio" <?php if ($dataUser['jenis_kelamin']=='laki - laki') { echo 'checked'; } ?> name="jenis_kelamin" value="Laki - Laki" />
		Laki - Laki
		<input type="radio" <?php if ($dataUser['jenis_kelamin']=='perempuan') { echo ' checked'; } ?> name="jenis_kelamin" value="Perempuan" />
		Perempuan

		<br /><br />
		<input type="text" name="tempat" class="form-control" value="<?php echo $dataUser['instansi']; ?>" placeholder="Tempat anda Kuliah / Kerja" />
		<br />
		<input type="text" name="no_telp" class="form-control" value="<?php echo $dataUser['no_telp']; ?>" placeholder="Nomor Telephone" />
		<br />
		<textarea class="form-control" name="alamat_asal" rows="6" placeholder="Alamat Asal"><?php echo $dataUser['alamat']; ?></textarea>
    	<center>
    		<br />
    		<input type="submit" name="editProfile" class="btn btn-success" value="Simpan" />
    	</center>
	        </form>
	</div>
</div>

<div class="clearbr"></div>
</div>
<!-- DASHBOARD END -->

<?php include('footer.php'); ?>