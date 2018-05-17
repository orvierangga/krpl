<?php
include 'header.php';?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">
                 Master Data <small>Petugas</small><small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
                </h1>
                <ol class="breadcrumb">
                <li class="active">
                <i class="fa fa-user" > </i> Data Petugas
                </li>
                </ol>
                </div>
                </div>
<?php
if (isset($_GET['del'])) {
  $nik = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM data_petugas WHERE `id_petugas`='$nik'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM data_petugas WHERE `id_petugas`='$nik'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data telah dihapus.</div>';
    } else {
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Kesalahan!</strong> Tidak dapat menghapus data.</div>';
    }
  } 
}
?>
<div class="form-group">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal"  data-target="#modal1" class="btn btn-blue">Tambah Data Petugas</a>
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal"  data-target="#modal2" class="btn btn-blue">Tambah Status Petugas</a>
   </div>

<!-- untuk membuat cari -->
	<div class="row">
    <div class="col-xs-8">
      <input type="text" name="s" class="form-control" placeholder="Cari.." id="isi_cari">
	</div>
    <div class="col-xs-4">
      <a href="#" class="btn btn-success" id="cari_reload"><span class="glyphicon glyphicon-search" > </span> Cari</a>
    </div>
	</div>

<br />
<!-- tempat reload data -->
<div id="reload_data"></div>


<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				                <!-- /.row -->

								
 <?php

 
if ($_POST)
{
	
$username = $_POST['user'];
$pass1 = md5($_POST['pass1']);
$pass2 = md5($_POST['pass2']);
 $sql = mysqli_query("UPDATE pengguna SET `username`='$username',`password`='$pass1' WHERE `no_pengguna`='$id'");
                    if (!empty($pass1) && !empty($pass2)){
						if ($pass1 == $pass2){
							$sql = " .password='".$pass1."'";
                       
								}
                            else{
                                echo "Silahkan ulangi password dengan benar";                    
                            }
                
                }
}
		
?>								
															
								
<?php
$cari = mysqli_query ($koneksi, "select max(`id_petugas`) as kd from data_petugas");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],3,3);
$tambah = $kode+1;
if ($tambah<10){
$ed = "PET00".$tambah;
}else {
$ed ="PET0".$tambah;
}

