<?php include "header.php";
$ud = $_GET['id'];?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Data Petugas
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-pencil"></i> Edit Data
                            </li>
                        </ol>
                    </div>
                </div>
				<?php $ubah = mysqli_query ($koneksi, "select * from data_petugas where id_petugas='$ud'");
				$data = mysqli_fetch_array ($ubah);
				?>
				<?php


if (isset($_POST['edt'])) {
	
	$nama1 = $_POST['nama1'];
	$pass = $_POST['pass'];
	$kdpt = $_POST['kdpt'];
	$status = $_POST['status'];
	$cek = mysqli_query($koneksi, "select * from data_petugas where id_petugas='$data[0]'"); //cek data yg mau diedit
	 
  if (mysqli_num_rows($cek) !=0) {
		$edit = mysqli_query($koneksi, "UPDATE `data_petugas` set `nama_petugas`='$nama1', `password`='$pass',`kd_pegawai`='$kdpt',`status_petugas`='$status' where `id_petugas`='$ud'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./data_petugas.php" >'; //coding refresh
			
		} else {
			echo '<script type="text/javascript">alert("Data gagal disimpan")
			</script>';
		}
	} 
}

$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
              

                        <form  action="" method="post" class="popup-form col-lg-4">
                       
								<label>ID Petugas</label>
                                <input  class="form-control form-white"   name="ud" value="<?php echo $data[0];?>" disabled>
                            
                           
                             
                                <label>Nama Petugas</label>
                                <input  class="form-control form-white"  name="nama1"  value="<?php echo $data[1];?>" required> 
								<label>Password</label>
                                <input  class="form-control form-white"  name="pass" value="<?php echo $data[2];?>" required> 
                            

                           <label>Nomor Induk Kepegawaian</label>
                                <input  class="form-control form-white"   name="kdpt" value="<?php echo $data[3];?>" required>
							
                                <label>Status</label>
                                
								<select class= "form-control form-white" name="status" required>
                            
								<option value=""><?php echo $data[4];?></option>
                                     <?php
									  $kat = $data[4];
									 $kat = mysqli_query ($koneksi, "select * from `status_petugas` order by `nama_status` ASC");
								while ($data = mysqli_fetch_array ($kat)) {
								echo '<option value="' . $data[1]. '">'. $data[0] .' - ' . $data[1] . '</option>';
								}
								?>
         
                          
								
								</select>
								 <p></p>
								 
								 
								 
								 
                                
                            <p></p>
                          
                             <button type="submit" class="btn btn-primary" name="edt"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
								

								<a href="data_petugas.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>


                        </form>
						
						<?php include "footer.php";?>