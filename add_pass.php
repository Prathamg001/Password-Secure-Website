<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Assuming your style.css is in the same directory -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
            $websiteAddress = $_POST["website"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            // Perform necessary validations
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();

            require_once "database.php";
            // Insert into database

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO signup (website, username, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($con);
                if ($stmt) {
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "sss", $websiteAddress, $username, $passwordHash);
                        if (mysqli_stmt_execute($stmt)) {
                            echo "<div class='alert alert-success'>Password added successfully.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Failed to execute the statement: " . mysqli_stmt_error($stmt) . "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Failed to prepare the statement: " . mysqli_error($conn) . "</div>";
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "<div class='alert alert-danger'>Failed to initialize the statement.</div>";
                }
            }
        }
        ?>
        <form action="add_pass.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="website" placeholder="Website Address">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Add Password" name="submit">
            </div>
        </form>
        <div>
            <p>Return to <a href="index.php">Secure Password Manager</a></p>
        </div>
    </div>
</body>
</html>
