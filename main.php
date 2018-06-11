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
  
  <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
  <link href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      dateStart = $( "#dateStart" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          dateEnd.datepicker( "option", "minDate", getDate( this ) );
        }),
      dateEnd = $( "#dateEnd" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        dateStart.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
};

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
        
    </section>

    <!-- Home -->
    <section id="home-view">
        <h2>Mängusõltuvuse eneseseire keskkond</h2>
        <h1>Avaleht</h1>
        <p>Siin näed statistikat oma sissekannete kohta</p>
        <form>
          <label for="dateStart">Vali vahemik:</label>
          <input type="text" id="dateStart" name="dateStart">
          <label for="dateEnd"></label>
          <input type="text" id="dateEnd" name="dateEnd">
        </form>
        <div class="ct-chart ct-golden-section" id="chart"></div>
    </section>
  
    <!-- Home -->
    <section id="user-view">
        <h2>Mängusõltuvuse eneseseire keskkond</h2>
        <h1>Info sinu kohta</h1>
        <form method="POST">
        <button id="deleteAccount" name="deleteAccount">Kustuta minu konto</button></form>
    </section>
  </main>

</body>
</html>
