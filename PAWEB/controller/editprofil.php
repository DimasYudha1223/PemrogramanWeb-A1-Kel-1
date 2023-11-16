<?php
session_start();
if(!$_SESSION['id']){
        echo "<script>
        alert('Tidak diizinkan!');
    </script>";
        echo " <script>
        document.location.href = '../index.php';
        </script>"; 
        return;
}
// error_reporting(0);
require '../model/db.php';

$user_id = $_GET['id'];
$email = $_POST['email'];
$password = $_POST['password'];
$nama = $_POST['nama'];

$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "../img/" . date("Y-m-d") . $filename;
$folder2 = "./img/" . date("Y-m-d") . $filename;

$sql = "SELECT * FROM akun WHERE id='$user_id'";
$rs = mysqli_query($db, $sql);
$ds = mysqli_fetch_assoc($rs);
$original = $ds['foto'];

if(!$filename){
    $folder2 = $original;
}

$q = "UPDATE akun set email = '$email', pw = '$password', nama = '$nama', foto = '$folder2' WHERE id = $user_id";
$res = mysqli_query($db, $q);

    if($res){
        $res2 = true;
        if($filename){
            $res2 = move_uploaded_file($tempname, $folder);
        }
        if($res2){
            echo " <script>
            document.location.href = '../profile.php';
            </script>";
        }else{
            echo "<script>
            alert('Data Gambar gagal Ditambahkan!');
            </script>";
            echo " <script>
            document.location.href = '../profile.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Data Gagal Ditambahkan!');
        </script>";
        echo " <script>
        document.location.href = '../profile.php';
        </script>";
    }
?>