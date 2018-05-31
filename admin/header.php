<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KRPL</title>
	<link rel="shortcut icon" href="img/bjb.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
    
 <script src="js/tinymce.min.js"></script>
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
</head>

<body >
<?php include "../conn.php";
include "library.php";
include "seslogin.php";?>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin KRPL</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        
                        <li>
                            <a href="#">Permintaan Terbaru <span class="label label-danger" align="center"><?php
$sql = mysqli_query($koneksi, "SELECT *,SUM(`status_perm`='menunggu') AS `total_semua` FROM `permintaan_produk` GROUP BY `status_perm`= 'menunggu'" );	  
   
if (mysqli_num_rows($sql) == 0) {
echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
} else {
while ($data = mysqli_fetch_array ($sql)) {
echo $data[8];

}
 }
?> </span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="baru_perm.php">Lihat Semua</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['nama_petugas'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="data_petugas.php"><i class="fa fa-fw fa-user"></i> Data Petugas</a>
                        </li>
                        
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="inactive">
                        <a href="beranda.php"><i class="fa fa-fw fa-flash"></i> Beranda</a>
                    </li>
                   
				  
                  <li class="inactive">
                      
					   <a  href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Master Data <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="baru_perm.php">Permintaan Terbaru</a>
                            </li>
							<li>
                                <a href="persed_produk.php">Persediaan produk</a>
                            </li>
							<li>
                                <a href="data_petugas.php">Data Petugas</a>
                            </li>
							
							</ul></li>
                   
                               
                            
				
                  
				  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Data produk <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="data_prdk.php">Daftar Produk</a>
                            </li>
							
							<li>
                                <a href="produk_masuk.php">Produk Masuk</a>
                            </li>
							
							
							<li>
                                <a href="produk_keluar.php">Produk Keluar</a>
                            </li>
													
							</ul> </li>
							
				  
				  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-arrows-v"></i> Permintaan produk <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                          
						   <li>
                                <a href="permintaan.php">Data Permintaan</a>
                            </li>
						   <li>
                                <a href="totaltrm_bln.php">Produk Diterima</a>
                            </li>
                           </ul> </li>
				  <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-arrows-v"></i> Laporan <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo5" class="collapse">
                           <li class="active">
                                <a href="#">Produk Pertahun</a>
                            </li>
						   
                           

				   </ul>
                    </li>
					
                   
            </div>
            <!-- /.navbar-collapse -->
        </nav>
