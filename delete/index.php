<?php
require_once 'koneksi.php';
require_once 'fungsi.php';
$nip_err ="";
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	if(empty($_POST['nip'])){
		$nip_err = "Pilih salah satu data yang akan dihapus";
	}else{
		$nip=$_POST['nip'];
		$nip=implode(",",$nip);
	}
	if(empty($nip_err)){
		if(deleteMultiTb1($nip)):
			echo '<div class="alert alert-success">Berhasil menghapus data </div>';
		else:
			echo '<div class="alert alert-danger">Gagal menghapus data</div>';
		endif;
	}
	/*
	$nip=$_POST['nip'];
	print_r($nip);
	$nip=implode(",", $nip);
	echo $nip;
	*/
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Multiple PHP</title>
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
		<div class="container">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<table class="table table-bordered mt-4">
				<thead>
					<th colspan="4">LATIHAN DELETE</th>
				</thead>
				<thead>
					<th>NO</th>
					<th>NAMA</th>
					<th>NIP</th>
					<th>DEL</th>
				</thead>
				<tbody>
					<?php
						$no = 1;
						$data = selectTb1();
						while($row=mysqli_fetch_array($data)){
							echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$row['nama_karyawan'].'</td>
									<td>'.$row['nip'].'</td>
									<td>

										<input type="checkbox" name="nip[]" value="'.$row['nip'].'">
									</td>
								</tr>


							';
							$no++;
						}

					?>
				</tbody>
			</table>
				<button type="submit" class="btn btn-md btn-primary"> Delete</button>
				<span class="text-danger"><?php echo $nip_err; ?></span>
			</form>
		</div>

</body>
</html>