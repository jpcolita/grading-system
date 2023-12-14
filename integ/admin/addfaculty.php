<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Insertion</title>
    <link rel="stylesheet" href="../public/faculty.css">
</head>
<body>
    <div class="container">
    <form action="../controller/faculty.controller.php" method="POST">
        <label for="">Id number:</label>
        <input type="text" name="id" placeholder="Enter Id Number">
     <label for="">Lastname :</label>
     <input type="text" name="firstname" placeholder="Enter Firstname">
     <label for="">Firstname :</label>
     <input type="text" name="lastname" placeholder="Enter Lastname">
     <label for="">Middle Name :</label>
     <input type="text" name="middlename" placeholder="Enter Middle Name">
     <label for="">Date of Birth :</label>
     <input type="date" name="dbirth" placeholder="Enter Date Of Birth">
     <label for="">Gender :</label>
     <select name="gender" id="">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
     </select>
     <label for="">Institute :</label>
     <select name="institute" id="">
       <?php


 include "../model/select.model.php";
 include "../config/database.php";


 $i =new Model($conn);
 $i->GetInstitute();

 



?>
     </select>
     <label for="">Course :</label>
     <select name="course" id="">
             <?php

$c = new Model($conn);

$c->GetCourse();

?>
     </select>
     <label for="">Contact Num :</label>
     <input type="text" name="number" placeholder="Enter Contact Num"> 
     <input type="submit">


    </form>
    </div>
 
    <a href="faculty.php"><button>Back</button></a>
    
</body>
</html>