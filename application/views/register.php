<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Registrasi Kasir</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="<?=base_url('index.php/user/simpan')?>" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
                    <input type="text" class="form-control" name="nama_user" placeholder="Nama Lengkap" autofocus>
		            <br>
		           <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" placeholder="Password">
		            <br>
                    <div class="row-center">
                        <input type="radio" value="kasir" name="level">Saya Mensetujui persyaratan sebagai Kasir
                    </div>
                    <br>
		            <input name="daftar" class="btn btn-theme btn-block" value="Register" type="submit">
		            <hr>
		            
		            <div class="registration">
		                Already have an account yet?<br/>
		                <a class="" href="<?=base_url('index.php/user')?>">
		                    Login now !
		                </a>
		            </div>
		              <?php
                if($this->session->flashdata('pesan')!= null){
                echo"<div class='alert alert-success' style='width:300px'>".$this->session->flashdata('pesan')."</div";
                }?>
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?=base_url()?>assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
