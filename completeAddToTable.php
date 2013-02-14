<?php
 include ('header.php');
 $user = $_POST['user'];
 $database = $_POST['database'];
 $table = $_POST['table'];
 $permissions;
 $i = 0;
 $grant_option = "";
 if (isset($_POST['dropUser']))
 {
	$query2 = "Revoke All Privileges on ".$database.".".$table." from ".$user; //clean the slate;
	echo $query2;
	$query3 = "Revoke Grant Option on ".$database.".".$table." from ".$user;
	echo $query3;
	$result = mysql_query($query2, $con);
	$result = mysql_query($query3, $con);
	?><meta http-equiv="REFRESH" content="2;url=table.php?database=<?echo($database)?>&table=<?echo($table)?>"><?
 }
 else
 {
	 if (isset($_POST['select']))
	 {
		$permission[$i] = $_POST['select'];
		$i++;
	 }
	 if (isset($_POST['insert']))
	 {
	 $permission[$i] = $_POST['insert'];
		$i++;
	 }
	 if (isset($_POST['update']))
	 {
	 $permission[$i] = $_POST['update'];
		$i++;
	 }
	 if (isset($_POST['delete']))
	 {
	 $permission[$i] = $_POST['delete'];
		$i++;
	 }
	 if (isset($_POST['create']))
	 {
	 $permission[$i] = $_POST['create'];
		$i++;
	 }
	 if (isset($_POST['drop']))
	 {
	 $permission[$i] = $_POST['drop'];
		$i++;
	 }
	 if (isset($_POST['references']))
	 {
	 $permission[$i] = $_POST['references'];
		$i++;
	 }
	 if (isset($_POST['index']))
	 {
	 $permission[$i] = $_POST['index'];
		$i++;
	 }
	 if (isset($_POST['alter']))
	 {
	 $permission[$i] = $_POST['alter'];
		$i++;
	 }
	 if (isset($_POST['create_view']))
	 {
	 $permission[$i] = $_POST['create_view'];
		$i++;
	 }
	 if (isset($_POST['show_view']))
	 {
	 $permission[$i] = $_POST['show_view'];
	 $i++;
	 }
	  if (isset($_POST['trigger']))
	 {
		$permission[$i] = $_POST['trigger'];
	 }
	 if (isset($_POST['grant_option']))
	{
		$grant_option = "WITH GRANT OPTION";
	}
	 
	 $i = 0;
	 if (isset($permission))
	 {
		$j = count($permission);
	}

	 $part = "";
	 if (isset($j))
	 {
		 while ($i < $j)
		 {
			$part .= $permission[$i];
			echo ($permission[$i]."<br/>");
			if ($i+1 != $j)
			{
				$part .= ', ';
			}
		 
			$i++;
		 }
	}
	 //echo($part);
	 
	 if (isset($permission))
	 {
		 $query = "Grant ".$part." on ".$database.".".$table." to ".$user." ".$grant_option;
		 $query2 = "Revoke All Privileges on ".$database.".".$table." from ".$user; //clean the slate;
		 $query3 = "Revoke Grant Option on ".$database.".".$table." from ".$user;
		 echo ($query."<br />");
		 echo ($query2."<br/>");
		 echo ($query3);
		 $result2 = mysql_query($query2, $con); //revoke all access, then grant access based on checkmarks
		 $result3 = mysql_query($query3, $con);
		 $result = mysql_query($query, $con);
		 if (mysql_error($con))
		 {
			echo ("user could not be added");
		 }
		 else
		 {
			echo ("user ".$user." added to the table");
		 }
	}
	else
		echo ("You didn't select any permissions!");

 ?>
 
	<meta http-equiv="REFRESH" content="2;url=table.php?database=<?echo($database)?>&table=<?echo($table)?>">
 <?
 }
 ?>