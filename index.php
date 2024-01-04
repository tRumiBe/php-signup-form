
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>Sign up / Login Forms</title>

</head>
<body>

<main class="container inner">

    <h1>Signup</h1>
    
    <form action="includes/process-signup.php" method="post" novalidate>
        <input type="text" name="username" id="username" placeholder="Username">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
        <input type="submit" value="Signup">
    </form>

    <p>Already registered? Click to <a href="login.php">Login</a>.</p>


</main>
 
</body>
</html>