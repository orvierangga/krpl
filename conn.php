<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "krplweb";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()) {
	echo "Database Gagal Ginjal" . mysqli_connect_error($koneksi);
}

?>