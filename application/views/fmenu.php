<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Sistem Informasi Kesehatan Daerah</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">

#wrapper {
  padding-left: 250px;
  transition: all 0.4s ease 0s;
}

#sidebar-wrapper {
  /*margin-top: 50px;*/
  margin-left: -250px;
  left: 250px;
  width: 250px;
  background: #000; 
  position: fixed;
  height: 100%;
  overflow-y: auto;
  z-index: 1000;
  transition: all 0.4s ease 0s;
}

#wrapper.active {
  padding-left: 0;
}

#wrapper.active #sidebar-wrapper {
  left: 0;
}

#page-content-wrapper {
  width: 100%; 
  margin-top: 50px; 
}



.sidebar-nav {
  position: absolute;
  top: 0;
  width: 250px;
  list-style: none;
  margin: 0;
  padding: 0;
}

.sidebar-nav li {
  line-height: 40px;
  text-indent: 20px;
}

.sidebar-nav li a {
  color: #999999; 
  display: block;
  text-decoration: none;
  padding-left: 60px;
}

.sidebar-nav li a span:before {
  position: absolute;
  left: 0;
  color: #41484c;
  text-align: center;
  width: 20px;
  line-height: 18px;
}

.sidebar-nav li a:hover,
.sidebar-nav li.active {
  color: #fff;
  background: rgba(255,255,255,0.2); 
  text-decoration: none;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
  text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
  height: 65px;
  line-height: 60px;
  font-size: 18px;
}

.sidebar-nav > .sidebar-brand a {
  color: #999999; 
}

.sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
}



.content-header {
  height: 65px;
  line-height: 65px;
}

.content-header h1 {
  margin: 0;
  margin-left: 20px;
  line-height: 65px;
  display: inline-block;
}

#menu-toggle {
    text-decoration: none;
}

.btn-menu {
  color: #000;
} 

.inset {
  padding: 20px;
}

@media (max-width:767px) {

#wrapper {
  padding-left: 0;
}

#sidebar-wrapper {
  left: 0;
}

#wrapper.active {
  position: relative;
  left: 250px;
}

#wrapper.active #sidebar-wrapper {
  left: 250px;
  width: 250px;
  transition: all 0.4s ease 0s;
}

#menu-toggle {
  display: inline-block;
}

.inset {
  padding: 15px;
}

}


.nav-side-menu {
  overflow: auto;
  font-family: verdana;
  font-size: 12px;
  font-weight: 200;
  background-color: #2e353d; 
  position: fixed;
  top: 0px;
  width: 250px;
  height: 100%;
  color: #e1ffff;
}
.nav-side-menu .brand {

  padding-top: 13%;
  padding-left: 33%;
  line-height: 150px;
  background-color: #23282e; 
  font-size: 14px;
  display: block;

}

.nav-side-menu .toggle-btn {
  display: none;
}
.nav-side-menu ul,
.nav-side-menu li {
  list-style: none;
  padding: 0px;
  margin: 0px;
  line-height: 35px;
  cursor: pointer;
  /*    
    .collapsed{
       .arrow:before{
                 font-family: FontAwesome;
                 content: "\f053";
                 display: inline-block;
                 padding-left:10px;
                 padding-right: 10px;
                 vertical-align: middle;
                 float:right;
            }
     }
*/
}
.nav-side-menu ul :not(collapsed) .arrow:before,
.nav-side-menu li :not(collapsed) .arrow:before {
  font-family: FontAwesome;
  content: "\f078";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
  float: right;
}
.nav-side-menu ul .active,
.nav-side-menu li .active {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69; 
}
.nav-side-menu ul .sub-menu li.active,
.nav-side-menu li .sub-menu li.active {
  color: #d19b3d; 
}
.nav-side-menu ul .sub-menu li.active a,
.nav-side-menu li .sub-menu li.active a {
  color: #d19b3d; 
}
.nav-side-menu ul .sub-menu li,
.nav-side-menu li .sub-menu li {
  background-color: #181c20; 
  border: none;
  line-height: 28px;
  border-bottom: 1px solid #23282e;
  margin-left: 0px; 
}
.nav-side-menu ul .sub-menu li:hover,
.nav-side-menu li .sub-menu li:hover {
  background-color: #020203; 
}
.nav-side-menu ul .sub-menu li:before,
.nav-side-menu li .sub-menu li:before {
  font-family: FontAwesome;
  content: "\f105";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle; 
}
.nav-side-menu li {
  padding-left: 0px;
  border-left: 3px solid #2e353d;
  border-bottom: 1px solid #23282e;
}
.nav-side-menu li a {
  text-decoration: none;
  color: #e1ffff;  
}
.nav-side-menu li a i {
  padding-left: 10px;
  width: 20px;
  padding-right: 20px;
}
.nav-side-menu li:hover {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;  
  -webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -o-transition: all 1s ease;
  -ms-transition: all 1s ease;
  transition: all 1s ease;
}
@media (max-width: 767px) {
  .nav-side-menu {
    position: relative;
    width: 100%;
    margin-bottom: 10px;
  }
  .nav-side-menu .toggle-btn {
    display: block;
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 10 !important;
    padding: 3px;
    background-color: #ffffff; 
    color: #000;
    width: 40px;
    text-align: center;
  }
  .brand {
    text-align: left !important;
    font-size: 22px;
    padding-left: 20px;
    line-height: 50px !important;
  }
}
@media (min-width: 767px) {
  .nav-side-menu .menu-list .menu-content {
    display: block;
  }
}
body {
  margin: 0px;
  padding: 0px;
}


