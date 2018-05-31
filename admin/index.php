<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Masuk KRPL</title>
	<link rel="shortcut icon" href="img/bjb.png">
	
 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="data_tables/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	
	<link href="datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="datatables-responsive/js/dataTables.responsive.js" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

				<?php
date_default_timezone_set('Asia/Jakarta');
include 'library.php';
				if(isset($_POST['login'])){

					include"../conn.php";
					$username	= $_POST['username'];
					$password	= md5($_POST['password']);
					
					
					$login=mysqli_query($koneksi,"SELECT * FROM data_petugas WHERE `nama_petugas`='$username'  AND `password` ='$password'");


// Apabila username dan password ditemukan
if(mysqli_num_rows($login) == 0){
						echo '<div class="alert alert-danger" align="center" >Login gagal !!! Silahkan Coba Lagi..</div>';
	}else{
$ketemu =mysqli_num_rows($login);
$r=mysqli_fetch_array($login);					 
session_start();				
$_SESSION['nama_petugas']     = $r['nama_petugas'];
$_SESSION['password']     = $r['password'];
$_SESSION['kd_pegawai']=$r['kd_pegawai'];
$_SESSION['status_petugas'];


  $jam = date("H:i:s");
  $tgl = date("Y-m-d");

 	
						if($r['status_petugas'] == 'admin'){
						
							$_SESSION['nama_petugas']=$username;
							$_SESSION['status_petugas']='admin';
						$_SESSION['kd_pegawai']=$ketemu['kd_pegawai'];
							
							 mysqli_query($koneksi, "INSERT INTO `log_login`(`username`,`jam_msk`,`jam_klr`,`tgl_msk`,`tgl_klr`,`status_log`)
                           VALUES('$_SESSION[nama_petugas]','$jam','logged','$tgl','---','online')");	
						   header("Location: /krpl/admin/beranda.php");
						}else {
							
						   header("Location: /krpl/admin/index.php");
						}
					}
				}
				?>
				

  <body background="img/black.jpg">
<div class="container" background="img/image_5.jpg">
        <div class="row">
            <div background="img/image_5.jpg" class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" background="img/image_5.jpg">
                    <div class="panel-heading" background="img/image_5.jpg">
                        <h3 align="center"  class="panel-title">Masuk KRPL</h3>
                    </div>
                    <div class="panel-body" background="img/image_5.jpg">
                        <form image="img/image_5.jpg" role="form" action="" method="post">
    
					 <fieldset>
                    
					<div class="form-group" background="img/image_5.jpg">
						<input type="text" name="username" class="form-control" placeholder="Nama Pengguna" required autofocus />
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Kata Kunci" required autofocus />
					</div>
					
					<div class="form-group" bgcolor="black">
						<input type="submit" name="login" class="btn btn-primary btn-block" value="Masuk" />
					</div>
				 </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="bootstrap.min.js"></script>

</body>

</html>
