<!DOCTYPE html>
<html>
	<head>
		<script language="JavaScript">
			function check()
			{
				if((document.form1.t1.value=="")||(document.form1.t2.value==""))
				{
					alert("Please enter Username and Password")
					document.form1.t1.focus()
				}
				else if(document.form1.t1.value=="")
				{
					alert("Please enter your Username")
					document.form1.t1.focus()
				}
				 else if(document.form1.t2.value=="")
				{
					alert("Please enter the password")
					document.form1.t2.focus()
				}
			}
		</script>
		<link rel="stylesheet" type="text/css" href="css.css">
	</head>
	<body>
		<div class="container">
		<header>
			<img src="gst.png" align="left">
			<h1 align='center'>SIES Graduate School of Technology </h1>
		</header>
		<h2 align='center'> Library Management System </h2> 
		<center>
		<h3 align='center'> Enter Login Credentials </h3>
		<form name="form1" method="POST">
		<table cellpadding="10px" cellspacing="5px">
			<tr><td><b>Username: </b></td><td> <input type="text" name='user'></td></tr>	<tr><td><b>Password: </b></td><td><input type="Password" name="pass"></td></tr>
		</table><br>
		<input class='button' name="submit" type="submit" onClick="check()">
		</center><br><br>
		</div>
					<?php 
   						$username = "root";
   						$passwd = "";
 						$dbname = "login";
 						$host = "localhost";
 						$dbconn = mysqli_connect($host, $username, $passwd, $dbname) ;
						$email= $_POST['user'];
						$pass=$_POST['pass'];
						if(isset($_POST['submit']))
						{
 							$sql2 = "select user, pass from user where user= '$email' and pass= '$pass' ";
 							$res2 = mysqli_query($dbconn,$sql2);
							$count = mysqli_num_rows($res2);
							if($count == 1)
								header("Location: page1.php"); 
							else
	 							echo "<center> Invalid Email or Password. Try again. </center>";
	 					}
   					?>
	</body>
</html>
