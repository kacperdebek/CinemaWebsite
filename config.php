<?php
$servername = "localhost";
$username = "root";
$password = "1234567";
$database = "cinemaDB";
$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
switch ($_SERVER["PHP_SELF"]) {
	case "/login.php":
		$CURRENT_PAGE = "Login"; 
		$PAGE_TITLE = "Logowanie";
		break;
	case "/signup.php":
		$CURRENT_PAGE = "Register"; 
		$PAGE_TITLE = "Rejestracja";
		break;
	case "/movies.php":
		$CURRENT_PAGE = "Movies"; 
		$PAGE_TITLE = "Repertuar";
		break;
	case "/movie.php":
		$CURRENT_PAGE = "Movie"; 
		$PAGE_TITLE = "Details";
		break;
	default:
		$CURRENT_PAGE = "Index";
		$PAGE_TITLE = "Strona domowa";
		break;
	
}
?>