<?php
session_start();
require '../model/db.php';

$id =  $_GET['id'];

$q = "SELECT * FROM komentar WHERE id = '$id'";
$res = mysqli_query($db, $q);
$data = mysqli_fetch_assoc($res);
$id_artikel = $data['id_artikel'];

if(!($data['id_akun'] == $_SESSION['id'])){
    echo "<script>
    alert('Tidak diizinkan!');
</script>";
    echo " <script>
    document.location.href = '../index.php';
    </script>"; 
    return;
}

$q = "DELETE FROM komentar WHERE id=$id";
$rs = mysqli_query($db, $q);


if(!$res) {
    echo "<script>
    alert('Operasi Gagal Dilakukan!');
    </script>";
}
echo " <script>
document.location.href = '../back.php?id=$id_artikel';
</script>";
?>