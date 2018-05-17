<?php
include '../conn.php';?>


<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>Kode produk</th>
      <th>Nama produk</th>
      <th>Jenis produk</th>
      <th>Harga Satuan</th>
	  <th>Gambar</th>
	 
      <th>Pilihan</th>
	  </tr>
	  </thead>
        <tbody>
    <?php
      $tanggal = date('Y-m-d');
     
	 if (isset($_GET['s'])) {
        $search = $_GET['s'];
        	//$sql = mysqli_query($koneksi, "SELECT `produk_masuk` .*, `data_produk`.`kd_produk`,`data_produk`.`nama_prdk`,`data_produk`.`jenis_prdk` FROM `produk_masuk` LEFT JOIN `data_produk` ON `produk_masuk`.`kd_produk` = `data_produk`.`kd_produk` WHERE `data_produk`.`kd_produk` LIKE '%{$search}%' OR `data_produk`.`nama_prdk` LIKE '%{$search}%' order by `no` ASC");
       $sql = mysqli_query($koneksi, "SELECT * from data_produk WHERE `kd_produk` LIKE '%{$search}%' OR `nama_prdk` LIKE '%{$search}%' order by `kd_produk` ASC");
	  } else {
       // $sql = mysqli_query($koneksi, "SELECT `produk_masuk` .*, `data_produk`.`kd_produk`,`data_produk`.`nama_prdk`,`data_produk`.`jenis_prdk` FROM `produk_masuk` LEFT JOIN `data_produk` ON `produk_masuk`.`kd_produk` = `data_produk`.`kd_produk` order by `no` ASC");
       $sql = mysqli_query($koneksi, "SELECT * from data_produk ORDER BY `kd_produk` ASC");
	  }
	 
   
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
           
          <td>'.$data[0].'</td>
          <td align="left">'.$data[1].'</td>
		  <td>'.$data[2].'</td>
		  <td>'.$data[3].'</td> ';
		  if (!empty($data[4])) {
			  echo' <td><img src="img/'.$data[4].'" width="60" /></td>';
		  }else{
			  echo '<td>'.$data[4].'</td>';
		  } echo'

		<td><a href="edit.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
		}
      }
    ?>
	</table>
	</div>
<div class="table-responsive">
 <a href="laporan/printprdk.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Semua Data</button><a/>
</div>



<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>