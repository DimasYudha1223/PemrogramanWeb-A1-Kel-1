<?php

require '../model/db.php';
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM akun WHERE email='$email'";
    $rs = mysqli_query($db, $query);
    $ds = NULL;
    if($rs) {
        $ds = mysqli_fetch_assoc($rs);
    }
    if($ds){
        if($ds['pw'] == $password) {
            $_SESSION['login'] = $_POST['email'];
            $_SESSION['stat'] = $ds['stat'];
            $_SESSION['id'] = $ds['id'];
            echo "<script>
            alert('Selamat datang!');
            window.location.href = '../index.php';
            </script>";
        } else {
            echo "<script>
            alert('Password salah!');
            window.location.href = '../login.html';
            </script>";            
        }
    } else {
        echo "<script>
        alert('Email tidak terdaftar!');
        window.location.href = '../login.html';
        </script>";        
    }
    return;
}

?>