<?php
session_start();
error_reporting(0);
include("connection.php");


$BTYPE =$_POST['BTYPE'];
$AVAILABILITY=$_POST['AVAILABILITY'];
$sql="select * from blood where BTYPE='$BTYPE' && AVAILABILITY='$AVAILABILITY'";
$result=mysqli_query($connection,$sql);
$num=mysqli_num_rows($result);
if($num == 1)
{ 
	echo "Request not accepted try again!!!!";
	header('refresh:2;url=index.php');

}
else
{
	echo "Request accepted ";
	header('refresh:2;url=donor.php');
}
?>