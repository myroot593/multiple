<?php
 class crud extends Database
 {
 	function query($data){
 		$perintah=$this->koneksi->query($data);
 		if(!$perintah) die("Gagal melakukan query :".$this->koneksi->error);
 		return $perintah;
 	}
 	function insertMultiple($nip, $nama){
 		$sql="INSERT INTO tabel3 (nip,nama_karyawan) VALUES('$nip','$nama')";
 		$perintah=$this->query($sql);
 		return $perintah;
 	}
 }

?>