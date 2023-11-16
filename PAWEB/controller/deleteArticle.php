<?php

session_start();
require '../model/db.php';
if(!($_SESSION['stat'] == 'a')){
    echo "<script>
    alert('Tidak diizinkan!');
</script>";
    echo " <script>
    document.location.href = '../index.php';
    </script>"; 
    return;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q = "DELETE FROM artikel WHERE id=$id";
    $rs = mysqli_query($db, $q);
   
    if($rs) {
        echo "<script>
                alert('Data berhasil terhapus');
            </script>";
        echo "<script>
            document.location.href = '../artikel.php'
        </script>";
    } else {
        echo "<script>
                alert('Data gagal terhapus');
            </script>";
        echo "<script>
            document.location.href = '../artikel.php'
        </script>";   
    }
}


?>