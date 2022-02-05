<?php
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}
//memasukkan file config.php
include('config.php') ;
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Dosen</font></center>
		<hr>
		<a href="index.php?page=tambah_dsn"><button class="btn btn-dark right">Tambah Data</button></a>
		<form action="index.php" methood="get">
			<input type="hidden" name="page" value="tampil_dsn">
			<input type="text" name="cari" size="25" placeholder="masukkan  keyword pencarian..." autocomplete="off" value="<?php echo $_GET['cari'];?>">
			<button class="btn btn-dark right" type="submit" name="submit"> cari</button>
		</form>

		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nama Dosen</th>
					<th>Mata kuliah</th>
                    <th>No Hp</th>
                    <th>Email</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$sql = mysqli_query($koneksi, "SELECT * FROM dosen where id like '%$cari%' or Nama_dosen like '%$cari%'  ORDER BY id DESC") or die(mysqli_error($koneksi));
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM dosen ORDER BY id DESC") or die(mysqli_error($koneksi));
				}
				
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id'].'</td>
							<td>'.$data['Nama_dosen'].'</td>
							<td>'.$data['Mata_kuliah'].'</td>
							<td>'.$data['No_hp'].'</td>
                            <td>'.$data['Email'].'</td>
							<td>
								<a href="index.php?page=edit_dsn&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="deletedosen.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
