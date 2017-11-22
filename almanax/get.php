<?php
date_default_timezone_set('America/Los_Angeles');

for ($i = 0; $i <= 5; $i++) {
    echo date("Y-m-d", time() + 86400 * $i) . "<br>";
}

// get current day
$date = date('Y-m-d');

// add somenumber to day (to be used for looping through x days)
$day = substr($date, 8, 2);
$day += 0;

// remake date
$date = date('Y-m-');
$date = $date . $day;

$url = "http://www.krosmoz.com/en/almanax/" . $date; // e.g. http://www.krosmoz.com/en/almanax/2017-9-15

$site = file_get_contents($url);
// 2017-09-26 2 Mastogobbly Ear
// 2017-09-16 21 Obsidian
// 2017-09-27 4 Yokai Firefoux Hair

// find pos of "$quantity $item and take the offering to Antyklime Ax"
$findstr = 'and take the offering to Antyklime Ax';
$pos = strpos($site, $findstr);

// search backwards for the next space
$size = strlen($site);
$ipos = $size - $pos+2;
$ipos = strrpos($site, ' ', -$ipos);

// test if next string is a number or another word in order to grab all the words
$previouspos = $ipos-1;
do {
    $testpos = $size - $previouspos+1; //+1 ignore 1st space, also autograbs 2 numbers
    $testpos = strrpos($site, ' ', -$testpos);
    $dotest = substr($site, $testpos+1, 2);
    $previouspos = $testpos;
} while (strpbrk($dotest, '1234567890')==FALSE);

// remove extra space from number if single digit
$dotest = str_replace(' ', '', $dotest);
$quantity = $dotest;

// postion of $item is at $quantity+sizeof($quantity)+2
$item = substr ($site, $testpos+strlen($dotest)+2, ($pos-$previouspos-strlen($dotest)-3));

// echo stuff for testing unless we didn't find anything, then error
if ($pos === false) {
    echo "The string '$findstr' was not found in the string 'site'";
} else {
    echo $date, "<br>", $quantity, " ", $item, "<br>";
}

// now we will search for the daily bonus!
// we will search backwards from $quantity until we find "Bonus: " and then forward until we find "." and create a new string between those positions. We cannot search for . first because there is a url between the two

$testpos = $size - $previouspos;
$endpos = strrpos($site, 'Bonus: ', -$testpos);
                  
$testpos = $endpos;
$startpos = strpos($site, '.', $testpos);

$bonus = substr ($site, $endpos, $startpos-$endpos);

echo $bonus, "<br>", "<br>";

//$array = array(
$shop = array(
    array($date, $quantity, $item, $bonus),
    array("daisy",  0.75, 25),
    array("orchid", 1.15, 7 ),
); 
echo "<table><tr><th>Date</th><th>Quantity</th><th>Item</th><th>Bonus</th></tr>";
foreach($shop as $v){
    echo "<tr>";
    foreach($v as $vv){
        echo "<td>{$vv}</td>";
    }
    echo "<tr>";
}
echo "</table>";
?>



// get current day
$date = date('Y-m-d');

// add 1 to day (to be used for looping through x days)
$day = substr($date, 8, 2);
$day += 12;

// remake date
$date = date('Y-m-');
$date = $date . $day;

$url = "http://www.krosmoz.com/en/almanax/" . $date; // e.g. http://www.krosmoz.com/en/almanax/2017-9-15

$site = file_get_contents($url);
// 2017-09-26 2 Mastogobbly Ear
// 2017-09-16 21 Obsidian
// 2017-09-27 4 Yokai Firefoux Hair

// find pos of "$quantity $item and take the offering to Antyklime Ax"
$findstr = 'and take the offering to Antyklime Ax';
$pos = strpos($site, $findstr);

// search backwards for the next space
$size = strlen($site);
$ipos = $size - $pos+2;
$ipos = strrpos($site, ' ', -$ipos);

// test if next string is a number or another word in order to grab all the words
$previouspos = $ipos-1;
do {
    $testpos = $size - $previouspos+1; //+1 ignore 1st space, also autograbs 2 numbers
    $testpos = strrpos($site, ' ', -$testpos);
    $dotest = substr($site, $testpos+1, 2);
    $previouspos = $testpos;
} while (strpbrk($dotest, '1234567890')==FALSE);

