<?php
require "config.php";

if (isset($_POST['submit'])){
    $username = $_POST['gebruikersnaam'];
    $password = sha1($_POST['wachtwoord']);

    //controleer of alle formuliervelden waren ingevuld
    if (strlen($username) > 0 && strlen($password) > 0){

        //maak de controle-query
        $query = "SELECT * FROM Leden WHERE Gebruikersnaam = '$username' AND Wachtwoord = '$password'";

        //voer de query uit
        $result = mysqli_query($mysqli, $query);

        //controleer of de login correct was
        if (mysqli_num_rows($result) == 1){
            //login correct, start de sessie
            session_start();

            //haal de user uit het resultaat
            $user = mysqli_fetch_array($result);

            //sla de username en het level op in de sessie
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $user['Level'];
            $_SESSION['ID'] = $user["ID"];


            //stuur de gebruiker door naar de homepagina
            header('Location:home.php');

        }
        else {
            //login incorrect ga terug naar index
            echo "<p class='login-block'>Fout bij inloggen</p>";
        }

    }
    else{
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>inlog pagina</title>
    <link href="css/inlog.css" type="text/css" rel="stylesheet">
</head>
<body>
<form method="post">
<div class="logo"></div>
<div class="login-block">
	<table>
	<tr>
		<label>
			<td>
		<label for="username">Gebruiker: </label> </td>
				<td>	
		<input type="text" name="gebruikersnaam" id="gebruikersnaam" required="required"> 
				</td>
		</label>
	</tr>
	<tr>
		<label>
			<td>
		<label for="password">Wachtwoord: </label> </td>
				<td>
		<input type="password" name="wachtwoord" id="wachtwoord" required="required">
				</td>
		</label>
	<tr>
		<label>
			<td>
                <button id="submit" name="submit">Inloggen</button>
			</td>
		</label>
    </tr>
    </table>
    </form>
    <form method="" action="register.html" >
        <button id="submit1" name="register">Registreren</button>
    </form>
</div>

</body>
</html>
