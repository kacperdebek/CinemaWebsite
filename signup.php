<?php
ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL);
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $surname = $name = $phone = "";
$username_err = $password_err = $confirm_password_err = $email_err = $surname_err = $name_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["name"]))){
        $name_err = "Wprowadź swoje imię";
    } else{
        $name = trim($_POST["name"]);
    }
    if(empty(trim($_POST["surname"]))){
        $surname_err = "Wprowadź swoje nazwisko.";
    } else{
        $surname = trim($_POST["surname"]);
    }
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Wprowadź nazwę użytkownika.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_klienta FROM klient WHERE nazwa_użytkownika = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                if($stmt->num_rows == 1){
                    $username_err = "Podana nazwa użytkownika jest juz zajęta.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Ups! Coś poszło nie tak. Odczekaj chwilę i spróbuj ponownie.";
            }
            // Close statement
            $stmt->close();
        }
    }
    if(empty(trim($_POST["email"]))){
        $email_err = "Wprowadź swój adres email.";
    } elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Nieprawidłowy adres email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_klienta FROM klient WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                if($stmt->num_rows == 1){
                    $email_err = "Konto z podanym adresem email już istnieje.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Ups! Coś poszło nie tak. Odczekaj chwilę i spróbuj ponownie.";
            }
            // Close statement
            $stmt->close();
        }
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Wprowadź hasło.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Hasło musi posiadać minimum 6 znaków.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdź hasło.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasła nie są identyczne.";
        }
    }
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Wprowadź swój numer telefonu.";     
    } elseif(strlen(trim($_POST["phone"])) < 9 || strlen(trim($_POST["phone"])) > 13 || !ctype_digit(trim($_POST["phone"]))){
        $phone_err = "Niewłaściwy numer telefonu."; 
    } else{
        // Prepare a select statement
        $sql = "SELECT id_klienta FROM klient WHERE nr_telefonu = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_phone);
            
            // Set parameters
            $param_phone = trim($_POST["phone"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                if($stmt->num_rows == 1){
                    $phone_err = "Konto o podanym numerze telefonu już istnieje.";
                } else{
                    $phone = trim($_POST["phone"]);
                }
            } else{
                echo "Ups! Coś poszło nie tak. Odczekaj chwilę i spróbuj ponownie.";
            }
            // Close statement
            $stmt->close();
        }
    }
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($name_err) && empty($surname_err) && empty($phone_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO klient (imię, nazwisko, nazwa_użytkownika, hasło, email, nr_telefonu) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss", $param_name, $param_surname, $param_username, $param_password, $param_email, $param_phone);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_name = $name;
            $param_surname = $surname;
            $param_phone = $phone;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Coś poszło nie tak. Odczekaj chwilę i spróbuj ponownie." . mysqli_error($mysqli);
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body { 
            font: 14px sans-serif;
            color: white;
            background-color: #343A40; 
        }
        .wrapper{ width: 350px; padding: 20px; margin: 0 auto;} 
    </style>
</head>
<body>
    <div class="wrapper">
        <a href="#"><img src="resources/back.png" alt="back_arrow" onclick="history.go(-1);" style="float: right;"/></a>
        <h2>Rejestracja</h2>
        <!-- <p>Please fill this form to create an account.</p> -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Imię</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($surname_err)) ? 'has-error' : ''; ?>">
                <label>Nazwisko</label>
                <input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>">
                <span class="help-block"><?php echo $surname_err; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nazwa użytkownika</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Hasło</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Potwierdź hasło</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Adres email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Numer telefonu</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Posiadasz już konto? <a href="login.php">Zaloguj się</a>.</p>
        </form>
    </div>    
</body>
</html>