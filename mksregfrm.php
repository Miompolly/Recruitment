<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recruitment</title>
<link rel="stylesheet" href="istyles.css" type="text/css">

<style type="text/css">
.tbl_log
{
font-size:28px;
color:lightblue;
font-weight:bold;
background-color:white;
border-radius:8px;
}
input[type="text"],[type="password"]
{
width:130px;
height:25px;
text-align:center;
font-size:16px;

border-radius:4px;
border:1px solid blue;
font-family:"Trebuchet MS";
color:black;
}

input[type="date"]
{
width:130px;
height:25px;
text-align:center;
font-size:16px;

border-radius:4px;
border:1px solid blue;
font-family:"Trebuchet MS";
color:black;
}
input[type="submit"],[type="reset"]
{
width:70px;
height:25px;
text-align:center;
font-size:18px;
font-weight:bold;
border-radius:4px;
border:1px solid blue;
font-family:"Trebuchet MS";
background-image:url(images/btn.png);
color:white;
}
input[type="send"]
{
width:380px;
height:50px;
text-align:center;
font-size:24px;
font-weight:bold;
border-radius:4px;
border:1px solid blue;
font-family:"Trebuchet MS";
background-image:url(images/btn1.png);
color:red;
}
a
{
text-decoration:none;
}
a:hover {
    color: hotpink;
}
a:visited {
    color: hotblue;
}
.tblhd
{
font-size:18px;
}
select
{
width:200px;
text-align:center;
height:30px;
}
.tbl
{
border-radius:4px;
}
</style>
</head>

<body>

<center>
<div id="container">
<br>
<div id="hd">       </div>
<hr>
<div id="bd">    
<br>
<nav id="main_nav"> 
			<ul> 
				<li> 
					<a href="index.php">&nbsp;&nbsp;Logout</a> 
					
				</li> 
				
					

						<li> 
							<a href="newcand.php">Candidates </a> 
							
						</li> 
			 
				<li> 
					<a href="marksreg.php">Marks</a> 
					</li> 
					
				<li> 
					<a href="">Report</a> 
					<ul> 
						<li><a href="candsview.php">Candidates</a></li>
						<li><a href="written.php">Written Results</a></li>
						<li><a href="interview.php">Interview Results</a></li>
						<li><a href="report.php">Final Results</a></li>
						</ul> 
						</li> 
					
				</li> 
				<font color="white" size="+1"> <?php echo date("d-m-Y");?> </font>
</ul> </nav> 
<br><br><br><br>
<font size="+2">Candidate's Written Exam Results/ Marks Registration <br><br></font>
<form action="insert.php" method="post">
<table border="0"  width="67%" height="35%" align="center" bgcolor="white" class="tbl">
<tr class="tblhd"><td></td><td align="center">Cand Id</td>

<td align="center">Marks</td>

<td align="center">Set Maximum</td>
<tr>
<tr><td><input type="reset" name="sub" Value="Clear"></td>

<td>

<select name="cid">
<?php

//  Connect to the database and setup the array
$host="Localhost";
$username="root";
$password="";

$con=Mysql_connect("localhost","root","")
or
die("Not connected" .Mysql_error());

mysql_select_db("recruitment",$con) or die("can not select db". mysql_error());
$cid=$_POST['opt'];
$query5="select * from candidates where position='$cid'";
$result=mysql_query($query5);
while($n=mysql_fetch_array($result))
{
?>
<option value="<?php echo $n['CandId']; ?>"><?php echo $n['CandId']; ?></option>
<?php
}

mysql_close($con) ;
?>

</select>
</td>

<td><input type="text" name="mks" ></td>


<td><input type="text" name="max" placeholder="........."></td>
<td><input type="submit" name="mreg" Value="Regist"></td><tr>

 
 
 <tr><td align="center"><a href="marksreg.php"> <font color="blue" size="+1" >Back</a></font></td>
<td align="left" colspan="3">
     </font>
   <font color="red" size="+2"><?PHP
    if(isset($_SESSION['success']))
{
echo"".$_SESSION['success'];
}
 if(isset($_SESSION['error']))
{
echo "".$_SESSION['error'];
}
?></font></td></tr>
 </table>
  </form>
<font color="#0066CC" size="+2"> Select Post to record interview marks: </font>
  <form action="mksregfrmi.php" method="post">
<select name="cid">
<?php

//  Connect to the database and setup the array
$host="Localhost";
$username="root";
$password="";

$con=Mysql_connect("localhost","root","")
or
die("Not connected" .Mysql_error());

mysql_select_db("recruitment",$con) or die("can not select db". mysql_error());

$query5="select DISTINCT position from candidates";
$result=mysql_query($query5);
while($n=mysql_fetch_array($result))
{
?>
<option value="<?php echo $n['position']; ?>"><?php echo $n['position']; ?></option>
<?php
}

mysql_close($con) ;
?>
	
</select>

<input type="submit" name="mreg" Value="Go on...">
 </form>
</div>
<hr>
<div id="ft">       </div>
</div>
</center>
</body>
</html>

<?php
unset($_SESSION['error'],$_SESSION['logged_in'])
?>
