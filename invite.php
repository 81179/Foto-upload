<?php
require "session.php";
require_once "config.php";

$lidId = $_GET["id"];
$groepid = $_GET["groepid"];
$inviteQuery = mysqli_query($mysqli,"INSERT INTO Koppeltabel VALUES ($lidId,$groepid)");

if (mysqli_query($mysqli, $inviteQuery)) {
    header("Location:overzicht.php?id=" . $groepid);
}
else{
    header("Location:overzicht.php?id=" . $groepid);
}