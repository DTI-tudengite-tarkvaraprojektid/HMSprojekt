<?php
  require ("functions/functions.php");
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
  <script src="js/main.js" defer></script>
  <script src="js/statistics.js" defer></script>
  

<body>
  
  <!-- Menu -->
  <nav class="menu">
    <ul class="menu-list">
      <li class="menu-item"><a href="#home-view" class="menu-link home-view active-menu">Avaleht</a></li>
      <li class="menu-item"><a href="#diary-view" class="menu-link diary-view">Päevik</a></li>
      
      <li class="menu-item menu-text" style="text-align: center;">Tere tulemast, <?php echo $_SESSION["username"]?></li>
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

   

    <!-- Home page -->
    <section id="home-view">
        <h2>Enesejälgimise päevik</h2>
        <p>Siin näed kokkuvõtet oma sissekannete kohta</p>
        <ul>
          <li>
            <button id="arrayHere1">esimene küsimus</button>
            <button id="arrayHere2">teine küsimus</button>
            <button id="arrayHere3">kolmas küsimus</button>
            <button id="arrayHere4">neljas küsimus</button>
            <button id="addData">add</button>
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
  
     <!-- Diary page -->
     <section id="diary-view">
      <h2>Enesejälgimise päevik</h2>
      <div class="diary-grid">
        <div class="comp-grid">
          <p>Siin on sinu <b style="color: blue;">arvutisõltuvuse</b> jälgimise päeviku sissekanded</p>
          <button><a href="diary.php?type=1" >Uus sissekanne</a></button>
          <h1>Vaata kõiki sisestusi:</h1>
          <div id="datesToSelect1"><?php readInfo($_SESSION["userid"], 1)?></div>
          <div><button type="submit" id="diaryPost" name="diaryPost" onclick="diaryEntry(1)" >Kuva valik</button></div>
          
        </div>

        <div class="gamb-grid">
          <p>Siin on sinu <b style="color: blue;">hasartmängu sõltuvuse</b> jälgimise päeviku sissekanded</p>
          <button><a href="diary.php?type=2" >Uus sissekanne</a></button>
          <h1>Vaata kõiki sisestusi:</h1>
          <div id="datesToSelect2"><?php readInfo($_SESSION["userid"], 2)?></div>
          <div><button type="submit" id="diaryPost" name="diaryPost" onclick="diaryEntry(2)" >Kuva valik</button></div>
          
        </div>
      
        <div class="result-grid" id="printPDF">
          <div id="diaryAnswers1" class="diaryAnswers"></div>
          <div id="diaryAnswers2" class="diaryAnswers"></div>
        </div>
        <div class="options-grid"><button id="printBtn" class="printBtn" onclick="printDiv('printPDF');" > Koosta PDF </button></div>

      </div>
    </section>

   
        <!--<form method="POST"><button id="sendEmail" class="cancelbtn" name="sendEmail">Saada email</button></form>-->
        
        
    </section>
  </main>

</body>
</html>
