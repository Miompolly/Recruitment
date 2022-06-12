<?php
$con=Mysql_connect("localhost","root","")
or
die("Not connected" .mysql_error());

mysql_select_db("recruitment",$con) or die("can not select db". mysql_error());

$poz=$_POST['fcandsvbtn'];
$rz= mysql_query("SELECT results.CandId,fname,lname,gender,sum(Marks)as Average from candidates INNER JOIN results ON candidates.CandId=results.CandId where position='$poz' GROUP BY results.CandId ORDER BY Average Desc");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recruitment</title>
<link rel="stylesheet" href="istyles.css" type="text/css">


<style type="text/css">

	.tblSaveForm {
border:1px #ccc solid;
background-color: #f8f8f8;
}
.tableheader {
background-color: #fedc4d;
}
.tablerow {
background-color: #A7D6F1;
color:white;
}
.btnSubmit {
background-color:#fedc4d;
padding:5px;
border-color:#fedc4d;
border:1px solid #666;
outline:none;
width:100px;
color: #999999;
cursor:pointer;
}
.message {
color: #FF0000;
text-align: center;
width: 100%;
}
.txtField {
padding: 5px;
border:#fedc4d 1px solid;
outline:none;
height:30px;
width:320px;
}
.evenRow {
background-color: white;
font-size:12px;
color:#101010;
font-family:"Trebuchet MS";
}
.evenRow:hover {
background-color: yellow;
}
.oddRow {
background-color: #f1f1f1;
font-size:12px;
color:#101010;
font-family:"Trebuchet MS";
}
.oddRow:hover {
background-color:lightgreen;
}
.tblListForm {
border:1px #ccc solid;
}
.listheader {
background-color: #333333;
font-size:18px;
font-weight:bold;
text-transform:uppercase;
border-top:1px #ccc solid;
color:white;
}
a:link
{
color:white;
}
.tbl_log
{
font-size:28px;
color:green;
font-weight:bold;
background-color:white;
border-radius:8px;
}
input[type="text"],[type="password"]
{
width:280px;
height:30px;
text-align:center;
font-size:24px;

border-radius:4px;
border:1px solid green;
font-family:"Trebuchet MS";
color:black;
}
input[type="submit"]
{
width:280px;
height:50px;
text-align:center;
font-size:24px;
font-weight:bold;
border-radius:4px;
border:1px solid green;
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
border:1px solid red;
font-family:"Trebuchet MS";
background-image:url(images/btn1.png);
color:red;
}
input[type="button"]
{
font-size:18px;
width:100px;
border:solid green 1px;
border-radius:0px;
text-align:center;
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
<br><br>



<table border="0" cellpadding="10" cellspacing="0" width="90%" class="tblListForm">
<tr class="listheader">
<td colspan="6" class="h"><center>FINAL RESULTS ON <FONT color='#99FFFF'><?php echo $_POST["fcandsvbtn"] ;?> </FONT> &nbsp;POSITION</center></td>
</tr>
<tr class="listheader h">
<td>N<sup>o</sup></td>
<td>Cand.Id.</td>
<td>First Name</td>
<td>Last Name</td>
<td>Gender</td>

<td>Marks %</td>
</tr>

<?php
$i=1;
while($row=mysql_fetch_array($rz)) 
{
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>
<tr class="<?php if(isset($classname)) echo $classname;?> h">
<td class="h"><?php echo "&nbsp;&nbsp;".$i; ?></td>

<td class="h"><?php echo "&nbsp;&nbsp;".$row["CandId"]; ?></td>
<td class="h"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["fname"]."&nbsp;&nbsp;&nbsp;";  ?></td>
<td class="h"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["lname"]."&nbsp;&nbsp;&nbsp;";  ?></td>
<td class="h"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $row["gender"]."&nbsp;&nbsp;&nbsp;";  ?></td>
<!--<td class="h"><?php // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ". $row["written"]."&nbsp;&nbsp;&nbsp;";  ?></td>
<td class="h"><?php // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ". $row["interview"]."&nbsp;&nbsp;&nbsp;";  ?></td> -->
<td class="h"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ". $row["Average"]."&nbsp;&nbsp;&nbsp;";  ?></td>


</tr>
<?php
$i++;
}
?>

<tr class="listheader">
<td colspan="6"><input type="button" name="update" value="Edit" onClick="setUpdateProd();" /> <input type="button" name="delete" value="Delete"  onClick="setDeleteProd();" /></td>
</tr>
</table>




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
