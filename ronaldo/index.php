<?php
$servername = "127.0.0.1";
$username = "dbusr";
$password = "securepwd";
$dbname = "appdb";

$sesid = rand(1,999999999);

$cookie_name = "session";

if(!isset($_COOKIE[$cookie_name])) {
  //echo "Cookie named '" . $cookie_name . "' is not set!";
  
  $cookie_value = $sesid;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  /*
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
}


?>

<html>
<body>
<script src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
<script src="https://gabrielkheisa.xyz/js/qrcode.min.js"></script>

<title>Meme generator</title>

<style>
.center {
  margin: auto;
  width: 50%;
  padding: 10px;
}

body {
  transition: 0.5s;
}
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
@media only screen and (max-width: 1100px){
body {
  font-size:4em;
}
video {
  width:100%;
}
h2 {
  font-size:1.5em;
  text-align: center;
}
h4 {
  font-size:0.8em;
}
h5 {
  font-size:0.8em;
}
input {
  font-size:1em !important;
}
select {
  font-size:0.8em !important;
}
 .center {
  margin: 5px;
  width: 100%;
  padding: 10px;
}
#tombol{
  font-size:1em !important;
}
.progress {
	height:50px !important;
}
}
</style>

<?php 

$fileContent = file_get_contents("teks.txt");
if($fileContent != "S0VUSUtBIDEsS0VUSUtBIDIsS0VUSUtBIDMsS0VUSUtBIDQsS0VUSUtBIDUsS0VUSUtBIDYsS0VUSUtBIDcsS0VUSUtBIDgsS0VUSUtBIDks"){
  echo "Server is busy";
}
else {
  echo 
  "
<video width=\"400\" controls class=\"center\">
  <source src=\"contoh.mp4\" type=\"video/mp4\">
  Your browser does not support HTML video.
</video>
<br><br>
<div class=\"form-group m-3 center\">
	Text 1:<input type=\"text\" id=\"text1\" value=\"KETIKA 1\" oninput=\"gae();\"><br>
	Text 2:<input type=\"text\" id=\"text2\" value=\"KETIKA 2\" oninput=\"gae();\"><br>

</div>
<br><br>

<form action=\"process.php\" method=\"get\">
<input hidden type=\"text\" id=\"keluaran_\" name=\"hasil\"><br>
<input type=\"submit\">
</form>
  ";

}
?>



<script>

var nilai = [0,0,0,0,0,0,0,0,0];
var i;

function gae() {

	for(i=0;i<=8;i++){
      nilai[i] = document.getElementById("text"+String(i+1)).value;
    }
    
}

function cetak() {
    var keluaran = "";
  	for(i=0;i<=8;i++){
    keluaran = keluaran + String(nilai[i]).toUpperCase() + ",";
    }
	document.getElementById("keluaran_").value = Base64.encode(keluaran);
}

timeout();
function timeout() {
    setTimeout(function () {
    
    cetak();
    
    
        timeout();
    }, 200);
}
</script>
</body>
</html>