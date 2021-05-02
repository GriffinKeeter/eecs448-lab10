<?php

/*form section*/
$username = $_POST["username"];
echo "You entered: " . $username . "<br>";
if($username==""){
	echo "Your username can't be empty, try again";
	exit();
}


/*mySQL section*/
$mysqli = new mysqli("mysql.eecs.ku.edu", "griffinkeeter", "oiPu7koo", "griffinkeeter");

if($mysqli->connect_errno){
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT user_id FROM Users";

if($result = $mysqli->query($query)){
	   while($row = $result->fetch_assoc()){
	   	      if($username==$row["user_id"]){
			echo "Username already taken";
		      }
	   	      /*echo $row["user_id"] . "<br>";*/
	   }
	   $result->free();

}

$query = "INSERT INTO Users (user_id) VALUES ('" . $username . "')";

if($result = $mysqli->query($query)){
	echo "Username successfully added";
}

$mysqli->close();
?>