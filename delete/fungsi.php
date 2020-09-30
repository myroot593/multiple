<?php

function selectTb1(){
	global $koneksi;
	$sql="SELECT * FROM tabel1";
	$perintah=mysqli_query($koneksi, $sql);
	if(!$perintah) die("Gagal memilih tabel :".$koneksi->connect_error());
	return $perintah;
}
function deleteMultiTb1($data){
	global $koneksi;
	$sql = "DELETE FROM tabel1 WHERE nip IN ($data)";
	$perintah= mysqli_query($koneksi, $sql);
	if($perintah):
		return true;
	else:
		return false;
	endif;

	

}

?>