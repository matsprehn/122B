<?php
include ('header.php');
$user = $_GET["user"];
$host = $_GET["host"];
$query = "Select * from mysql.user where User ='".$user."' AND Host ='".$host."'";
$result = mysql_query($query, $con);
if ($result == FALSE || mysql_num_rows($result) < 1) //empty result set
{
	echo "User does not exist!";
}
else
{
	$row = mysql_fetch_array($result);
	$i = 3;
	?>
	<h2>Privileges for <font color = "red"><?echo($user."@".$host)?></font></h2>
	<div class ='pull-left space-me'>
	<h3> Global Privileges</h3>

	<table class = 'table table-hover table-condensed multi'><thead><tr>
				<th>PRIVILEGE</th>
				<th>ALLOWED</th>
				</tr></thead><tbody>
				<tr><td>Select_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Insert_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Update_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Delete_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Create_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Drop_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Reload_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Shutdow _priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Process_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>File_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Grant_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>References_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Index_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Alter_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Show_db_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Super_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Create_tmp_table_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Lock_tables_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Execute_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Repl_slave_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Repl_client_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Create_view_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Show_view_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Create_routine_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Alter_routine_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Create_user_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Event_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Trigger_priv:  </td><td><?echo($row[$i]);$i++;?></td></tr>
				</tbody></table>
	</div>
	<div class ='pull-left space-me'><h3>Database Privileges:</h3>
	<?
	$query = "Select * from mysql.db where User ='".$user."' AND Host ='".$host."'";
	$result = mysql_query($query, $con);
	//echo ($query);
	if ($result == FALSE || mysql_num_rows($result) < 1) //empty result set
	{
		echo "None Specified";
	}
	else
	{
		while($row = mysql_fetch_array($result))
		{
			$i = 3;?>
			<h4><?echo($row['Db']);?></h4>
			<table class = 'table table-hover table-condensed'><thead><tr>
			<th>PRIVILEGE</th>
			<th>ALLOWED</th>
			</tr></thead><tbody>
			 <tr><td>Select_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Insert_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Update_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Delete_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Create_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Drop_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Grant_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>References_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Index_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Alter_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Create_tmp_table_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Lock_tables_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Create_view_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Show_view_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Create_routine_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Alter_routine_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Execute_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Event_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 <tr><td>Trigger_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			 </tbody></table>
			 <?
		}
	}
	?>
	</div>
	<div class ='pull-left space-me'><h3>Table Privileges:</h3>
	<?
	$query = "Select * from mysql.tables_priv where User ='".$user."' AND Host ='".$host."'";
	$result = mysql_query($query, $con);
	//echo ($query);
	if ($result == FALSE || mysql_num_rows($result) < 1) //empty result set
	{
		echo "None Specified";
	}
	else
	{
		while($row = mysql_fetch_array($result))
		{
			$i = 3;
	?>
			<table class = 'table table-hover table-condensed'><thead><tr>
			<th>PRIVILEGE</th>
			<th>ALLOWED</th>
			</tr></thead><tbody>
				<tr><td>Table_name:</td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Grantor:</td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Timestamp:</td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Table_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
				<tr><td>Column_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
				</tbody></table>
			<?	
		}
	}
	?>
	</div>
	<div class ='pull-left space-me'><h3>Column Privileges:</h3>
	<?
	$query = "Select * from mysql.columns_priv where User ='".$user."' AND Host ='".$host."'";
	$result = mysql_query($query, $con);
	//echo ($query);
	if ($result == FALSE || mysql_num_rows($result) < 1) //empty result set
	{
		echo "None Specified";
	}
	else
	{
		while($row = mysql_fetch_array($result))
		{
			$i = 3;
	?>
			<table class = 'table table-hover table-condensed'><thead><tr>
			<th>PRIVILEGE</th>
			<th>ALLOWED</th>
			</tr></thead><tbody>
			<tr><td>Table_name:</td><td><?echo($row[$i]);$i++;?></td></tr>
			<tr><td>Column_name:</td><td><?echo($row[$i]);$i++;?></td></tr>
			<tr><td>Timestamp:</td><td><?echo($row[$i]);$i++;?></td></tr>
			<tr><td>Column_priv:</td><td><?echo($row[$i]);$i++;?></td></tr>
			</tbody></table>
	<?	
		}
	}
	?>	</div>
		<div class ='pull-left space-me'><h3>Procedure Privileges:</h3>
	<?
	$query = "Select * from mysql.procs_priv where User ='".$user."' AND Host ='".$host."'";
	$result = mysql_query($query, $con);
	//echo ($query);
	if ($result == FALSE || mysql_num_rows($result) < 1) //empty result set
	{
		echo "None Specified";
	}
	else
	{
		while($row = mysql_fetch_array($result))
		{
	?>
			<table class = 'table table-hover table-condensed'><thead><tr>
			<th>PRIVILEGE</th>
			<th>ALLOWED</th>
			</tr></thead><tbody>
			<tr><td>Procedure Name:</td><td><?echo($row['Routine_name']);$i++;?></td></tr>
			<tr><td>Database Name:</td><td><?echo($row['Db']);$i++;?></td></tr>
			<tr><td>Timestamp:</td><td><?echo($row['Timestamp']);$i++;?></td></tr>
			<tr><td>Proc_priv:</td><td><?echo($row['Proc_priv']);$i++;?></td></tr>
			</tbody></table>
	</div><?	
		}
	}
}