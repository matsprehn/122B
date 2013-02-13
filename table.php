<?php
 include('header.php');
$table = $_GET["table"];
$database = $_GET["database"];
echo "<h1>".$table."</h1></br>";


$query = "select * from information_schema.table_privileges where table_name = '".$table."'";
//echo $query;
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
			<th>Grantable?</th>
			</tr></thead><tbody>
	<?php
	$currentUser = NULL;
	$i = 0;
	$allUsers;
	while ($row = mysql_fetch_array($result))
	{
		if ($currentUser != $row['GRANTEE'])
		{
			if($currentUser == NULL)
			{
				$allUsers[$i] = $row['GRANTEE'];
				$i++;
				$currentUser = $row['GRANTEE'];?>
				<tr><td><?echo(str_replace("'", "", $currentUser));?></td>
				<td><?echo($row['PRIVILEGE_TYPE']);
			}
			else
			{
				?></td><td><?echo($row['IS_GRANTABLE']);?></td>
				<?$currentUser = $row['GRANTEE'];
				  $allUsers[$i] = $row['GRANTEE'];
				  $i++;?>
				<tr><td><?echo($currentUser);?></td>
				<td><?echo($row['PRIVILEGE_TYPE']);
			}

		}
		else
		{
			echo(", ".$row['PRIVILEGE_TYPE']);
		}
		$last = $row['IS_GRANTABLE'];
	}
	?></td><td><?echo($last);?></tbody></table><?
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
	?><a href ="addToTable.php?user=<?echo($users);?>&database=<?echo($database);?>&table=<?echo($table);?>"><?echo($row["User"]."@".$row["Host"]);?></a>
	<br><?php
	$i++;
 }