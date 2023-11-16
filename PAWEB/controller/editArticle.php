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

$id = $_GET['id'];

if(isset($_POST['submit'])){
        $judul =  $_POST['judul'];
        $tag = $_POST['tag'];
        $konten = $_POST['konten'];

        $filename = $_FILES["file"]["name"];

        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "../img/" . date("Y-m-d") . $filename;
        $folder2 = "./img/" . date("Y-m-d") . $filename;

        $sql = "SELECT * FROM artikel WHERE id='$id'";
        $rs = mysqli_query($db, $sql);
        $ds = mysqli_fetch_assoc($rs);
        $original = $ds['gambar'];

        if(!$filename){
            $folder2 = $original;
        }

        $res = mysqli_query($db, "UPDATE artikel SET judul='$judul', tag='$tag', konten='$konten', gambar='$folder2' WHERE id='$id'");
        if($res){
            $res2 = true;
            if($filename){
                $res2 = move_uploaded_file($tempname, $folder);
            }
            if($res2){
                header("Location: ../read.php?id=$id");
            }else{
                echo "<script>
                alert('Data Gambar gagal Ditambahkan!');
                </script>";
                echo " <script>
                document.location.href = '../edit.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('Data Gagal Ditambahkan!');
            </script>";
            echo " <script>
            document.location.href = '../edit.php';
            </script>";
        }
}

?>