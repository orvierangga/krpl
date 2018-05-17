<?php include "header.php";
$ud1 = $_GET['id'];?>
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
				<?php $ubah = mysqli_query ($koneksi, "select * from produk_masuk where no ='$ud1'");
				$data = mysqli_fetch_array ($ubah);
				?>
				<?php


if (isset($_POST['edt'])) {
		
		
	$jumlah = $_POST['jumlah'];
	$harga = $_POST['harga'];
	$total1 = $jumlah*$harga;

	$cek = mysqli_query($koneksi, "select * from produk_masuk where no='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		$edit = mysqli_query($koneksi, "UPDATE `produk_masuk` set  `jumlah_msk`='$jumlah', `harga_msk`='$harga',`total_harga`='$total1' where `no`='$ud1'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./produk_masuk.php" >'; //coding refresh
			
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
             

                        <form action="" method="post" class="popup-form col-lg-4">


                          
                            <label>Deskripsi produk</label>
                                <input  class="form-control form-white"   name="idi" value="<?php echo $data[1];?>" disabled>
                            
                           
                                
                            
								<label>Jumlah produk</label>
                                <input  class="form-control form-white"  name="jumlah" value="<?php echo $data[2];?>">
                            
								<label>Harga Satuan</label>
                                <input  class="form-control form-white"  name="harga" value="<?php echo $data[3];?>">
                            
							<label>Tanggal produk Masuk</label>
                                <input type="date" class="form-control form-white"  name="tanggal" value="<?php echo $data[4];?>" disabled>
                            
							
							
                             
                                    
                                
								 <p></p>
                           
							
                          
                             <button type="submit" class="btn btn-primary" name="edt"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
								

								<a href="produk_masuk.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

                        </form>
						
						<?php include "footer.php";?>