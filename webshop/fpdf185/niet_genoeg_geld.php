<?php
  session_start();
?>
<?php
  include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Klanten lijst</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Food-luxury-pasta.svg/320px-Food-luxury-pasta.svg.png">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="index.php" class="w3-bar-item w3-button">Il Ristorante Spettacolóso</a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="artikel_menu.php" class="w3-bar-item w3-button">Menu</a>
      <?php
        if (isset($_SESSION["inlognummer"])){
          $sql = 'SELECT * FROM tblgebruikers WHERE gebruikernummer = '.$_SESSION["inlognummer"].'';
          $resultaat = $mysqli->query($sql);
          $row = $resultaat->fetch_assoc();
          $volledige_naam = ''.$row["voornaam"].' '.$row["naam"].'';
          
          echo '
            <a href="winkelkar_kijken.php" class="w3-bar-item w3-button">🛒</a>
          ';

          if ($_SESSION["isAdmin"]){
            echo '
              <a href="adminkrachten.php" class="w3-bar-item w3-button">Admin</a>
            ';
          }

          echo '
            <a href="uitloggen.php" class="w3-bar-item w3-button">Log uit</a>
          ';
        } else {
          echo '
            <a href="inloggen.php" class="w3-bar-item w3-button">Log in</a>
            <a href="registreren.php" class="w3-bar-item w3-button">Registreer</a>
          ';
        }
      ?>
    </div>
  </div>
</div>

<!-- Page content -->

<?php
    if (!isset($_SESSION["inlognummer"])) {
        header('Location: index.php');
    }

    echo '
        <div class="w3-content" style="max-width:1100px">
            <div class="w3-container w3-padding-64" id="contact">
                <h1>Niet genoeg geld</h1>
                <p>Er staat niet genoeg geld op uw rekening om dit te betalen.</p>
                <br><br>
                <a href="index.php">Terug naar index</a>
            </div>
        </div>
    ';
?>


</body>
</html>