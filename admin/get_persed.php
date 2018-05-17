<?php include '../conn.php';?>

<div class="table-responsive">
  <table class="table table-striped table-hover" bgcolor="#CCCCCC">
    <tr>
      <th align="center">Nomor</th>
    <th align="center">Kode produk</th>
      <th align="center">Deskripsi produk</th>
      
    
      <th>Jumlah produk Tersedia</th>
      
      <th>Pilihan</th>
    </tr>
    <?php
      $tanggal = date('Y-m-d');
      if (isset($_GET['s'])) {
        $search = $_GET['s'];
     
  //harusnya kaini om
  $sql = mysqli_query($koneksi, "SELECT * , SUM(`jumlah_msk`) AS `total_semua` FROM `produk_masuk` LEFT JOIN `data_produk` ON `produk_masuk`.`kd_produk` = `data_produk`.`kd_produk` WHERE `produk_masuk`.`kd_produk` OR `data_produk`.`ket` LIKE '%{$search}%' GROUP BY `produk_masuk`.`kd_produk` order by `produk_masuk`.`kd_produk` ASC");
    } else {
  $sql = mysqli_query($koneksi, "SELECT * , SUM(`jumlah_msk`) AS `total_semua` FROM `produk_masuk` LEFT JOIN `data_produk` ON `produk_masuk`.`kd_produk` = `data_produk`.`kd_produk` GROUP BY `produk_masuk`.`kd_produk` order by `produk_masuk`.`kd_produk` ASC");
    }
    if (mysqli_num_rows($sql) == 0) {
        echo "<tr><td colspan=\"9\">Tidak Ada Data</td></tr>";
      } else {
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
          $no++;
          echo '
        <tr bgcolor="#CCCCCC">
          <td align="center">'.$no.'</td>  
          <td align="center">'.$data[1].'</td>
          <td>'.$data[7].'('.$data[8].')'.$data[9].'</td>
          <td align="center">'.$data[10].'</td>
        
    
    
          <td align="center"> <a href="produk_masuk.php?id='.$data[0].'"  class="btn-primary btn-sm"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></a> 
          <a href="laporan/print_persed.php?id='.$data[1].'" target="_blank" class="btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true" ></span></a> 
        </td>
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
    
    
 <a href="laporan/print_allpersed.php" target="_blank" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-print"></span> Cetak Semua Data</button><a/>
						
</div>
  
  
<script type="text/javascript">
function confirm_delete() {
  return confirm('Hapus data ini?');
}
</script>

