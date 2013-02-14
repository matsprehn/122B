<?php
 include ('header.php');
 $user = $_POST['user'];
 $database = $_POST['database'];
 $procedure = $_POST['procedure'];
 $permissions;
 $i = 0;
 $grant_option = "";
 if (isset($_POST['dropUser']))
 {
	//echo $query2;
	$query2 = "Revoke ALL PRIVILEGES on PROCEDURE ".$database.".".$procedure." from ".$user; //clean the slate;
	$query3 = "Revoke Grant Option on PROCEDURE ".$database.".".$procedure." from ".$user;
	$result = mysql_query($query2, $con);
	$result = mysql_query($query3, $con);
	echo ("User sucessfully removed");
	?><meta http-equiv="REFRESH" content="2;url=procedure.php?database=<?echo($database)?>&procedure=<?echo($procedure)?>"><?
 }
 else
 {
	 if (isset($_POST['execute']))
	 {
		$permission[$i] = $_POST['execute'];
		$i++;
	 }
	 if (isset($_POST['alter_routine']))
	 {
		$permission[$i] = $_POST['alter_routine'];
		$i++;
	 }
	 if (isset($_POST['grant_option']))
	{
		$grant_option = "WITH GRANT OPTION";
	}
	if (isset($permission))
	{
		$j = count($permission);
	}
	$i = 0;
	$part = "";
	 if (isset($j))
	 {
		 while ($i < $j)
		 {
			$part .= $permission[$i];
			//echo ($permission[$i]."<br/>");
			if ($i+1 != $j)
			{
				$part .= ', ';
			}
		 
			$i++;
		 }
	}

		 if (isset($permission))
		 {
			 $query = "Grant ".$part." on PROCEDURE ".$database.".".$procedure." to ".$user." ".$grant_option;
			 $query2 = "Revoke ALL PRIVILEGES on PROCEDURE ".$database.".".$procedure." from ".$user; //clean the slate;
			 $query3 = "Revoke Grant Option on PROCEDURE ".$database.".".$procedure." from ".$user;
			//echo ($query."<br />");
			//echo ($query2."<br/>");
			//echo ($query3);
			$result2 = mysql_query($query2, $con); //revoke all access, then grant access based on checkmarks
			$result3 = mysql_query($query3, $con);
			$result = mysql_query($query, $con);
			 if (mysql_error($con))
			 {
				echo ("user could not be added");
				echo "<br/>".$query;
			 }
			 else
			 {
				echo ("user ".$user." added to the procedure");
			 }
		}
		else
			echo ("You didn't select any permissions!");
		?><meta http-equiv="REFRESH" content="2;url=procedure.php?database=<?echo($database)?>&procedure=<?echo($procedure)?>"><?

}