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
	
	//Selecting rows into array
	echo "<h3>Selecting the data</h3>";
	
    $id = $_POST["userid"];
	$query = "SELECT stuid, stuname FROM stuinfo WHERE stuid = $id";
    $result = $conn->query($query); 
	$names = array();	

    echo "<h4>Table data</h4>";

    echo "Details of people vaccinated:<br><br>";
	
	while($row = $result->fetch_assoc()) {
        array_unshift($names,$row);
    }

    foreach($names as $name)
    {
        echo $name['stuid'].'- '.$name['stuname']."<br><br>";
    }

    $result->free();

    $conn->close();

?>