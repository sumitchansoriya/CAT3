<?php
    
    $servername ='localhost';
    $username ='root';
    $password ='';
    
	echo "<center><b><h1> Christ University </h1></b><br><br>";
	
	// Connecting to DB
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	echo "<center><h3> Creating a new DB </h3>	<br>";
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
            stu-id INT NOT NULL PRIMARY KEY,
            stu-name varchar(30) NOT NULL,
            age INT,
            gender varchar(6),
            course varchar(30),
			address varchar(30)
        )";

    echo "<h3>Creating the table</h3><br><br>";

    echo "<center><b>Checking if the table exists or not. If not, creating the table: </b>";
    if($conn->query($createQuery)==TRUE)
    {
        echo "<br>Table created successfully!<br><br>";
    }
    else
    {
        echo "Table not created!<br><br>" . $conn->error;
    }
	echo "<br>--------------------------------------------------------<br>";

    //Inserting data in the table

    echo "<h3>Inserting the data</h3><br><br>";
	$id = $_GET["userid"];
	$name = $_GET["name"];
	$gender = $_GET["gender"];
	$course = $_GET["course"];
	$address = $_GET["address"];
	
    $insert="INSERT INTO VaccinationPortal.Vaccination VALUES(id,name,gender,course,address])";

    if($conn->query($insert)==TRUE){
        echo "The records has been inserted successfully!<br><br>";
    }
    else{
        echo "The records were not inserted!<br><br>".mysqli_error($conn)."<br><br>";
    }


    $conn->close();

?>