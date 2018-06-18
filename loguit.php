<?php
//start de sessions
session_start();
//verwijder alle sessions
session_destroy();
//stuur de gebruiker naar de inlogpagina
header("location:index.php");