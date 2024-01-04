<?php 
    // user info is carried over from login.php page using $_SESSION superblogal. 
    session_start();
    //print_r($_SESSION);

    if(isset($_SESSION["user_id"])) {
        $mysqli = require __DIR__ . "/includes/database.php";

        // No sanitization nessessary as user_id is generated on backend. Not user input. 
        $sql = "SELECT * FROM users WHERE id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);
        $users = $result->fetch_assoc();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Dashboard</title>
</head>
<body>

<main class="container inner">

    <h1>Dashboard</h1>

    <?php if (isset($users)): ?>
        <h2>Hello <?= htmlspecialchars($users["username"]) ?></h2>
        <p>User ID: <?= htmlspecialchars($users["id"]) ?><br>
        Email address: <?= htmlspecialchars($users["email"]) ?></p>
        <p><a href="logout.php">log out</a></p>
    
    <?php else : ?>

        <p><a href="login.php">Login</a> or <a href="signup">signup</a> to access the dashboard. </p>

    <?php endif; ?>

</main>


</body>
</html>