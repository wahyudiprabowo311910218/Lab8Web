<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga_jual = $_POST['harga_jual'];
$harga_beli = $_POST['harga_beli'];
$stok = $_POST['stok'];
$file_gambar = $_FILES['file_gambar'];
$gambar = null;				
if ($file_gambar['error'] == 0)
{
		$filename = str_replace(' ', '_',$file_gambar['name']);
		$destination = dirname(__FILE__) .'/gambar/' . $filename;
		if(move_uploaded_file($file_gambar['tmp_name'], $destination))
{
		$gambar = 'gambar/' . $filename;;
	}
}
$sql = 'INSERT INTO data_barang (nama, kategori,harga_jual, harga_beli, stok, gambar) ';
$sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}','{$harga_beli}', '{$stok}', '{$filename}')";
$result = mysqli_query($conn, $sql);
header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Tambah Barang</title>
</head>
<body>
	<div class="container">
		<h1>Tambah Barang</h1>
			<div class="main">
				<form method="post" action="tambah.php" enctype="multipart/form-data">
					<div class="input">
						<label>Nama Barang</label>
							<input type="text" name="nama" style="margin-left: 19px"/>
						</div>
							<div class="input">
								<label>Kategori</label>
									<select name="kategori" style="margin-left: 57px;">
										<option value="Komputer">Komputer</option>
										<option value="Elektronik">Elektronik</option>
										<option value="Hand Phone">Hand Phone</option>
									</select>
								</div>
								<div class="input">
									<label>Harga Jual</label>
										<input type="text" name="harga_jual" style="margin-left: 39px"; />
								</div>
									<div class="input">
										<label>Harga Beli</label>
										<input type="text" name="harga_beli" style="margin-left: 42px"; />
									</div>
										<div class="input">
											<label>Stok</label>
											<input type="text" name="stok" style="margin-left: 82px"; />
										</div>
									<div class="input">
										<label>File Gambar</label>
										<input type="file" name="file_gambar" style="margin-left: 27px"; /> 
								</div>
							<div class="submit">
						<input type="submit" name="submit" value="Simpan" style="margin-left: 118px;margin-top: 12px; background: linear-gradient(to bottom right, #66ff33 0%, #ffffff 100%);" />
					</div>
				</form>
			</div>
		</div>
	</body>
</html>