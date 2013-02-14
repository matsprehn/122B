<?php
 include ('header.php');
 $user = $_POST['user'];
 $database = $_POST['database'];
 $permissions;
 $i = 0;
 $j = 0;
 $with = "";
 while ($i < 20)
 {
	if (isset($_POST[$i]))
	{
		if($_POST[$i] == "Grant")
		{
			$with = " With Grant Option";
		}
		else
		{
			$privilege[$j] =$_POST[$i];
			$j++;
		}
	}
	$i++;
}

$i = 0;
$permissions = "";

while ($i < (count($privilege)))
{
	$permissions.=", ".$privilege[$i];
	$i++;
}
$permissions = substr($permissions, 2);
//echo $permissions;

$query = "Grant ".$permissions." on ".$database.".* to ".$user.$with;
$query2 = "Revoke All Privileges on ".$database.".* from ".$user; //clean the slate;
$query3 = "Revoke Grant Option on ".$database.".* from ".$user;
echo($query2."</br>".$query3);
echo $query;

$result = mysql_query($query2, $con);
$result = mysql_query($query3, $con);
$result = mysql_query($query, $con);
if ($result != FALSE)
{
	echo ($permissions." granted to ".$user." for ".$database.$with); 
?> <!--<meta http-equiv="REFRESH" content="2;url=database.php?database=<?echo($database)?>">--><?

}
 ?>