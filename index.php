<?php
    //memulai session
    session_start();

    //jika ada session, maka akan diarahkan ke halaman dashboard admin
    if(isset($_SESSION['iduser'])){

        //mengarahkan ke halaman dashboard admin
        header("Location: admin/admin.php");
        die();
    }

    //mengincludekan koneksi database
    include "koneksi/koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Kelompok-1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/css/stylee.css">

	</head>
	<body>
		<div class="container">
	<?php

    //apabila tombol login di klik akan menjalankan skript dibawah ini
	if( isset( $_REQUEST['login'] ) ){

        //mendeklarasikan data yang akan dimasukkan ke dalam database
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];

        //skript query ke insert data ke dalam database
		$sql = mysqli_query($koneksi, "SELECT iduser,username,jenisuser,level FROM user WHERE username='$username' AND password='$password'");

        //jika skript query benar maka akan membuat session
		if( $sql){
			list($iduser, $username, $jenisuser,$level) = mysqli_fetch_array($sql);

            //membuat session
            $_SESSION['iduser'] = $iduser;
			$_SESSION['username'] = $username;
			$_SESSION['jenisuser'] = $jenisuser;
			$_SESSION['level'] = $level;

			header("location:admin/admin.php");
			die();
		} else {

			$_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
			header('Location: ./');
			die();
		}

	} else {
	?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(assets/img/bg.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
			      	</div>
			      	<form action="" method="post" role="form" class="full">
							<form action="#" class="signin-form">
			      		<div class="form-group mt-3">
			      			<input type="text" name="username" class="form-control" required>
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" type="password" name="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="login" value="login">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
						</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
<?php
}
?>
	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
