<?php
// tested with http://phpfiddle.org/
// http://dofp.la/y0dYB/
// http://dofp.la/V0DlP/
// http://dofusta.guildlaunch.com/sections/article/almanax1/
// http://www.krosmoz.com/en/almanax/2017-09-15

$almatable = array (array ());

date_default_timezone_set('America/Los_Angeles');

for ($i = 0; $i <= 5; $i++) {
    $date = date("Y-m-d", time() + 86400 * $i) . "<br>";

    // http://www.krosmoz.com/en/almanax/yyyy-mm-dd
    $url = "http://www.krosmoz.com/en/almanax/" . $date;
    $site = file_get_contents($url);

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

    // now we will search for the daily bonus!
    // we will search backwards from $quantity until we find "Bonus: " and then forward until we find "." and create a new string between those positions. We cannot search for . first because there is a url between the two

    $testpos = $size - $previouspos;
    $endpos = strrpos($site, 'Bonus: ', -$testpos); // searching backwards
                      
    $testpos = $endpos;
    $startpos = strpos($site, '.', $testpos); // searching forwards

    $bonus = substr ($site, $endpos, $startpos-$endpos);

    $shop[$i] = array($date, $item, $quantity, $bonus);
}

//echo stuff for testing unless we didn't find anything, then error
if ($pos === false) {
    echo "The string '$findstr' was not found in the string 'site'";
} else {
    echo "<table><tr><th>Date</th><th>Item</th><th>Quantity</th><th>Bonus</th></tr>";
    foreach($shop as $v){
        echo "<tr>";
        foreach($v as $vv){
            echo "<td>{$vv}</td>";
        }
        echo "<tr>";
    }
    echo "</table>";
}

?>
