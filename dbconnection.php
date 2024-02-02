<?php
$con=mysqli_connect("localhost","root","","vehiclewebshowroom");
error_reporting(0);
if(!$con)
{
	die("could not connect".mysqli_error());
}
?>