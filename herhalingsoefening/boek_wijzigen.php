<?php
    session_start();
    include "connect.php";
    if (!$_SESSION["is_admin"] || !isset($_SESSION["is_admin"])){
        header('Location: admin_fail.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boek wijzigen</title>
</head>
<body>

    <?php
        if ($_SESSION["is_admin"]){
            if (isset($_POST["knop"])){
                $boeknummer = $_POST["boeknummer"];
                $naam = $_POST["naam"];
                $prijs = $_POST["prijs"];
                $type = $_POST["type"];

                $sql = 'UPDATE tblboek SET naam="'.$naam.'", prijs="'.$prijs.'", type="'.$type.'" WHERE boeknummer = '.$boeknummer.'';
                $resultaat = $mysqli->query($sql);

                if ($resultaat){
                    echo '
                        <h1>Succes</h1><br>
                        <p>Boek succesvol wijzigd, klik <a href="boeken_bekijken.php">hier</a> om terug te gaan.</p>
                    ';
                } else {
                    echo '
                        <h1>Mislukking</h1><br>
                        <p>Error boek wijzigen, '.$mysqli->error.'</p>
                    ';
                }
            } else {
                $sql = "select * from tblboek where boeknummer = ".$_GET["te_wijzigen"];
                $resultaat = $mysqli->query($sql);
                $row = $resultaat->fetch_assoc();

                echo '
                    <h1>Wijzig Boek #'.$row["boeknummer"].'</h1><br>
                    <form method="post" action="boek_wijzigen.php">
                        <input type="hidden" name="boeknummer" value="'.$row["boeknummer"].'">
                        Titel: <input type="text" name="naam" value="'.$row["naam"].'" required>
                        <br>
                        Prijs: <input type="number" step="0.01" name="prijs" value="'.$row["prijs"].'" required>
                        <br>
                        Type: <select name="type">
                            <option value="huur">huur</option>
                            <option value="koop">koop</option>
                        </select>
                        <br><br>
                        <input type="submit" name="knop" value="Wijzig">
                    </form>
                ';
            }
        }
    ?>
</body>
</html>