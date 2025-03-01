<?php 

include("dbconnect.php");


 echo $fname=$_GET['fname'];
 echo $fid=$_GET['fid'];

 $qrt=mysql_query("select * from userrequest where fid='$fid'");
$rw=mysql_fetch_array($qrt);
echo $nfile=$rw['file'];
// $file1="../owner/file/$nfile";
 
 $file1="dekrip/$fname";
 $uploadDirectory="files/";
if (file_exists($file1)) {
  
  
  
$encryptedContent = file_get_contents($file1);
$decodedContent = base64_decode($encryptedContent);

$decryptedFileName =$fname;
$decryptedFileSaveName = $uploadDirectory . $decryptedFileName;

$decryptedFile = fopen($decryptedFileSaveName, 'wb'); // Use 'wb' mode for binary files
fwrite($decryptedFile, $decodedContent);
if(fclose($decryptedFile)){




 $final="files/$fname";





if(file_exists($final)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($final));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($final));
    ob_clean();
    flush();
    readfile($final);
    exit;
	
		}



















}














}




