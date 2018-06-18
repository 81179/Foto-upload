<?php
require "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link href="css/groep_aanmaken.css" type="text/css" rel="stylesheet">
    <title>groep aanmaken</title>
</head>
<body>
<main class="form">
  
    <form action="groepaanmaken_verwerk.php" method="post" enctype="multipart/form-data">
		<div class="logo"></div>
		<div class="login-block">
			<table>
		
		<tr>
		<label>
				<td>
          <label>  Groepsnaam: </label> </td>
			  <td>
			  <input type="text" name="Groepsnaam">
			</td>
		</label>
	</tr>
		
		

		<tr>
		<label>
				<td>
		<label> Groepsfoto: </label> </td>
				<td>
		<input type="file" name="Groepsfoto" id="Groepsfoto" required="required">
			</td>
		</label>
	</tr>
		
		
		
		
		
		<tr>
		<label>
				<td>	
		<label> Beschrijving: </label> </td>
				<td>
		
		<input type="text" name="Beschrijving">
		</td>
		</label>
	</tr>
		
		
		
			<tr>
		
		<label>
				<td>
					
       <button   class="btn blue" type="submit" name="verzenden" value="opslaan"> Opslaan  </button>
					
				</td>
		</label>
		
	</tr>
				
				</form>
				
		<form action="home.php">
				
		
				
				<tr>
		<label>
			<td>
		<button>		  <a class="btn btn-primary">Terug</a> </button>
			</td>
		</label>
	</tr>
				
				
      		
		</table>
		</div>
	</form>
		
    
    
</main>
</body>
</html>