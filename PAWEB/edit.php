<?php

require './model/db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM artikel WHERE id='$id'";
$rs = mysqli_query($db, $sql);
$ds = mysqli_fetch_assoc($rs);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="tulis.css">
        <title>Edit Artikel</title>
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
        <form method="POST" class="form" action="./controller/editArticle.php?id=<?php echo $id?>" enctype="multipart/form-data">
            <div class="judul">
                Edit Artikel
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Judul</label>
              <input type="text" name="judul" class="form-control" id="judul"  value=<?php echo htmlspecialchars($ds['judul']) ?> required>
            </div>
            <div class="form-group" id="form-tag">
                <label for="tag">Tag</label>
                <select name="tag" id="tag" required>
                  <option value="Politik">Politik</option>
                  <option value="Bisnis">Bisnis</option>
                  <option value="Teknologi">Teknologi</option>
                  <option value="Kesehatan">Kesehatan</option>
                  <option value="Entertainment">Entertainment</option>
                  <option value="Olahraga">Olahraga</option>
                </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Gambar</label>
              <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group" id="form-konten">
              <label for="exampleFormControlInput1">Konten</label>
              <textarea name="konten" class="form-control" id="konten"><?php echo htmlspecialchars($ds['konten']) ?></textarea>
            </div>
            <input type="submit" name="submit" class="btn ok" style="margin-top: 10px;"></button>
            <a href='./artikel.php' class="btn cancel" style="margin-top: 10px;">Cancel</button>
        </form>
    </body>
</html>