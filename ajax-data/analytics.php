<?php

$servername = "localhost";
$username = "blacksqu_blacksq";
$password = "zg&68SF*8^yju51W";
$dbname = "blacksqu_blacksq";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$sql = "";
$result = $db->query($sql);

?>
