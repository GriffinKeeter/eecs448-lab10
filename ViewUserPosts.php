<?php

echo "<style>
table {
  font-size: 12px;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>";

$mysqli = new mysqli("mysql.eecs.ku.edu", "griffinkeeter", "oiPu7koo", "griffinkeeter");

if($mysqli->connect_errno){
	printf("Connect failed: %s", $mysqli->connect_error);
	exit();
}

$user_id = $_POST["users"];
echo "Posts from " . $user_id . "<br>";
$query = "SELECT post_id, content FROM Posts WHERE author_id = '" . $user_id . "'";

if($result = $mysqli->query($query)){
	   echo "<table>";
	   echo "<tr><td>Post ID</td><td>Post Content</td></tr>";
	while($row = $result->fetch_assoc()){
		   echo "<tr>";
		   echo "<td>" . $row["post_id"] . "</td> <td>" . $row["content"] . "</td>";
		   echo "</tr>";
	}
	echo "</table>";
	$result->free();
}else{
	echo "error, couldn't read table";
}

$mysqli->close();

?>