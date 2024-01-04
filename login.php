<?php

// $is_invalid catches error when logging in. 
$is_invalid = false;

// If a user  
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require_once 'includes/database.php';

    if(isset($_POST["email"])) {

        $sql = "SELECT * FROM users WHERE email = ?";
        // Prepare statment to improve security from SQL injection
        $stmt = $mysqli->prepare($sql);
        $stmt ->bind_param("s", $_POST["email"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $users = $result->fetch_assoc();
        $stmt->close();

        // Check a user in the database
        if($users) {

            if (password_verify($_POST["password"], $users["password_hash"])) {
                
                // session carry on to dashboard.php page.
                // regenerate session to prevent session fixation attacks
                session_start();
                session_regenerate_id(true);

                // Setting user_id session variable
                $_SESSION["user_id"] = $users["id"];
                header("Location: dashboard.php");
                exit();
            }
        }
    }

    //  At this point, he login form is submitted successfully. 
    $is_invalid = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Login</title>
</head>
<body>

<main class="container inner">

    <h1>Login</h1>

    <?php if ($is_invalid) : ?>
        <p>Invalid login</p>
    <?php endif; ?>
    
    <form action="" method="post" novalidate>
        <!-- This is to help keeping the email address if the user put wrong password. ?? "" in $_POST["email"] value has an empty string.  -->
        <input type="email" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="submit" value="Signup">
    </form>
    <p>Not a member? Click here to <a href="index.php">signup</a>.</p>

</main>

</body>
</html>