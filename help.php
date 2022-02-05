<?php
session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}
?>


<center><font size="6">Help</font></center>
<br><Br>
            <div class="row">
                <div class ="col-6">
                    <form action="kirimhelp.php?page=help_us" method="post" target="_blank">
                        <div class ="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type ="text" name="no_hp" class="form-control"  placeholder="No Hp" autocomplete="off">
                        </div>
                        <br>
                        <div class ="form-group">
                            <label for="name">Nama</label>
                            <input type ="text" name="name" class="form-control"  placeholder="Nama" autocomplete="off">
                        </div>
                        <br>
                        <div class ="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Jika anda mengalami kendala silahkan isi form dibawah ini</label>
                        <textarea class="form-control" name="exampleFormControlTextarea1" id="exampleFormControlTextarea1" placeholder="Ketik disini" autocomplete="off" rows="3"></textarea>
                        </div>


                        <input type="hidden" name="noWa" value="6282276052469">
                        <br>
                        <button type="submit" name="submit" class="btn btn-primary">send</button>
                    </form>
                </div>
            </div>
