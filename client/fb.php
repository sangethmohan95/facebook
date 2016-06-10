<?php
$username="root";
$pwd="";
$host="localhost";
$db="fb";
$name=$_POST['firstname'];
$sname=$_POST['srname'];
$email=$_POST['num'];
$remail=$_POST['num2'];
$pswd=$_POST['pwd'];
$sel1=$_POST['s1'];
$sel2=$_POST['s2'];
$sel3=$_POST['s3'];
$gen=$_POST['ro1'];

$conn=mysqli_connect($host,$username,$pwd,$db)or die("error");
mysqli_query($conn,"insert into signup(firstname,surname,email,reenteremail,pwd,day,month,year,gender) values('$name','$sname','$email', '$remail' , '$pswd' , $sel1 , '$sel2', $sel3 ,'$gen')") or die("query error");
header("location:fbhome.html");


?>
