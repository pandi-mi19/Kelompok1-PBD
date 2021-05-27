<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		$npm = $_REQUEST['npm'];
		$nama = $_REQUEST['nama'];
		$idprodi = $_REQUEST['idprodi'];
		$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(npm, nama, idprodi) VALUES('$npm', '$nama', '$idprodi')");
		if($sql == true){
			header('Location: ./admin.php?hlm=mahasiswa');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Mahasiswa Baru</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="npm" class="col-sm-2 control-label">NPM</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="npm" name="npm" placeholder="NPM" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama </label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa" required>
		</div>
	</div>
	<div class="form-group">
		<label for="idprodi" class="col-sm-2 control-label">Id Prodi </label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="idprodi" name="idprodi" placeholder="Id Prodi" required>
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
?>
