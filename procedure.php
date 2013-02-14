<?php
 include ('header.php'); 
 $procedure = $_GET['procedure'];
 $database = $_GET['database'];
 $query = "select * from mysql.procs_priv WHERE Db = '".$database."' AND Routine_name ='".$procedure."'";
$allUsers[0] = "";
//echo ($query);
 $result = mysql_query($query, $con);
if ($result == FALSE || mysql_num_rows($result) < 1) //empty result set
{
	echo "no unique permissions for this table";
}
else
{
	?>		<table class = 'table table-hover table-condensed'><thead><tr>
			<th>GRANTEE</th>
			<th>PRIVILEGES</th>
			</tr></thead><tbody>
	<?php
	$currentUser = NULL;
	$i = 0;

	while ($row = mysql_fetch_array($result))
	{
		$allUsers[$i] = "'".$row['User']."'@'".$row['Host']."'";
		$currentUser = $allUsers[$i];
		$privileges = $row['Proc_priv'];?>
		<tr>
			<td>
				<a href = "addToProcedure.php?user=<?echo($currentUser)?>&database=<?echo($database)?>&procedure=<?echo($procedure)?>&exists=TRUE">
					<?echo(str_replace("'", "", $currentUser))?>
				</a>
			</td>
			<td>
				<?echo($privileges)?>
			</td>
		</tr>
		<?
					
		$i++;
	}
	?></tbody></table><?
}
?>
</br></br><h3>Click on a name below to add user to Table</h3>
<? 
$query = "select * from mysql.user where user != ''";
$result = (mysql_query($query, $con));

while ($row = mysql_fetch_array($result))
 {
	$users = "'".$row["User"]."'@'".$row["Host"]."'";
	$user = $row["User"];
	$host = $row["Host"];
	if(!in_array($users, $allUsers))
	{
	?><a href ="addToProcedure.php?user=<?echo($users);?>&database=<?echo($database);?>&procedure=<?echo($procedure);?>"><?echo($row["User"]."@".$row["Host"]);?></a>
	<br><?php
	}
 }
 ?>