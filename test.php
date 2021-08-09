<?php

$myfile = fopen("testfile.txt", "w") or die("Unable to open file!");
echo $myfile;

$txt = "Bill Gates\n";
fwrite($myfile, $txt);

?>
