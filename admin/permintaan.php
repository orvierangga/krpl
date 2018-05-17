<?php
include 'header.php';?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Permintaan Produk <small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"></i> Data Permintaan
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
  <strong>Berhasil!</strong> Data telah dihapus.</div>';
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
  <span class="glyphicon glyphicon-list" aria-hidden="true"></span><a href="baru_perm.php"  class="btn btn-blue">Daftar Permintaan Baru</a>
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

date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['simpan'])) {
	$idp = $_POST['idp'];
	$jumlahp = $_POST['jumlahp'];
	
	$tanggal = date('Y-m-d');
	$waktu = date('h:i:s');
	$keperluan = $_POST['keperluan'];
	
	
  if ($idp != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO `permintaan_produk`(`kd_produk`, `jumlah_perm`, `tgl_perm`,`waktu`,`keperluan_perm`,`status_perm`, `id_petugas`) 
		VALUES ('$idp','$jumlahp','$tanggal','$waktu','$keperluan','menunggu','$_SESSION[nama_user]')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./permintaan.php" >'; //coding refresh
			
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


                           
							
    <label class="control-label">Deskripsi produk</label>


      <select class="form-control" name="idp">
        <option value="">Pilih</option>
        <?php
		$q = mysqli_query ($koneksi, "select * from `data_produk` order by `nama_prdk` ASC");
		while ($data = mysqli_fetch_array ($q)) {
			echo '<option value="'.$data [0].'"> '. $data[0] .' - ' . $data[1] .' ('.$data[3].') '.$data[2]. '</option>';

		}
		?>
      </select>

    
                                <label>Jumlah</label>
                                <input  class="form-control form-white" name="jumlahp" placeholder="Enter text">
                            

                            
                                <label>Keperluan</label>
                                <input  class="form-control form-white"  name="keperluan" placeholder="Enter text">
                            

                           
                           
							
                                <label>Tanggal Produk Masuk</label>
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


<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#reload_data").load('get_perm.php');
    $("#isi_cari").on("keyup", function() {
      var search = $(this).val();
      
    })
    $("#isi_cari, #cari_reload").on("keyup", function() {
      var search = $(this).val();
      $.ajax({
        url: 'get_perm.php',
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
