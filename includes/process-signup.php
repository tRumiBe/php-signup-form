<?php 

// Output user inputs. Just to make sure if the form works. 

// Validate name field isn't empty.
if (empty($_POST["username"])) {
    die("Name is required");
}

// If email isn't valid, output an error message. 
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Email address isn't valid");
}

// Password must be at least 3 characters long (Just for testing purpose. It should be much longer.)
if (strlen($_POST["password"]) < 3 ) {
    die("Password should be at least 3 characters");
}

// Check at least one letter in password
if (! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

// Check at least one letter in password
if (! preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password must contain at least one number");
}

// If password and confirm-password don't match, output an error message. 
if ($_POST["password"] !== $_POST["confirm-password"]) {
    die("Password must match");
}

// Generate hashed password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
// print_r($password_hash);


// Now connect to the database. 
$mysqli = require __DIR__ . "/database.php";

// Output user input. Just making sure it's working. 
print_r($_POST);


// Add a new user into the database. (?, ?, ?) is a placeholder. 
$sql = "INSERT INTO users (username, email, password_hash)
        VALUES (?, ?, ?)";

// Securely initialize and prepare $mysqli data. 
// Error if $sql is not prepared for execution. 
$stmt = $mysqli->stmt_init();
if ( ! $stmt->prepare($sql)) {
    // die ("SQL error: " . $mysqli->error);
    error_log("SQL error: " . $mysqli->error);
    echo "An error occurred while processing the request.";
    exit();
}

// Bind the (?, ?, ?) placeholder and user inputs.
// "sss" means 3 strings. 
// $password_hash doesn't need $_POST because it doesn't fetch raw password from $_POST. 
$stmt->bind_param("sss", $_POST["username"], $_POST["email"], $password_hash);


// Users will be navigated to singup-success.php page. 
// Output an error if the email is already registered. 
try {
   if ($stmt->execute()) {
        header("Location: ../success.php");
        //header('Location: ../login.php');
        exit();
   }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
        echo "The email address is already registered. Please choose a different email.";
        exit();
    } else {
        echo ("<br>" . $e->getMessage() . "<br>" . "Errorcode:" . $e->getCode());
        exit();
    }
}