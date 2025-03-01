<?php
include("dbconnect.php");
session_start();
extract($_POST);
$act=$_REQUEST['act'];
$fid=$_REQUEST['rid'];
if($act=='snt')
{
$fg=mysql_query("select * from file where id=$fid");
$bn=mysql_fetch_array($fg);
$onid=$bn['oid'];
$prtkey=$bn['prtkey'];
$fjk=mysql_query("select * from owner where id=$onid");
$fj=mysql_fetch_array($fjk);
$email=$fj['email'];
$to=$email;
include("email.php");					
$objEmail	=	new CI_Email();
									$objEmail->from('sampletest685@gmail.com', "File");
									//$objEmail->from('cloudservice@projectone.in', "Cloud Service");
									$objEmail->to("$email");
									//$objEmail->cc($txt_cc);
									//$objEmail->bcc($txt_bcc);
									$objEmail->subject("File Download Key");
									
									$objEmail->message("$prtkey");
									
									if(file_exists($filename))
										{
											$objEmail->attach($filename);
										}
										if ($objEmail->send())
										{
											$qrt=mysql_query("update file set status='2' where id='$fid'");

										header("location:view.php");
										}
										else
										{	
										echo 'failed';
										}
}
?>
