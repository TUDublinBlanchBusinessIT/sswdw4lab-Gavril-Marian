<?php
$servername = "localhost";
$username = "root";    
$password = "pass";   
$dbname = "tennisclub"; 
$port = 3306;          


$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, name, email FROM Members";
$result = $conn->query($sql);

$first = true;
if ($result && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if (!$first) echo ", ";
    echo htmlspecialchars($row["name"]);    
    $first = false;
  }
} else {
  echo "0 results";
}

$conn->close();
?>
