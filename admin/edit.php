<?php include "header.php";
$ud = $_GET['id'];?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Data produk
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-pencil"></i> Edit Data
                            </li>
                        </ol>
                    </div>
                </div>
				
<?php $ubah = mysqli_query ($koneksi, "select * from data_produk where kd_produk='$kd'");
$data = mysqli_fetch_array ($ubah);
?>
<?php


if (isset($_POST['edt'])) {
	$kd = $_POST['kd'];
	$nama1 = $_POST['nama1'];
	$jenis1 = $_POST['jenis1'];
	$ket1 = $_POST['ket1'];
	$cek = mysqli_query($koneksi, "select * from data_produk where kd_produk='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		$edit = mysqli_query($koneksi, "UPDATE `data_produk` set `nama_prdk`='$nama1', `jenis_prdk`='$jenis1',`ket`='$ket1' where `kd_produk`='$ud'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./tampil_prdk.php" >'; //coding refresh
			
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
                       
								<label>Kode produk</label>
                                <input  class="form-control form-white"   name="d" value="<?php echo $data[0];?>" disabled>
                            
                           
                             
                                <label>Nama produk</label>
                                <input  class="form-control form-white"  name="nama1" value="<?php echo $data[1];?>"> 
                            

                           <label>Keterangan</label>
                                <input  class="form-control form-white"   name="ket1" value="<?php echo $data[3];?>">
							
                                <label>Jenis produk</label>
                                
								<select class= "form-control form-white" name="jenis1" >
                            
								<option value=""><?php echo $data[2];?></option>
                                     <?php
									  $kat = $data[2];
									 $kat = mysqli_query ($koneksi, "select * from `jenis_produk` order by `nama_jenis` ASC");
								while ($data = mysqli_fetch_array ($kat)) {
								echo '<option value="' . $data[1]. '">'. $data[0] .' - ' . $data[1] . '</option>';
								}
								?>
         
                          
								
								</select>
								 <p></p>
								 
								 
								 
								 
                                
                            <p></p>
                          
                             <button type="submit" class="btn btn-primary" name="edt"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
								

								<a href="tampil_prdk.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>


                        </form>
						
						<?php include "footer.php";?>