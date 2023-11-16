<?php
session_start();
require '../model/db.php';

if(isset($_POST['submit'])){
    $id_artikel =  $_GET['id'];
    $isi =  $_POST['komentar'];
    $email = $_SESSION['login'];

    $q = "SELECT * FROM akun WHERE email = '$email'";
    $res = mysqli_query($db, $q);
    $data = mysqli_fetch_assoc($res);

    $id_akun = $data['id'];

    $res = mysqli_query($db, "INSERT INTO komentar(id_akun, id_artikel, isi) VALUES('$id_akun', '$id_artikel', '$isi')");

    if(!$res) {
        echo "<script>
        alert('Operasi Gagal Dilakukan!');
        </script>";
    }
    echo " <script>
    document.location.href = '../back.php?id=$id_artikel';
    </script>";
}
?>