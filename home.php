<?php
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}
?>
<center><br><br><br><br><br>
<font Size="6" face="Helvetica">Data Mahasiswa S1 Informatika</font> <br><br>
<img src="assets/images/logoamikom.png" width="330px height="330px" /> <br><br>
<font Size="6">Universitas Amikom Yogyakarta</font><br><br><br><br><br><br><br>
</center>
