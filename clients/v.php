<?php
/*include("dbconnect.php");
$qry=mysql_query("select * from usertime where fid='1'");
$row=mysql_fetch_array($qry);
$t=$row['etime'];
$ft=$row['ftime'];
$hh=$t.' '.$ft;
 echo $to_time = strtotime("11:00:00");
 $f=date('Y-m-d');
 date_default_timezone_set("Asia/Calcutta");
$time=date('g:i:s');
 $t=date('g:i:s', strtotime("now"));

  $g1=date('h:m:s');
$g=$f.' '.$time;
 echo '</br>';
 echo $from_time = strtotime("$g1");
 echo '</br>';
 echo $b=$to_time-$from_time;
 echo '</br>';
 echo $f=$b / 600;
 echo '</br>';
echo $f/2;
echo '</br>';
 echo round(abs($to_time - $from_time) / 60,2). " minute";
echo '</br>';
$time1 = new DateTime('09:00:59');
$time2 = new DateTime('09:01:00');
$interval = $time1->diff($time2);
echo $interval->format('%s second(s)');*/
$date = '2019-02-23';
$date1 = '2019-02-24';
date_default_timezone_set("Asia/Calcutta");
$time=date('g:i');
$beggin_hour = '10:00:00';
$end_hour = '10:00:00';
// Hours
	define("SECONDS_PER_HOUR", 60*60);
		// Calculate timestamp
		$start = strtotime($date." ".$beggin_hour);
		$stop = strtotime($date1." ".$end_hour);
		
		// Diferences
		echo $difference = $stop - $start;
		
		// Hours
		$hours = round($difference / SECONDS_PER_HOUR, 0, PHP_ROUND_HALF_DOWN);
		
		// Minutes
		echo $minutes = ($difference) / 60;
 $hours. ":" .$minutes;
?>