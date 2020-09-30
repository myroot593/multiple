<?php

function query($data){
	global $koneksi;
	$perintah=mysqli_query($koneksi, $data);
	if(!$perintah) die("Gagal query :".mysqli_connect_error());
	return $perintah;
}
function showData(){
	$sql="SELECT * FROM tabel2";
	$perintah=query($sql);
	return $perintah;
}
function update($type, $data){

	$sql="UPDATE tabel2 SET status='$type' WHERE nip IN ($data)";
	$perintah=query($sql);
	return $perintah;
	
}
	



?>