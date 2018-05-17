<?php
include 'header.php';
$udah = $_GET['id'];?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Permintaan produk <small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"></i> Permintaan produk
                            </li>
                        </ol>
                    </div>
                </div>

				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
	<?php $ubah = mysqli_query ($koneksi, "select * from permintaan_produk where kd_perm='$udah'");
				$dat = mysqli_fetch_array ($ubah);
				?>			                <!-- /.row -->
<?php

date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['terima'])) {
	
	$tanggal = date('Y-m-d');
	$waktu = date('h:i:s');
	$idp = $dat[1];
	$jumlah = $dat[2];
	$keperluan = $dat[5];;	
	$petugas = $dat[7];;
	
	$cek = mysqli_query($koneksi, "select * from permintaan_produk where kd_perm='$dat[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		$edit =  mysqli_query($koneksi, "UPDATE `permintaan_produk` set `status_perm`='Diterima' where `kd_perm`='$udah'") or die(mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			mysqli_query($koneksi, "INSERT INTO `produk_keluar`(`kd_produk`, `jumlah_prdk`,`keperluan`,`tanggal_keluar`,`status`,`kd_petugas`) 
		VALUES ('$idp','$jumlah','$keperluan','$tanggal','DITERIMA','$petugas')");
			echo '<meta http-equiv="refresh" content="0; url=./baru_perm.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal diterima")
			</script>';
		}
	}  else {
		echo '<script type="text/javascript">alert("Pilih Data Permitaan")
			</script>';
  }
}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
              

                    <form action="" method='post' class="popup-form col-lg-4">


                           
							
    <label class="control-label">Kode produk</label>


      <input  class="form-control form-white" name="idp"  value="<?php echo $dat[1];?>" disabled >

    
                                <label>Jumlah</label>
                                <input  class="form-control form-white" name="jumlahp" placeholder="Enter text" value="<?php echo $dat[2];?>" disabled>
                            

                            
                                <label>Tanggal Permintaan</label>
                                <input  class="form-control form-white"  name="tnggal" placeholder="Enter text" value="<?php echo IndonesiaTgl($dat[3]);?>" disabled>
                              <label>Jam Permintaan</label>
                                <input  class="form-control form-white"  name="jam" placeholder="Enter text" value="<?php echo $dat[4];?>" disabled>
                             <label>Keperluan</label>
                                <input  class="form-control form-white"  name="keperluan" placeholder="Enter text" value="<?php echo $dat[5];?>" disabled>
                            

                           
							
                           <P></p>
							
                               
                          
                             <button type="submit" class="btn btn-primary" name="terima"><span class="glyphicon glyphicon-ok"></span> Terima</button>
							  <button type="reset" class="btn btn-danger " name="tolak"><span class="glyphicon glyphicon-remove"></span> Tolak</button>
							<a href="baru_perm.php"  button type="submit" class="btn btn-default" name="kembali"><span class="glyphicon glyphicon-triangle-right"></span> Kembali</button></a>
								
                        </form>
			
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<?php include 'footer.php';?>
