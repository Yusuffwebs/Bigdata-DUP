<?php
include("dbconnect.php");
session_start();
extract($_POST);
  $mid=$_REQUEST['mid'];
  $oid=$_REQUEST['oid'];
  $file=$_REQUEST['fname'];
  $uid=$_SESSION['Id'];
  
    date_default_timezone_set("Asia/Calcutta"); 
  echo $date=date('Y-m-d' ); 

  
  
  
 $df=mysql_query("select * from userrequest where fid='$mid' && status>='0'");
 $v=mysql_num_rows($df);
 if($v>=1)
 {
 ?>
<script language="javascript">
	alert("request already sent the file");
	window.location.href="file.php";
	</script>
	<?php
}
else
{  
 $max_qry = mysql_query("select max(id) from userrequest");
	$max_row = mysql_fetch_array($max_qry); 
	$id=$max_row['max(id)']+1;
$qry=mysql_query("insert into userrequest values('$id','$mid','$oid','$file','$uid','0','','','','')");
if($qry)
{
?>
<script language="javascript">
	alert("Request Sent Successfully..");
	window.location.href="file.php";
	</script>
	<?php
}
else
{
?>
<script language="javascript">
alert("Request sent Unsuccessfully..");
window.location.href="file.php";
</script>
	<?php
}
}
  
?>