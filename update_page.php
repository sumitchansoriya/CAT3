<?php
    
    $servername ='localhost';
    $username ='root';
    $password ='';
	$db='christ';
    
	echo "<center><b><h1> Christ University </h1></b><br><br>";
	
	// Connecting to DB
	$conn = new mysqli($servername, $username, $password, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	
    $id = $_POST["userid"];
	$address = $_POST["address"];
	
    echo "<h3>Updating the data</h3><br><br>";

    $update = "UPDATE stuinfo SET address = '$address' WHERE stuid = '$id'";

    if($conn->query($update)==TRUE){
        echo "The record has been updated successfully!<br><br>";
    }
    else{
        echo "The record failed to update!<br><br>".mysqli_error($conn)."<br><br>";
    }

	echo "--------------------------------------------------------<br>";

?>