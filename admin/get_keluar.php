<?php
include '../conn.php';?>

<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
	
      <th>Tanggal keluar</th>
	 <th>Kode produk</th>
      <th>Deskripsi produk</th>
	  
      <th>Jumlah Keluar</th>
  
     
	  <th>Status</th>
	  <th>ID Supplier</th>
      <th>Pilihan</th>
    </tr>

  <?php
      $tanggal = date('Y-m-d');
      if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT `produk_keluar` .*, `data_produk`.`kd_produk`,`data_produk`.`nama_prdk`,`data_produk`.`jenis_prdk`,`data_produk`.`harga` FROM `produk_keluar` LEFT JOIN `data_produk` ON `produk_keluar`.`kd_produk` = `data_produk`.`kd_produk` WHERE `produk_keluar`.`kd_produk` LIKE '%{$search}%' OR `data_produk`.`nama_prdk` LIKE '%{$search}%' ORDER by `tanggal_keluar` DESC");
		 //form 1
        //$sql = mysqli_query($koneksi, "SELECT *,SUM(`jumlah_msk`) AS `total_semua`, sum(harga_msk) as `total_harga` FROM `produk_masuk` GROUP BY `des_produk` "); //form 2
      }else{
		     $sql = mysqli_query($koneksi, "SELECT `produk_keluar` .*, `data_produk`.`kd_produk`,`data_produk`.`nama_prdk`,`data_produk`.`jenis_prdk`,`data_produk`.`harga` FROM `produk_keluar` LEFT JOIN `data_produk` ON `produk_keluar`.`kd_produk`  = `data_produk`.`kd_produk` ORDER by `kd_keluar` DESC");
	  }
	  if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          
		   <td >'.$data[4].'</td>
          <td >'.$data[1].'</td>
		   <td align="left">'.$data[8].'  ('.$data[9].')'.$data[10].'</td>
          <td ">'.$data[2].'</td>
		
		<td >'.$data[5].'</td>
		<td align="left">'.$data[6].'</td>
		
          <td width="90px" align="center"><a href="laporan/print_keluar.php?id='.$data[1].'" target="_blank" class="btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
        }
      }
    ?>
  </table>
</div>
<div class="table-responsive">    
 <a href="laporan/print_allkeluar.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Semua Data</button><a/>
						
</div>
