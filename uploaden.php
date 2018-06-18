<?php
//lees het id uit de ur
require 'session.php';

$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Foto uploaden</title>
	<link href="css/upload.css" type="text/css" rel="stylesheet">
</head>
<body>
<main class="form">

    <form action="uploaden_verwerk.php" method="post" enctype="multipart/form-data">
        <div class="logo"></div>
        <div class="login-block">
            <table>

    <input type="hidden" name="id" value="<?php echo $id; ?>">
	
	
<table>
	<tr>
		<label>
			<td>
				<label for="foto">Foto:</label> </td>
			<td>
	<input type="file" name="foto" id="foto" required="required" multiple="multiple">
			</td>
		</label>

	   </tr>

	<tr>
		<label>
			<td>
   
                <button type="submit" name="submit" id="submit" value="uploaden" class="btn blue">Opslaan</button>  </td>
			</td>
	   </label>
			</tr>
	<tr>
		<label>
			<td>
		
				<label>   <button onclick="history.back();return false;">Annuleren</button> </label> </td>
			</td>
			</label>
	</tr>
</table>
   


</form>
	</div>
</main>
</body>
</html>
