<?php
 include('header.php');
 $user = $_GET['user'];
 $database = $_GET['database'];
 if(isset($_GET['name']) && isset($_GET['domain']))
 {
	$name = $_GET['name'];
	$domain = $_GET['domain'];
	 $query = "select Select_priv, Insert_priv, Update_priv, Delete_priv, Create_priv, Drop_priv, Grant_priv, References_priv, Index_priv, Alter_priv, Create_tmp_table_priv, Lock_tables_priv, Create_view_priv, Show_view_priv, Create_routine_priv, Alter_routine_priv, Execute_priv, Event_priv, Trigger_priv from mysql.db WHERE Db ='".$database."' AND User ='".$name."' AND Host ='".$domain."'";
 }
 else $query = "";
//echo $query;
 function getPrivilege($index, $query, $con)
{
	$result = mysql_query($query, $con);
	if ($result != FALSE)
	{
	
		while ($row = mysql_fetch_array($result))
		{
			if (($row[$index]) == "Y")
			{
				echo "checked";
				break;
			}
			else
			{
				echo "unchecked";
			}
		}		
	}
}

$query2 = "DESCRIBE mysql.db";
$result2 = mysql_query($query2, $con);
$i = 0;
?>
<h1> Permissions for <?echo($user)?> on <?echo($database)?></h1>
<table class = 'table table-hover table-condensed multi'><thead><tr>
<th>PRIVILEGE</th>
<th>ALLOWED</th></tr></thead><tbody>
<form action = "completeAddToDatabase.php" method = "post">
<?
while ($row = mysql_fetch_array($result2))
{
	//echo $row['Field']."</br>";
	if ($row[0] == "Host" || $row[0] == "Db" || $row[0] == "User")
	{
		//echo "true";
	}
	else
	{
		$privilegeName[$i] = str_replace("_priv", "", $row[0]);
		if ($i == 10)
		{
			$privilegeName[$i] = "Create Temporary Tables";
		}
		?><tr>
			<td><?echo($privilegeName[$i])?></td>
			<td><input type="checkbox" 
				name="<?echo($i)?>" value="<?echo(str_replace("_"," ", $privilegeName[$i]))?>" <?getPrivilege($i, $query, $con)?>></td></tr>
		
		<?
		$i++;
	}
}
?>
</tbody></table>
  <input type = "hidden" name = "database"value = "<?echo($database)?>">
   <input type = "hidden" name = "user" value = "<?echo($user)?>">
  <input type = "submit" value = "submit">
  </form>
<?
if (isset($_GET['name']))
{
	?>
	<div class = "pull-right">
		<form action = "completeAddToDatabase.php" method = "post">
		<input type = "hidden" name = "dropUser" value = "dropUser">
		<input type = "hidden" name = "database"value = "<?echo($database)?>">
		<input type = "hidden" name = "user" value = "<?echo($user)?>">
		<input type = "submit" value = "REMOVE USER FROM TABLE">
		</form>
	</div>
	<?
}
?>