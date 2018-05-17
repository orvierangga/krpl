<?php
 include "conn.php";
 date_default_timezone_set('Asia/Jakarta');
 $jam = date("H:i:s");
 $tgl = date ('Y-m-d');
  session_start();                        
  mysqli_query($koneksi, "UPDATE log_login SET `jam_klr`='$jam',`tgl_klr`='$tgl',
                              `status_log`='offline'
  WHERE `no`  AND `jam_klr`='logged' AND `tgl_klr`='---' AND `status_log`='online'");
  session_destroy();
  header('location:../index.php');
?>