<?php
require './model/db.php';
session_start();
$id = $_GET['id'];

$sql = "SELECT * FROM artikel WHERE id='$id'";
$rs = mysqli_query($db, $sql);
$ds = mysqli_fetch_assoc($rs);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./read.css"> 
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <div class="nav">
                <ul>
                    <a href="index.php">Home</a>
                    <a href="aboutme.html">About</a>
                    <a href="./artikel.php">News</a>
                    <a href="./artikel.php">Sumber</a>
                    <a href="./artikel.php">Isu Panas</a>
                    <a href="./tulis.html">Tulis Artikel</a>
                  </ul>
              </div>
          </nav>
    </header>

    <main class="konten">
        <div class="konfir" id="konfir">
            <div class="prompt">Apakah anda yakin untuk menghapus artikel ini?</div>
            <div class="ans">
                <button id="y" onclick="document.location.href='./controller/deleteArticle.php?id=<?php echo $ds['id'] ?>'">Ya</button>
                <button id="n" onclick="tutup()">Tidak</button>
            </div>
        </div>
        <div class="option" id="option">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        <div class="menu" id="menu">
            <ul>
                <div class="wrap">
                    <a href="./edit.php?id=<?php echo $ds['id']?>">Edit Artikel</a>
                    <img width="12px" src="./img/edit.png" />
                </div>
                <div class="wrap" id="delete">
                    <a>Hapus Artikel</a>
                    <img width="12px" src="./img/delete.png" />
                </div>
            </ul>
        </div>
        <h1><?php echo htmlspecialchars($ds['judul']); ?></h1>
        <div class="subtitle">
            <p class="author">Admin</p><p class="date"><?php echo substr($ds['createdAt'], 0, 10); ?></p>
        </div>
        <div class="gambar" style="background-image: url('<?php echo $ds['gambar']; ?>')";></div>
        <div class="tags"><?php echo htmlspecialchars($ds['tag']); ?></div>
        <div class="deskripsi">
            <?php echo htmlspecialchars($ds['konten']); ?>
        </div>


        <!-- KOMENTAR -->
        <div class="blok-komentar">
            <?php 
            
            if($_SESSION['login']){
            ?>
            <form method="POST" action="./controller/addComment.php/?id=<?php echo $id; ?>" class="add-komentar" id="form-komen">
                <h1>Komentar</h1>
                <textarea id="tulis-komentar" name="komentar" placeholder="tulis komentar"></textarea>
                <button name="submit" id="add-button">Tambahkan Komentar</button>
                <button id="edit-button" style="display: none"> Edit Komentar </button>
                <button id="can-button" onclick="cancel(<?php echo $id; ?>)" style="background-color: red; display: none">Batal</button>
            </form>
            <?php 
            }
            ?>
            <?php 
            $query = "SELECT akun.email, akun.foto, komentar.id, komentar.isi, komentar.id_akun, komentar.id_artikel FROM komentar JOIN akun ON akun.id = komentar.id_akun WHERE komentar.id_artikel = $id";
            $r = mysqli_query($db, $query);
            while($d = mysqli_fetch_assoc($r)){
            ?>

            <div class="komentar">
                <?php
                    if($_SESSION['login'] == $d['email']) {
                ?>
                <div class="pilihan">
                    <div class="konfir konfirs" id="konfir_k">
                        <div class="prompt">Apakah anda yakin untuk menghapus komentar ini?</div>
                        <div class="ans">
                            <button class="konfir_hapus" id="y">Ya<p hidden><?php echo $d['id']; ?></p></button>
                            <button class="tutup_konfir" id="n">Tidak</button>
                        </div>
                    </div>

                    <div class="options" id="option_k">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>

                    <div class="menu menus" id="menu_k">
                        <ul>
                            <div class="wrap edits" id="edit_k">
                                <a>Edit Komentar</a>
                                <img width="12px" src="./img/edit.png" />
                                <p class='isikomen' hidden><?php echo htmlspecialchars($d['isi']) ?></p>
                                <p class='idkomen' hidden><?php echo $d['id'] ?></p>
                            </div>
                            <div class="wrap deletes" id="delete_k">
                                <a>Hapus Komentar</a>
                                <img width="12px" src="./img/delete.png" />
                            </div>
                        </ul>
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="profil">
                    <img class="foto-profil" src="<?php echo $d['foto'] ?>" width="40px" height="40px"></img>
                    <div class="nama-profil"><?php echo htmlspecialchars($d['email']) ?></div>
                </div>
                <div class="teks-komentar">
                    <?php echo htmlspecialchars($d['isi']); ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </main>
    <footer>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Terms</a>
        <a href="#">Privacy Policy</a>
    </footer>
    <script src="./read.js"></script>
</body>
</html>