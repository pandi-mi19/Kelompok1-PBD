<?php
if( empty( $_SESSION['iduser'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'user_baru.php';
				break;
			case 'edit':
				include 'user_edit.php';
				break;
			case 'hapus':
				include 'user_hapus.php';
				break;
		}
	} else {
		echo '
			<div class="container">
			<div class="col-md-12">
				<h3 style="margin-bottom: -20px;">Daftar User</h3>
					<a href="./admin.php?hlm=user&aksi=baru" class="btn btn-success btn-s pull-right">Tambah User</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="5%">No</th>
					 <th width="10%">Username</th>
					 <th width="10%">Password</th>
					 <th width="15%">Jenis User</th>
					 <th width="15%">Level</th>
					 <th width="10%">Status</th>
					 <th width="10%">Id Prodi</th>
					 <th width="20%">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';
			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM user");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['username'].'</td>
					 <td>'.$row['password'].'</td>
					 <td>';
					 if($row['jenisuser'] == '1'){
						 echo 'User-Admin';
					 } else if($row['level'] == '0') {
						 echo 'User-Client';
					 }
					 echo'</td>
					 <td>';
					 if($row['level'] == '00'){
						 echo 'User-Client';
					 } else if($row['level'] == '10') {
						 echo 'Super-Admin';
					 } else if($row['level'] == '11'){
					 	echo 'Admin';
					 }
					 echo'</td>
					 <td>';
					 if($row['status'] == 'F'){
						 echo 'Offline';
					 } else if($row['status'] == 'T') {
						 echo 'Online';
					 }
					 echo'</td>
					 <td>'.$row['idprodi'].'</td>
					 <td>
						<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus user ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
						</script>
					 <a href="?hlm=user&aksi=edit&iduser='.$row['iduser'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=user&aksi=hapus&submit=yes&iduser='.$row['iduser'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=user&aksi=baru">Tambah user baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
