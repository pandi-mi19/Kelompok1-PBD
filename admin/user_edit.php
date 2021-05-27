<?php
if( empty( $_SESSION['iduser'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$iduser = $_REQUEST['iduser'];
        $username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$jenisuser = $_REQUEST['jenisuser'];
		$level = $_REQUEST['level'];
		$status = $_REQUEST['status'];
		$idprodi = $_REQUEST['idprodi'];

        if($iduser == 1){
            header("location: ./admin.php?hlm=user");
            die();
        }

		$sql = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', jenisuser='$jenisuser', level='$level', status='$status', idprodi='$idprodi' WHERE iduser='$iduser'");

		if($sql == true){
			header('Location: ./admin.php?hlm=user');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$iduser = $_REQUEST['iduser'];

		$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE iduser='$iduser'");
		while($row = mysqli_fetch_array($sql)){

?>

<h2>Edit Tipe User</h2>
<hr>

<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
        <input type="hidden" name="iduser" value="<?php echo $row['iduser']; ?>">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" name="username" placeholder="Username">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-3">
			<input type="password" class="form-control" name="password" placeholder=" Ubah Password"  required>
		</div>
	</div>
	<div class="form-group">
		<label for="jenisuser" class="col-sm-2 control-label">Jenis User</label>
		<div class="col-sm-3">
			<select name="jenisuser" class="form-control" required>
				<option value="">-- Pilih Jenis User --</option>
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
			<input type="text" class="form-control" id="idprodi" name="idprodi" placeholder="id prodi" value="<?php echo $row['idprodi']; ?>" required>
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
}
?>
