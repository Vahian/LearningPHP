<!DOCTYPE html>
<!--A form that will take information from textboxes, listboxes, textarea and radio buttons. It has required information to be filled
and will display errors when these are left empty. Some basic checks are in place for the email and name for matching expected data.
The form will reload on the same page and keep all information submitted and will also display the information at the bottom of the 
page.

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Imperial Navy Enrollment Form </title>
	
	<link rel="stylesheet" href="impStyle.css">
        <style>.error {color: #FF0000;}</style>
		
	
    </head>
    <body>
		
        <?php
        //define variables and error variables.
			
			$name = $surname = $dob = $id = $phone = $email = $planet = $species = $gender = $reason = null;
			$nameError = $surnameError = $dobError = $idError = $emailError = $phoneError = $planetError = $speciesError = $genderError = $reasonError ="";
			if($_SERVER["REQUEST_METHOD"]== "POST"){
                            if(empty($_POST["name"])){
					$nameError = "Name is required!";
                            }else{
                                $name = testInput($_POST["name"]);
                                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                                    $nameError = "Only letters and white space allowed";	
                                }
                            }
				
				if(empty($_POST["surname"])){
					$surnameError = "A surname is required!";
				}else{
					$surname = testInput($_POST["surname"]);
				}
				
				if(empty($_POST["dob"])){
					$dobError = "A date of birth is required!";
				}else{
					$dob = testInput($_POST["dob"]);
				}
				
				if(empty($_POST["id"])){
					$idError = "Imperial ID is required";
				}else{
					$id = testInput($_POST["id"]);
				}			
					
				if(empty($_POST["email"])){
					$contactError = "We need to get hold of you some how please leave a email contact detail";
				}else{			
					$email = testInput($_POST["email"]);
                                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            $emailError = "Invalid email format";
                                        }
                                }
				
				if(empty($_POST["phone"])){
					$phone = testInput($_POST["phone"]);
				}else{
					$phone = testInput($_POST["phone"]);
                                        if (!filter_var($phone, FILTER_VALIDATE_REGEXP)){
                                            
                                        }
				}
				
				if(empty($_POST["planet"])){
					$planetError = "Planet of birth is required";
				}else{
					$planet = testInput($_POST["planet"]);
				}
				
				if(empty($_POST["species"])){
					$speciesError = "Species is required";
				}else{
					$species = testInput($_POST["species"]);
				}
				
				if(empty($_POST["gender"])){
					$genderError = "Please specify gender!";
				}else{
					$gender = testInput($_POST["gender"]);
				}

				$reason = reasonTest($_POST["reason"]);				
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
               
                        
        ?>
            <h1 style="font-size:350%;"><img src="ImpHeader.gif" alt="Imp header" style height="60" width="60"> Imperial Navy Enrollment Form </h1>
	<hr>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
             
			<br>
			Name: <input type="text" name="name" value="<?php echo $name;?>">
			<span class="error">* <?php echo $nameError;?></span>
			<br><br>
			Surname: <input type="text" name="surname" value="<?php echo $surname;?>">
			<span class="error">*<?php echo $surnameError;?></span>
			<br><br>
			Date of birth: <input type="text" name="dob" value="<?php echo $dob;?>">
			<span class="error">*<?php echo $dobError;?></span>
			<br><br>
			Imperial ID: <input type="text" name="id" value="<?php echo $id;?>">
			<span class="error">*<?php echo $idError;?></span>
			<br><br>
			Phone Number: <input type="text" name="phone" value="<?php echo $phone;?>">
                        <span class="error">*<?php echo $phoneError;?></span>
			<br><br>
			Email Address: <input type="text" name="email" value="<?php echo $email;?>">
			<span class="error">*<?php echo $emailError;?></span>
			<br><br>
                        <?php $planets =array("tatooine","naboo","hoth","corusant","alderaan","bespin","dagobah","Kashyyyk");?>
			Planet of Birth: <select name="planet" value="<?php echo $planet;?>">         
				<option value="Tatooine">Tatooine</option>
				<option value="Naboo">Naboo</option>
				<option value="Hoth">Hoth</option>
				<option value="Corusant">Corusant</option>
				<option value="Alderaan">Alderaan</option>
				<option value="Bespin">Bespin</option>
				<option value="Dagobah">Dagobah</option>
				<option value="Kashyyyk">Kashyyyk</option>
			</select>
			<span class="error">*<?php echo $planetError;?></span>
			<br><br>
			Species:<select name="species" >
				<option value="rodian">Rodian</option>
				<option value="human">Human</option>
				<option value="wookie">Wookie</option>
				<option value="chiss">Chiss</option>
				<option value="gungan">Gungan</option>
				<option value="hutt">Hutt</option>
				<option value="other">Other</other>
			</select>
			<span class="error">*<?php echo $speciesError;?></span>
			<br><br>
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>value="male" checked> Male
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>value="female"> Female
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?>value="other"> Other
			<span class="error">*<?php echo $genderError;?></span>
			<br><br>
			<textarea name="reason" rows="5" cols="30">Reason for Enlisting:</textarea><br><br>
			<input type="submit" name="submit" value="Submit">
                        
		</form>
            <?php
            echo $name;
            echo "<br>";
            echo $surname;
            echo "<br>";
            echo $dob;
            echo "<br>";
            echo $id;
            echo "<br>";
            echo $phone;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $planet;
            echo "<br>";
            echo $species;
            echo "<br>";
            echo $gender;
            echo "<br>";
            echo $reason;
            echo "<br>";
            
            ?>
    </body>
</html>
