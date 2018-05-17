<?php include "header.php";
$ud1 = $_GET['id'];?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Data Produk
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-pencil"></i> Edit Data 
                            </li>
                        </ol>
                    </div>
                </div>
	<?php $ubah = mysqli_query ($koneksi, "select * from login where kd_user ='$ud1'");
	$data = mysqli_fetch_array ($ubah);
	?>
	<?php

if (isset($_POST['gu'])) {
	$kdu = $_POST['kdu'];
    $nmu = $_POST['nmu'];
	$pass = $_POST['pass'];
	$idp = $_POST['idp'];
	$level = $_POST['level'];

	$cek = mysqli_query($koneksi, "select * from login where kdu='$data[0]'"); //cek data yg mau diedit
	
  if (mysqli_num_rows($cek) !=0) {
		$edit = mysqli_query($koneksi, "UPDATE `login` set  `kd_user`='$', `harga_msk`='$harga',`total_harga`='$total1' where `no`='$ud1'") 
		or die (mysqli_error());
		
				if($edit) {
			echo '<script type="text/javascript">alert("Data Berhasil disimpan") </script>';
			echo '<meta http-equiv="refresh" content="0; url=./tampilprodukmasuk.php" >'; //coding refresh
			
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


                          
                            <label>Deskripsi</label>
                                <input  class="form-control form-white"   name="idi" value="<?php echo $data[1];?>" disabled>
                            
                           
                                
                            
								<label>Jumlah Produk</label>
                                <input  class="form-control form-white"  name="jumlah" value="<?php echo $data[2];?>">
                            
								<label>Harga Satuan</label>
                                <input  class="form-control form-white"  name="harga" value="<?php echo $data[3];?>">
                            
							<label>Tanggal Produk Masuk</label>
                                <input type="date" class="form-control form-white"  name="tanggal" value="<?php echo $data[4];?>" disabled>
                            
							
							
                             
                                    
                                
								 <p></p>
                           
							
                          
                             <button type="submit" class="btn btn-primary" name="edt"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
								

								<a href="tampilprodukmasuk.php" button type="reset" class="btn btn-default"> <span class="glyphicon glyphicon-triangle-right"></span> Kembali</a>

                        </form>
						
						<?php include "footer.php";?>