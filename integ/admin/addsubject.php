<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Insertion</title>
    <link rel="stylesheet" href="../public/subject.css">
    
</head>
<body>
    <div class="container">
    <form action="../controller/subject.controller.php" method="post">
        <label for="">Code</label>
        <input type="text" name="code" placeholder="Enter Subject Code"> 
        <label for="">Description</label>
        <input type="text" name="description" placeholder="Enter  Description">
        <label for="">Unit</label>
        <select name="unit" id="">
            <option value="3 unit">3 unit</option>
        </select>
        <label for="">Type</label>
        <select name="type" id="">
            <option value="Lecture">Lecture</option>
            <option value="Laboratory">Laboratory</option>
        </select>
        <label for="">Course Name :</label>
        <select name="course" id="">
   <?php
   include "../model/select.model.php";
   include "../config/database.php";
 $c =new Model($conn);
 $c->GetCourse();
   ?>
     </select>
        <label for="">Institute Name :</label>
     <select name="institute" id="">
      <?php

$i = new Model($conn);
$i->GetInstitute();

?>
     </select>
     <input type="submit">
    </form>
    </div>
    
    <a href="subject.php"><button>Back</button></a>
</body>
</html>