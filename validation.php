<?php
session_start();
error_reporting(0);
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'blooddatabase');

$USER_ID =$_POST['USER_ID'];
$PASSWORD=$_POST['PASSWORD'];
$sql="select * from user where USER_ID='$USER_ID' && PASSWORD='$PASSWORD'";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
if($num == 1)
{ 
	echo "Login Successful";
	header('refresh:2;url=index.php');

}
else
{
	echo "Login not Successful try again!!!!";
	header('refresh:2;url=login.php');
}
?>