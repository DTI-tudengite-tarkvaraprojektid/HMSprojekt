<?php
  require ("functions.php");
  if(!isset($_SESSION["userid"])){
    header("Location: index.php");
    exit();
  }
    //väljalogimine
    if(isset($_GET["logout"])){
      session_destroy(); //lõpetab sessiooni
      header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Main</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  <script src="main.js" charset="utf-8"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
  
<body>
  
  <!-- Menu -->
  <nav class="menu">
    <ul class="menu-list">
      <li class="menu-item"><a href="#home-view" class="menu-link home-view active-menu">Avaleht</a></li>
      <li class="menu-item"><a href="#app-view" class="menu-link app-view">Päevik</a></li>
      <li class="menu-item"><a href="?logout=1" class="menu-link">Logi välja</a></li>
    </ul>
  </nav>

  <main role="main">

    <!-- App page -->
    <section id="app-view">
        <h1>Päevik</h1>
        <p>Siin on sinu päeviku sissekanded</p>
        <a href="diary.php" class="menu-link">Päevikut täitma</a>
        
    </section>

    <!-- Home -->
    <section id="home-view">
        <h2>Mängusõltuvuse eneseseire keskkond</h2>
        <h1>Avaleht</h1>
        <p>Siin näed statistikat oma sissekannete kohta</p>
    </section>
  
  </main>

</body>
</html>
