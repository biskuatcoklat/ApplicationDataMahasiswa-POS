<?php
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send To Whatsapp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
</head>
<body>
    <section>
        <div class="container">
            <br><br>
            <h3> Form Pendataan Mahasiswa Manual</h3>
            <br>

            <div class="row">
                <div class ="col-6">
                    <form action="kirim.php" method="post" target="_blank">
                        <div class ="form-group">
                            <label for="nim">Nim</label>
                            <input type ="nim" name="nim" class="form-control"  placeholder="Nim" autocomplete="off">
                        </div>
                        <br>
                        <div class ="form-group">
                            <label for="name">Name</label>
                            <input type ="text" name="name" class="form-control"  placeholder="Name" autocomplete="off">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" class="form-control" name="jenis_kelamin" placeholder="Jenis Kelamin" autocomplete="off">
                        </div>
                        <br>
                        <div class ="form-group">
                            <label for="jurusan">jurusan</label>
                            <input type="text" class="form-control" name="jurusan" placeholder="jurusan" autocomplete="off"></textarea>
                        </div>
                        <input type="hidden" name="noWa" value="">
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary">send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>             
                     
    
</body>
</html>