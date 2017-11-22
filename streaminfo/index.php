<?php
// Get online or offline status of channel from
//// https://api.twitch.tv/kraken/channels/
//// and output streaminfo if online or an offline message if offline
// Uses https://api.twitch.tv/kraken/streams/ to get correctly capitalized
//// display name for when channel is offline

// makesure it's plaintext
header("Content-Type: text/plain");

// no channelname error
if (!isset($_GET["channel"])) {
	die("HTTP/1.1 400 Invalid Request: missing required parameter 'channel'");
}
else if ($_GET["channel"] == "") {
	die("HTTP/1.1 400 Invalid Request: missing required parameter 'channel'");
}
// default index error
else if ($_GET["channel"] == "CHANNELNAME") {
	die("HTTP/1.1 400 Invalid Request: missing required parameter 'channel'. Please replace CHANNELNAME with a twitch.tv channel name.");
}

// get channel name
$channelName = $_GET["channel"];

// get two json files, decode, and save
$text = file_get_contents("https://api.twitch.tv/kraken/streams/" . $channelName);
$text2 = file_get_contents("https://api.twitch.tv/kraken/channels/" . $channelName);
$json = json_decode($text, true);
$json2 = json_decode($text2, true);
$stream = $json["stream"];
$channel = $json2;

// test if online and output
if ($channel["name"]=="") {
	die("HTTP/1.1 400 Invalid Request: missing required parameter 'channel'. Please replace CHANNELNAME with a VALID twitch.tv channel name.");
}
else if ($stream) {
	$startTime = (date("Y-m-d H:i:s", strtotime($stream["created_at"])));
	$uptime = GetDateDifference($startTime);
	// $output = ($stream["channel"]["display_name"] . " has been streaming " . $stream["game"] . " with " . $stream["viewers"] . " viewers for the past " . $uptime . ".");
	$output = ($stream["channel"]["display_name"] . " has been streaming " . $stream["game"] . " for the past " . $uptime . " and currently has " . $stream["viewers"] . " viewers.");
} else {
	//$output =("The stream is currently offline.");
	$output=("Sorry, " . $channel["display_name"] . " isn't currently streaming. Check back later or follow and enable notifications to know when " . $channel["display_name"] . " streams next!");
}
echo($output);

// git add --all
// git commit -m "description"
// git push

// Function to get the date difference for uptime
function GetDateDifference($datetime)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
 
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
 
    $string = array
    (
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        }
        else
        {
            unset($string[$k]);
        }
    }
    return $string ? implode(', ', $string) . '' : '';
}
?>