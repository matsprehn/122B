<?php
include('header.php');
$database = $_GET["database"];
$query = "select * from mysql.db WHERE Db = '".$database."'";
echo "<h1>".$database."</h1></br>";
echo $query;
$result = mysql_query($query, $con);
$allUsers[0] = "";


if ($result == FALSE || mysql_num_rows($result) < 1) //empty result set
{
	echo "no unique permissions for this table";
}
else
{
	$query2 = "DESCRIBE mysql.db";
	//echo $query2."</br>";
	$result2 = mysql_query($query2, $con);
	$i = 0;
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
			//echo($privilegeName[$i])."<br>";
			$i++;
		}
	}
?>
<table class = 'table table-hover table-condensed'><thead><tr>
			<th>User</th>
			<th>PRIVILEGES</th>
			</tr></thead><tbody>
<?
$i =0;

$privileges;
	while($row = mysql_fetch_array($result))
	{
		$j =0;
		$allUsers[$i] = "'".$row[2]."'@'".$row[0]."'";
		$userPrint[$i] = $row[2]."@".$row[0];
		$permissions[$i][$j]= $row[3]; $j++;
		$permissions[$i][$j]= $row[4]; $j++;
		$permissions[$i][$j]= $row[5]; $j++;
		$permissions[$i][$j]= $row[6]; $j++;
		$permissions[$i][$j]= $row[7]; $j++;
		$permissions[$i][$j]= $row[8]; $j++;
		$permissions[$i][$j]= $row[9]; $j++;
		$permissions[$i][$j]= $row[10]; $j++;
		$permissions[$i][$j]= $row[11]; $j++;
		$permissions[$i][$j]= $row[12]; $j++;
		$permissions[$i][$j]= $row[13]; $j++;
		$permissions[$i][$j]= $row[14]; $j++;
		$permissions[$i][$j]= $row[15]; $j++;
		$permissions[$i][$j]= $row[16]; $j++;
		$permissions[$i][$j]= $row[17]; $j++;
		$permissions[$i][$j]= $row[18]; $j++;
		$permissions[$i][$j]= $row[19]; $j++;
		$permissions[$i][$j]= $row[20]; $j++;
		$i++;
	}
	$i = 0;
	while ($i < count($allUsers))
	{?>
		<tr><td><?echo($userPrint[$i])?></td>
		<td>
		<? 
		$j = 0;
		while ($j < count($permissions[$i]))
		{
			if ($permissions[$i][$j] == 'Y')
			{
				echo($privilegeName[$j].", ");
			}
			$j++;
		}
		?></td></tr><?
		$i++;
	}
?>
</tbody></table>

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
	?><a href ="addToDatabase.php?user=<?echo($users);?>&database=<?echo($database);?>"><?echo($row["User"]."@".$row["Host"]);?></a>
	<br><?php
	}
 }
 ?>
			
			
<?
}?>