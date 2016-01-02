<?php 
include('header.php'); 
include('navbar_admin.php'); ?>
    
<!-- DASHBOARD -->
<div class="clearbr"></div>

<?php 
	$getAnggota = mysqli_query($connecDB, "SELECT * FROM member ORDER BY id_member DESC");
	$n = 1;
	while($m = mysqli_fetch_array($getAnggota)) {
?>
<!-- LOOP HERE -->


<div class="container" style="margin-top: 10px;">
	<div class="panel">
		<div class="col-md-4 bg_blur ">
    	    <a href="" class="follow_btn hidden-xs" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $n; ?>">See Detail</a>
		</div>
        <div class="col-md-8  col-xs-12">
           <img src="<?php echo $baseUrl.$m['foto']; ?>" class="img-thumbnail picture hidden-xs" />
           <img src="<?php echo $baseUrl.$m['foto']; ?>" class="img-thumbnail visible-xs picture_mob" />
           <div class="header">
                <h1><?php echo $m['nama']; ?></h1>
                <h4><?php echo $m['instansi']; ?></h4>
                <span><?php echo $m['alamat']; ?></span>
           </div>
        </div>
    </div>   
</div>
<div class="modal fade bs-example-modal-lg<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content" style="padding:15px;">
	    	<h4><?php echo $m['nama']; ?></h4>
	    	<img src="<?php echo $baseUrl.$m['foto']; ?>" class="thumbnail" />
	    	<table class="table">
	    		<tr>
	    			<td><strong>Nama</strong></td>
	    			<td>:</td>
	    			<td><?php echo $m['nama']; ?></td>
	    		</tr>
	    		<tr>
	    			<td><strong>Email</strong></td>
	    			<td>:</td>
	    			<td><a href="mailto:<?php echo $m['email']; ?>"><?php echo $m['email']; ?></a></td>
	    		</tr>
	    		<tr>
	    			<td><strong>Jenis Kelamin</strong></td>
	    			<td>:</td>
	    			<td><?php echo $m['jenis_kelamin']; ?></td>
	    		</tr>
	    		<tr>
	    			<td><strong>Instansi</strong></td>
	    			<td>:</td>
	    			<td><?php echo $m['instansi']; ?></td>
	    		</tr>
	    		<tr>
	    			<td><strong>Asal</strong></td>
	    			<td>:</td>
	    			<td><?php echo $m['alamat']; ?></td>
	    		</tr>
	    		<tr>
	    			<td><strong>No Telepon</strong></td>
	    			<td>:</td>
	    			<td><?php echo $m['no_telp']; ?></td>
	    		</tr>
	    	</table>
	    </div>
	</div>
</div>
<!-- LOOP HERE END -->
<?php $n++; } ?>

<br />
<br />

<style type="text/css">
	.well {
	    margin-top:-20px;
	    background-color:#007FBD;
	    border:2px solid #0077B2;
	    text-align:center;
	    cursor:pointer;
	    font-size: 25px;
	    padding: 15px;
	    border-radius: 0px !important;
	}

	.well:hover {
	    margin-top:-20px;
	    background-color:#0077B2;
	    border:2px solid #0077B2;
	    text-align:center;
	    cursor:pointer;
	    font-size: 25px;
	    padding: 15px;
	    border-radius: 0px !important;
	    border-bottom : 2px solid rgba(97, 203, 255, 0.65);
	}

	.bg_blur
	{
	    background-image:url('http://data2.whicdn.com/images/139218968/large.jpg');
	    height: 300px;
	    background-size: cover;
	}

	.follow_btn {
	    text-decoration: none;
	    position: absolute;
	    left: 35%;
	    top: 42.5%;
	    width: 35%;
	    height: 15%;
	    background-color: #007FBE;
	    padding: 10px;
	    padding-top: 6px;
	    color: #fff;
	    text-align: center;
	    font-size: 20px;
	    border: 4px solid #007FBE;
	}

	.follow_btn:hover {
	    text-decoration: none;
	    position: absolute;
	    left: 35%;
	    top: 42.5%;
	    width: 35%;
	    height: 15%;
	    background-color: #007FBE;
	    padding: 10px;
	    padding-top: 6px;
	    color: #fff;
	    text-align: center;
	    font-size: 20px;
	    border: 4px solid rgba(255, 255, 255, 0.8);
	}

	.header{
	    color : #808080;
	    margin-left:10%;
	    margin-top:70px;
	}

	.picture{
	    height:150px;
	    width:150px;
	    position:absolute;
	    top: 75px;
	    left:-75px;
	}

	.picture_mob{
	    position: absolute;
	    width: 35%;
	    left: 35%;
	    bottom: 70%;
	}

	.btn-style{
	    color: #fff;
	    background-color: #007FBE;
	    border-color: #adadad;
	    width: 33.3%;
	}

	.btn-style:hover {
	    color: #333;
	    background-color: #3D5DE0;
	    border-color: #adadad;
	    width: 33.3%;
	   
	}


	@media (max-width: 767px) {
	    .header{
	        text-align : center;
	    }
	    
	    
	    
	    .nav{
	        margin-top : 30px;
	    }
	}
</style>
<!-- DASHBOARD END -->

<?php include('footer.php'); ?>