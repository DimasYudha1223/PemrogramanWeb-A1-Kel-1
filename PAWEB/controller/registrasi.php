<?php
require '../model/db.php';

if(isset($_POST['submit'])){
    $email =  $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM akun WHERE email='$email'";
    $rs = mysqli_query($db, $query);
    $ds = NULL;
    if($rs) {
        $ds = mysqli_fetch_assoc($rs);
    }
    if($ds){
        echo "<script>
            alert('Email Sudah Terdaftar!');
            window.location.href = '../registrasi.html';
        </script>";
        return;
    }
    
    $query = "INSERT INTO akun(email, pw, stat) VALUES('$email', '$password', 'u')";
    $res = mysqli_query($db, $query);
    if($res){
        $query = "SELECT * FROM akun WHERE email='$email'";
        $rs = mysqli_query($db, $query);
        $ds = NULL;
        if($rs) {
            $ds = mysqli_fetch_assoc($rs);
        }
        $_SESSION['id'] = $ds['id'];
        
        echo "<script>
            alert('Akun Berhasil Didatarkan!')
        </script>";
        session_start();
        $_SESSION['login'] = $email;
        $_SESSION['stat'] = 'u';
        echo "<script>
        window.location.href = '../index.php'
        </script>";
    } else {
        echo "<script>
            alert('Akun gagal ditambahkan!')
        </script>";
        echo "<script>
        window.location.href = '../index.php'
        </script>";
    }
}



?>