<?php

 $user = $_POST['user'];
 $database = $_POST['database'];
 $table = $_POST['table'];
 $permissions;
 $i = 0;
 if (isset($_POST['select']))
 {
	$permission[$i] = $_POST['select'];
	$i++;
 }
 if (isset($_POST['insert']))
 {
 $permission[$i] = $_POST['insert'];
 	$i++;
 }
 if (isset($_POST['update']))
 {
 $permission[$i] = $_POST['update'];
 	$i++;
 }
 if (isset($_POST['delete']))
 {
 $permission[$i] = $_POST['delete'];
 	$i++;
 }
 if (isset($_POST['create']))
 {
 $permission[$i] = $_POST['create'];
 	$i++;
 }
 if (isset($_POST['drop']))
 {
 $permission[$i] = $_POST['drop'];
 	$i++;
 }
 if (isset($_POST['references']))
 {
 $permission[$i] = $_POST['references'];
 	$i++;
 }
 if (isset($_POST['index']))
 {
 $permission[$i] = $_POST['index'];
 	$i++;
 }
 if (isset($_POST['alter']))
 {
 $permission[$i] = $_POST['alter'];
 	$i++;
 }
 if (isset($_POST['create_view']))
 {
 $permission[$i] = $_POST['create_view'];
 	$i++;
 }
 if (isset($_POST['show_view']))
 {
 $permission[$i] = $_POST['show_view'];
 $i++;
 }
  if (isset($_POST['trigger']))
 {
	$permission[$i] = $_POST['trigger'];
 }
 
 $i = 0;
 if (isset($permission))
 {
	$j = count($permission);
}
 $part = "";
 if (isset($j))
 {
	 while ($i < $j)
	 {
		$part .= $permission[$i];
		echo ($permission[$i]."<br/>");
		if ($i+1 != $j)
		{
			$part .= ', ';
		}
	 
		$i++;
	 }
}
 //echo($part);
 
 $query = "Grant ".$part." on ".$database.".".$table." to ".$user;
 echo ($query)
 ?>