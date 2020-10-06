<?php
class Database
{
	private $host="localhost";
	private $user="root";
	private $pass="";
	private $db="codexam";
	public $koneksi;
	function __construct()
	{
		$this->koneksi = new mysqli($this->host, $this->user, $this->pass, $this->db);
		if($this->koneksi==false):
			die("Database error :".$this->koneksi->connect_error());
		endif;
		return $this->koneksi;
	}
}
?>