// remove extra space from number if single digit
$dotest = str_replace(' ', '', $dotest);
$quantity = $dotest;

// postion of $item is at $quantity+sizeof($quantity)+2
$item = substr ($site, $testpos+strlen($dotest)+2, ($pos-$previouspos-strlen($dotest)-3));

// echo stuff for testing unless we didn't find anything, then error
if ($pos === false) {
    echo "The string '$findstr' was not found in the string 'site'";
} else {
    echo $date, "<br>", $quantity, " ", $item, "<br>";
}

// now we will search for the daily bonus!
// we will search backwards from $quantity until we find "." and then until we find "Bonus: " and create a new string between those positions

$testpos = $size - $previouspos;
$endpos = strrpos($site, '.', -$testpos);
                  
$testpos = $size - $endpos;
$startpos = strrpos($site, 'Bonus: ', -$testpos);

$bonus = substr ($site, $startpos, $endpos-$startpos);

echo $bonus, "<br>";

?>




<?php
// get current day
$date = date('Y-m-d');

// add 1 to day (to be used for looping through x days)
$day = substr($date, 8, 2);
$day += 1;

// remake date
$date = date('Y-m-');
$date = $date . $day;

$url = "http://www.krosmoz.com/en/almanax/" . $date; // e.g. http://www.krosmoz.com/en/almanax/2017-9-15

$site = file_get_contents($url);
// 2017-09-26 2 Mastogobbly Ear
// 2017-09-16 21 Obsidian
// 2017-09-27 4 Yokai Firefoux Hair

// find pos of "$quantity $item and take the offering to Antyklime Ax"
$findstr = 'and take the offering to Antyklime Ax';
$pos = strpos($site, $findstr);

// search backwards for the next space
$size = strlen($site);
$ipos = $size - $pos+2;
$ipos = strrpos($site, ' ', -$ipos);

// test if next string is a number or another word in order to grab all the words
$previouspos = $ipos-1;
do {
    $testpos = $size - $previouspos+1; //+1 ignore 1st space, also autograbs 2 numbers
    $testpos = strrpos($site, ' ', -$testpos);
    $dotest = substr($site, $testpos+1, 2);
    $previouspos = $testpos;
} while (strpbrk($dotest, '1234567890')==FALSE);

// remove extra space from number if single digit
$dotest = str_replace(' ', '', $dotest);
$quantity = $dotest;

// postion of $item is at $quantity+sizeof($quantity)+2
$item = substr ($site, $testpos+strlen($dotest)+2, ($pos-$previouspos-strlen($dotest)-3));

// echo stuff for testing unless we didn't find anything, then error
if ($pos === false) {
    echo "The string '$findstr' was not found in the string 'site'";
} else {
    echo strlen($dotest), "|", $dotest, "|", "<br>";
    echo strlen($item), "|", $item, "|", "<br>";

    echo "The string '$findstr' was found in the string 'site' of size ", $size;
    echo "<br>and exists at position $pos", "<br>";
}
?>




// old

<?php
$site = file_get_contents('http://www.krosmoz.com/en/almanax/2017-09-16');
// 2017-09-26 2 Mastogobbly Ear
// 2017-09-16 21 Obsidian
// 2017-09-27 4 Yokai Firefoux Hair

// find pos of "$quantity $item and take the offering to Antyklime Ax"
$findstr = 'and take the offering to Antyklime Ax';
$pos = strpos($site, $findstr);

// search backwards for the next space
$size = strlen($site);
$ipos = $size - $pos+2;
$ipos = strrpos($site, ' ', -$ipos);

// test if next string is a number or another word in order to grab all the words
$previouspos = $ipos-1;
do {
    $testpos = $size - $previouspos+1; //+1 ignore 1st space, also autograbs 2 numbers
    $testpos = strrpos($site, ' ', -$testpos);
    $dotest = substr ($site, $testpos+1, 2);
    $previouspos = $testpos;
} while (strpbrk($dotest, '1234567890')==FALSE);

// remove extra space from number if single digit
$dotest = str_replace(' ', '', $dotest);
$quantity = $dotest;

