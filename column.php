<?
include('header.php');
$table = $_GET["table"];
$database = $_GET["database"];
$column = $_GET["column"];
echo "<h1>".$table.".".$column."</h1></br>";
$allUsers[0] = "";


$query = "select * from information_schema.column_privileges where table_name = '".$table."' AND column_name = '".$column."' AND table_schema = '".$database."'";
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

	while ($row = mysql_fetch_array($result))
	{
		if ($currentUser != $row['GRANTEE']) //if the user changes
		{
			if($currentUser == NULL)		//if currrentUser was never set
			{
				$allUsers[$i] = $row['GRANTEE'];
				$i++;
				$currentUser = $row['GRANTEE'];
				$grantable = $row['IS_GRANTABLE'];?>
				<tr><td><a href = "addToColumn.php?user=<?echo($currentUser);?>&table=<?echo($table);?>&database=<?echo($database);?>&column=<?echo($column)?>&exists=TRUE"><?echo(str_replace("'", "", $currentUser));?></td>
				<td><?echo($row['PRIVILEGE_TYPE']);
			}
			else
			{
				?></td><td><?echo($grantable);?></td>
				<?$currentUser = $row['GRANTEE'];
				  $allUsers[$i] = $row['GRANTEE'];
				  $i++;?>
				<tr><td><a href = "addToColumn.php?user=<?echo($currentUser);?>&table=<?echo($table);?>&database=<?echo($database);?>&column=<?echo($column)?>&exists=TRUE"><?echo(str_replace("'", "", $currentUser));?></td>
				<td><?echo($row['PRIVILEGE_TYPE']);
				$grantable = $row['IS_GRANTABLE'];
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
	if(!in_array($users, $allUsers))
	{
	?><a href ="addToColumn.php?user=<?echo($users);?>&database=<?echo($database);?>&table=<?echo($table);?>&column=<?echo($column)?>"><?echo($row["User"]."@".$row["Host"]);?></a>
	<br><?php
	}
 }
 ?>