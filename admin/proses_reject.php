<?php
include 'header.php';
$udah = $_GET['id'];?>


				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
	<?php $ubah = mysqli_query ($koneksi, "select * from permintaan_barang where kd_perm='$udah'");
				$dat = mysqli_fetch_array ($ubah);
				?>			                <!-- /.row -->
<?php

date_default_timezone_set('Asia/Jakarta');

	
	$tanggal = date('Y-m-d');
	$waktu = date('h:i:s');
	$idp = $dat[1];
	$jumlah = $dat[2];
	$keperluan = $dat[5];;	
	$petugas = $dat[7];;
	
	$cek = mysqli_query($koneksi, "select * from permintaan_barang where kd_perm='$dat[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		$edit =  mysqli_query($koneksi, "UPDATE `permintaan_barang` set `status_perm`='Ditolak' where `kd_perm`='$udah'") or die(mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascripszt">alert("Data Berhasil Diterima") </script>';
			
			echo '<meta http-equiv="refresh" content="0; url=./baru_perm.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
		}
	}  else {
		echo '<script type="text/javascript">alert("Pilih Data Barang")
			</script>';
  }


$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
       
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<?php include 'footer.php';?>
