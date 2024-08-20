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
        
        <!-- Form to input website address -->
        <form method="GET">
            <div class="mb-3">
                <label for="websiteAddress" class="form-label">Website Address</label>
                <input type="text" class="form-control" id="websiteAddress" name="websiteAddress">
            </div>
            <button type="submit" class="btn btn-primary">View Password</button>
        </form>
        
        <?php
        // Step 1: Connect to the database
        $servername = "localhost"; // Your database server name
        $username = "root"; // Your database username
        $password = ""; // Your database password
        $dbname = "add_pass"; // Your database name

        $connnn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($connnn->connect_error) {
            die("Connection failed: " . $connnn->connect_error);
        }

        // Step 2: Execute a SQL query to fetch data based on the provided website address
        if(isset($_GET['websiteAddress'])) {
            $websiteAddress = $_GET['websiteAddress'];
            $sql = "SELECT * FROM signup WHERE website='$websiteAddress'";
            $result = $connnn->query($sql);

            // Step 3: Process the fetched data
            if ($result->num_rows > 0) {
                echo "<table class='table'><tr><th>Website</th><th>Username</th><th>Password</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["website"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No records found for the provided website address.";
            }
        }

        // Step 4: Close the database connection
        $connnn->close();
        ?>
        <div>
            <p>Return to <a href="index.php">Secure Password Manager</a></p>
        </div>
    </div>
</body>
</html>
