<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Assuming your style.css is in the same directory -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Password Manager</h1>
        <?php
        // Step 1: Connect to the database
        $servername = "localhost"; // Your database server name
        $username = "root"; // Your database username
        $password = ""; // Your database password
        $dbname = "add_pass"; // Your database name

        $connn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($connn->connect_error) {
            die("Connection failed: " . $connn->connect_error);
        }

        // Step 2: Execute a SQL query to fetch all data from the signup table
        $sql = "SELECT * FROM signup";
        $result = $connn->query($sql);

        // Step 3: Process the fetched data
        if ($result->num_rows > 0) {
            echo "<table class='table'><tr><th>Website</th><th>Username</th><th>Password</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["website"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }

        // Step 4: Close the database connection
        $connn->close();
        ?>
        <div>
            <p>Return to <a href="index.php">Secure Password Manager</a></p>
        </div>
    </div>
</body>
</html>
