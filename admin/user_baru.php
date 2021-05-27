<?php
if( empty( $_SESSION['iduser'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$jenisuser = $_REQUEST['jenisuser'];
		$level = $_REQUEST['level'];
		$status = $_REQUEST['status'];
		$idprodi = $_REQUEST['idprodi'];

		$sql = mysqli_query($koneksi, "INSERT INTO user(username, password, jenisuser, level,status,idprodi) VALUES('$username', '$password', '$jenisuser', '$level','$status','$idprodi')");

		if($sql == true){
			header('Location: ./admin.php?hlm=user');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah User Baru</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group">
		<label for="jenisuser" class="col-sm-2 control-label">Jenis User</label>
		<div class="col-sm-4">
			<select name="jenisuser" class="form-control" required>
				<option value="">--- Pilih Jenis User ---</option>
				<option value="1">User-Admin</option>
				<option value="0">User-Client</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="level" class="col-sm-2 control-label">Level User</label>
		<div class="col-sm-4">
			<select name="level" class="form-control" required>
				<option value="">--- Pilih Level User ---</option>
				<option value="00">User-Client</option>
				<option value="11">Admin</option>
				<option value="10">Super-Admin</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="status" class="col-sm-2 control-label">Jenis User</label>
		<div class="col-sm-4">
			<select name="status" class="form-control" required>
				<option value="">--- Status User ---</option>
				<option value="T">Online</option>
				<option value="F">Offline</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="idprodi" class="col-sm-2 control-label">Id Prodi</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="idprodi" name="idprodi" placeholder="id prodi" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=user" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
