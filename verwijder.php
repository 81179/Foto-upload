<?php
require "session.php";
require_once "config.php";

$fotoID = $_GET["id"];
$groepId = $_GET["groepId"];

$query = "DELETE FROM Fotos WHERE ID_foto = $fotoID";
if (mysqli_query($mysqli, $query)) {
    //stuur de gebruiker terug naar de foto-pagina
    header("Location:overzicht.php?id=" . $groepId);
}
else{
    echo mysqli_error($mysqli);
}