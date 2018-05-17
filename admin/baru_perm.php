<?php
include 'header.php';?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Master Data <small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"></i> Permintaan Terbaru
                            </li>
                        </ol>
                    </div>
                </div>
<?php
if (isset($_GET['del'])) {
  $idp = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM permintaan_produk WHERE `kd_perm`='$idp'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM permintaan_produk WHERE `kd_perm`='$idp'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data absensi telah dihapus.</div>';
    } else {
      echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Kesalahan!</strong> Tidak dapat menghapus data.</div>';
    }
  } else {
    echo '<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Oh snap!</strong> Data tidak ditemukan.</div>';
  }
}

?>
<div class="form-group">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Tambah Data</a>
  </div>
<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>Kode Produk</th>
      <th>Jumlah Permintaan</th>
      <th>Tanggal</th>
      <th>Waktu</th>
      <th>Keperluan</th>
      <th>Status</th>
      <th>Petugas</th>
      <th >Pilihan</th>
    </tr>
    <?php
      $tanggal = date('Y-m-d');
     $menunggu	= date('Y-m-d');
        $sql = mysqli_query($koneksi, "SELECT * from `permintaan_produk` where `status_perm` ='menunggu' order by kd_perm ASC");
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          <td align="left">'.$data[1].'</td>
          <td>'.$data[2].'</td>
		  <td>'.$data[3].'</td>
        <td>'.$data[4].'</td>
		<td>'.$data[5].'</td>
		
		<td>'.$data[6].'</td>
		
		<td>'.$data[7].'</td>
          <td width="120px" ><a href="proses_accep.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>   
          <a href="proses_reject.php?id='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="return confirm(\'Tolak Permintaan ini?\')"></span></a>
       
		  <a href="lihat_perm.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a> 
          
           </tr>';
        }
      }
    ?>
  </table>
</div>
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				                <!-- /.row -->
<?php

date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['simpan'])) {
	$kdp = $_POST['kdp'];
	$jumlahp = $_POST['jumlahp'];
	
	$tanggal = date('Y-m-d');
	$waktu = date('h:i:s');
	$keperluan = $_POST['keperluan'];
	
	
  if ($kdp != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO `permintaan_produk`(`kd_produk`, `jumlah_perm`, `tgl_perm`,`waktu`,`keperluan_perm`,`status_perm`, `id_petugas`) 
		VALUES ('$kdp','$jumlahp','$tanggal','$waktu','$keperluan','menunggu','$_SESSION[nama_petugas] = $_SESSION[status_petugas]')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./baru_perm.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
		}
	}  else {
		echo '<script type="text/javascript">alert("Pilih Data produk")
			</script>';
  }
}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
              

                    <form action="" method='post' class="popup-form">


                           
							
    <label class="control-label">Data Produk</label>


      <select class="form-control" name="kdp">
        <option value="">Pilih</option>
        <?php
		  //$q = mysqli_query($koneksi, "SELECT `produk_masuk` .*, `data_produk`.`kd_produk`,`data_produk`.`nama_prdk`,`data_produk`.`jenis_prdk` FROM `produk_masuk` JOIN `data_produk` ON `produk_masuk`.`kd_produk` = `data_produk`.`kd_produk` order by `no` ASC");
   $q= mysqli_query($koneksi, "SELECT `produk_masuk` .*, `data_produk`.`kd_produk`,`data_produk`.`nama_prdk`,`data_produk`.`harga`,`data_produk`.`jenis_prdk`  FROM `produk_masuk` LEFT JOIN `data_produk` ON `produk_masuk`.`kd_produk` = `data_produk`.`kd_produk` order by `no` ASC ");
		//$q = mysqli_query ($koneksi, "select * from `produk_masuk` order by `kd_produk` ASC");
		while ($data = mysqli_fetch_array ($q)) {
			echo '<option value="' . $data [1] .' ">'. $data[1] .' - ' . $data[7] .' ('.$data[8].')'.$data[9].' </option>';

		}
		?>
      </select>

    
                                <label>Jumlah</label>
                                <input  class="form-control form-white" name="jumlahp" placeholder="Enter text">
                            

                            
                                <label>Keperluan</label>
                                <input  class="form-control form-white"  name="keperluan" placeholder="Enter text">
                                                    
							
                                <label>Tanggal Permintaan</label>
                                <p align='center'> <input  class="form-control form-white"   placeholder="Enter text" value="<?php echo IndonesiaTgl(date('Y-m-d')); ?>" readonly>
                            </p>
                          
                             <button type="submit" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
								<button type="reset" class="btn btn-default">Reset</button>

                        </form>
			</div>
		</div>
		
	</div>
	<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				
				
			</div>
		</div>
	</div>
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<?php include 'footer.php';?>
