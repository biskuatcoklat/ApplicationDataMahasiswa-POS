<?php
session_start();
if(isset($_SESSION["login"])){
    header("location: index.php");
    exit;
  }
require 'config.php';

if( isset($_POST["register"])){
    if( registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil di tambahkan!');
                </script>";
    }else{
        echo mysqli_error($koneksi);
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="gaya2.css"> 
    <!--
    <style>
        label{
            display: block;
        }
        table{
            border:0; 
        }
    </style> -->
</head>
<body>
    
<br><br><br><br><br>

<form action="#" method="post">
<div class="login-card">
  <h1>Sign Up</h1>
			<label for="username"></label>
			<input id="username" name="username" placeholder="username" type="text" autocomplete="off">
			<label for="password"></label>
			<input id="password" name="password" placeholder="password" type="password">
			<label for="konfirmasi password"></label>
			<input id="konfirmasi password" name="konfirmasi password" placeholder="konfirmasi password" type="password">
            <button type="submit" name="register">Register</button>
            <button><a href="login.php">Masuk</a></button>
</form>

<!--
<form action="" method="post">
    <ul>

        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <label for="password2">konfirmasi password :</label>
            <input type="password" name="password2" id="password2"> 
        </li>
            <button type="submit" name="register">Register</button>
            <button><a href="login.php">Masuk</a></button> 


    </ul>
    
</form>
-->

</body>
</html>