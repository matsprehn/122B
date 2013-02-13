<?php
include('header.php');
$database = $_GET["database"];

$query = "show tables in ".$database."";

$result = (mysql_query($query, $con));

while ($row = mysql_fetch_array($result))
{
	echo($row["Tables_in_".$database]."<br />");
}

?>