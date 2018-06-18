<?php
/**
 * Created by PhpStorm.
 * User: kevinv.dwindt
 * Date: 21-12-17
 * Time: 09:33
 */
            // Controleer of er formulier data is
            if (isset($_POST['verzenden'])) {

                // lees het config bestand
                require 'config.php';
                // lees het formulier uit
                $Gebruikersnaam = $_POST['Gebruikersnaam'];
                $Naam = $_POST['Naam'];
                $Achternaam = $_POST['Achternaam'];
                $Email = $_POST['Email'];
                $Wachtwoord = sha1($_POST['Wachtwoord']);
                $Level = $_POST['Level'];
                // maak de query
                $query = "INSERT INTO Leden
                VALUES (NULL, '$Gebruikersnaam', '$Naam', '$Achternaam','$Email', '$Wachtwoord', '2')";
                // voer de query uit en controleer het resultaat
                if (mysqli_query($mysqli, $query)) {
                    // goed gegaan: geef melding
                    echo "<h2 class='inlog'>De user <strong id='aqua'> $Naam </strong>is geregistreerd.</h2>";
                }
                else {
                    // fout gegaan: geef foutmelding
                    echo "<h2 class='inlog'>fout bij het toevoegen, heeft u echt alles ingevuld?</h2>";
                }
            }
            else {
                echo "<h2 class='inlog'>geen gegevens ontvangen...</h2>";
            }
                // toon de link om terug te gaan
                echo "<p><a class='btn blue' href='index.php'>Terug</a></p>";

        ?>