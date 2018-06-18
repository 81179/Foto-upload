<?php
require "session.php";
require_once "config.php";
$userId = $_SESSION["ID"];
$fotoID = $_GET["id"];
$level = $_SESSION["level"];

$result = mysqli_query($mysqli, "SELECT * FROM Fotos WHERE  ID_foto = $fotoID");
while($row = mysqli_fetch_array($result)) {
    $gebruikerID = $row["GebruikerID"];
    $groepID = $row["GroepsID"];
    $fotoNaam = $row["Fotonaam"];
    echo '<img src="fotos/' .$groepID.'/'.$fotoNaam .'"/ width="200px" height="200px"> <br/>';
}
$gebruiker = mysqli_query($mysqli, "SELECT * FROM Leden WHERE  ID = $gebruikerID");
while($row = mysqli_fetch_array($gebruiker)) {
    echo "Uploader: " . $row["Gebruikersnaam"] . "</br>";
}
$result = mysqli_query($mysqli, "SELECT * FROM Fotos WHERE  ID_foto = $fotoID");
while($row = mysqli_fetch_array($result)) {
    echo "Upload datum: " . $row["Fotodatum"] . "<br/>";
}
$result = mysqli_query($mysqli, "SELECT * FROM groepen WHERE ID_groepen = '$groepID'");
while ($row = mysqli_fetch_array($result)){
    if ($userId == $gebruikerID || $level == 3 || $userId == $row["Groepsbeheerder"]){
        echo "<a href = verwijder.php?id=".$fotoID."&groepId=".$groepID.">Verwijderen</a>";
    }
}
