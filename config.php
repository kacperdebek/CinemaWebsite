<?php
$servername = "localhost";
$username = "root";
$password = "1234567";
$database = "cinemaDB";
// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "login.php":
			$CURRENT_PAGE = "Login"; 
			$PAGE_TITLE = "Log in";
			break;
		case "signup.php":
			$CURRENT_PAGE = "Register"; 
			$PAGE_TITLE = "Sign Up";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Homepage";
	}
?>