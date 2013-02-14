<?php
 include('header.php');
 
 $result = (mysql_query("show databases",$con));
 ?>
	<div class = 'row-fluid'>
	<div class = 'span2 bs-docs-sidebar'>
	<ul class = "nav nav-list bs-docs-sidenav affix">
<?php
while ($row = mysql_fetch_array($result))
{
	echo "<li class>";
	echo("<a href ='#".$row['Database']."'>".$row['Database']."</a><br />"); 
	echo "</li>";
}
?>
	</ul>
	</div>
	<div class = 'span10'>
<?php
$result = (mysql_query("show databases",$con));
 while ($row = mysql_fetch_array($result)) 					//get databases in mysql
 {
	$database = $row['Database'];

	?>
	<h1 id ="<?echo($row['Database'])?>">
		<a href = "database.php?database=<?echo($row['Database'])?>">
			<?echo($row['Database'])?>
		</a>
	</h1>
	<?
		$query = "show tables in ".$database."";

		$table_result = (mysql_query($query, $con));
		mysql_select_db($database, $con);
		while ($dbrow = mysql_fetch_array($table_result)) 		//get tables in database
		{
	
			$table = $dbrow["Tables_in_".$database];
			echo("<h5><a href ='table.php?table=".$table."&database=".$database."'>".$table."</a></h2><br />");
			$query2 = "show columns in ".$table;
			$column_result = (mysql_query($query2, $con));
			?>
			<table class = 'table table-hover table-condensed'><thead><tr>
			<th>Field</th>
			<th>Type</th>
			<th>Null</th>
			<th>Key</th>
			<th>Default</th>
			<th>Extra</th>
			</tr></thead><tbody>
			
			<?php
			while ($tbrow = mysql_fetch_array($column_result)) 	// get columns in table
			{
			 echo ("<tr>
					<td><a href ='column.php?column=".$tbrow['Field']."&table=".$table."&database=".$database."'>".$tbrow['Field']."</td>
					<td>".$tbrow['Type']."</td>
					<td>".$tbrow['Null']."</td>
					<td>".$tbrow['Key']."</td>
					<td>".$tbrow['Default']."</td>
					<td>".$tbrow['Extra']."</td>
					</tr>");
			}
			echo("</tbody></table>");
		}
	
 }
 	echo ('</div></div></div></div>');

?>