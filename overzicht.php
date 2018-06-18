<?php
require "session.php";
require_once "config.php";
$groepid = $_GET["id"];

$result = mysqli_query($mysqli, "SELECT * FROM Fotos WHERE  GroepsID = $groepid");

?>
<!doctype html>
<html>
    <head>
        <title>Overzicht</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <!--Popper-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body>
        <a href="uploaden.php?id=<?php echo $groepid; ?>">Uploaden</a>

        <div id="uitlezen">
        <?php
            $images = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $images[] = $row['Fotonaam'];
            }
            foreach ($images as $image) {
                $fotoID = mysqli_query($mysqli, "SELECT * FROM Fotos WHERE Fotonaam = '$image' AND GroepsID = $groepid");
                while($row = mysqli_fetch_array($fotoID)){
                    echo '<a href="fotoBeschrijving.php?id='. $row["ID_foto"] .'"><img src="fotos/' .$groepid.'/'.$image .'"/ width="200px" height="200px"></a>';
                }
            }
        ?>
        </div>
        <div id="ledenToeveogen">
            <form action="" method="post">
            <?php
            $result = mysqli_query($mysqli, "SELECT * FROM groepen WHERE ID_groepen = '$groepid'");
            while ($row = mysqli_fetch_array($result)) {
                $groepsBeheerder = $row["Groepbeheerder"];
                if ($_SESSION["ID"] == $groepsBeheerder) {
                    echo "<input type='text' name='zoekopdracht' id='zoekopdracht'>";
                    echo "<button type='submit' name='zoeken' id='zoeken' class='btn btn-primary'>Zoeken</button>";
                    echo "</form>";
                    if (isset($_POST['zoeken'])) {
                        $zoekopdracht = $_POST["zoekopdracht"];
                        $zoekQuery = mysqli_query($mysqli, "SELECT * FROM Leden WHERE Gebruikersnaam LIKE '%$zoekopdracht%'  AND ID NOT IN (SELECT Id_Lid FROM Koppeltabel WHERE ID_Groep = $groepid)");

                        echo "<table class='table table-bordered table-striped'>";
                        echo "<tr>";
                        echo "<th>Gebruikersnaam</th>";
                        echo "<th>Voornaam</th>";
                        echo "<th>Achternaam</th>";
                        echo "<th>Invite</th>";
                        echo "</tr>";

                        while ($leden = mysqli_fetch_array($zoekQuery)) {
                            echo "<tr>";
                            echo "<td>" . $leden["Gebruikersnaam"] . "</td>";
                            echo "<td>" . $leden["Naam"] . "</td>";
                            echo "<td>" . $leden["Achternaam"] . "</td>";
                            echo "<td><a href='invite.php?id=" . $leden['ID'] . "&groepid=" . $groepid . "'><button type='button' name='invite' id='invite' class='btn btn-success'>Invite</button></a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        $zoekQuery = mysqli_query($mysqli, "SELECT * FROM Leden WHERE Gebruikersnaam LIKE '%%'  AND ID NOT IN (SELECT Id_Lid FROM Koppeltabel WHERE ID_Groep = $groepid)");

                        echo "<table class='table table-bordered table-striped'>";
                        echo "<tr>";
                        echo "<th>Gebruikersnaam</th>";
                        echo "<th>Voornaam</th>";
                        echo "<th>Achternaam</th>";
                        echo "<th>Invite</th>";
                        echo "</tr>";

                        while ($leden = mysqli_fetch_array($zoekQuery)) {
                            echo "<tr>";
                            echo "<td>" . $leden["Gebruikersnaam"] . "</td>";
                            echo "<td>" . $leden["Naam"] . "</td>";
                            echo "<td>" . $leden["Achternaam"] . "</td>";
                            echo "<td><a href='invite.php?id=" . $leden['ID'] . "&groepid=" . $groepid . "'><button type='button' name='invite' id='invite' class='btn btn-success'>Invite</button></a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                }
            }
            ?>
        </div>
    </body>
</html>
