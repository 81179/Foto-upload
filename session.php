<?php
//start sessies!!
session_start();
//controleer of de sessie "naam" Niet bestaat
// let op de uitroepteken
if (!isset($_SESSION['username']))
{
    //stuur de gebruiker naar de inlogpagina
    header("location:index.php");
}
else
{
    //als de gebruiker alleen 'kijk-rechten' heeft
    // en geen gebruikers mag toevoegen:
    /*if($_SESSION['level'] == 0)
    {
        echo "<p>U heeft geen rechten om deze pagina te bekijken.</p>";
        exit();
    }*/
}

