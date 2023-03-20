<html>
<body>

<?php 

/*
$fileContent = file_get_contents("teks.txt");
if($fileContent != "S0VUSUtBIDEsS0VUSUtBIDIsS0VUSUtBIDMsS0VUSUtBIDQsS0VUSUtBIDUsS0VUSUtBIDYsS0VUSUtBIDcsS0VUSUtBIDgsS0VUSUtBIDks"){
  echo "Server is busy";
}
else {
$teks = $_GET["hasil"]; 
$myfile = fopen("teks.txt", "w") or die("Unable to open file!");
$txt = $teks;
fwrite($myfile, $txt);
fclose($myfile);
}
*/

$servername = "";
$username = "";
$password = "";
$dbname = "";

$sesid = rand(1,999999999);

$cookie_name = "session";


if(!isset($_COOKIE[$cookie_name])) {
  //echo "Cookie named '" . $cookie_name . "' is not set!";
  die("Error, please return to form");
  /*
  
  $cookie_value = $sesid;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO meme (session, status)
    VALUES ('". $sesid ."', '0')";
  
  if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
  } 
    else {
  // echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
   */

} 
else {
  // echo "Cookie '" . $cookie_name . "' is set!<br>";
  // echo "Value is: " . $_COOKIE[$cookie_name];
  $sesid = $_COOKIE[$cookie_name];
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //"UPDATE MyGuests SET lastname='Doe' WHERE id=2";
  // $sql = "UPDATE meme SET status='0' value='". $_GET["hasil"]. "' WHERE sesid='". $sesid ."'";
  $sql = "INSERT INTO meme_ronaldo (session, status, value)
    VALUES ('". $sesid ."', '0', '". $_GET["hasil"] ."') ON DUPLICATE KEY UPDATE    
    session='".$sesid."', status='0', value='".$_GET["hasil"]."'   " ;
  
  if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
  } 
    else {
  // echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
 
}




?>



<br><br>

<p>Please wait... dont refresh<p>
<br><br>
<p id=hasil></p>

<script>

function get_ram(str, the_id) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(the_id).innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "check.php?q=" + str, true);
    xmlhttp.send();
  }
}

function timeout2() {
    setTimeout(function () {
    get_ram("<?php echo $sesid ?>","hasil");
        timeout2();
    }, 1000);
}
timeout2();
</script>

</body>
</html>