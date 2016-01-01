<?php 
include('header.php'); 
include('navbar_admin.php'); ?>
    
<!-- DASHBOARD -->
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
<div class="clearbr"></div>
	<div class="panel">
		<div class="col-md-4 bg_blur ">
    	    <a href="#" class="follow_btn hidden-xs">Follow</a>
		</div>
        <div class="col-md-8  col-xs-12">
           <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" class="img-thumbnail picture hidden-xs" />
           <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img-thumbnail visible-xs picture_mob" />
           <div class="header">
                <h1>Lorem Ipsum</h1>
                <h4>Web Developer</h4>
                <span>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</span>
           </div>
        </div>
    </div>   
    
</div>
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