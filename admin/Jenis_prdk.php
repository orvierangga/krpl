<?php include 'header.php';?>;

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Jenis produk
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-deskstop"></i> Data Jenis 
                            </li>
                        </ol>
                    </div>
                </div>
				
			<?php // Coding Hapus
if (isset($_GET['del'])) {
  $nik = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM jenis_produk WHERE `kd_jenis`='$nik'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM jenis_produk WHERE `kd_jenis`='$nik'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data produk Telah dihapus.</div>';
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
<div class="-col-lg-4">
 
<?php
	
	if (isset($_POST['add'])) {

		$nm = $_POST['nm'];
  if ($nm != '') {
		$insert = mysqli_query($koneksi, "INSERT INTO jenis_produk( `nama_jenis` ) 
		VALUES ('$nm')") or die(mysqli_error());
		
				if($insert) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./jenis_prdk.php" >'; //coding refresh
			
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
        


                            
								<label>Input Nama Jenis</label>
                                <input  class="form-control form-white align-right " name="nm" value="">           
                                
								 <p></p>
                           
							
                          
                             <button type="submit" class="btn btn-primary" name="add"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
								

								<a href="tampil_prdk.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

                        

<p></p>
			
				
				
     

                        
			</div>			
			
			<p></p>
			
						 
						<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr >
     
      <th>Kode Jenis</th>
      <th>Nama Jenis</th>
     <th>Hapus</th>
    </tr>
    <?php
      $tanggal = date('Y-m-d');
     
        $sql = mysqli_query($koneksi, "SELECT * from jenis_produk ORDER BY `kd_jenis` ASC");
   
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
           <td>'.$no.'</td>
          <td>'.$data[1].'</td>
         
		<td> 
		<a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
		}
      }
    ?>
  </table>
</div>

				                <!-- /.row -->
					
						
						<?php include "footer.php";?>