</style>
    <script type="text/javascript" src="<?=base_url();?>asset/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
</head>
<body>
<!-- fixed navigation bar -->
    	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
            
                
			    <div class="navbar-header">
                    <a id="menu-toggle" href="#" class="navbar-brand glyphicon glyphicon-align-justify btn-menu toggle pull-left">
                        
                    </a>
                    
					<a class="navbar-brand" href="Index">SIMKESDA <small> [Sistem Kesehatan Daerah] </small></a>
				</div>
				<div class="collapse navbar-collapse" id="b-menu-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="active">
							<a href="home/logout">Logout</a>
						</li>
						

						<li id="login" class="dropdown">

							<a href="#" class="dropdown">
								<span class="glyphicon glyphicon-user"></span>
							   <?php echo $username; ?>
								
							</a>
						</li>

					</ul>
				</div>
			
            </div>
		

<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            
            <div class="nav-side-menu">
    <div class="brand" ><img src="<?=base_url();?>asset/images/logo_waykanan.png"></div>

        <div class="menu-list">
  
            <ul>
                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a id="judul" href="#"><i class="fa fa-gift fa-lg"></i> Transaksi <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="daftar_ctrl">Pendaftaran</a></li>
                    <li><a href="pelayanan_ctrl">Pelayanan</a></li>
                    <li><a href="apotik_ctrl">Apotik</a></li>
                    <li><a href="kasir_ctrl">Kasir</a></li>
                    <li><a href="gudang_ctrl">Gudang</a></li>
                </ul>

                <li  data-toggle="collapse" data-target="#luar_ruang" class="collapsed">
                  <a id="judul" href="#"><i class="fa fa-gift fa-lg"></i> Keg Luar Gedung <span class="arrow"></span></a>
                </li>

                <ul class="sub-menu collapse" id="luar_ruang">
                  <li data-toggle="collapse" data-target="#imun1" class="collapsed"> Imunisasi
                    <ul class="sub-menu collapse" id="imun1">
                      <li><a href="imunisasi1_ctrl"> ~> Data Dasar target </a></li>
                      <li><a href="imunisasi2_ctrl"> ~> Daftar Imunisasi </a></li>
                    </ul>
                  </li>
                  <li data-toggle="collapse" data-target="#kes_lingkungan" class="collapsed"> Kesehatan Lingkungan 
                    <ul class="sub-menu collapse" id="kes_lingkungan">
                      <li><a href="rumah_sehat_ctrl"> ~> Rumah Sehat </a></li>
                      <li><a href="inspeksi_rm_ctrl"> ~> Sanitasi RM dan Restoran </a></li>
                      <li><a href="inspeksi_psr_ctrl"> ~> Inspeksi Pasar </a></li>
                      <li><a href="inspeksi_htl_ctrl"> ~> Pemeriksaan Kes Hotel </a></li>
                    </ul>
                  </li>
                  <li><a href="posyandu_ctrl"> Posyandu </a></li>
                </ul>

                <li  data-toggle="collapse" data-target="#datadasar" class="collapsed">
                  <a id="judul" href="#"><i class="fa fa-gift fa-lg"></i> Data Dasar <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="datadasar">
                    <li class="active"><a href="dt_gizi_ctrl">Data Gizi</a></li>
                    <li><a href="dt_kia_ctrl">KIA</a></li>
                    <li><a href="dt_imunisasi_ctrl">Imunisasi</a></li>
                    <li><a href="dt_penyakitm_ctrl">Penyakit Menular</a></li>
                    <li><a href="dt_rawat_tinggal_ctrl">Rawat Tinggal/Inap</a></li>
                    <li><a href="dt_kesmas_ctrl">Kesehatan Masyarakat (Klg)</a></li>
                    <li><a href="dt_gigi_ctrl">Kesehatan Gigi</a></li>
                    <li><a href="dt_sekolah_ctrl">Kesehatan Sekolah</a></li>
                    <li><a href="dt_olahraga_ctrl">Kesehatan Olah Raga</a></li>
                    <li><a href="dt_kesling_ctrl">Kesehatan Lingkungan</a></li>
                    <li><a href="dt_lab_ctrl">Laboratorium</a></li>
                </ul>                

                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a id="judul" href="#"><i class="fa fa-globe fa-lg"></i> Laporan <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li><a href="lap_rekam_medik_ctrl">Lap Data Rekam Medik</a></li>
                  <li><a href="lap_lb1_ctrl">Lap LB-1</a></li>
                  <li><a href="lap_lb3_ctrl">Lap LB-3</a></li>
                  <li><a href="lap_lb4_ctrl">Lap LB-4</a></li>
                </ul>


               <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a id="judul" href="#"><i class="fa fa-car fa-lg"></i> Pengaturan <span class="arrow"></span></a>
               </li>

                <ul class="sub-menu collapse" id="new">
                  <li><a href="kecamatan_ctrl"> Kecamatan </a></li>
                  <li><a href="kelurahan_ctrl"> Kelurahan </a></li>
                  <li><a href="desa_ctrl"> Desa </a></li>
                  <li><a href="puskes_ctrl"> Puskesmas </a></li>
                  <li><a href="pasien_ctrl"> Pasien </a></li>
                  <li><a href="obatalkes_ctrl">Farmasi </a></li>
                  <li><a href="petugas_ctrl">Petugas </a></li>
                  <li><a href="penyakit_ctrl">Penyakit </a></li>
                 <!-- <li>Pelayanan</li> -->
                </ul>

                 <li data-toggle="collapse" data-target="#nuser" class="collapsed">
                    <a id="judul" href="#"><i class="fa fa-car fa-lg"></i> User <span class="arrow"></span></a>
                </li>

                <ul class="sub-menu collapse" id="nuser">
                  <li><a href="trans_user_ctrl"> Data User </a></li>
                </ul>


            </ul>
     </div>
