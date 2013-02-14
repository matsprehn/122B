<?php
 include('header.php');
 $user = $_GET['user'];
 $database = $_GET['database'];
 $procedure = $_GET['procedure'];
 $name = substr($user, 1, strpos($user, '@') -2);
 $host = substr($user, strpos($user,'@')+2, count($user) -2);
 //echo $name."<br/>".$host."<br/>";
 $i = 0;
 $query = "select Proc_priv from mysql.procs_priv where Db = '".$database."' AND User = '".$name."' AND Host = '".$host."' AND Routine_name ='".$procedure."'";
 $result = mysql_query($query, $con);
 //echo ($query);
function getPrivilege($string, $query, $con)
{
	$result = mysql_query($query, $con);
	if ($result != FALSE)
	{
	
		
		//echo ("okay");
		while ($row = mysql_fetch_array($result))
		{
			//echo "hell0 ";
			//echo $string." ".$row[0]." ";
			//echo $row[0];
			//echo strpos(strtolower($row[0]), $string);
			//echo $string;
			if (strpos(strtolower($row[0]), $string) !== false)
			{
				echo "checked";
				break;
			}
		}
	}
}
 
 ?>
  <h1> Permissions for <?echo($user)?> on Procedure<?echo($database.'.'.$procedure)?></h1>
  <table class = 'table table-hover table-condensed multi'><thead><tr>
<th>PRIVILEGE</th>
<th>ALLOWED</th>
</tr></thead><tbody>
  <form action="completeAddToProcedure.php" method="post">
  <tr><td>Execute</td><td><input type="checkbox" name="execute" value="execute" 					<?getPrivilege("execute", $query, $con)?>></td></tr>
  <tr><td>Alter Routine</td><td><input type="checkbox" name="alter_routine" value="alter routine" 	<?getPrivilege("alter routine", $query, $con)?>></td></tr>
  <tr><td>Grant Option</td><td><input type ="checkbox" name ="grant_option" value = "grant option"	<?getPrivilege("grant", $query, $con)?>></td></tr>
  </tbody></table>
  <input type = "hidden" name = "database"value = "<?echo($database)?>">
  <input type = "hidden" name = "procedure" value = "<?echo($procedure)?>">
  <input type = "hidden" name = "user" value = "<?echo($user)?>">
  <input type = "submit" value = "submit">
  </form>
  <?
if (isset($_GET["exists"]))
{
	?>
	<div class = "pull-right">
		<form action = "completeAddToProcedure.php" method = "post">
		<input type = "hidden" name = "dropUser" value = "dropUser">
		<input type = "hidden" name = "database"value = "<?echo($database)?>">
		<input type = "hidden" name = "procedure" value = "<?echo($procedure)?>">
		<input type = "hidden" name = "user" value = "<?echo($user)?>">
		<input type = "submit" value = "REMOVE USER FROM PROCEDURE">
		</form>
	</div>
	<?
}
?>