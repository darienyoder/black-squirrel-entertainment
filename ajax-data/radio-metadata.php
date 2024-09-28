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

$sql = "SELECT * FROM RadioShows WHERE day = '".date('l', time() - 60 * 60 * 4)."'";
$result = $db->query($sql);

$current_show = $db->query("SELECT * FROM RadioShows WHERE link = 'bsr'")->fetch_assoc();

while ($show_data = $result->fetch_assoc())
{
	if ($show_data["hour"] <= (date('H') + 20) % 24 && (date('H') + 20) % 24 < $show_data["hour"] + $show_data["duration"])
    {
        $current_show = $show_data;
        if ($current_show["cover_image"] == "")
            $current_show["cover_image"] = "/images/radio/bsr_default.png";
    }
}

echo json_encode($current_show);

?>
