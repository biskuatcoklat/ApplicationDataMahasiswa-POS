<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}
include('config.php'); 
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$id			= $_POST['id'];
			$Nama_dosen			= $_POST['Nama_dosen'];
			$Mata_kuliah	= $_POST['Mata_kuliah'];
			$No_hp		= $_POST['No_hp'];
            $Email    =$_POST['Email'];

			$sql = mysqli_query($koneksi, "UPDATE dosen SET id='$id',Nama_dosen='$Nama_dosen', Mata_kuliah='$Mata_kuliah', No_hp='$No_hp', Email='$Email' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_dsn";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_dsn&id=<?php echo $id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" autocomplete="off" name="id" class="form-control" size="4" value="<?php echo $data['Nim']; ?>" readonly required >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Dosen</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" autocomplete="off" name="Nama_dosen" class="form-control" value="<?php echo $data['Nama_dosen']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
				<div class="col-md-6 col-sm-6 ">
                    <input type="text" autocomplete="off" name="Email" class="form-control" value="<?php echo $data['Email']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No Hp</label>
				<div class="col-md-6 col-sm-6 ">
                    <input type="text" autocomplete="off" name="No_hp" class="form-control" value="<?php echo $data['No_hp']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Mata kuliah</label>
				<div class="col-md-6 col-sm-6">
					<select name="Mata_kuliah" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Teknik Informatika" <?php if($data['Program_Studi'] == 'Teknik Informatika'){ echo 'selected'; } ?>>Teknik Informatika</option>
						<option value="Teknik Sipil" <?php if($data['Program_Studi'] == 'Teknik Sipil'){ echo 'selected'; } ?>>Teknik Sipil</option>
						<option value="Teknik Kimia" <?php if($data['Program_Studi'] == 'Teknik Kimia'){ echo 'selected'; } ?>>Teknik Kimia</option>
						<option value="Teknik Elektro" <?php if($data['Program_Studi'] == 'Teknik Elektro'){ echo 'selected'; } ?>>Teknik Elektro</option>
						<option value="Akuntansi" <?php if($data['Program_Studi'] == 'Akuntansi'){ echo 'selected'; } ?>>Akuntansi</option>
						<option value="Manajemen" <?php if($data['Program_Studi'] == 'Manajemen'){ echo 'selected'; } ?>>Manajemen</option>
						<option value="Farmasi" <?php if($data['Program_Studi'] == 'Farmasi'){ echo 'selected'; } ?>>Farmasi</option>
						<option value="Hukum" <?php if($data['Program_Studi'] == 'Hukum'){ echo 'selected'; } ?>>Hukum</option>
						<option value="Kedokteran" <?php if($data['Program_Studi'] == 'Kedokteran'){ echo 'selected'; } ?>>Kedokteran</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_dsn" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
