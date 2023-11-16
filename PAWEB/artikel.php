<?php
require './model/db.php';

$cari = $_GET['query'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="artikel.css">
        <title>Samarinda News Today</title>
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
                                    
                        <?php
                        session_start();
                        error_reporting(0);
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
        </header>
        <div class="container">
            <form class="search-con" action="" method="GET">
                <input name="query" class="search-input" placeholder="Cari Artikel" type="text"/>
                <input class="search-button" type="submit" value="Cari"/>
            </form>
            <?php
                $sql = "SELECT * FROM artikel WHERE judul LIKE '%$cari%'";
                $rs = mysqli_query($db, $sql);
                $count = 0;
                while ($ds = mysqli_fetch_assoc($rs)) {
                    $count = $count + 1;
            ?>
                <div class="news-card">
                    <div id="id" hidden><?php echo htmlspecialchars($ds['id']); ?></div>
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
                if ($count == 0){
                    ?>
                    <div class="newstext">
                    <div class="title">Artikel Tidak Ditemukan</div>
                    </div>
                    <?php
                }
            ?>
        </div>
        <footer>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Terms</a>
            <a href="#">Privacy Policy</a>
        </footer>
        <script src="./artikel.js"></script>
    </body>
</html>