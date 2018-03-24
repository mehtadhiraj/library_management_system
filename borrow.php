<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css.css">
		<script type="text/javascript">
			function check()
			{
				if((document.f1.t1.value=="")||(document.form1.t3.value=="")||(document.form1.t4.value=="")||(document.f2.t1.value=="")||(document.f2.t2.value=="")||(document.f2.t3.value=="")||(document.f2.t4.value==""))
				{
					alert("Please enter complete details")
					document.f1.t1.focus()
				}
			}
			
			function check2()
			{
				if(document.f2.t2.value=="")
				{
					alert("Please enter PRN number.")
					document.f2.t2.focus()
				}
			}
		</script>
	</head>
	<body>
		<form method="POST">
		<center>
		<h2 align="center"> Borrow </h2>
		<h4 align="center"> Enter Book ID </h4>
		<input type='text' id="bookid" name='bookid'><br>
		<input type="submit" class="button button2" value="Fetch" Name="submit">
	    		  <?php
 	@$username = "root";
 	@$passwd = "";
 	@$dbname = "login";
 	@$host = "localhost";	
 	@$id=$_POST['bookid'];
	@$dbconn = mysqli_connect($host, $username, $passwd, $dbname) ;
	if(isset($_POST['submit']))
	{
		if($id==""){
			echo "<script>alert('Please enter the BookID')</script>";
		}else{
 	$sql1= "select * from book where bookid=$id";
 	$res1= mysqli_query($dbconn,$sql1);

	while($row = mysqli_fetch_assoc($res1)){
	echo "		<table cellpadding='10px'>
				<tr>
					<td>Book ID: </td>
					<td><input type='text' id='id' name='id' readonly value= ".$row['bookid']."></td>
				</tr>

   				<tr>
					<td>Book Name: </td>
					<td><input type='text' id='t1' name='t1' readonly value= ".$row['name']."></td>
					<td>Author: </td>
					<td><input type='text' id='t2' name='t2' readonly value=".$row['author']."></td>
				</tr>
				<tr>
					<td>ISBN: </td>
					<td><input type='text' id='t3' name='t3' readonly value=".$row['isbn']."></td>
				</tr>
				<tr>
					<td>Borrow Date: </td>
					<td>
						<input type=textbox id = 'date' readonly value=".$row['doiss'].">
					</td>
					<td>Return: </td>
					<td>
						<input type=textbox  readonly value=".date('d/m/Y', strtotime('+7 day', time())).">
					</td>
				</tr>
			</table>
		"; }
		}
	}
	 ?> 
	</center>
</form>
			<table cellpadding="5px" cellspacing="5px" align="center">




		<h3 align="center"> Student Details </h3>
		<center>
		<form name='f2'>
			<table cellpadding="5px" cellspacing="5px" align="center">
				<tr>
					<td> Name: </td>
					<td> <input type="text" id="t1" name='t1'> </td>
					<td> PRN No.: </td>
					<td> <input type="text" id="t2" name='t2'> </td>
				</tr>
				<tr>
					<td> Branch: </td>
					<td> <input type="text" id="t3" name='t3'> </td>
					<td> Year: </td>
					<td> <input type="text" id="t4" name='t4'> </td>
				</tr>
			</table>
				<input type="submit" class="button button2" value="Fetch" id="f2" Name="Fetch2" onclick="check2()">
		</form>
		<input align="center" type="submit" class="button button2" value="Issue" Name="Issue" onclick="check()">
		</center>


	</body>
</html>
