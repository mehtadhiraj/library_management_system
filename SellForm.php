<html>
 <head>
   <link rel="stylesheet" type="text/css" href="css.css">
 </head>
 <body>
 <h2 align="center"> Selling Form</h2>
  <center>
	     <?php
         // define variables and set to empty values
         $nameErr = $emailErr = $genderErr = $bookIDErr = $booktypeErr =  "";
         $name = $email = $gender = $bookID = $bookname = $booktype = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            }else {
               $gender = test_input($_POST["gender"]);
            }

            if (empty($_POST["bookID"])) {
               $bookIDErr = "BookID is required";
            }else {
                $bookID = test_input($_POST["bookID"]);
            }

            if (empty($_POST["bookname"])) {
               $bookname = "";
            }else {
                $bookname = test_input($_POST["bookname"]);
            }          
            
            if (empty($_POST["booktype"])) {
               $booktypeErr = "Booktype is required";
            }else {
               $booktype = test_input($_POST["booktype"]);
            }          
         }
         
		function test_input($data) {
            $data = trim($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
	<form method = "POST" action = "Selling.php">
         <table cellpadding="10px">
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name"  size="50">
               <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>E-mail: </td>
               <td><input type = "text" name = "email" size="50%">
                  <span class = "error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Gender:</td>
               <td>
                  <input type="radio" name="gender" value= "Female"> Female 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                          
                  <input type = "radio" name = "gender" value = "Male">Male
                  <span class = "error">* <?php echo $genderErr;?></span>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;
		          BookID: <input type= "text" name= "bookID" size="10%">
                <span class = "error">* <?php echo $bookIDErr;?></span>
               </td>
            </tr>

            <tr>
               <td>Book Name:</td>
               <td> <input type = "text" name = "bookname" size="29%">
               Book Type:
                  <select name = "booktype">
		  <option></option>
		  <option value = "Fiction">Fiction </option>
		  <option value = "Biography">Biography </option>
		  <option value = "Travel">Travel </option>
		  <option value = "Science">Science </option>
		  <option value = "Others">Others </option>
		  </select>                  
                  <span class = "error">* <?php echo $booktypeErr;?></span>
               </td>
            </tr></table>

            <center>               
            <p>&nbsp;</p>
               
            
                  <input type = "submit" class=button name = "submit" value = "Submit"> 
            </center>
        
      </form>
   </center>
 </body>
</html>
