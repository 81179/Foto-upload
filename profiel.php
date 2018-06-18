<?php
require "session.php";
require_once "config.php";

$userId = $_SESSION["ID"];

$result = mysqli_query($mysqli, "SELECT * FROM Leden WHERE ID = '$userId'");

while($row = mysqli_fetch_array($result)) {
    echo "<div class='uitlezen'>";
    echo "Naam: ".$row["Naam"]." ".$row["Achternaam"]."<br/>";
    echo "Gebruikersnaam: ".$row["Gebruikersnaam"]."<br/>";
    echo "Fotos:"."<br/>";
    $fotos = mysqli_query($mysqli, "SELECT * FROM Fotos WHERE GebruikerID = '$userId'");
    while($foto = mysqli_fetch_array($fotos)) {
        $groepid = $foto["GroepsID"];
        $fotoNaam = $foto["Fotonaam"];
        $uploadDatum = $foto["Fotodatum"];
        echo '<img src="fotos/' .$groepid.'/'.$fotoNaam .'"/ width="200px" height="200px"></a><br/>';
        echo "Fotonaam: ".$fotoNaam."<br/>";
        $groepen = mysqli_query($mysqli, "SELECT * FROM groepen WHERE ID_groepen = '$groepid'");
        while($groep = mysqli_fetch_array($groepen)) {
            echo "Groep: " .$groep["Groepsnaam"]."<br/>";
        }
        echo "Upload datum: ".$uploadDatum."<br/>";
    }
}