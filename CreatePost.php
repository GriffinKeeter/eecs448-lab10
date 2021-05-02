
<?php
$username = $_POST["username"];
$content = $_POST["content"];
echo "Your username: " . $username;
echo "<br>Your post: <br>" . $content . "<br>";

if($username=="" || $content==""){
	echo "Input can't be empty, try again";
	exit();
}

$mysqli = new mysqli("mysql.eecs.ku.edu", "griffinkeeter", "oiPu7koo", "griffinkeeter");

if($mysqli->connect_errno){
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT user_id FROM Users WHERE user_id = '" . $username . "'";

if($mysqli->query($query)){
	echo "Valid User<br>";
}else{
	printf("Post failed, User not found");
	exit();
}

$query = "INSERT INTO Posts (content, author_id) VALUES ('" . $content . "', '" . $username . "')";

if($mysqli->query($query)){
	echo "Post successful";
}else{
	printf("Post failed, Could not post");
	exit();
}

$mysqli->close();

?>