<?php
if(isset($_POST['submit'])){
    $nim           = $_POST['nim'];
    $name          = $_POST['name'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan       = $_POST['jurusan'];
    $no_wa         = $_POST['noWa'];
    
    header("location:https://api.whatsapp.com/send?phone=$no_wa&text=Nim:%20$nim%20%0DNama:%20$name%20%0Djenis_kelamin:%20$jenis_kelamin%20%0Djurusan:%20$jurusan");
} else {
    echo "
            <script>
                window.location=history.go(-1);
                </script>
        ";
}

?>