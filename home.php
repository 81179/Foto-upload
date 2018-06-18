<?php
require "session.php";
require_once "config.php";

$userId = $_SESSION["ID"];
$level = $_SESSION["level"];
if ($level < 3) {
    $result = mysqli_query($mysqli, "SELECT * FROM Koppeltabel WHERE ID_Lid = $userId");
    $groepen = array();
    while ($row = mysqli_fetch_array($result)) {
        $groepen[] = $row["ID_Groep"];
    }
    $var = "ID_groepen IN (";
    foreach ($groepen as $groep) {
        if ($var == "ID_groepen IN ("){
            $var .= $groep;
        }else {
            $var .= ",".$groep ;
        }
    }
    $var .= ")";
    $result = mysqli_query($mysqli, "SELECT * FROM groepen WHERE $var");
}
else {
    $result = mysqli_query($mysqli, "SELECT * FROM groepen");
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Homepage Foto Upload</title>

        <!-- eigen css -->
        <link href="css/own.css" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/heroic-features.css" rel="stylesheet">

    </head>

    <body class="Background">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">






                <li class="nav-item active">

                    <a href="Hoofdpagina.index"><img  class="logo" src="fotos/TestIcon.png" alt="logo"></a>
                    <span class="sr-only">(current)</span>
                </li>


                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="profiel.php">Profiel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="groepaanmaken.php">Groep aanmaken</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loguit.php">Uitloggen</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class=" my-4">
            <div class="banner2">
                <img class="banner" src="fotos/Banner.jpg" alt="banner">

            </div>
        </header>

        <!-- Page Features max 4 op gootste breedte -->
        <div class="row text-center">
            <?php
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["ID_groepen"];
                    $fotoNaam = $row["Groepsfoto"];

                    echo '<div class="col-lg-3 col-md-6 mb-4">';
                    echo '<div class="card">';

                    if (file_exists(__DIR__ . "/fotos/" . $fotoNaam)) {
                        echo "<p><img src='fotos/" . $fotoNaam . "' alt='Photo' width='300px' height='300px' class='card-img-top'></p>";
                    }


                    echo '<hr>';
                    echo '<div class="card-body">';
                    echo '<h4 class="card-title">' . $row["Groepsnaam"] . '</h4>';
                    echo '<p class="card-text">' . $row["Beschrijving"] . '</p>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo '<a href=\'overzicht.php?id=' . $row["ID_groepen"] . '\'>Overzicht</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            else{
                echo "<h2>Je zit nog niet in een groep</h2>";
            }
            ?>
        </div>
            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>

</body>
</html>
