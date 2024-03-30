<?php 
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = 'sn';
    $conn = mysqli_connect($servername, $username, $pass, $database);
    if (!$conn) {
        die("Sorry, failed to connect: " . mysqli_connect_error());
    }
    
    $tableName = 'note';
    $sql = "SHOW TABLES LIKE '$tableName'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Table already exists. <br>";
        
    } else {
        // Table doesn't exist, create it
        $sql = "CREATE TABLE `note` (
            `slno` INT(6) NOT NULL AUTO_INCREMENT,
            `titale` VARCHAR(20) NOT NULL,   -- Changed column name from `name` to `titale`
            `text` TEXT NOT NULL,            -- Changed column name from `destination` to `text`, increased size to TEXT
            PRIMARY KEY(`slno`)
        )";
        if (mysqli_query($conn, $sql)) {
            echo "Table created successfully. <br>";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $titale = $_POST["titale"];
        $desc = $_POST["desc"];
        
        // Insert data into the database
        $sql1 = "INSERT INTO `note` (`slno`, `titale`, `text`) VALUES (NULL, '$titale', '$desc')";
        $result2 = mysqli_query($conn, $sql1);
        if ($result2) {
            echo "Data inserted successfully. <br>";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sn</title>
</head>
<body>
<form action="<?php "/sn/sn"?>" method="post">
    <div>
        <label for="titale" id="titale">titale</label>
        <input type="text" name="titale"> <!-- Added name attribute -->
    </div>
    <div>
        <label for="desc" id="desc">desc</label>
        <textarea name="desc"></textarea> <!-- Added name attribute -->
    </div>
    <button type="submit">add note</button>
   </form> 
   <div>
    <?php 
        echo "hello <br>";
        $sqls = "SELECT * FROM `note`";
        $results = mysqli_query($conn, $sqls);
        while ($row = mysqli_fetch_assoc($results)) {
            echo $row['slno'] . " :      " . $row['titale'] . " :       " . $row['text'];    
            echo '<br>';
        }
    ?>
   </div>
</body>
</html>