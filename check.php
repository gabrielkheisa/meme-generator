<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

//Query params
$q = $_REQUEST["q"];
$vid = $q.".mp4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT status FROM meme WHERE session='".$q."' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["status"] == "1"){
        echo "<a href=\"$vid\">Click here</a>";
    }
    else {
      echo "Processing";
    }
  }
  

} else {
  echo "0 results";
}
$conn->close();







?>

