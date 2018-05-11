<!DOCTYPE html>
<html>
  <head>
    

    <title>Welcome SIMKESDA</title>

    <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/style.css">

    <style type="text/css">


    .container {
    padding: 80px 120px;
	}

    	body {
      		font: 400 15px/1.8 Lato, sans-serif;
      		color: #777;
  		}


  	.carousel-control {
    position: absolute;
    top: 40%;
    left: 15px;
    width: 40px;
    height: 40px;
    margin-top: -20px;
    font-size: 60px;
    font-weight: 100;
    line-height: 30px;
    color: #ffffff;
    text-align: center;
    background: #222222;
    border: 3px solid #ffffff;
    -webkit-border-radius: 23px;
    -moz-border-radius: 23px; 
    border-radius: 23px;
    opacity: 0.5;
    filter: alpha(opacity=50);
}
.carousel-control.right {
    right: 15px;
    left: auto;
}
.carousel-caption {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 15px;
    background: #333333;
    background: rgba(0, 0, 0, 0.75);
}
.carousel-caption p {
    margin-bottom: 0;
}

 @media screen and (max-width: 700px){
     .carousel-caption p {
        font-size: 13px;
    }
    .carousel-caption {
    background: rgba(0, 0, 0, 0.55);
    }
    .carousel-control {
        top: 20%;
    }
}

    </style>


  </head>
  <body >

  		<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"> SIMKESDA  <small> Sistem Informasi Kesehatan Daerah </small> </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href=" <?php echo site_url('login_ctrl');?> "> Login </a></li>
        <li><a href="<?=base_url();?>"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

		


	
			<div class="carousel slide" data-ride="carousel" id="carousel-884101">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-884101">
					</li>
					<li data-slide-to="1" data-target="#carousel-884101">
					</li>
					<li data-slide-to="2" data-target="#carousel-884101">
					</li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img alt="Carousel Bootstrap First" src="<?=base_url();?>asset/images/cr1.jpg">
						<div class="carousel-caption">
							<h3 class="toggleHeading">
								SELAMAT DATANG
							</h3>
							<p class="toggleCaption">
								Selamat datang di program simkesda, program ini adalah program pelayanan kesehatan di puskesmas wilayah way kanan
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Second" src="<?=base_url();?>asset/images/cr2.jpg">
						<div class="carousel-caption">
							<h3 class="toggleHeading">
								TUJUAN
							</h3>
							<p class="toggleCaption">
								Tujuan dari dibuatnya program ini adalah untuk meningkatkan pelayanan kesehatan kepada masyarakat
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Third" src="<?=base_url();?>asset/images/cr3.jpg">
						<div class="carousel-caption">
							<h3 class="toggleHeading">
								HARAPAN
							</h3>
							<p class="toggleCaption">
								Harapan yang ingin dicapai adalah meningkatnya pelayanan puskesmas kepada masyarakat yang lebih cepat,modern dan praktis sehingga dicapai masyarakat yang lebih sehat
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-884101" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-884101" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		

	<div class="panel panel-danger">
  		<div class="panel-footer"><small>Copyright 2016 @ard14n</small> </div>
	</div>


    <script type="text/javascript" src="<?=base_url();?>asset/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/js/scripts.js"></script>

  </body>
</html>