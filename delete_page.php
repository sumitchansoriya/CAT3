<?php
    
    echo "<center><b><h1> Christ University | User Information </h1></b><br><br>";
	
	$servername ='localhost';
    $username ='root';
    $password ='';
	$db='christ';
    
	// Connecting to DB
	$conn = new mysqli($servername, $username, $password, $db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//Deleting data in the table

    echo "<h3>Deleting the data</h3><br><br>";

    $id = $_POST["userid"];
	
	// prepare and bind
	$stmt = $conn->prepare("DELETE FROM stuinfo WHERE stuid = ?");
	$stmt->bind_param("i", $id);

    if($stmt->execute()==TRUE){
	   echo "The record has been deleted successfully!<br><br>";
    }
    else{
        echo "The record deletion failed!<br><br>".mysqli_error($conn)."<br><br>";
    }
	
    $stmt->close();
	$conn->close();

?>