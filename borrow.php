<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css.css">
	</head>
	<body>
		<?php 
			@$username = "root";
 			@$passwd = "";
 			@$dbname = "login";
 			@$host = "localhost";	
 			
			@$dbconn = mysqli_connect($host, $username, $passwd, $dbname) ;
		?>
		<form method="POST">
			<center>
				<h2 align="center"> Issue a book </h2>
				<tr>
					<td>Book ID</td>
					<td><input type='text' id="askbookid" name='askbookid'><br></td>
				</tr>
				<br><br>
				<tr>
					<td> PRN No.: </td>
					<td> <input type="text" id="askPrn" name='askPrn'></td>
				</tr>
				<br><br><br>
				<input type="submit" class="button button2" value="Fetch" id="f2" Name="Fetch2">
				<?php
					@$prn=$_POST['askPrn'];
					@$id=$_POST['askbookid'];
					if(isset($_POST['Fetch2'])){
						$sql = "select * from student where prn='$prn'";
						$res = mysqli_query($dbconn,$sql);
						$sql1= "select * from book where bookid=$id";
 						$res1= mysqli_query($dbconn,$sql1);

						if($prn == "" || $id == ""){
							echo "<script>alert('Please enter the values')</script>";
						}else{
							while ($row = mysqli_fetch_assoc($res)){
								echo "<br><br><br>
									  <table cellpadding=10px>
										<tr>
											<td><h4>Student Details</h4></td>
										</tr>
										<tr>
											<td>PRN</td>
											<td><input type=text readonly name=prn id=prn value=".$row['prn']."></td>
											<td>Name</td>
											<td><input type=text readonly name=studentName id=studentName value=".$row['name']."></td>
										</tr>
	
										<tr>
											<td>Branch</td>
											<td><input type=text readonly name=branch id=branch value=".$row['branch']."></td>
											<td>Year</td>
											<td><input type=text readonly name=year id=year value=".$row['year']."></td>
										</tr>
										<tr>
											<td><h4>Book Details</h4></td>
										</tr>";
							}
							while ($row = mysqli_fetch_assoc($res1)){
								echo "		<tr>
												<td>Book ID: </td>
												<td><input type='text' id='bookId' name='bookId' readonly value= ".$row['bookid']."></td>
											</tr>

   											<tr>
												<td>Book Name: </td>
												<td><input type='text' id='bookName' name='bookName' readonly value= ".$row['name']."></td>
												<td>Author: </td>
												<td><input type='text' id='bbokAuthor' name='bookAuthor' readonly value=".$row['author']."></td>
											</tr>
										
											<tr>
												<td>ISBN: </td>
												<td><input type='text' id='isbn' name='isbn' readonly value=".$row['isbn']."></td>
											</tr>
										
											<!--<tr>
												<td>Borrow Date: </td>
												<td><input type=textbox id = 'date' readonly value=".date('d/m/Y')."></td>
												<td>Return: </td>
												<td><input type=textbox  readonly value=".date('d/m/Y', strtotime('+7 day', time()))."></td>
											</tr>-->
										</table>
										<br>
			 							<br>
			 							<br>"; 
							}
						}
						echo "<input type=submit name=Issue id=Issue value=Issue class='button button2'>";
					}
			 	

					if (isset($_POST['Issue'])) {
						$prn = $_POST['prn'];
						$book = $_POST['bookId'];
						$returndate = date('Y-m-d', strtotime('+7 day', time()));
						$sql = "select prn from issue where prn='$prn'";
						$res = mysqli_query($dbconn,$sql);
						$count = mysqli_num_rows($res);
						if($count>=3){
							echo "<script>alert('CANNOT ISSUE MORE THAN THREE BOOKS')</script>";
						}else{
							$sqlInsert = "INSERT INTO issue (prn, bookid, issuedate, returndate) VALUES ('$prn', $book, Curdate(), '$returndate')";
							$res = mysqli_query($dbconn,$sqlInsert);
							echo "<script>alert('Book issued successfully')</script>";
						}
					}
				?>
		</center>
		</form>

	</body>
</html>
