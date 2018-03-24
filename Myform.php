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
   <?php 
         @$username = "root";
         @$passwd = "";
         @$dbname = "login";
         @$host = "localhost";   
         
         @$dbconn = mysqli_connect($host, $username, $passwd, $dbname) ;
      ?>
   <h2 align="center">Return Form</h2>
       <form name='f1' method = "POST">
         <table cellpadding="10px" align="center">
           <tr>
               <td>PRN:</td>
               <td><input type = "text" name = "prn"  size="50">
               </td>
            </tr>

            <tr>
               <td>Book Id: </td>
               <td><input type = "text" name = "bookId" size="50%">
               </td>
            </tr>
               </table>
           <center>
               <input type = submit class='button button1' name = submit value = Submit>
            </center>
            <?php 
               if (isset($_POST['submit'])) {
                  @$prn =$_POST['prn'];
                  @$book = $_POST['bookId'];
                  if ($prn == "" || $book == "") {
                     echo "<script>alert('Enter all the details')</script>";
                  }else{
                     $sql = "select issuedate,returndate from issue where prn = '$prn' and bookid = $book";
                     $res = mysqli_query($dbconn,$sql);
                     while ($row = mysqli_fetch_assoc($res)) {
                        $issuedate = $row['issuedate'];
                        $returndate = $row['returndate'];
                     } 
            
                     $date = date('Y-m-d');
                     $today = date_create($date);
                     $return = date_create($returndate);
                     if($today > $return){
                        $diff = date_diff($return,$today);
                        $difference =  $diff->format("%a");   
                        $fine = (int)$difference * 5 ;
                     }else{
                        $fine = 0;
                     }

                    echo "
                     <table align=center>
                        <tr>
                           <td>PRN:</td>
                           <td><input type = text name = prn  size=50% readonly value=".$prn."></td>
                        </tr>

                        <tr>
                           <td>Book Id: </td>
                           <td><input type = text name = bookId size=50% readonly value=".$book."></td>
                        </tr>

                        <tr>
                           <td>IssueDate: </td>
                           <td><input type = 'text' name = IssueDate size=50% readonly value=".@$issuedate."></td>
                        </tr>

                        <tr>
                           <td>Return Date: </td>
                           <td><input name = ReturnDate size=50% readonly value = ".@$returndate."></td>
                        </tr>

                        <tr>
                           <td>Fine Amount: </td>
                           <td><input type = int name = FineAmount size=50% readonly value=".@$fine."></td>
                        </tr>

                     </table>
                     <center>
                        <input type = submit class='button button1' name = return value = Return>
                     </center>";
                  }
               }

               if (isset($_POST['return'])) {
                   $sql = "delete from issue where prn = '".$_POST['prn']."' and bookid = ".$_POST['bookId'];
                   $res = mysqli_query($dbconn,$sql);
                   echo "<script>alert('Details deleted successfully')</script>";
               }
            ?>
    </body>
</html>