if (isset($_POST['add'])) {
	$idp = $_POST['idp'];
	$nama = $_POST['nama'];
	
	$pass1 = md5($_POST['pass1']);
	$pass2 = md5($_POST['pass2']);
	
	$kdpt = $_POST['kdpt'];
	$status = $_POST['status'];
	
 if ($pass1==$pass2){
			
		$insert = mysqli_query($koneksi, "INSERT INTO `data_petugas` (`id_petugas`, `nama_petugas`,`password` ,`kd_pegawai`,`status_petugas`) 
		VALUES ('$idp','$nama','$pass','$kdpt','$status')") or die(mysqli_error());
		
				if($insert){ 
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./data_petugas.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
			echo '<meta http-equiv="refresh" content="0; url=./data_petugas.php" >'; //coding refresh
		}
	}  else {
		echo '<script type="text/javascript">alert("Data Tidak Tersimpan Ketik Ulang Password")
			</script>';
		echo '<meta http-equiv="refresh" content="modal1;pass1 required" >'; //coding refresh
  }
}
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>





								<form  action="" method="post" class="popup-form" >
                                <label>ID Petugas</label>
                                <input  class="form-control form-white" name="idp" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >
                            
                                <label>Nama Petugas</label>
                                <input  class="form-control form-white"  name="nama" placeholder="Enter text" required="required">
								
								<label>Password</label>
                                 <input type="password" name="pass1" id="pass" class="form-control " value="" >
								<label>Ketik Ulang Password</label>
								<input type="password" name="pass2" id="pass2" class="form-control " >
		
				
								<label>Nomor Induk Kepegawaian</label>
                                <input  class="form-control form-white"  name="kdpt" placeholder="Enter text" required="required">								
								
								<label>Status</label>
                              	<select class="form-control" name="status" required="required">
								<option required="required" value="">Pilih</option>
								<?php
								$q = mysqli_query ($koneksi, "select * from `status_petugas` order by `nama_status` ASC");
								while ($data = mysqli_fetch_array ($q)) {
								echo '<option value="' . $data[1]. '">' . $data[0].'-'.$data[1]. '</option>';
								}
								?>
								</select>  
								
								<div class="checkbox-holder text-center">
							<div class="checkbox">
							<input type="checkbox" value="None" id="squaredOne" name="check" class="form-checkbox" />
							<label for="squaredOne"><span>Show <strong>Password &amp; Pengguna</strong></span></label>
							
	      </div>
		  		           <p></p>
                          
                             <button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
							<a href="data_petugas.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

							
							
						
        </form>
				
</div>
</div>
</div>
	
	
	
	 <!-- /.status Petugas -->
		<div class="modal fade" id="modal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content modal-popup">
		<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				                <!-- /.row -->

<?php // Coding Hapus
  if (isset($_GET['del'])) {
  $nik = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM status_petugas WHERE `no_status`='$nik'");
  if (mysqli_num_rows($cek) > 0) {
  $delete = mysqli_query($koneksi, "DELETE FROM status_petugas WHERE `no_status`='$nik'");
  if ($delete) {
  echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> 1 Data telah dihapus.</div>';
  echo '<meta http-equiv="refresh" content="0; url=./data_petugas.php" >'; //coding refresh
			
    } else {
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Kesalahan!</strong> Tidak dapat menghapus data.</div>';
    }
}
}
?>

<?php
$cari = mysqli_query ($koneksi, "select max(`no_status`) as no from status_petugas ");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['no'],1,2);
$tambah = $kode+1;
if ($tambah<10){
$eds = "S0".$tambah;
}else {
$eds ="0".$tambah;
}	
	if (isset($_POST['add2'])) {
    $nos = $_POST['nos'];
	$nm = $_POST['nm'];
	if ($nos != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO `status_petugas`( `no_status`,`nama_status` ) 
		VALUES ('$nos','$nm')") or die(mysqli_error());
		//$insert = mysqli_query($koneksi, "INSERT INTO `data_petugas` (`id_petugas`, `nama_petugas`, `kd_pegawai`,`status_petugas`) 
		//VALUES ('$idp','$nama','$kdpt','$status')") or die(mysqli_error());
		
	if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./data_petugas.php" >'; //coding refresh

		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
				}
		}  else {
		echo '<script type="text/javascript">alert("Pilih Data")
			</script>';
  }
}
?>
              

<form  action="" method="post" class="popup-form">
<label>Nomor</label>
<input  class="form-control form-white align-right " name="nos" readonly="" value="<?php echo $eds;?>">           
<label>Input Status</label>
<input  class="form-control form-white align-right " name="nm" value="">           
                                
								 <p></p>
<button type="submit" name="add2"class="btn btn-primary"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</a></button>
<a href="data_petugas.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>
				                           
								
<p></p>
<div class="table-responsive">	
<table class="table table-striped table-hover" bgcolor="#CCCCCC">
 <tr >
<th>Kode Status</th>
<th>Status</th>
<th>Hapus</th>
</tr>
<?php
 $tanggal = date('Y-m-d');
 $sql = mysqli_query($koneksi, "SELECT * from status_petugas ORDER BY `no_status` ASC");
  if (mysqli_num_rows($sql) == 0) {
  echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
  <tr align="center" bgcolor="#CCCCCC">
  <td>'.$data[0].'</td>
  <td>'.$data[1].'</td>
  <td> 
	
	<a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>'; //tombol hapus
		}
      }
    ?>
  </table>
</div>	

		
</div>			
 </form>
</div>
</div>
	


<script type="text/javascript">
	$(document).ready(function(){		
		$('#squaredOne').click(function(){
			if(this.checked){
				$('#pass').attr('type','text');
				$('#pass2').attr('type','text');
			}else{
				$('#pass').attr('type','password');
				$('#pass2').attr('type','password');
			}
			
		});
	});
</script>	  
		  


	
	
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#reload_data").load('get_petugas.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_petugas.php',
        data: 's='+search,
        success:function(data) {
          $("#reload_data").html(data);
        },
        error:function(data) {
          alert('Tidak Ada Data');
        }
      }) 
    });
  })
</script>
<?php include 'footer.php';?>
