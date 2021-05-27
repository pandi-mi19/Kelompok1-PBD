<?php
if (empty($_SESSION['iduser'])) {
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if (isset($_REQUEST['submit'])) {
		$idmhs = $_REQUEST['idmhs'];
		$npm = $_REQUEST['npm'];
		$nama = $_REQUEST['nama'];
		$idprodi = $_REQUEST['idprodi'];
		$sql = mysqli_query($koneksi, "UPDATE mahasiswa SET npm='$npm', nama='$nama', idprodi='$idprodi' WHERE idmhs='$idmhs'");
		if ($sql == true) {
			header('Location: ./admin.php?hlm=mahasiswa');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
		$idmhs = $_REQUEST['idmhs'];
		$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE idmhs='$idmhs'");
		while ($row = mysqli_fetch_array($sql)) {
?>
			<h2>Edit Data Mahasiswa</h2>
			<hr>
			<form method="post" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="npm" class="col-sm-2 control-label">NPM</label>
					<div class="col-sm-4">
						<input type="hidden" name="idmhs" value="<?php echo $row['idmhs']; ?>">
						<input type="text" class="form-control" id="npm" value="<?php echo $row['npm']; ?>" name="npm" placeholder="NPM.." required>
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-2 control-label">Nama </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="nama" value="<?php echo $row['nama']; ?>" name="nama" placeholder="Nama Mahasiswa" required>
					</div>
				</div>
				<div class="form-group">
					<label for="idprodi" class="col-sm-2 control-label">Id Prodi </label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="idprodi" value="<?php echo $row['idprodi']; ?>" name="idprodi" placeholder="Id Prodi" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="submit" class="btn btn-success">Simpan</button>
						<a href="./admin.php?hlm=mahasiswa" class="btn btn-danger">Batal</a>
					</div>
				</div>
			</form>
<?php
		}
	}
}
?>
