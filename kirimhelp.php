<?php
if(isset($_POST['submit'])){
    $no_hp                                 = $_POST['no_hp'];
    $name                                  = $_POST['name'];
    $exampleFormControlTextarea1           = $_POST['exampleFormControlTextarea1'];
    $no_wa                                 = $_POST['noWa'];

    header("location:https://api.whatsapp.com/send?phone=$no_wa&text=No_hp:%20$no_hp%20%0DNama:%20$name%20%0DProblem:%20$exampleFormControlTextarea1");
} else {
    echo "
            <script>
                window.location=history.go(-1);
                </script>
        ";
}

?>