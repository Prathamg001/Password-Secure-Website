<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Secure Password Manager</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to Secure Password Manager</h1>
        <a href="add_pass.php" class="btn btn-warning">Add Password</a>
        <h1></h1>
        <a href="view.php" class="btn btn-warning">View Password using Website Name</a>
        <h1></h1>
        <a href="username.php" class="btn btn-warning">View Password Using Username</a>
        <h1></h1>
        <a href="viewall.php" class="btn btn-warning">View All Passwords</a>
        <h1></h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>