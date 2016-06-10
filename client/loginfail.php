<?php
$username="root";
$pwd="";
$host="localhost";
$db="fb";
$email=$_POST['usrname'];
$pswd=$_POST['password'];
$conn=mysqli_connect($host,$username,$pwd,$db)or die("error");
$result=mysqli_query($conn,"select * from signup where  email='$email' and pwd='$pswd'"); 
$num=mysqli_num_rows($result);
if($num==1)
{
	header("location:fbhome.html");
	
}
else {
     
     echo "login fail ";
    }
?>






