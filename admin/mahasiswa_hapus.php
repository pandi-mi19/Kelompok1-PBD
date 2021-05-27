<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $idmhs = $_REQUEST['idmhs'];

    $sql = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE idmhs='$idmhs'");
    if($sql == true){
        header("Location: ./admin.php?hlm=mahasiswa");
        die();
    }
    }
}
