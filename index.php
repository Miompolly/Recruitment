<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recruitment</title>
<link rel="stylesheet" href="istyles.css" type="text/css">
<style>
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
width:280px;
height:30px;
text-align:center;
font-size:24px;
border-radius:4px;
border:1px solid gray;
font-family:"Trebuchet MS";
color:black;
}
input[type="submit"]
{
width:280px;
height:40px;
text-align:center;
font-size:24px;
font-weight:bold;
border-radius:4px;
border:1px solid gray;
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
</style>
</style>
</head>

<body>

<center>
<div id="container">
<br>
<div id="hd">       </div>
<hr>
<div id="bd">

<br><br><br><br>
<form action="login.php" method="POST">
<table border="0" align="center" width="50%" class="tbl_log">
<tr>
<td align="center"><font size="6">Sign in below<hr color="gray"></font></td>

</tr> <tr>
<td align="center"><i>Username</i></td></tr><tr>
<td align="center"><input type="text" name="user" placeholder="Username"/></td></tr><tr>
<td align="center"><i>Password</i></td></tr><tr>
<td align="center"><input type="password" name="pass" placeholder="Username"/></td></tr>
<tr>
<td align="center"><input type="submit" name="lgn" value="Login"/></td></tr>
<tr>
<td align="center">  
 <?php
	if(isset($_SESSION['error']))
	{
	?>

<input name="submit" type="send" value="<?php echo $_SESSION['error'];?>" disabled="disabled" />

<?php
	}
	?>
</td></tr>
</table>
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
