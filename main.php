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
    
  if (isset($_POST["deleteAccount"])){
    deleteAccount($_SESSION["userid"]);
  }

  if (isset($_POST["sendEmail"])){
    Email(($_SESSION["username"]));
  }
    
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Main</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="style.css">
  <script src="main.js" defer></script>
  <script src="statistics.js" defer></script>
  

<body>
  
  <!-- Menu -->
  <nav class="menu">
    <ul class="menu-list">
      <li class="menu-item"><a href="#home-view" class="menu-link home-view active-menu">Avaleht</a></li>
      <li class="menu-item"><a href="#app-view" class="menu-link app-view">Päevik</a></li>
      
      <li class="menu-item"><a href="#user-view" class="menu-link user-view">Tere tulemast, <?php echo $_SESSION["username"]?></a></li>
      <li class="menu-item"><a href="?logout=1" class="menu-link">Logi välja</a></li>
      
      
    </ul>
  </nav>

  <main role="main">

    <!-- App page -->
    <section id="app-view">
        <h1>Päevik</h1>
        <p>Siin on sinu päeviku sissekanded</p>
        <a href="diary.php" class="menu-link">Päevikut täitma</a>
        
		<p><?php answer1Data()?></p>
    </section>

    <!-- Home -->
    <section id="home-view">
        <h2>Mängusõltuvuse eneseseire keskkond</h2>
        <h1>Avaleht</h1>
        <p>Siin näed statistikat oma sissekannete kohta</p>
        <div class="chartContainer" style="width:45%;">
          <canvas id="myChart"></canvas>
        </div>
        <br><br><br><br><br><br><br><br>
        <div class="chartContainer2" style="width:45%;">
          <canvas id="myChart2"></canvas>
        </div>
    </section>
  
    <!-- User -->
    <section id="user-view">
        <h2>Mängusõltuvuse eneseseire keskkond</h2>
        <h1>Info sinu kohta</h1>
        <form method="POST">
        <button id="deleteAccount" class="cancelbtn" name="deleteAccount">Kustuta minu konto</button></form>
        <form method="POST"><button id="sendEmail" class="cancelbtn" name="sendEmail">Saada email</button></form>
        
        <p>Viimased päeviku sissekanded:</p>
        
        
        
          <div id="datesToSelect"><?php readInfo($_SESSION["userid"])?></div>
          <div>
            <button type="submit" id="diaryPost" name="diaryPost" onclick="diaryEntry()">Vali</button>
          </div>
        <p id="diaryAnswers"></p>
     <button onclick="window.print();"> Print </button>
    </section>
  </main>

</body>
</html>
