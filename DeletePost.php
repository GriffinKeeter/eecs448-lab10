<?php
echo "CONFIRMATION";

$mysqli = new mysqli("mysql.eecs.ku.edu", "griffinkeeter", "oiPu7koo", "griffinkeeter");

if ($mysqli->connect_errno) {printf("Connect failed: %s\n", $mysqli->connect_error);exit();}/*check connection*/


$query = "SELECT post_id FROM Posts ORDER BY post_id ASC";
$arr = array();
$c = 0;
if($result=$mysqli->query($query)){
	while($row = $result->fetch_assoc()){
		   if($_POST[(int)$row["post_id"]]=="on"){
			$arr[$c] = $row["post_id"];
			$c++;
		   }
	}
	if($c==0){
		echo "<br> No posts";
	}
	$result->free();
}

foreach($arr as $val){
	$query = "DELETE FROM Posts WHERE post_id = " . $val;
	if($mysqli->query($query)){
		echo "<br>Post " . $val . " deleted";
	}
}

?>