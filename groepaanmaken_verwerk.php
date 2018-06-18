<?php
require "session.php";
require_once "config.php";
       // Controleer of er formulier data is
            if (isset($_POST['verzenden'])) {
                $upload = $_FILES['Groepsfoto'];
                if (isset($upload) && $upload['error'] == 0) {

                    // lees het formulier uit
                    $Groepbeheerder = $_SESSION["ID"];
                    $Groepsnaam = $_POST['Groepsnaam'];
                    $map = __DIR__ . "/fotos/";
                    $Groepsfoto = $upload["name"];
                    move_uploaded_file($upload['tmp_name'], $map . $Groepsfoto);
                    $Beschrijving = $_POST['Beschrijving'];
                    // maak de query
                    $query = "INSERT INTO groepen
                VALUES (NULL, '$Groepsnaam','$Groepbeheerder', '$Groepsfoto', '$Beschrijving')";
                    // voer de query uit en controleer het resultaat
                    if (mysqli_query($mysqli, $query)) {

                    } else {
                        // fout gegaan: geef foutmelding
                        echo "<h2 class='inlog'>fout bij het toevoegen, heeft u echt alles ingevuld?</h2>";
                    }
                }
                $result = mysqli_query($mysqli,"SELECT * FROM groepen WHERE Groepbeheerder = $Groepbeheerder");
                while($row = mysqli_fetch_array($result)) {
                    $groepId = $row['ID_groepen'];
                    $koppeltabel = "INSERT INTO Koppeltabel VALUES ($Groepbeheerder, $groepId)";
                }
                if (mysqli_query($mysqli, $koppeltabel)){
                    header("Location:home.php");
                }
            }
            else {
                echo "<h2 class='inlog'>geen gegevens ontvangen...</h2>";
            }
                // toon de link om terug te gaan
                echo "<p><a class='btn blue' href='home.php'>Terug</a></p>";
