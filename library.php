<?php

	function IndonesiaTgl($tanggal)
	{date_default_timezone_set('Asia/jakarta');
		$tgl = substr($tanggal, 8, 2);
		$bln = substr($tanggal, 5, 2);
		$tahun = substr($tanggal, 0, 4);
		$tanggal = "$tgl-$bln-$tahun";
		return $tanggal;
	}
	
	
?>