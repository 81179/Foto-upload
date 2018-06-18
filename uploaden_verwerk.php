<?php
require "session.php";
require_once "config.php";
//lees de informatie over de upload
$upload = $_FILES['foto'];
$groepId = $_POST["id"];
$lidId = $_SESSION["ID"];

//controleer of de upload geslaagd is
if (isset($upload) && $upload['error'] == 0) {

    if (!file_exists( __DIR__ . "/fotos/".$groepId."/")) {
        mkdir(__DIR__ . "/fotos/".$groepId."/", 0777, true);
    }

    //controleer het bestandstype
    if ($upload['type'] == "image/jpg" ||
        $upload['type'] == "image/jpeg" ||
        $upload['type'] == "image/pjpeg") {

        //wat is de fysieke locatie van de uploads-map?
        $map = __DIR__ . "/fotos/".$groepId."/";

        //maak de bestandsnaam
        $bestand = $upload["name"];

        //verplaats de upload naar de juiste map met de juiste naam
        move_uploaded_file($upload['tmp_name'], $map . $bestand);

        $dt = new DateTime();
        $date = $dt->format('Y-m-d H:i:s');

        $query = "INSERT INTO Fotos VALUES (NULL,'$bestand','$date','$groepId','$lidId')";
        if (mysqli_query($mysqli, $query)) {
            //stuur de gebruiker terug naar de foto-pagina
            header("Location:overzicht.php?id=" . $groepId);
        }
        else{
            echo mysqli_error($mysqli);
        }
    } else {
        echo "het bestand is van het verkeerde type.";
    }
} else {
    echo "er ging iets fout bij het uploaden.";
}