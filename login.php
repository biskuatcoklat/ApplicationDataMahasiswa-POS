<?php
session_start();

if(isset($_SESSION["login"])){
  header("location: index.php");
  exit;
}

include 'config.php';

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    if(mysqli_num_rows($result) === 1 ){
        $row = mysqli_fetch_assoc($result);

        $_SESSION["login"] = true;
        $_SESSION["tipe"] = $row["tipe"];
        if(password_verify($password, $row["password"])){
            header("location: index.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="gaya.css"> 
   
</head>
<body>

<br><br><br><br><br><br>
<?php if (isset($error)) :?>
    
        <script>
                alert('username / password anda salah');
                </script>
                
        
<?php endif; ?>

<form action="" method="post">
    
<div class="login-card">
<h1>Log-in</h1>  <br>
  <form>
    
    <label for="username"></label>
    <input type="text" name="username" placeholder="username" id="username" autocomplete="off">
    <label for="password"></label>
    <input type="password" name="password" placeholder="password" id="password" >
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>
    
  
    <p>Belum Punya Akun?<a href="registrasi.php"><font color="blue">Klik Disini</font></a></p>
</div>


<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
    <!--<ul>

        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>
            <button type="submit" name="login">Login</button>
            <button><a href="registrasi.php">Register</a></button>  

    </ul> -->

</form>
    
</body>
</html>