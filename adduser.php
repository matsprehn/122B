<?php
 include('header.php');
 $userName = $_POST['userName'];
 $hostName = $_POST['hostName'];
 $password = $_POST['password'];
 
 if($hostName ==NULL) 
 {
	$hostName = '%'; //if not specified make it for all domains
}
$query = "Select User, Host from mysql.user WHERE User ='".$userName."' AND Host = '".$hostName."'";
//echo ("<br><br>".$query."<br>");
$result = mysql_query($query, $con);
if (mysql_num_rows($result) > 0) //if user exists
{
	echo "This user already exists!";
	?><meta http-equiv="REFRESH" content="2;url=newuser.php"><?
}
else
{
	//echo($userName."</br>".$hostName."</br>".$password);
	$query = "CREATE USER '".$userName."'@'".$hostName."' IDENTIFIED BY '".$password."'";
	$ok = mysql_query($query, $con);
	//echo ("</br></br>".$query);
	$echo("user created successfully. Redirecting...");
	?><meta http-equiv="REFRESH" content="2;url=listusers.php"><?
}
 