<?php
session_start();
$conn = mysql_connect("localhost","root","");
mysql_select_db("recruitment",$conn);
?>
<link rel="stylesheet" type="text/css" href="styles.css" />
<style type="text/css">

</style>
<?php
//
$u=$_SESSION['logged_in'];
$e=mysql_fetch_array(mysql_query("SELECT * FROM users where userName='$u'"));
$usr=$e['userId'];
//////////////////// Candidate Registration/////////////////////
     

if(isset($_POST["creg"])) 
{
if($_POST["cid"]!="" &&$_POST["fnm"]!="" && $_POST["lnm"]!=""  && $_POST["gnd"]!="") 
{
$cid=mysql_real_escape_string(htmlspecialchars($_POST["cid"]));
$fnm=mysql_real_escape_string(htmlspecialchars($_POST["fnm"]));
$lnm=mysql_real_escape_string(htmlspecialchars($_POST["lnm"]));
$gnd=mysql_real_escape_string(htmlspecialchars($_POST["gnd"]));
$pos=mysql_real_escape_string(htmlspecialchars($_POST["posit"]));
$dob=mysql_real_escape_string(htmlspecialchars($_POST["dob"]));
date_default_timezone_set("America/LosAngels");
$tm=date("H:i:s");
$dt=date("y-m-d");

$d=mysql_query("insert into candidates(CandId,fname,lname,gender,position,regdt) values('$cid','$fnm','$lnm','$gnd','$pos','$dt')");

if($d)
{
$_SESSION['success']=" Recorded well!";
//header("Location:new.php");

include("newcand.php");
}
else
{
	//echo "Fail".Mysql_error();
//$_SESSION['error']='An Error Occured';
//header("Location:matreg.php");

include("newcand.php");
}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:matreg.php");
include("newcand.php");
}
}



/////////////////////////Written Exam Marks Registration/////////////////////
     

if(isset($_POST["mreg"])) 
{
if($_POST["cid"]!="" &&$_POST["mks"]!=""&& $_POST["max"]!="") 
{
$cid=mysql_real_escape_string(htmlspecialchars($_POST["cid"]));
$mks=mysql_real_escape_string(htmlspecialchars($_POST["mks"]));
$excat="Written";
$dt=date("y-m-d");
$max=mysql_real_escape_string(htmlspecialchars($_POST['max']));

$tst=mysql_fetch_array(mysql_query("select position from candidates where CandId='" . $_POST["cid"]. "'"));
$p=$tst['position'];

if($mks<0 || $mks>$max)
{
$_SESSION['error']='Entered marks are out of the range, should be between 0 and '.$max.'!!!';
//header("Location:matreg.php");
include("marksreg.php");
exit();
}

else
{
$ex=mysql_query("select CandId,examcat from results where CandId='" . $_POST["cid"]. "' and examcat='$excat'");
$n=mysql_num_rows($ex);
if($n==1)
{
$row=mysql_fetch_array($ex);
$_SESSION['error']="Record Exists!!!";
include("marksreg.php");
exit();
}
else
{
$d=mysql_query("insert into results(CandId,Marks,examcat,regdt) values('$cid','$mks','$excat','$dt')");

$exinfosel=mysql_query("select * from examinfo where examcat='" . $_POST["excat"]. "' and regdt='" . date("y-m-d")."' and maxim='" . $_POST["max"]."' and pozit='" . $tst['position']."' ");
$nm=mysql_num_rows($exinfosel);
if($nm==0)
{  
$examinfo=mysql_query("insert into examinfo(examcat,regdt,maxim,pozit) values('$excat','$dt','$max','$p')");}
if($d)
{
$_SESSION['success']=" Recorded well!";
//header("Location:new.php");

include("mksregfrm.php");
exit();
}
else
{
	echo "Fail".Mysql_error();
//$_SESSION['error']='An Error Occured';
//header("Location:matreg.php");

//include("mksregfrm.php");
}}}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:matreg.php");
include("mksregfrm.php");
}
}

/////////////////////////Interview Exam Marks Registration/////////////////////
     

if(isset($_POST["mregi"])) 
{
if($_POST["cid"]!="" &&$_POST["mks"]!=""&& $_POST["max"]!="") 
{
$cid=mysql_real_escape_string(htmlspecialchars($_POST["cid"]));
$mks=mysql_real_escape_string(htmlspecialchars($_POST["mks"]));
$excat="Interview";
$dt=date("y-m-d");
$max=mysql_real_escape_string(htmlspecialchars($_POST['max']));

$tst=mysql_fetch_array(mysql_query("select position from candidates where CandId='" . $_POST["cid"]. "'"));
$p=$tst['position'];

if($mks<0 || $mks>$max)
{
$_SESSION['error']='Entered marks are out of the range, should be between 0 and '.$max.'!!!';
//header("Location:matreg.php");
include("mksregfrmi.php");
exit();
}

else
{
$ex=mysql_query("select CandId,examcat from results where CandId='" . $_POST["cid"]. "' and examcat='$excat'");
$n=mysql_num_rows($ex);
if($n==1)
{
$row=mysql_fetch_array($ex);
$_SESSION['error']="Record Exists!!!";
include("mksregfrmi.php");
exit();
}
else
{
$d=mysql_query("insert into results(CandId,Marks,examcat,regdt) values('$cid','$mks','$excat','$dt')");

$exinfosel=mysql_query("select * from examinfo where examcat='" . $_POST["excat"]. "' and regdt='" . date("y-m-d")."' and maxim='" . $_POST["max"]."' and pozit='" . $tst['position']."' ");
$nm=mysql_num_rows($exinfosel);
if($nm==0)
{  
$examinfo=mysql_query("insert into examinfo(examcat,regdt,maxim,pozit) values('$excat','$dt','$max','$p')");}
if($d)
{
$_SESSION['success']=" Recorded well!";
//header("Location:new.php");

include("mksregfrmi.php");
exit();
}
else
{
	echo "Fail".Mysql_error();
//$_SESSION['error']='An Error Occured';
//header("Location:matreg.php");

//include("mksregfrm.php");
}}}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:matreg.php");
include("mksregfrmi.php");
}
}



//////////////////// USER ACCOUNT CREATION///////////////////
                                                      

if(isset($_POST["uza"])) 
{
if($_POST["fnm"]!="" && $_POST["lnm"]!=""&& $_POST["uznm"]!=""&& $_POST["pwd"]!="") 
{
$fname=mysql_real_escape_string(htmlspecialchars($_POST["fnm"]));
$lname=mysql_real_escape_string(htmlspecialchars($_POST["lnm"]));
$user=mysql_real_escape_string(htmlspecialchars($_POST["uznm"]));
$pass=mysql_real_escape_string(htmlspecialchars($_POST["pwd"]));

$uz=mysql_query("insert into users(fname,lname,username,password) values('$fname','$lname','$user','$pass')");

if($uz)
{
$_SESSION['success']="Account created successfully!!";
//header("Location:newuser.php");
include("userreg.php");
}
else
{
$_SESSION['error']='An Error Occured !!! ';
//header("Location:sold.php");
echo Mysql_error();
include("userreg.php");
}
}
else
{
$_SESSION['error']='Fill in All Fields';
//header("Location:sold.php");
include("userreg.php");
}
}
?>