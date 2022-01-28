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
		<center><font size="6">Data Mahasiswa</font></center>
		<hr>
		<a href="index.php?page=tambah_mhs"><button class="btn btn-dark right">Tambah Data</button></a>
		<a href="exportmhs.php"><button class="btn btn-dark right">Export Data</button></a>
		<form action="index.php" methood="get">
			<input type="hidden" name="page" value="tampil_mhs">
			<input type="text" name="cari" size="25" placeholder="masukkan  keyword pencarian..." autocomplete="off" value="<?php echo $_GET['cari'];?>">
			<button class="btn btn-dark right" type="submit" name="submit"> cari</button>
		</form>

		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Jenis Kelamin</th>
					<th>Program Studi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa where Nim like '%$cari%' or Nama_Mhs like '%$cari%'  ORDER BY Nim DESC") or die(mysqli_error($koneksi));
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY Nim DESC") or die(mysqli_error($koneksi));
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
							<td>'.$no.'</td>
							<td>'.$data['Nim'].'</td>
							<td>'.$data['Nama_Mhs'].'</td>
							<td>'.$data['Jenis_Kelamin'].'</td>
							<td>'.$data['Program_Studi'].'</td>
							<td>
								<a href="index.php?page=edit_mhs&Nim='.$data['Nim'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?Nim='.$data['Nim'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
		<a href="wa.php"><button class="btn btn-dark right">Input Data Manual</button></a>
	</div>
	</div>
