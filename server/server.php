<?php
include("dbconnect.php");
session_start();
extract($_POST);
?>
<?php
$sid=$_REQUEST['sid'];
$id=$_REQUEST['id'];
$act=$_REQUEST['act'];
if($act==rsta)
{
$qrt=mysql_query("update owner set status='1' where id='$id'");
$qrt;
}
if($act==spa)
{
$qrt=mysql_query("update owner set tstatus='1' where id='$sid'");
$qrt;
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
          <ul class="clear">
        <li  class="active"><a href="server.php">Home</a></li>
        <li><a href="owner.php">Owner Details</a></li>
        <li><a href="space.php">Space Details</a></li>
        <li><a href="logdetails.php">Login Details</a></li>
        <li><a href="file.php">File Details</a></li>
		<li><a href="view.php">View</a></li>
		<li><a href="index.php">Logout</a></li>
      </nav>
  </div>
</div>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
<br>
<br>
         <h1>Owner Approval Details</h1>
	  <br>
<br>
      <div class="scrollable">
	  <form action="" method="post" name="form1">
        <table>
          <thead>
            <tr>
              <th width="8%" height="36"><div align="center">Sl.No</div></th>
              <th width="19%"><div align="center">Name</div></th>
              <th width="22%"><div align="center">Phone Number </div></th>
              <th width="21%"><div align="center">Address</div></th>
              <th width="19%"><div align="center">Email ID </div></th>
              <th width="11%"><div align="center">Action</div></th>
            </tr>
          </thead>
		  <tbody>
    <?php
	$i=1;
	$qry=mysql_query("select * from owner where status='0'");
	while($row=mysql_fetch_array($qry))
	{
	?>
          
            <tr>
              <td height="42"><div align="center"><?php echo $i;?></div></td>
              <td><div align="center"><?php echo $row['name'];?></div></td>
              <td><div align="center"><?php echo $row['pnumber'];?></div></td>
              <td><div align="center"><?php echo $row['address'];?></div></td>
              <td><div align="center"><?php echo $row['email'];?></div></td>
              <td><div align="center"><a href="server.php?act=rsta&id=<?php echo $row['id']; ?>">Approval</a></div></td>
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
              <td></td>
              <td></td>
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
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
		<h1>Owner  Space Approval Details</h1>
		
		<table>
          <thead>
            <tr>
              <th width="8%" height="36"><div align="center">Sl.No</div></th>
              <th width="15%"><div align="center">Name</div></th>
              <th width="15%"><div align="center">Phone Number </div></th>
              <th width="19%"><div align="center">Address</div></th>
              <th width="14%"><div align="center">Email ID </div></th>
              <th width="16%"><div align="center">Storage Space</div></th>
              <th width="13%"><div align="center">Action</div></th>
            </tr>
          </thead>
		  <tbody>
    <?php
	$i=1;
	$qry=mysql_query("select * from owner where status='1' && tstatus='0'");
	while($row=mysql_fetch_array($qry))
	{
	?>
          
            <tr>
              <td height="42"><div align="center"><?php echo $i;?></div></td>
              <td><div align="center"><?php echo $row['name'];?></div></td>
              <td><div align="center"><?php echo $row['pnumber'];?></div></td>
              <td><div align="center"><?php echo $row['address'];?></div></td>
              <td><div align="center"><?php echo $row['email'];?></div></td>
              <td><div align="center">
                <?php $sp=$row['tspace'];
			  echo $ds=$sp/1073741824;?>
                GB</div></td>
              <td><div align="center"><a href="server.php?act=spa&sid=<?php echo $row['id']; ?>">Approval</a></div></td>
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
              <td>&nbsp;</td>
            </tr>
			
            <tr>
              <td></td>
              <td></td>
              <td></td>
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
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
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