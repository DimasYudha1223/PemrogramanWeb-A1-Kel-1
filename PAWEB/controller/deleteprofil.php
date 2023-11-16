<?php
session_start();
require '../model/db.php';
$id = $_GET['id'];
if(!$_SESSION['id']){
    echo "<script>
    alert('Tidak diizinkan!');
</script>";
    echo " <script>
    document.location.href = '../index.php';
    </script>"; 
    return;
}

$q = "DELETE FROM komentar WHERE id_akun = $id";
$res = mysqli_query($db, $q);

if($res){
    $q = "DELETE FROM akun WHERE id = $id";
    $res = mysqli_query($db, $q);
}

if($res){
    session_start();
    session_destroy();
    echo "
    <script>
        alert('data berhasil dihapus');
    </script>
    ";
    echo "
    <script>
        window.location = '../index.php';
    </script>
    ";
} else {
    echo "
    <script>
        window.location = '../index.php';
    </script>
    ";  
}

?>