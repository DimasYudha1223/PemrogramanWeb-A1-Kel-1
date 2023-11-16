<?php
session_start();
error_reporting(0);
require './model/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css"/>
    <title>Profil Saya</title>
</head>
<body>
    <nav>
        <div class="nav">
            <ul>
                <a href="index.php">Home</a>
                <a href="aboutme.html">About</a>
                <a href="./artikel.php">News</a>
                <a href="./artikel.php">Sumber</a>
                <a href="./artikel.php">Isu Panas</a>
                
                <?php
                if($_SESSION['login'] != NULL){
                  echo "<a href='./controller/logout.php'>Logout</a>";
                  echo "<a href='./profile.php'>" . $_SESSION['login'] . "</a>";
                  if($_SESSION['stat'] == 'a'){
                    echo "<a href='./tulis.html'>Tulis Artikel</a>";
                  }
                } else {
                  echo "<a href='./login.html'>Login</a>";
                }
                ?>
            </ul>
        </div>
    </nav>
    
    <?php
    $e = $_SESSION['login'];
    $q = "SELECT * FROM akun WHERE email = '$e'";
    $res = mysqli_query($db, $q);
    $d = mysqli_fetch_assoc($res);
    ?>

    <div class="editprofil" id="editprofil">
        <div class="title-edit">
            <h1>Edit Profil</h1>
            <h1 style="cursor: pointer;" id="close-edit">x</h1>
        </div>
        <form enctype="multipart/form-data" class="formedit" method="POST" action="./controller/editprofil.php?id=<?php echo $d['id']; ?>">
            <div class="form-input">
                <label for="email" >Email Baru</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($d['email']); ?>"/>
            </div>
            <div class="form-input">
                <label for="password">Password Baru</label>
                <input type="text" name="password" value="<?php echo htmlspecialchars($d['pw']); ?>"/>
            </div>
            <div class="form-input">
                <label for="nama">Nama Baru</label>
                <input type="text" name="nama" value="<?php echo htmlspecialchars($d['nama']); ?>"/>
            </div>
            <div class="form-input">
              <label for="exampleFormControlFile1">Foto Profil</label>
              <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-input">
                <button>Submit</button>
            </div>
        </form>
    </div>

    <div class="profile-container">
        <div class="profile-info">
            <div class="pp">
                <div class="img-pp" style="background-image: url('<?php echo $d['foto']; ?>');"></div>
            </div>
            <div class="nama"><?php echo htmlspecialchars($d['nama']); ?></div>
            <div class="email"><?php echo $_SESSION['login'] ?></div>
            <div class="button-wrap">
                <button onclick="deleteprofile(<?php echo $d['id'] ?>)"><img width="30px" src="./img/delete.png"/></button>
                <button onclick="openedit()" onclick=""><img  width="30px" src="./img/edit.png"/></button>
            </div> 
        </div>
        <div class="profile-content">
            <div class="profile-content-header">Artikel</div>
            <?php
            
            $q = "SELECT * FROM artikel";
            $res = mysqli_query($db, $q);
            while($ds = mysqli_fetch_assoc($res)){
                ?>

                <div class="news-card">
                    <div id="id" hidden><?php echo $ds['id']; ?></div>
                    <div class="newstext">
                        <div class="headtitle">
                            <div class="tag"><?php echo htmlspecialchars($ds['tag']); ?></div><div class="date"><?php echo substr($ds['createdAt'], 0, 10); ?></div>
                        </div>
                        <div class="title"><?php echo htmlspecialchars($ds['judul']); ?></div>
                        <div class="description"><?php echo htmlspecialchars($ds['konten']); ?></div>
                    </div>
                    <div class="newsimage" style="background-image: url('<?php echo $ds['gambar']; ?>');">
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="news-card">
                <div id="id" hidden>2</div>
                <div class="newstext">
                    <div class="headtitle">
                        <div class="tag">tes</div><div class="date">tanggal</div>
                    </div>
                    <div class="title">tes</div>
                    <div class="description">tes</div>
                </div>
                <div class="newsimage" style="background-image: url('./img/1911986202p.webp');">
                </div>
            </div>
        </div>
    </div>

    <script src="./artikel.js"></script>
</body>
</html>