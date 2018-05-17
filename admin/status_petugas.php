<?php include 'header.php';?>;

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Status Petugas
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-deskstop"></i> Status Petugas
                            </li>
                        </ol>
                    </div>
                </div>
				
			<?php // Coding Hapus
if (isset($_GET['del'])) {
  $nik = $_GET['del'];
  $cek = mysqli_query($koneksi, "SELECT * FROM status_petugas WHERE `no_status`='$nik'");
  if (mysqli_num_rows($cek) > 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM status_petugas WHERE `no_status`='$nik'");
    if ($delete) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data Barang Telah dihapus.</div>';
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
          <form  action="" method="post" class="popup-form">

<label>Input Sus</label>
                                <input  class="form-control form-white align-right " name="no" value="">           
                                
                            
								<label>Input Status</label>
                                <input  class="form-control form-white align-right " name="nm" value="">           
                                
								 <p></p>
                           
							
                          
                             <button type="submit" name="add"class="btn btn-primary"> <span class="glyphicon glyphicon-floppy-disk"></span> Simpan</a></button>
								

								<a href="data_petugas.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

                        

<p></p>
			
				
				
     

                        
			</div>			
			
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