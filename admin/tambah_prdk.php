<?php
include 'header.php';?>

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Data Produk <small>( <?php echo IndonesiaTgl(date('Y-m-d'));?> )</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"> </i> Tambah Daftar Produk
                            </li>
                        </ol>
                    </div>
                </div>
				
	<script type="text/javascript">
        tinymce.init({selector:"textarea"});
    </script>
<?php
$cari = mysqli_query ($koneksi, "select max(`kd_produk`) as kd from data_produk");
$tm_cari = mysqli_fetch_array ($cari);
$kode = substr($tm_cari['kd'],2,2);
$tambah = $kode+1;
if ($tambah<10){
$ed = "PR00".$tambah;
}else {
$ed ="PR0".$tambah;
}
if (isset($_POST['simpan'])) {
	$kd = $_POST ['kd'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];
	
	if (empty($_GET['update'])) {
        $query = mysqli_query($koneksi,"INSERT INTO data_produk VALUES ('$kd','$nama','$jenis')");
      } else {
        $kd_update = $_GET['update'];
        $query=mysqli_query($koneksi,"UPDATE `data_produk` SET `nama_prdk`='$nama',`jenis_prdk`='$jenis', WHERE `kd_produk`='$kd_update'");
      }
 if ($query) {
        echo '<script>alert(\'Berhasil "'.$kd.' "\');history.go(-1);</script>';
      }
      else {
        echo '<script>alert(\'Gagal " <b>'.$kd.'</b> "\');history.go(-1);</script>';
      }
	
 if(isset($_FILES['foto'])){
          $query=mysqli_query($koneksi,"select * from data_produk order by kd_produk desc limit 0, 1");
          while ($data = mysqli_fetch_array($query)) 
          {
            $fileName = $_FILES['foto']['name']; //nama file
            $fileSize = $_FILES['foto']['size']; //ukuran file
            $fileError = $_FILES['foto']['error']; //
            $uploaddir= '../img/';
            $lokasi=$uploaddir.$fileName;
            if($fileSize > 0 || $fileError == 0){ //Check jika error
              $move = move_uploaded_file($_FILES['foto']['tmp_name'],$lokasi); //save gambar ke folder
              if($move){
                if (empty($_GET['img'])) {
                  $q = "INSERT into tbgambar VALUES('','$fileName','img/$fileName',".$data[0].")"; //memasukkan data ke database
                } else {
                  $img = $_GET['img'];
                  $q = "UPDATE `tbgambar` SET `nama_gambar`='$fileName',`penyimpanan`='img/$fileName',`kd_gambar`=".$data[0]." WHERE `no_gambar`='$img'";
                //  $q = "INSERT into tbgambar VALUES('','$fileName','img/$fileName',".$data[0].")"; //memasukkan data ke database
                }

               mysqli_query($koneksi,$q);
              } else{
                echo "<center><h3>Failed mengunggah gambar! </h3></center>";
              }
            } 
          }
      }
    }
	
$now = strtotime(date("Y-m-d"));
$maxage = date("Y-m-d", strtotime('- 16 year', $now));
$minage = date("Y-m-d", strtotime('- 40 year', $now));
?>
 
<?php 
  if (empty($_GET['update'])) {
    
  echo '<form method="post" name="posting_form" enctype="multipart/form-data" >';
    echo '<div class="bungkus">
      Judul Artikel<br>
      <input type="text" name="judul_artikel" size="30" class="form-control" placeholder="Masukan Judul" value=""><br>
            Kategori * <a  data-toggle="modal" href="#myModal">Buat Baru</a><br>
            <select class="form-control" name="id_kategori">';
                $a="SELECT * FROM tbkategori";
                $sql=mysqli_query($koneksi,$a);
                while($data=mysqli_fetch_array($sql)){
                  echo '<option value="'.$data[0].'">'.$data[1].'</option>';
          
                }
            echo '</select><br>
            Image header
    <input name="foto" type="file" accept="image/*" /><br>
    Isi Artikel<br>
      <textarea type="textarea" name="isi_artikel" class="form-control" placeholder="Masukan isi artikel" rows="10"></textarea><br>
    <input type="submit" name="save" value="Post article" class="reply">
    </div>
    </form>';

  }
  else {
    $kd_artikel = $_GET['update'];
    $query=mysqli_query($koneksi,"select * from data_produk left join tbkategori on tblartikel.id_kategori=tbkategori.id_kategori where tblartikel.id_artikel=$id_artikel order by id_artikel");
    while($datas=mysqli_fetch_array($query)){
      echo '<form method="post" name="posting_form" enctype="multipart/form-data" >';
  		echo '<div class="bungkus">
  			Judul Artikel<br>
  			<input type="text" name="judul_artikel" size="30" class="form-control" placeholder="Masukan Judul" value="'.$datas[1].'"><br>
              Kategori * <a  data-toggle="modal" href="#myModal">Buat Baru</a><br>
              <select class="form-control" name="id_kategori">';
                  $a="SELECT * FROM tbkategori";
                  $sql=mysqli_query($koneksi,$a);
                  while($data=mysqli_fetch_array($sql)){
                    echo '<option value="'.$data[0].'">'.$data[1].'</option>';
            
                  }
              echo '</select><br>
              Image header
      <input name="foto" type="file" accept="image/*"><br>
    	Isi Artikel<br>
    		<textarea type="textarea" name="isi_artikel" class="form-control" placeholder="Masukan isi artikel" rows="10">'.$datas[2].'</textarea><br>
    	<input type="submit" name="simpan" value="Post article" class="reply">
    	</div>
    	</form>';
      }

  }

?>

<!--
 
<form action="" method='post' enctype="multipart/form-data" class="popup-form">                           
							
 <label class="control-label">Kode Produk</label>
<input class="form-control form-white" name="idp" placeholder="Enter text" readonly="" value="<?php echo $ed;?>" >
  		
<label>Nama Produk</label>
<input  class="form-control form-white" name="jumlah" placeholder="Enter text">
                    
<label>Jenis</label>
<input  class="form-control form-white" name="jumlah" placeholder="Enter text">

<label>Gambar</label>
<input  class="form-control form-white" name="jumlah" placeholder="Enter text">
                          
    <button type="submit" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
	<button type="reset" class="btn btn-default">Reset</button>

                        </form> -->
</div>
</div>
<?php include'footer.php';?>