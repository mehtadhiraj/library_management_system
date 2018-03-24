<!DOCTYPE html>
<html>
<head>
   <title>Return Form</title>
   <link rel="stylesheet" type="text/css" href="css.css">


   <script type="text/javascript">

      function check()
         {
            if((document.f1.name.value=="")||(document.f1.ISBN_no.value=="")||(document.f1.bookID.value=="")||(document.f1.bookname.value=="")||(document.f1.IssueDate.value=="")||(document.f1.ReturnDate.value=="")||(document.f1.FineAmount.value==""))
            {
               alert("Please enter complete details")
               document.f1.name.focus()
            }
         }
     
   </script>
   
</head>
<body>
   <h2 align="center">Return Form</h2>
       <form name='f1' method = "POST">
         <table cellpadding="10px" align="center">
           <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name"  size="50">
               </td>
            </tr>
            
            <tr>
               <td>ISBN: </td>
               <td><input type = "text" name = "ISBN_no" size="50%">
               </td>
            </tr>

            <tr>
               <td>Book name: </td>
               <td><input type = "text" name = "bookname" size="50%">
               </td>
            </tr>


            <tr>
               <td>Book Id: </td>
               <td><input type = "text" name = "bookID" size="50%">
               </td>
            </tr>

            <tr>
               <td>IssueDate: </td>
               <td><input type = 'text' name = "IssueDate" size="50%">
               </td>
            </tr>

            <tr>
               <td>Return Date: </td>
               <td><input name = "ReturnDate" size="50%">
               </td>
            </tr>

            <tr>
               <td>Fine Amount: </td>
               <td><input type = "int" name = "FineAmount" size="50%">
               </td>
            </tr>

            </table>
           	<center><input type = "submit" class="button button1" name = "submit" value = "Submit" onclick="check()"></center>
    </body>
</html>
