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
									$objEmail->subject("File Dwonload Key");
									
									$objEmail->message("$prtkey");
									
									if(file_exists($filename))
										{
											$objEmail->attach($filename);
										}
										if ($objEmail->send())
										{
											$qrt=mysql_query("update file set status='2' where id='$fid'");

										echo 'mail sent successfully';
										}
										else
										{	
										echo 'failed';
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
    
    <div id="logo" class="fl_left">
      <h1><a href="index.html">Cloud Server</a></h1>
      <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data Deduplication</p>
    </div>
   
    
  </header>
</div>

<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
      <
      <ul class="clear">
        <li><a href="server.php">Home</a></li>
        <li><a href="owner.php">Owner Details</a></li>
        <li><a href="space.php">Space Details</a></li>
        <li><a href="logdetails.php">Login Details</a></li>
        <li><a href="file.php">File Details</a></li>
		<li class="active"><a href="view.php">View</a></li>
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
      
      <h1>Owner File Request Details</h1>
	  <br>
<br>
      <div class="scrollable">
        <table>
          <thead>
            <tr>
              <th height="41"><div align="center">Sl.No</div></th>
              <th><div align="center">Name</div></th>
              <th><div align="center">File Name</div></th>
              <th><div align="center">Details</div></th>
              <th><div align="center">Status</div></th>
              <th><div align="center">Action</div></th>
            </tr>
          </thead>
          <tbody>
		  <?php
		  $i=1;
		  $qry=mysql_query("select * from file where status='1'");
		  while($row=mysql_fetch_array($qry))
		  {
		  ?>
            <tr>
              <td height="36"><div align="center"><?php echo $i;?></div></td>
              <td><div align="center">
                <?php $oid=$row['oid'];
			  $qrs=mysql_query("select * from owner where id='$oid'");
			  $rw=mysql_fetch_array($qrs);
			  echo $nm=$rw['name'];?>
              </div></td>
              <td><div align="center"><?php echo $row['file'];?></div></td>
              <td><div align="center"><?php echo $row['contant'];?></div></td>
              <td><div align="center">File Request</div></td>
              <td> <div align="center"><a href="view1.php?act=snt&rid=<?php echo $row['id'];?>">Send</a></div></td>
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
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </div>
	  <br>
<br>
     
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