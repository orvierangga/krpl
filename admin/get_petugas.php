<?php
include '../conn.php';?>
<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>Nomor</th>
	  
      <th>ID Pengguna</th>
      <th>Nama Pengguna</th>
      <th>Nomor Induk Pengguna</th>
      <th>Status</th>
      
      <th>Pilihan</th>
    </tr>
    <?php
      $tanggal = date('Y-m-d');
     
      if (isset($_GET['s'])) {
        $search = $_GET['s'];
        //$sql = mysqli_query($koneksi, "SELECT * from data_petugas WHERE `id_petugas` LIKE '%{$search}%' OR `nama_petugas` LIKE '%{$search}%' order by `id_petugas` asc");
       $sql = mysqli_query($koneksi, "SELECT * from data_petugas WHERE `id_petugas` LIKE '%{$search}%' OR `nama_petugas` LIKE '%{$search}%' or `status_petugas` LIKE '%{$search}%' order by `id_petugas` ASC");
	
	 } else {
         $sql = mysqli_query($koneksi, "SELECT * from data_petugas order by `id_petugas` asc");
		 }
      
		  
	   //form 1
        //$sql = mysqli_query($koneksi, "SELECT *,SUM(`jumlah_msk`) AS `total_semua`, sum(harga_msk) as `total_harga` FROM `barang_masuk` GROUP BY `des_barang` "); //form 2
      if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          <td>'.$no.'</td>  
          <td >'.$data[0].'</td>
		  <td align="center">'.$data[1].'</td>
          
		  <td align="center">'.$data[3].'</td>
		  <td align="center">'.$data[4].'</td>
       
		
          <td align="center" width="100px"><a href="edit_ptgs.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
        }
      }
    ?>
  </table>

</div>
 <div class="table-responsive">
       
 <a href="laporan/print_allpetugas.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Data Petugas</button><a/>
<a href="laporan/print_loglogin.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak History Akses Pengguna</button><a/>
						
</div>