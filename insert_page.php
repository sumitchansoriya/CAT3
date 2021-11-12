<?php
	
	echo "<center><b><h1> Christ University | User Information </h1></b><br><br>";
	
	$servername ='localhost';
    $username ='root';
    $password ='';
    
	// Connecting to DB
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	// Creating new database
	$sql = "CREATE DATABASE christ";
	if ($conn->query($sql) === TRUE) {
	echo "Database created successfully!<br>";
	} else {
	echo "Error creating database: " . $conn->error;
	}
	echo "<br>--------------------------------------------------------<br>";

    //Creating a Table
    $createQuery="CREATE TABLE christ.stuinfo(
            stuid INT NOT NULL PRIMARY KEY,
            stuname varchar(30) NOT NULL,
            age INT,
            gender varchar(6),
            course varchar(30),
			address varchar(30)
        )";

    if($conn->query($createQuery)==TRUE)
    {
        echo "<br>Table created successfully!<br><br>";
    }
    else
    {
        echo "Table not created!<br><br>" . $conn->error, "<br><br>";
    }
    
	//Inserting data in the table

    $id = $_POST["userid"];
	$name = $_POST["name"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$course = $_POST["course"];
	$address = $_POST["address"];
	
	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO christ.stuinfo (stuid,stuname,age,gender,course,address) VALUES (?, ?, ?, ?, ?,?)");
	$stmt->bind_param("isisss", $id, $name, $age, $gender, $course, $address);

    if($stmt->execute()==TRUE){
	echo "The record has been inserted successfully!<br>";
    }
    else{
	echo "Record not submitted!<br><br>" .mysqli_error($conn);
    }

    $stmt->close();
	$conn->close();

?>
