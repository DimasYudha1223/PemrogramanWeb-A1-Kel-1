<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Samarinda News Today</title>
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

  <div class="container">
    <header>
    <h1 class="heading-1">Samarinda Today</h1>
    <div class="sub-heading" id="waktu">
      <p></p>
      <p class="importent">Things You Should Know</p>
    </div>
    </header>

    <button id="openPopupButton">Dark Mode</button>

    <div class="popup" id="darkModePopup">
        <h2>Dark Mode</h2>
        <p>Enable or disable dark mode:</p>
        <button id="enableDarkModeButton">Enable Dark Mode</button>
        <button id="disableDarkModeButton">Disable Dark Mode</button>
        <button id="closePopupButton">Tutup</button>
    </div>



    <div class="main">
      <div class="home">
        <div class="left">
          <img src="img/Samarinda_Montage.jpg" class="home-img" alt="Paper photo">

          <h2 class="heading-2"> </h2>
        </div>

        <div class="right">
          <h3 class="heading-3">latest That's Happening</h3>
          <div class="lists">
            <div class="list">
              <img src="img/selayangsmd.jpg" alt="photo 1">
              <p>Samarinda as the new capital of Indonesia in the midst of Global Modernization</p>
            </div>

            <div class="list">
              <img src="img/peradabansmd.jpg" alt="photo 2">
              <p>Samarinda: The Flooding City, Here's What We Know!</p>
            </div>

            <div class="list">
              <img src="img/news.jpg" alt="photo 3">
              <p>Lack of interest in reading in Samarinda youth, Here's Our Opinion</p>
            </div>
          </div>
        </div>
        
      </div>

      <article>
        <p>Regarding the origin of the name Samarinda, the oral tradition of the people of Samarinda states that the origin of the name Samalow is motivated by the position of the Mahakam River being as low as the mainland coast of the city that fortifies it. In the past, whenever the river was high, the outskirts of the city were always submerged. Furthermore, the edge of the Mahakam has been backfilled / stockpiled many times until now it has increased by 2 meters from its original height.

          Oemar Dachlan revealed that the origin of the word "sama randah" from the Banjar language is because the land surface remains low, does not move, not the surface of a river whose water rises and falls. This is because if the benchmark is a river, then the term is "equally high", not "equally low". The term "sama-randah" was originally given as the name of a location located on the edge of the Mahakam river. Over time the name developed into a melodic pronunciation: “Samarinda”.</p>
      </article>
    </div>
  </div>

  <blockquote>
    Samarinda, The Flooding Night City, Samarinda is the capital of the province of East Kalimantan, Indonesia and the city with the largest population on the entire island of Kalimantan with a population of 825,949 people, Samarinda has an area of ​​783 km² with hilly geographical conditions with altitudes varying from 10 to 200 meters above sea level.
  </blockquote>

  <div class="cards">
    <div class="card">
      <h4 class="heading-4">About Samarinda</h4>
      <p>The city of Samarinda is divided by the Mahakam River and becomes the gateway to the interior of East Kalimantan via river, land and air routes. Samarinda is famous for its expansive developments such as the Samarinda Port and Palaran Port, both of which are the busiest ports in East Kalimantan, and the largest population in East Kalimantan is around 800 thousand people.</p>
    </div>

    <div class="card">
      <h4 class="heading-4">Fun Fact!</h4>
      <p>With an area of only 0.56 percent of the area of  East Kalimantan Province, Samarinda City is the third smallest area after Bontang City and Balikpapan City. Judging by its territorial boundaries, Samarinda City is entirely an enclave of Kutai Kartanegara Regency.</p>
    </div>

    <div class="card">
      <h4 class="heading-4">History Of Samarinda</h4>
      <p>Samarinda, known as the city as it is today, was once one of the areas of the Kutai Kartanegara ing Martadipura Sultanate. In the 13th century AD (1201-1300), before the name Samarinda was known, there were already settlements in six locations, namely Pulau Atas, Karangasan (Karang Asam), Karamumus (Karang Mumus), Luah Bakung (Loa Bakung), Sembuyutan (Karang Mumus). Welcome) and Mangkupelas (Mangkupalas). The mention of the six villages above is contained in the manuscript of the letter Salasilah Raja Kutai Kartanegara written by Khatib Muhammad Tahir on 30 Rabiul Awal 1265 H (24 February 1849 AD).</p>
    </div>
  </div>

  <div class="footer-basic">
    <footer>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="aboutme.html">About</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Busam ID © 2018</p>
    </footer>
  </div>
  <script src="styles.js"></script>
</body>
</html>