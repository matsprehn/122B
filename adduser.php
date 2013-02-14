<?php
 include('header.php');
 if(!isset($_POST['userName']))
 {
	echo "no username specified!";
	?><meta http-equiv="REFRESH" content="2;url=listusers.php"><?
 }
 else
 {
	 $userName = $_POST['userName'];
	 
	 
	 if (!isset($_POST['password']))
	 {
		$password = "";
	 }
	 else
	 {
		$password = $_POST['password'];
	 }
	 //echo ($_POST['hostName']);
	 if(!isset($_POST['hostName']) || $_POST['hostName'] == NULL) 
	 {
		$hostName = '%'; //if not specified make it for all domains
	}
	else
	{
		$hostName = $_POST['hostName'];
	}
	$query = "Select User, Host from mysql.user WHERE User ='".$userName."' AND Host = '".$hostName."'";
	//echo ("<br><br>".$query."<br>");
	$result = mysql_query($query, $con);
	if (mysql_num_rows($result) > 0) //if user exists
	{
		echo "This user already exists!";
		?><meta http-equiv="REFRESH" content="2;url=listusers.php"><?
	}
	else
	{
		//echo($userName."</br>".$hostName."</br>".$password);
		if(isset($_Post['password']))
		{
			$query = "CREATE USER '".$userName."'@'".$hostName."' IDENTIFIED BY '".$password."'";
		}
		else
		{
			$query = "CREATE USER '".$userName."'@'".$hostName."'";
			//echo ($query);
		}
		$ok = mysql_query($query, $con);
		//echo ("</br></br>".$query);
		echo("user created successfully. Redirecting...");
		?><meta http-equiv="REFRESH" content="2;url=listusers.php"><?
	}
}
 