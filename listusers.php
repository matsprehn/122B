<?php
 include('header.php');
 $query = "select * from mysql.user where user != ''";
 
 $result = (mysql_query($query, $con));
 $i = 0;
 $users;
?>
<div class = 'row-fluid'>
<div class = 'span2 bs-docs-sidebar'>
<ul class = "nav nav-list bs-docs-sidenav affix">
<?php
 while ($row = mysql_fetch_array($result))
 {
	$users = "'".$row["User"]."'@'".$row["Host"]."'";
	$user = $row["User"];
	$host = $row["Host"];
	?><a href ="user.php?user=<?echo($user);?>&host=<?echo($host)?>"><?echo($row["User"]."@".$row["Host"]);?></a>
	<br><?php
	$i++;
 }
 



?>
<a href = "newuser.php">Add User </a>
</div></div></ul>