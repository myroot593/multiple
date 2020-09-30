<?php
require_once 'koneksi.php';
require_once 'fungsi.php';
$obj = new crud;

$nip_err = $up_type_err ="";
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	if(empty(trim($_POST['update_type']))){
		$up_type_err = "Harap pilih jenis update yang diinginkan";
	}else{
		$update_type = $_POST['update_type'];
		
	}
	if(empty($_POST['nip'])){
		$nip_err = "Harap pilih data yang akan di update";
	}else{
		$nip= $_POST['nip'];
		$nip=implode(",", $nip);
		
	}
	if(empty($nip_err) && empty($up_type_err)){
		if($obj->update($update_type,$nip)):
			echo '<div class="alert alert-success">Berhasil menyimpan data</div>';
		else:
			echo '<div class="alert alert-danger">Gagal menyimpan data</div>';
		endif;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Multiple PHP</title>
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
		<div class="container">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="form-group">
				<label>Pilih jenis update :</label>
				<select class="form-control" name="update_type">
					<option></option>
					<option>Karyawan Tetap</option>
					<option>Karyawan Kontrak</option>
				</select>
				<span class="text-danger"><?php echo $up_type_err; ?></span>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-md btn-primary"> Update</button>
			</div>
			<table class="table table-bordered mt-4">
				<thead>
					<th colspan="5">LATIHAN UPDATE MULTIPLE</th>
				</thead>
				<thead>
					<th>NO</th>
					<th>NAMA</th>
					<th>NIP</th>
					<th>STATUS</th>
					<th>CEK</th>
				</thead>
				<tbody>
					<?php

						$no = 1;
						
						$data = $obj->showData();
						while($row=$data->fetch_array()){
							echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$row['nama_karyawan'].'</td>
									<td>'.$row['nip'].'</td>
									<td>'.$row['status'].'</td>
									<td>

										<input type="checkbox" name="nip[]" value="'.$row['nip'].'">
									</td>
								</tr>


							';
							$no++;
						}
						$data->free_result();

					?>
				</tbody>
			</table>
				
				<span class="text-danger"><?php echo $nip_err; ?></span>
			</form>
		</div>

</body>
</html>
