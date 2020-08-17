<?php

$servername = "127.0.0.1";
$username = "root";
$password = "0000";
$dbname = "testlogin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully, now we will show the users";

$sql = "SELECT id, username, password, level, coins FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "\n"."id: " . $row["id"]
        ." - username: " . $row["username"]
        ." - password: " . $row["password"]
        ." - level: " . $row["level"]
        ." - coins: " . $row["coins"] . "\n";
  }
} else {
  echo "0 results";
}

$conn->close();

?>