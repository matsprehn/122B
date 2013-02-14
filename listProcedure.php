<?php
 include ('header.php');
 $query = "select * from information_schema.routines";
 $result = (mysql_query($query, $con));
 $i = 0;
?>
<h1> Procedures </h1>
<table class = 'table table-hover table-condensed'><thead><tr>
			<th>Procedure</th>
			<th>Database</th>
			<th>Type</th>
			</tr></thead><tbody>
<?
while ($row = mysql_fetch_array($result))
{
	$procedure = $row[0];
	$type = $row['ROUTINE_TYPE'];
	$database = $row[2];
	?>	<tr>
			<td>
				<a href = "procedure.php?procedure=<?echo($procedure)?>&database=<?echo($database)?>&routine=<?echo($type)?>">
					<?echo($procedure)?>
				</a>
			</td>
			<td><?echo($database)?></td>
			<td><?echo($type)?></td>
		</tr><?
}
?>
</tbody></table>