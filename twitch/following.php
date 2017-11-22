<?php
// Get follow time from
// https://api.twitch.tv/kraken/users/FOLLOWERNAME/follows/channels/CHANNELNAME
//// and outputs follow time or a nice 'why are you not following' message

// makesure it's plaintext
header("Content-Type: text/plain");

// error parsing
// missing channel and/or user names
// 0 no channel, 42 none missing, if no both die, if no user die
$error = 42;
if (!isset($_GET["channel"])) {
    $error = 0;
}
else if (!isset($_GET["user"]) && $error == 0) {
    die("HTTP/1.1 400 Invalid Request: missing required parameters 'channel' and 'user");
}
else if (!isset($_GET["user"])) {
    die("HTTP/1.1 400 Invalid Request: missing required parameter 'user'");
}
if ($error == 0) {
    die("HTTP/1.1 400 Invalid Request: missing required parameter 'channel'");
}

// default index error
if ($_GET["user"] == "USERNAME") {
    die("HTTP/1.1 400 Invalid Request: parameter error. Please replace CHANNELNAME AND USERNAME with VALID twitch.tv names.");
}

// get channel and user names
$channelName = $_GET["channel"];
$userName = $_GET["user"];

// get two json files, decode, and save
$text = file_get_contents("https://api.twitch.tv/kraken/users/" . $userName . "/follows/channels/" . $channelName);
$text2 = file_get_contents("https://api.twitch.tv/kraken/channels/" . $userName);

$json = json_decode($text, true);
$json2 = json_decode($text2, true);

$createdAt = (date("Y-m-d H:i:s", strtotime($json["created_at"])));
$userName = $json2["display_name"];


if (!$json) {
    $output = ($userName . " is not currently following " . $channelName . ". What're you trying to pull?");
}

else {
    $followTime = GetDateDifference($createdAt);
    $output = ($userName . " has been following the channel for " . $followTime . ".");
}

echo($output);

// Function to get the date difference for followtime
function GetDateDifference($datetime)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
 
    $string = array
    (
        'y' => 'year',
        'm' => 'month',
        'd' => 'day'
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