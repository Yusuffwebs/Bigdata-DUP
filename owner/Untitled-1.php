<?php
if($fileContentType=='image/jpg' || $fileContentType=='image/gif' || $fileContentType=='image/png' || $fileContentType=='image/psd' || $fileContentType=='image/icon' || $fileContentType=='image/tiff')
{
$uploadDirectory1 = 'file/img/'.$uid.'/';
if(!is_dir($uploadDirectory)){
    //Directory does not exist, so lets create it.
    mkdir($uploadDirectory, 0755, true);
}
$max_qry = mysql_query("select max(id) from img");
	$max_row = mysql_fetch_array($max_qry); 
	$id=$max_row['max(id)']+1;
$qry=mysql_query("insert into img(id,uid,name,type)values('$id','$uid','$fname','$fileContentType')");
$qry;
$content = fread($file,filesize($tempFileName));
//fwrite($content,$tempFileName);
$encryptedContent = base64_encode($content);
$encryptedFileSaveName=$uploadDirectory1.$fileName;
$encryptedFile = fopen($encryptedFileSaveName,'w');
fwrite($encryptedFile,$encryptedContent);
fclose($encryptedFile);
}
if($fileContentType=='video/mp4' || $fileContentType=='video/mov' || $fileContentType=='video/mpg' || $fileContentType=='video/wmv' || $fileContentType=='video/mpeg' || $fileContentType=='video/mkv' || $fileContentType=='video/ogg')
{
$uploadDirectory1 = 'file/video/'.$uid.'/';
if(!is_dir($uploadDirectory)){
    //Directory does not exist, so lets create it.
    mkdir($uploadDirectory, 0755, true);
}
$max_qry = mysql_query("select max(id) from video");
	$max_row = mysql_fetch_array($max_qry); 
	$id=$max_row['max(id)']+1;
$qry=mysql_query("insert into video(id,uid,name,type)values('$id','$uid','$fname','$fileContentType')");
$qry;
$content = fread($file,filesize($tempFileName));
//fwrite($content,$tempFileName);
$encryptedContent = base64_encode($content);
$encryptedFileSaveName=$uploadDirectory1.$fileName;
$encryptedFile = fopen($encryptedFileSaveName,'w');
fwrite($encryptedFile,$encryptedContent);
fclose($encryptedFile);
}
if($fileContentType=='application/pdf')
{
$uploadDirectory1 = 'file/pdf/'.$uid.'/';
if(!is_dir($uploadDirectory)){
    //Directory does not exist, so lets create it.
    mkdir($uploadDirectory, 0755, true);
}
$max_qry = mysql_query("select max(id) from pdf");
	$max_row = mysql_fetch_array($max_qry); 
	$id=$max_row['max(id)']+1;
$qry=mysql_query("insert into pdf(id,uid,name,type)values('$id','$uid','$fname','$fileContentType')");
$qry;
$content = fread($file,filesize($tempFileName));
//fwrite($content,$tempFileName);
$encryptedContent = base64_encode($content);
$encryptedFileSaveName=$uploadDirectory1.$fileName;
$encryptedFile = fopen($encryptedFileSaveName,'w');
fwrite($encryptedFile,$encryptedContent);
fclose($encryptedFile);
}
if($fileContentType=='text/plain')
{
$uploadDirectory1 = 'file/text/'.$uid.'/';
if(!is_dir($uploadDirectory)){
    //Directory does not exist, so lets create it.
    mkdir($uploadDirectory, 0755, true);
}
$max_qry = mysql_query("select max(id) from text");
	$max_row = mysql_fetch_array($max_qry); 
	$id=$max_row['max(id)']+1;
$qry=mysql_query("insert into text(id,uid,name,type)values('$id','$uid','$fname','$fileContentType')");
$qry;
$content = fread($file,filesize($tempFileName));
//fwrite($content,$tempFileName);
$encryptedContent = base64_encode($content);
$encryptedFileSaveName=$uploadDirectory1.$fileName;
$encryptedFile = fopen($encryptedFileSaveName,'w');
fwrite($encryptedFile,$encryptedContent);
fclose($encryptedFile);
}

if($fileContentType=='application/vnd.openxmlformats-officedocument.word')
{
$uploadDirectory1 = 'file/doc/'.$uid.'/';
if(!is_dir($uploadDirectory)){
    //Directory does not exist, so lets create it.
    mkdir($uploadDirectory, 0755, true);
}
$content = fread($file,filesize($tempFileName));
//fwrite($content,$tempFileName);
$encryptedContent = base64_encode($content);
$encryptedFileSaveName=$uploadDirectory1.$fileName;
$encryptedFile = fopen($encryptedFileSaveName,'w');
fwrite($encryptedFile,$encryptedContent);
fclose($encryptedFile);
}
?>