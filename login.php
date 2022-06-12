<?php
session_start();
$conn = mysql_connect("localhost","root","");
mysql_select_db("recruitment",$conn);
if(isset($_POST['lgn']))
{
if($_POST["user"]!="" && $_POST["pass"]!="") 
{

$d=mysql_query("select * from users where username='" . $_POST["user"]. "' and password='" . $_POST["pass"]."'");
$count=mysql_num_rows($d);
if($count==1)
{
$row=mysql_fetch_array($d);
$_SESSION['logged_in']=$row['fname'];
header("Location:success.php");
}
else
{
$_SESSION['error']='Username or Password is Wrong';
//header("Location:admin.php");
include("index.php");
}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:index.php");
include("index.php");
}}

?>