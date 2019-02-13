<!DOCTYPE html>
<!--
    Create a form that will catch the data entered. Once the data is tested 
    enter it into the personnel table on the phpdb database.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form to SQL</title>
    </head>
    <body>
        
        <?php
        //create connection to the database and initalise variables.
        $serverName = "localhost";
        $userName = "root";
        $password = "pass123";
        $dbname = "phpdb";
        $conn = new mysqli($serverName, $userName, $password, $dbname);
        $name= $nameErr= $lastname= $lastnameErr= $email= $emailErr= $sql=  $sqlErr= "";
        
        function testInput($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            //create connection
            if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error)."\r";
            }else{
                echo "Connection successfull \n";
            }
            //prepare a statement
            $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss",$name,$lastname,$email);
            //check and asign name
            if(empty($_POST["name"])){
                $nameErr = "Name is required";
            }else {
                $name = testInput($_POST["name"]);
                // check if name only contains letters and whitespace
                if(!preg_match("/^[a-zA-Z ]*$/",$name)){
                    $nameErr = "Only letters and white space allowed"; 
                }
            }
            //check and asign lastname
            if(empty($_POST["lastname"])){
                $lastnameErr = "A surname is required";
            }else{
                $lastname = testInput($_POST["lastname"]);
                //check if lastname only contains letters and whitespace
                if(!preg_match("/^[a-zA-Z ]*$/",$lastname)){
                    $lastnameErr = "Only letters and white space allowed";
                }
            }
            //check and asign email
            if(empty($_POST["email"])){
                $emailErr = "A email is required";
            }else{
                $email = testInput($_POST["email"]);
                //check email is in the correct format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format"; 
                }
            }
            //insert checked data into database.
            
            if(!$nameErr == null && $lastnameErr == null && $emailErr == null){
                echo "Errors in data entry so statement aborted! \n";
            }else {
                    $stmt->execute();
                    echo "Statement executed!";
            }
            $conn->close();
            echo "connection closed \n";    
        }  
       
        ?>
        <!--create form for data entry-->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Information request form</h1><br>
            <td><br>
                Name: <input type="text" name="name" value="<?php echo $name;?>">
                <span class="error">*<?php echo $nameErr;?></span>
                <br><br>
                Surname: <input type="text" name="lastname" value="<?php echo $lastname;?>">
                <span class="error">*<?php echo $lastnameErr;?></span>
                <br><br>
                Email: <input type="text" name="email" value="<?php echo $email;?>">
                <span class="error">*<?php echo $emailErr;?></span>
                <br><br> 
                <input type="submit" name="submit" value="submit">
        </form>
        
        <?php 
            echo $name . " \r";
            echo $lastname . " \r";
            echo $email . " \r";
        ?>
        
    </body>
</html>