</div>
            
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
          
           
            
            
            <div id="isi_web" class="page-content inset" data-spy="scroll" data-target="#spy">
            </div>

            </div>

        </div>

    </div>
    
    
<script type="text/javascript">
    
	/*Menu-toggle  */
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    }); 

    /*Scroll Spy */
    $('body').scrollspy({ target: '#spy', offset:80});  


    $("#products > li a").each(function() {
      var self = $(this);
      var href = self.attr("href");
      self.attr("href", "javascript: void(0);");
      self.click(function() {
        $("#isi_web").load(href);
      });
    }); 

    $("#new > li a").each(function() {
      var self = $(this);
      var href = self.attr("href");
      self.attr("href", "javascript: void(0);");
      self.click(function() {
        $("#isi_web").load(href);
      });
    }); 

    $("#service > li a").each(function() {
      var self = $(this);
      var href = self.attr("href");
      self.attr("href", "javascript: void(0);");
      self.click(function() {
        $("#isi_web").load(href);
      });
    }); 

    $("#luar_ruang > li a").each(function() {
      var self = $(this);
      var href = self.attr("href");
      self.attr("href", "javascript: void(0);");
      self.click(function() {
        $("#isi_web").load(href);
      });
    }); 

    $("#datadasar > li a").each(function() {
      var self = $(this);
      var href = self.attr("href");
      self.attr("href", "javascript: void(0);");
      self.click(function() {
        $("#isi_web").load(href);
      });
    }); 

    $("#nuser > li a").each(function() {
      var self = $(this);
      var href = self.attr("href");
      self.attr("href", "javascript: void(0);");
      self.click(function() {
        $("#isi_web").load(href);
      });
    }); 

    /*Smooth link animation */
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    }); 

    
</script>
</body>
</html>
