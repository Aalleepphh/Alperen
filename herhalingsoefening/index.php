<?php
    session_start();
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Index</h1>
    <?php
        if (isset($_SESSION["inlognummer"])){
            echo '<h2>Hallo, '.$_SESSION["naam"].'!</h2>';
            if ($_SESSION["is_admin"]){
                echo '<h3>Je bent wel een admin.</h3>';
            } else {
                echo '<h3>Je bent geen admin.</h3>';
            }

            echo '
                <ul>
                    <li><a href="wachtwoord_wijzigen.php">Wijzig wachtwoord</a></li>
                    <li><a href="gegevens_bekijken.php">Bekijk gegevens</a></li>
                    <li><a href="uitloggen.php">Log uit</a></li>
                
            ';
            if ($_SESSION["is_admin"]){
                echo '
                    <li><a href="boeken_bekijken.php">Bekijk boeken</li>
                    <li><a href="te_bestellen_boeken_bekijken.php">Bekijk te bestellen boeken</li>
                ';
            }
        } else {
            echo '
                <ul>
                    <li><a href="inloggen.php">Log in</a></li>
                </ul>
            ';
        }
    ?>
</body>
</html>