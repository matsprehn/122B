<?php
 include('header.php');
 $user = $_GET['user'];
 $database = $_GET['database'];
 $table = $_GET['table'];
 $column = $_GET['column'];
 $i = 0;
 $query = "select PRIVILEGE_TYPE from information_schema.column_privileges where table_name = '".$table."' AND Grantee = \"".$user."\" AND column_name ='".$column."'";
 $grant = "select IS_GRANTABLE from information_schema.column_privileges where table_name = '".$table."' AND Grantee = \"".$user."\" AND column_name ='".$column."'";
 $result = mysql_query($query, $con);
 //echo ($grant);
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
  <h1> Permissions for <?echo($user)?> on <?echo($database.'.'.$table.'.'.$column)?></h1>

<table class = 'table table-hover table-condensed multi'><thead><tr>
<th>PRIVILEGE</th>
<th>ALLOWED</th>
</tr></thead><tbody>
  <form action="completeAddToColumn.php" method="post">
  <tr><td>select</td><td><input type="checkbox" name="select" value="select" 				<?getPrivilege("select", $query, $con)?>></td></tr>
  <tr><td>insert</td><td><input type="checkbox" name="insert" value="insert" 				<?getPrivilege("insert", $query, $con)?>></td></tr>
  <tr><td>update</td><td><input type="checkbox" name="update" value="update" 				<?getPrivilege("update", $query, $con)?>></td></tr>
  <tr><td>Grant Option</td><td><input type ="checkbox" name ="grant_option" value = "grant option"<?getPrivilege("yes", $grant, $con)?>></td></tr>
  </tbody></table>
  <input type = "hidden" name = "database"value = "<?echo($database)?>">
  <input type = "hidden" name = "table" value = "<?echo($table)?>">
   <input type = "hidden" name = "user" value = "<?echo($user)?>">
   <input type = "hidden" name = "column" value = "<?echo($column)?>">
  <input type = "submit" value = "submit">
  </form>
  <?
if (isset($_GET["exists"]))
{
	?>
	<div class = "pull-right">
		<form action = "completeAddToColumn.php" method = "post">
		<input type = "hidden" name = "dropUser" value = "dropUser">
		<input type = "hidden" name = "database"value = "<?echo($database)?>">
		<input type = "hidden" name = "table" value = "<?echo($table)?>">
		<input type = "hidden" name = "user" value = "<?echo($user)?>">
		<input type = "hidden" name = "column" value = "<?echo($column)?>">
		<input type = "submit" value = "REMOVE USER FROM COLUMN">
		</form>
	</div>
	<?
}
?>