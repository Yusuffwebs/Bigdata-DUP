<?php
include("dbconnect.php");
session_start();
extract($_POST);
  $ffid=$_REQUEST['fid'];	
  $uid=$_REQUEST['uid'];
  
  date_default_timezone_set("Asia/Kolkata"); // Set to Indian Standard Time

$date = date("Y-m-d");
  
   echo $keys= substr(md5(time()), 0, 10);
   
   echo $keys1= substr(md5(time()), 0, 4);
  
  $qry=mysql_query("select * from file where id='$ffid'");
  
  
  $row=mysql_fetch_array($qry);
  
  
           $file=$row['file'];
  
  
  echo $filePath = "file/".$file; // Replace this with the actual file path
  
  require 'lib/aes.php';
require 'lib/aesctr.php';

$nname=$keys.$file;

$namaFile = file_get_contents($filePath);
$encFile = AesCtr::encrypt($namaFile,$keys,128);
$enkrip = file_put_contents("enkrip/".($nname), $encFile);

if ($enkrip) {
	echo "File Has Been Encrypted";
}



else{ 
echo "error";
}

  




  
  
  

$qry=mysql_query("UPDATE userrequest SET status='1',aesfilename='$nname',tkey='$keys' WHERE fid='$ffid'");
$qry;
$ru=mysql_query("select * from ureg where Id='$uid'");
$nm=mysql_fetch_array($ru);
$email=$nm['EmailId'];


$we=mysql_query("select * from userrequest where fid='$ffid'");
$b=mysql_fetch_array($we);

$d=$b['tdate'];
$m=$b['ttime'];

function generateRandomAlphaNumeric($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

$key2 = generateRandomAlphaNumeric(10); // Change 10 to the desired length


 $message = "key1 : " . $keys . " key2 : " . $key2;

$bn=mysql_query("UPDATE userrequest SET tt='$key2',tdate='$date' WHERE fid='$ffid'");
$bn;
$to=$email;
include("email.php");					
$objEmail	=	new CI_Email();
									$objEmail->from('sampletest685@gmail.com',"File");
									//$objEmail->from('cloudservice@projectone.in', "Cloud Service");
									$objEmail->to("$email");
									//$objEmail->cc($txt_cc);
									//$objEmail->bcc($txt_bcc);
									$objEmail->subject("File Download Key");
									
									$objEmail->message("$message");
									
									if(file_exists($filename))
										{
										
										}
										if ($objEmail->send())
										{
											

										header("location:urequest.php");
										}
										else
										{	
										echo 'failed';
										}



?> 
		

