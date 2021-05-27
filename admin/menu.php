<?php
    if( !empty( $_SESSION['iduser'] ) ){
    include "../koneksi/koneksi.php";
?>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href=""><span></span> Sistem Informasi Data Prodi</a>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li><a href="admin.php">Beranda</a></li>
		<li><a href="admin.php?hlm=dt_prodi">Prodi</a></li>
		<li><a href="admin.php?hlm=mahasiswa_view">Mahasiswa</a></li>
<!-- 				<?php
        if( $_SESSION['jenisuser'] == '1' and $_SESSION['level'] == '11'){
        ?>
        <ul class="nav navbar-nav">
        	<li><a href="admin.php?hlm=mahasiswa">Data Mahasiswa</a></li>
        </ul>
		<?php
		}
		?> -->
        <?php
        if( $_SESSION['jenisuser'] == '1' and $_SESSION['level'] == '10'){
        ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master <b class="caret"></b></a>
		  <ul class="dropdown-menu">
			<li><a href="admin.php?hlm=prodi">Data Prodi</a></li>
			<li><a href="admin.php?hlm=user">Data User</a></li>
			<?php
			} 
			else if($_SESSION['jenisuser']=='1' and $_SESSION['level'] =='11'){
			?>
			<li><a href="admin.php?hlm=mahasiswa">Data Mahasiswa</a></li>
			<?php
			}
			?>
		  </ul>
		</li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">  
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php echo $_SESSION['username']; ?> <b class="caret"></b>
		  </a>
		  <ul class="dropdown-menu">
			<li><a href="../logout.php">Logout</a></li>
		  </ul>
		</li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</div>
<?php
} else {
	header("Location: ./");
	die();
}
?>