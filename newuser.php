 <?
 include('header.php');
 ?>
 <form action="adduser.php" method="post">
 Username: <input type ="text" name="userName"></br>
 Hostname: <input type ="text" name="hostName" placeholder="leave blank for any"></br>
 Password: <input type ="password" name ="password"></br>
 <input type="submit" value="Submit">
 </form>