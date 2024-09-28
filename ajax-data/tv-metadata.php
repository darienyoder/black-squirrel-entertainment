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

$sql = "SELECT TVSchedule.day AS day, TVSchedule.hour AS hour, TVSchedule.minute AS minute, TVShows.title AS title, TVShows.cover_image AS cover_image
        FROM TVSchedule
        LEFT JOIN TVShows
        ON TVSchedule.show_name = TVShows.link
        WHERE TVSchedule.day = '".date('l', time() - 60 * 60 * 4)."'
        ORDER BY TVSchedule.hour, TVSchedule.minute";

$result = $db->query($sql);

$current_show = $db->query("SELECT title, cover_image FROM TVShows WHERE link = 'grab-bag'")->fetch_assoc();

while ($show_data = $result->fetch_assoc())
{
	if ($show_data["hour"] * 60 + $show_data["minute"] <= ((date('H') + 20) % 24) * 60 + date('i'))
    {
        $current_show = $show_data;
        if ($current_show["cover_image"] == "")
            $current_show["cover_image"] = "/images/tv/bse_thumbnail.png";
    }
}

echo json_encode($current_show);

?>
