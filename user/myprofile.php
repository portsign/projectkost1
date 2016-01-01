<?php 
include('header.php'); 
include('navbar_admin.php'); ?>
    
<!-- DASHBOARD -->
<div class="container">
<div class="clearbr"></div>
<h3 class="h3custom">Profile Anda</h3>
	<div class="alert alert-warning" role="alert">
	  <a href="#" class="alert-link"><i class="glyphicon glyphicon-info-sign"></i> Anda Belum Melengkapi Profile Anda, Silahkan Lengkapi Data diri anda.</a>
	</div>
	<div class="span3 well">
	 	<form>
	    <center>
	        <a href="#" data-toggle="modal"><img src="<?php echo $baseUrl; ?>images/default_pic.jpeg" name="aboutme" width="140" height="140" class="img-circle"></a>
	        <input type="file" name="profile_pic" />
	        <h3>Joe Sixpack</h3>
	    </center>
	       
    	<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda" />
    	<br />
    	Jenis Kelamin &nbsp;
    	<div class="btn-group" role="group" aria-label="...">
		  <button type="radio" class="btn btn-default">Laki - Laki</button>
		  <button type="radio" class="btn btn-default">Perempuan</button>
		</div>
		<br /><br />
		<input type="text" name="tempat" class="form-control" placeholder="Tempat anda Kuliah / Kerja" />
		<br />
		<textarea class="form-control" name="alamat_asal" rows="6" placeholder="Alamat Asal"></textarea>
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