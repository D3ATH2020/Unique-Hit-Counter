<?php

$filename = "hits.txt";

if (!file_exists($filename))
{
// hits.txt doesn't exist, let's try to create it.
$fd = fopen($filename, "w+");
fclose($fd);
}

$file = file($filename);
$file = array_unique($file);
$hits = count($file);

// Print out the number of unique visitors we have had.
echo $hits;

$fd = fopen($filename, "r");
$fstring = fread($fd, filesize($filename));
fclose($fd);

$fd = fopen($filename, "w");
$fcounted = $fstring . "
" . $_SERVER["REMOTE_ADDR"];
$fout = fwrite($fd, $fcounted);
fclose($fd);

// Nothing here needs to be edited since everything is stored in the hits.txt document there in no mySQL required for this!!!
?> 