<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die("Could not connect:   ". mysql_error());
  }
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">    		 
	 <html>   
	 <head>   
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">   
	 <title>User Admin</title>   
	 <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />   
	 <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<script type = 'text/javascript' src ='js/bootstrap.js'></script>	 
	 </head>   
	 <body>   
	 <div class = "navbar navbar-inverse navbar-fixed-top">   
		 <div class = "navbar-inner">   
			 <div class = "container">   
				 <div class = "nav-collapse collapse">   
					 <ul class ="nav">   
						 <li><a href = "index.php">Databases</a></li>   
						 <li><a href = "listusers.php">Show users</a></li>     
					 </ul>   
				 </div>   
			 </div>   
		 </div>   
	 </div>   
	 <div class = "container-fluid main-body"> 