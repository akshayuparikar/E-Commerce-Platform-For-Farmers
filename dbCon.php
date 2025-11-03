<!-- dbCon.php -->

<?php 
function connect($flag=TRUE){
	$servername = "localhost:3306";
	$username = "root";
	$password = "";
	$dbName = "agrolink_db";

	// Create connection
	if($flag){
		$conn = new mysqli($servername, $username, $password, $dbName);
	}else{
		$conn = new mysqli($servername, $username, $password);
	}
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: $conn->connect_error");
	} 
	//echo "Connected successfully";
	
	return $conn;
}

?>