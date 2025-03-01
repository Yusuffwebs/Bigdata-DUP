<?php
echo $time_start = microtime(true);
echo '<br>';
$file="upload/Pasta.jpg";

echo $time_end = microtime(true);
echo '<br>';
echo $executionTime = $time_end-$time_start;
echo '<br>';

echo $filesize = filesize($file);
echo '<br>';
echo $filesize/2048;
echo '<br>';
echo $r=intval($filesize/2048);
echo '<br>';
echo $rt=($executionTime/($filesize/(1024*2)));
echo '<br>';
echo $time_for_modem = $filesize * 8 / (56*1024);
echo $time_for_adsl = $filesize * 8 / (5*1024*1024);
echo '<br>';
echo $time_for_t3 = $filesize * 8 / (44*1024*1024);


?>
