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
  $notice="";  
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
      
      <li class="menu-item menu-text">Tere tulemast, <?php echo $_SESSION["username"]?></li><span><?php echo $notice?></span>
      <li class="menu-item menu-log"><a href="?logout=1" class="menu-link">Logi välja</a></li>
      
      <li id="confirmation" class="menu-item menu-log menu-link" name="deleteAccount" onclick="document.getElementById('id04').style.display='block'">Kustuta minu konto</li>
      
      
    </ul>
  </nav>
  
        <div id="id04" class="modal">
          <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
          <form class="modal-content animate" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
            <div class="container">
            <h3>Oled kindel, et tahad oma konto selles keskkonnas kustutada?</h3>
            <p>Kui kunagi on vaja kontot taastada, siis jäta selleks meelde oma kasutajanimi ja registreerimisel sisestatud e-maili aadress.</p>
            <button id="deleteAccount"  name="deleteAccount">Olen kindel, kustuta konto!</button>
            <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Tühista</button>  
            </div>
          </form>
        </div>

  <main role="main">

   

    <!-- Home -->
    <section id="home-view">
        <h2>Mängusõltuvuse eneseseire keskkond</h2>
        <h1>Avaleht</h1>
        <p>Siin näed statistikat oma sissekannete kohta</p>
        <ul>
          <li>
            <button id="arrayHere">test</button>
            <button id="addData">should add</button>
          </li>
        </ul>
        <div class="chartContainer" style="width:45%;">
          <canvas id="myChart"></canvas>
        </div>
        <br>
        <div class="chartContainer2" style="width:45%;">
          <canvas id="myChart2"></canvas>
        </div>
    </section>
  
     <!-- App page -->
     <section id="app-view">
        <h1>Päevik</h1>
        <p>Siin on sinu päeviku sissekanded</p>
        <button><a href="diary.php" >Päevikut täitma</a></button>
        <h1>Vaata kõiki sisestusi:</h1>
        
          <div id="datesToSelect"><?php readInfo($_SESSION["userid"])?></div>
          <div>
            <button type="submit" id="diaryPost" name="diaryPost" onclick="diaryEntry()">Vali</button>
          </div>
        <div id="printPDF"><p id="diaryAnswers" class="diaryAnswers"></p></div>
     <button onclick="printDiv('printPDF');"> Print </button>
    </section>

   
        <!--<form method="POST"><button id="sendEmail" class="cancelbtn" name="sendEmail">Saada email</button></form>-->
        
        
    </section>
  </main>

</body>
</html>
