<?php include '../conn.php';?>

  
<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th>Deskripsi produk</th>
      <th>Jumlah Permintaan</th>
      <th>Tanggal</th>
      <th>Waktu</th>
      <th>Keperluan</th>
      <th>Status</th>
      <th>ID Petugas</th>
    <th>Pilihan</th>
	</tr>	 
	 
	  <?php
      $tanggal = date('Y-m-d');
      if (isset($_GET['s'])) {
        $search = $_GET['s'];
     
  //harusnya kaini om
  $sql = mysqli_query($koneksi, "SELECT * from permintaan_produk where `kd_produk` LIKE '%{$search}%' order by `kd_produk` ASC");
    } else {
  $sql = mysqli_query($koneksi, "SELECT * from permintaan_produk order by `kd_produk` ASC ");
    }
    if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr align="center" bgcolor="#CCCCCC">
          <td >'.$data[1].'</td>
          <td>'.$data[2].'</td>
		  <td>'.$data[3].'</td>
        <td>'.$data[4].'</td>
		<td>'.$data[5].'</td>
		<td>'.$data[6].'</td>
		<td>'.$data[7].'</td>
          
		 <td width="100px"><a href="laporan/cetak1.php?idc='.$data[0].'" target="_blank" class="btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a> 
       
		  <a href="?del='.$data[0].'" class="btn-danger btn-sm" ><span class="glyphicon glyphicon-trash" aria-hidden="true" onclick="return confirm(\'Hapus data ini?\')"></span></a></td>
        </tr>';
        }
      }
	  
    ?>
  </table>
</div>
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a> 
				                <!-- /.row -->
</div>
   
   
   
 
    </div>
  </div>
  <div class="table-responsive">
    
    
 <a href="laporan/cetak.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Semua Data</button><a/>
						
</div>
  
  
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>
<?php include 'footer.php';?>
