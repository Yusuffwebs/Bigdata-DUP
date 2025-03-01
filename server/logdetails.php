<?php
include("dbconnect.php");
session_start();
extract($_POST);
?>
<?php
echo $act=$_REQUEST['act'];
echo $sid=$_REQUEST['sid'];
if($act=='send')
{

$qr=mysql_query("select * from owner where id='$sid'");
while($row=mysql_fetch_array($qr))
{
$sft=mysql_query("insert into ulog(id,status)values('$sid','2')");
$sft;
$pnumber1=$row['pnumber'];
$message1="login on before 3 day";
?>
<iframe src="http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=fantazy&password=1324149931&sendername=fantaz&mobileno=91<?php echo $pnumber1; ?>,&message=<?php echo $message1; ?>" style="display: none"></iframe>

<?php
}
$e=mysql_query("select * from file where oid='$sid'");
include("email.php");
while($er=mysql_fetch_array($e))
{

 $filename="../owner/upload/".$er['file'];
			$ns="1";
		
			if($ns==1)
			{
			$rn=mysql_query("select * from owner where id='$sid'");
			$re=mysql_fetch_array($rn);
			$email=$re['email'];
			//mysql_query("update register set captcha='".$cap."' where trans_no='".$uname."'");
					
			//mysql_query("update register set captcha='".$cap."' where trans_no='".$uname."'");
						
									$objEmail	=	new CI_Email();
									$objEmail->from('fantest.mail@gmail.com', "File");
									//$objEmail->from('cloudservice@projectone.in', "Cloud Service");
									$objEmail->to("$email");
									//$objEmail->cc($txt_cc);
									//$objEmail->bcc($txt_bcc);
									$objEmail->subject("File");
									
									$objEmail->message("Data Backup Send");
									
									if(file_exists($filename))
										{
											$objEmail->attach($filename);
										}
										if ($objEmail->send())
										{
											
										echo 'mail sent successfully';
										}
										else
										{	
										echo 'failed';
										}
										}
										}

}
?>
<!DOCTYPE html>

<html>
<head>
<title>Server</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="clear"> 
   
  </div>
</div>
<div class="wrapper row1">
  <header id="header" class="clear"> 
    < <div id="logo" class="fl_left">
      <h1><a href="index.html">Cloud Server</a></h1>
      <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Deduplication</p>
    </div>
   
    </header>
</div>

<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
          <ul class="clear">
        <li><a href="server.php">Home</a></li>
        <li><a href="owner.php">Owner Details</a></li>
        <li><a href="space.php">Space Details</a></li>
        <li  class="active"><a href="logdetails.php">Login Details</a></li>
        <li><a href="file.php">File Details</a></li>
		<li><a href="view.php">View</a></li>
		<li><a href="index.php">Logout</a></li>
      </ul>
        </nav>
  </div>
</div>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
<br>
<br>
        <h1>Owner Login Details</h1>
	  <br>
<br>
      <div class="scrollable">
	  <form name="form" action="" method="post">
        <table width="80%">
          <thead>
            <tr>
              <th width="8%" height="36"><div align="center">Sl.No</div></th>
              <th width="15%"><div align="center">Name</div></th>
              <th width="15%"><div align="center">Login Date  </div></th>
              <th width="14%"><div align="center">Login Time  </div></th>
              
            </tr>
          </thead>
          <tbody>
            <?php
	$i=1;
	$qry=mysql_query("select * from owner where status='1' && tstatus='1'");
	while($row=mysql_fetch_array($qry))
	{
	?>
            <tr>
              <td height="42"><div align="center"><?php echo $i;?></div></td>
              <td><div align="center"><?php echo $row['name'];?></div></td>
              <td><div align="center"><?php echo $row['ldate'];?></div></td>
              <td><div align="center"><?php echo $row['ltime'];?></div></td>
              
            </tr>
            <?php
			$i++;
			}
			?>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
             
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
             
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
             
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              
            </tr>
          </tbody>
        </table>
		
		<br>
		<br>
        <br>
	  </form>
      </div>
	  <br>
<br>
          <!-- / main body -->
<div class="clear"></div>
    </main>
  </div>
</div>

<div class="wrapper row4">
  <div class="rounded">
    <footer id="footer" class="clear"> 
     </footer>
  </div>
</div>

<div class="wrapper row5">
  <div id="copyright" class="clear"> 
     <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Server</a></p>
    <p class="fl_right">Desing by Admin</a></p>
     </div>
</div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>