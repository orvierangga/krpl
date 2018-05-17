<?php include 'header.php';
?>
		   

 
<?php
	
	if (isset($_POST['add'])) {
        $no = $_POST['no'];
		$nm = $_POST['nm'];
  if ($no != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO status_petugas( `no_status`,`nama_status` ) 
		VALUES ('$no','$nm')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./jenis_brg.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
		}
	}  else {
		echo '<script type="text/javascript">alert("Pilih Data Barang")
			</script>';
  }
}


$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
       		
						
						<?php include "footer.php";?>