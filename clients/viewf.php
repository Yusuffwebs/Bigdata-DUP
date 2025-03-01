<?php
//echo $id=$_REQUEST['id'];
//$name=$_REQUEST['uname'];

include("dbconnect.php");
//var_dump($_GET);

 echo $fname=$_GET['fname'];
 echo $fid=$_GET['fid'];
 
 
 $qrt=mysql_query("select * from userrequest where fid='$fid'");
$rw=mysql_fetch_array($qrt);
echo $nfile=$rw['file'];
 
 
 
 
 $file="../owner/upload/$nfile";
if(file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
	
		}
	
?>
