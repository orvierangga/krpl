<?php
include '../conn.php';?>
<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>Nomor</th>
	  
      <th>Kode produk</th>
      <th>Deskripsi produk</th>
	  
      <th>Jumlah produk</th>
      <th>Harga produk</th>
      <th>Tanggal produk Masuk</th>
	  <th>Total Harga</th>
      <th>Pilihan</th>
    </tr>
    <?php
      $tanggal = date('Y-m-d');
     
      if (isset($_GET['s'])) {
        $search = $_GET['s'];
        $sql = mysqli_query($koneksi, "SELECT `produk_masuk` .*, `data_produk`.`kd_produk`,`data_produk`.`nama_prdk`,`data_produk`.`jenis_prdk`,`data_produk`.`harga` FROM `produk_masuk` LEFT JOIN `data_produk` ON `produk_masuk`.`kd_produk` = `data_produk`.`kd_produk` WHERE `data_produk`.`kd_produk` LIKE '%{$search}%' OR `data_produk`.`nama_prdk` LIKE '%{$search}%' order by `no` desc");
      } else {
        $sql = mysqli_query($koneksi, "SELECT `produk_masuk` .*, `data_produk`.`kd_produk`,`data_produk`.`nama_prdk`,`data_produk`.`jenis_prdk`,`data_produk`.`harga` FROM `produk_masuk` LEFT JOIN `data_produk` ON `produk_masuk`.`kd_produk` = `data_produk`.`kd_produk` order by `no` desc");
      }
      
		  
	   //form 1
        //$sql = mysqli_query($koneksi, "SELECT *,SUM(`jumlah_msk`) AS `total_semua`, sum(harga_msk) as `total_harga` FROM `produk_masuk` GROUP BY `des_produk` "); //form 2
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr bgcolor="#CCCCCC">
          <td>'.$no.'</td>  
          <td>'.$data[1].'</td>
		  <td>'.$data[7].' ('.$data[8].')'.$data[9].'</td>
          <td align="center">'.$data[2].'</td>
		  <td align="center">'.$data[3].'</td>
        <td align="center">'.$data[4].'</td>
		<td align="center">'.$data[5].'</td>
		
          <td align="center" width="100px"><a href="editprdkmsk.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
        }
      }
    ?>
  </table>

</div>
<div class="table-responsive">    
 <a href="laporan/print_allmasuk.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Semua Data</button><a/>
						
</div>