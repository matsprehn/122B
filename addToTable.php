<?php
 include('header.php');
 $user = $_GET['user'];
 $database = $_GET['database'];
 $table = $_GET['table'];
 $i = 0;
 $query = "select PRIVILEGE_TYPE from information_schema.table_privileges where table_name = '".$table."' AND Grantee = \"".$user."\"";
 $grant = "select IS_GRANTABLE from information_schema.table_privileges where table_name = '".$table."' AND Grantee = \"".$user."\"";
 $result = mysql_query($query, $con);
 echo ($grant);
function getPrivilege($string, $query, $con)
{

	$result = mysql_query($query, $con);
	if ($result != FALSE)
	{
		
		//echo ("okay");
		while ($row = mysql_fetch_array($result))
		{
			//echo $string;
			if (strcmp($string, strtolower($row[0])) == 0)
			{
				echo "checked";
				break;
			}
		}
	}
}
 
 ?>
 <h1> Permissions for <?echo($user)?> on <?echo($database.'.'.$table)?></h1>

<table class = 'table table-hover table-condensed multi'><thead><tr>
<th>PRIVILEGE</th>
<th>ALLOWED</th>
</tr></thead><tbody>
  <form action="completeAddToTable.php" method="post">
  <tr><td>select</td><td><input type="checkbox" name="select" value="select" 				<?getPrivilege("select", $query, $con)?>></td></tr>
  <tr><td>insert</td><td><input type="checkbox" name="insert" value="insert" 				<?getPrivilege("insert", $query, $con)?>></td></tr>
  <tr><td>update</td><td><input type="checkbox" name="update" value="update" 				<?getPrivilege("update", $query, $con)?>></td></tr>
  <tr><td>delete</td><td><input type="checkbox" name="delete" value="delete" 				<?getPrivilege("delete", $query, $con)?>></td></tr>
  <tr><td>create</td><td><input type="checkbox" name="create" value="create" 				<?getPrivilege("create", $query, $con)?>></td></tr>
  <tr><td>drop</td><td><input type="checkbox" name="drop" value="drop" 						<?getPrivilege("drop", $query, $con)?>></td></tr>
  <tr><td>references</td><td><input type="checkbox" name="references" value="references" 	<?getPrivilege("references", $query, $con)?>></td></tr>
  <tr><td>index</td><td><input type="checkbox" name="index" value="index" 					<?getPrivilege("index", $query, $con)?>></td></tr>
  <tr><td>alter</td><td><input type="checkbox" name="alter" value="alter" 					<?getPrivilege("alter", $query, $con)?>></td></tr>
  <tr><td>create view</td><td><input type="checkbox" name="create_view" value="create view" <?getPrivilege("create view", $query, $con)?>></td></tr>
  <tr><td>show view</td><td><input type="checkbox" name="show_view" value="show view" 		<?getPrivilege("show view", $query, $con)?>></td></tr>
  <tr><td>trigger</td><td><input type="checkbox" name="trigger" value="trigger" 			<?getPrivilege("trigger", $query, $con)?>></td></tr>
  <tr><td>Grant Option</td><td><input type ="checkbox" name ="grant_option" value = "grant option"<?getPrivilege("yes", $grant, $con)?>></td></tr>
  </tbody></table>
  <input type = "hidden" name = "database"value = "<?echo($database)?>">
  <input type = "hidden" name = "table" value = "<?echo($table)?>">
   <input type = "hidden" name = "user" value = "<?echo($user)?>">
  <input type = "submit" value = "submit">
  </form>
<?
if (isset($_GET["exists"]))
{
	?>
	<div class = "pull-right">
		<form action = "completeAddToTable.php" method = "post">
		<input type = "hidden" name = "dropUser" value = "dropUser">
		<input type = "hidden" name = "database"value = "<?echo($database)?>">
		<input type = "hidden" name = "table" value = "<?echo($table)?>">
		<input type = "hidden" name = "user" value = "<?echo($user)?>">
		<input type = "submit" value = "REMOVE USER FROM TABLE">
		</form>
	</div>
	<?
}
?>
