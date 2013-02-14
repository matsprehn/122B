<?php
include ('header.php');
$user = $_POST["user"];
//echo $user;
$query = "DROP USER ".$user;
//echo $query."<br/>";

$result = mysql_query($query, $con);

if ($result == FALSE)
{
	echo "something went wrong. User not deleted";
}

else
{
	echo "user ".$user." deleted from the database";
}




?>

<meta http-equiv="REFRESH" content="2;url=listusers.php">