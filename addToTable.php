<?php
 include('header.php');
 $user = $_GET['user'];
 $database = $_GET['database'];
 $table = $_GET['table'];
 ?>
 <h1> Adding <?echo($user)?> to <?echo($database.'.'.$table)?></h1>

<table class = 'table table-hover table-condensed multi'><thead><tr>
<th>PRIVILEGE</th>
<th>ALLOWED</th>
</tr></thead><tbody>
  <form action="completeAddToTable.php" method="post">
  <tr><td>select</td><td><input type="checkbox" name="select" value="select"></td></tr>
  <tr><td>insert</td><td><input type="checkbox" name="insert" value="insert"></td></tr>
  <tr><td>update</td><td><input type="checkbox" name="update" value="update"></td></tr>
  <tr><td>delete</td><td><input type="checkbox" name="delete" value="delete"></td></tr>
  <tr><td>create</td><td><input type="checkbox" name="create" value="create"></td></tr>
  <tr><td>drop</td><td><input type="checkbox" name="drop" value="drop"></td></tr>
  <tr><td>references</td><td><input type="checkbox" name="references" value="references"></td></tr>
  <tr><td>index</td><td><input type="checkbox" name="index" value="index"></td></tr>
  <tr><td>alter</td><td><input type="checkbox" name="alter" value="alter"></td></tr>
  <tr><td>create view</td><td><input type="checkbox" name="create_view" value="create view"></td></tr>
  <tr><td>show view</td><td><input type="checkbox" name="show_view" value="show view"></td></tr>
  <tr><td>trigger</td><td><input type="checkbox" name="trigger" value="trigger"></td></tr>
  </tbody></table>
  <input type = "hidden" name = "database"value = "<?echo($database)?>">
  <input type = "hidden" name = "table" value = "<?echo($table)?>">
   <input type = "hidden" name = "user" value = "<?echo($user)?>">
  <input type = "submit" value = "submit">
