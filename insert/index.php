<?php
require_once 'koneksi.php';
require_once 'fungsi.php';
$obj = new crud;

$jml_data_err="";
# Proses pertama saat menambahkan jumlah data
if(isset($_POST['tambahkan'])){
	
	if(empty($_POST['jml_data'])){
		$jml_data_err = "Masukan jumlah data yang akan ditambahkan";
	}else{
		$jml_data=$_POST['jml_data'];
	}
}
#Proses kedua untuk menambahkan data ke database dengan perulangan
if(isset($_POST['proses'])){
	for ($i=0; $i <$_POST['jml_data'] ; $i++) { 
		$nama=$_POST['nama'.$i];
		$nip=$_POST['nip'.$i];
		if($obj->insertMUltiple($nip, $nama)):
			echo 'ok';
		else:
			echo ' no ok';
		endif;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Multiple PHP</title>
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
		<div class="container">
			<div class="card mt-4">
				<div class="card-body">
					<h3>Insert Multiple PHP MySQL - root93</h3>
							<!-- Formulir Pertama -->
						<form class="mt-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

							<div class="form-group">
								<label>Masukan jumlah </label>
								<input clas="form-control" type="text" name="jml_data" placeholder="Masukan jumlah data yang akan ditambahkan" />
								<button type="submit" name="tambahkan" class="btn btn-md btn-secondary"> Tambahkan</button>
								<span class="text-danger"><?php echo $jml_data_err; ?></span>
							</div>
						
						</form>
				</div>
			</div>
	
			<!--Formulir kedua -->
			<?php 
				if(!empty($jml_data)){
					
					echo'<form action="'.$_SERVER['PHP_SELF'].'" method="post">

					<div class="row">

					';
					for ($i=0; $i <$jml_data ; $i++) { 
						echo'
							
							<div class="col-md-3">
								<div class="form-group">
									<label>NIP :</label>
									<input class="form-control" type="text" name="nip'.$i.'" placeholder="Masukan nip karyawan"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Nama :</label>
									<input class="form-control" type="text" name="nama'.$i.'" placeholder="Masukan nama karyawan"/>
									<input type="hidden" name="jml_data" value="'.$jml_data.'" placeholder="Masukan nama karyawan"/>
								</div>
							</div>
							
						';
					}


					echo'
						<div class="form-group">
							<button type="submit" name="proses" class="btn btn-md btn-secondary"> Simpan</button>
						</div>
						</div>
					</form>


					';
				}
			?>

		</div>

</body>
</html>