// postion of $item is at $quantity+sizeof($quantity)+2
$item = substr ($site, $testpos+strlen($dotest)+2, ($pos-$previouspos-strlen($dotest)-3));

// echo stuff for testing unless we didn't find anything, then error
if ($pos === false) {
    echo "The string '$findstr' was not found in the string 'site'";
} else {
    echo strlen($dotest), "|", $dotest, "|", "<br>";
    echo strlen($item), "|", $item, "|", "<br>";

    echo "The string '$findstr' was found in the string 'site' of size ", $size;
    echo "<br>and exists at position $pos", "<br>";
}
?>




<?php
$site = file_get_contents('http://www.krosmoz.com/en/almanax/2017-09-16');
//2017-09-26 2 Mastogobbly Ear
//2017-09-16 21 Obsidian
$findme = 'and take the offering to Antyklime Ax';
$pos = strpos($site, $findme);
$size = strlen($site);

$ipos = $size - $pos+2;
$ipos = strrpos($site, ' ', -$ipos);
$ipos2 = $size - $ipos+1;
$ipos2 = strrpos($site, ' ', -$ipos2);

$test = substr ($site, $ipos2+1, ($pos-$ipos2-1));

// TRUE if $test contains a decimal digit
if (strpbrk($test, '1234567890') !== FALSE) {
    echo $test;
}

$ipos3 = $size - $ipos2+1;
$ipos3 = strrpos($site, ' ', -$ipos3);
$test2 = substr ($site, $ipos3+1, (1));
//$pos-$ipos3-2

if ($pos === false) {
    echo "The string '$findme' was not found in the string 'site'";
} else {
    echo "The string '$findme' was found in the string 'site' of size ", $size;
    echo "<br>and exists at position $pos", "<br>";
    echo "$pos $ipos $ipos2";
    echo "<br>";
    
    echo "<br>", $ipos2, $item;
    echo "<br>", $ipos3, $test2;
}
?>



// old

<?php
$site = file_get_contents('http://www.krosmoz.com/en/almanax/2017-09-16');
$findme = 'and take the offering to Antyklime Ax';
$pos = strpos($site, $findme);
$size = strlen($site);

$ipos = $size - $pos+2;
$ipos = strrpos($site, ' ', -$ipos);
$ipos2 = $size - $ipos+1;
$ipos2 = strrpos($site, ' ', -$ipos2);

$test = substr ($site, $ipos2, ($pos-$ipos2));

$ipos3 = $size - $ipos2+1;
$ipos3 = strrpos($site, ' ', -$ipos3);
$test2 = substr ($site, $ipos3, ($pos-$ipos3));

if ($pos === false) {
    echo "The string '$findme' was not found in the string 'site'";
} else {
    echo "The string '$findme' was found in the string 'site'";
    echo " and exists at position $pos";
    echo "<br>";
    echo "$pos $ipos $ipos2";
    echo "<br>$size";
    
    echo "<br>";
    echo $site[$pos];echo $site[$pos+1];
    echo "<br>";
    
for ($i=$ipos; $i<$ipos+10; $i++){
echo $site[$i];
}
    echo "<br>";echo $test;echo "<br>did this even run";
    echo "<br>";echo $test2;
}
?>



// old

<?php
$site = file_get_contents('http://www.krosmoz.com/en/almanax/2017-09-16');
$findme = 'and take the offering to Antyklime Ax';
$pos = strpos($site, $findme);

if ($pos === false) {
    echo "The string '$findme' was not found in the string '$site'";
} else {
    echo "The string '$findme' was found in the string '$site'";
    echo " and exists at position $pos";
}
?>



// old

<?php

//nl2br( file_get_contents('file.txt') );
$url = nl2br( file_get_contents('http://www.krosmoz.com/en/almanax/2017-09-16') );
//$url = file_get_contents('http://www.krosmoz.com/en/almanax/2017-09-16');

//if (substr($url, 0, 9) !== '<!DOCTYPE' && substr($url, 0, 8) !== '<!DOCTYPE') {
//   $url = '<!DOCTYPE' . $url;
//}
//$lines = file($url);


//echo $lines[262];;
for ($i=9000; $i<10000; $i++){
echo $url[$i];
}

?>
