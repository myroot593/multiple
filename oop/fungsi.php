<?php
class crud extends Database{
	function query($data){
		$perintah = $this->koneksi->query($data);
		if(!$perintah) die("Error query :".$this->koneksi->connect_error());
		return $perintah;
	}
	function showData(){
		$sql="SELECT id, nip, nama_karyawan, status FROM tabel2";
		$perintah = $this->query($sql);
		return $perintah;
	}
	function update($update, $data){
		$sql="UPDATE tabel2 SET status='$update' WHERE nip IN($data)";
		$perintah = $this->query($sql);
		return $perintah;
	}
}

?>
