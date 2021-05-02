<?php
echo "VIEW USERS<br><br>";

$mysqli = new mysqli("mysql.eecs.ku.edu", "griffinkeeter", "oiPu7koo", "griffinkeeter");

if($mysqli->connect_errno){
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT user_id FROM Users ORDER BY user_id ASC";

if($result = $mysqli->query($query)){
	   while($row = $result->fetch_assoc()){
	   	      printf("%s<br>",$row["user_id"]);
	   }
	   $result->free();
}

$mysqli->close();
?>