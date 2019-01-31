<!DOCTYPE html>
<html>
	<head>
		<title>Imperial Navy Enrollment Form </title>
	
		<link rel="stylesheet" href="impStyle.css">

		
		<h1 style="font-size:350%;style="font-size:300%;"><img src="ImpHeader.gif" alt="Imp header" style height="60" width="60"> Imperial Navy Enrollment Form </h1>
		<hr>
	
	</head>

	<body>
		<form>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>

			<br>
			Name: <input type="text" name="name">
			<span class="error">* <?php echo $nameError;?></span>
			<br><br>
			Surname: <input type="text" name="surname">
			<span class="error">*<?php echo $surnameError;?>
			<br><br>
			Date of birth: <input type="text" name="dob">
			<span class="error">*<?php echo $dobError;?>
			<br><br>
			Imperial ID: <input type="text" name="id">
			<span class="error">*<?php echo $idError;?>
			<br><br>
			Phone Number: <input type="text" name="phone">
			<br><br>
			Email Address: <input type="text" name="email">
			<span class="error">*<?php echo $contactError;?>
			<br><br>
			Planet of Birth: <select type="planet">
				<option value="tatooine">Tatooine</option>
				<option value="naboo">Naboo</option>
				<option value="hoth">Hoth</option>
				<option value="corusant">Corusant</option>
				<option value="alderaan">Alderaan</option>
				<option value="bespin">Bespin</option>
				<option value="dagobah">Dagobah</option>
				<option value="kashyyyk">Kashyyyk</option>
			</select>
			<span class="error">*<?php echo $planetError;?>
			<br><br>
			Species:<select type="species">
				<option value="rodian">Rodian</option>
				<option value="human">Human</option>
				<option value="wookie">Wookie</option>
				<option value="chiss">Chiss</option>
				<option value="gungan">Gungan</option>
				<option value="hutt">Hutt</option>
				<option value="other">Other</other>
			</select>
			<span class="error">*<?php echo $speciesError;?>
			<br><br>
			<input type="radio" name="gender" value="male" checked> Male
			<input type="radio" name="gender" value="female"> Female
			<input type="radio" name="gender" value="other"> Other
			<span class="error">*<?php echo $genderError;?>
			<br><br>
			<textarea name="reason" rows="5" cols="30">Reason for Enlisting:</textarea><br><br>
			<input type="submit" value="Submit">
		
			<?php 
			//define variables and error variables.
			$name = $surname = $dob = $id = $phone = $email = $planets = $species = $gender = $reason"";
			$nameError = $surnameError = $dobError = $idError = $contactError = $planetsError = $speciesError = $genderError = $reasonError ="";
			if($_SERVER["REQUEST_METHOD"]== "POST"){
				if(empty($_POST["name"])){
					$nameError = "Name is required!";
				}else{
					$name = testInput($_POST["name"]);
				}
				
				if(empty($_POST["surname"])){
					$surnameError = "A surname is required!";
				}else{
					$surname = testInput($_POST["surname"]);
				}
				
				if(empty($_POST["dob"])){
					$dobError = "A date of birth is required!"
				}else{
					$dob = testInput($_POST["dob"]);
				}
				
				if(empty($_POST["id"])){
					$idError = "Imperial ID is required"
				}else{
					$id = testInput($_POST["id"]);
				}			
					
				if(empty($_POST["phone"]) && empty($_POST["email"])){
					$contactError = "We need to hold of you some how please leave a contact detail";
				}else{		
					$phone = testInput($_POST["phone"]);
					$email = testInput($_POST["email"]);
				}
				
				if(empty($_POST["id"])){
					$idError = "Imperial ID is required"
				}else{
					$id = testInput($_POST["id"]);
				}
				
				if(empty($_POST["planet"])){
					$planetError = "Planet of birth is required"
				}else{
					$planet = testInput($_POST["planet"]);
				}
				
				if(empty($_POST["species"])){
					$speciesError = "Species is required"
				}else{
					$species = testInput($_POST["species"]);
				}
				
				if(empty($_POST["gender"])){
					$genderError = "Please specify gender!"
				}else{
					$gender = testInput($_POST["gender"]);
				}

				$reason = reasonTest($_POST["reason"]];				
			}
			//create a function to test all the input data.
			function testInput($data){
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			function reasonTest($data){
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		</form>
	</body>
</html>