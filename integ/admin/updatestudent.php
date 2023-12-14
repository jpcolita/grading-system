<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Updation</title>
    <link rel="stylesheet" href="../public/addstudent.css">
</head>
<body>
<form action="../controller/update.controller.php" method="POST">
    <label for="">Id number:</label>
       
       <select name="id" id="">
     <?php
     //province
     include "../model/select.model.php";
    
   
      $province = new Model($conn);
$province->GetStudent();
     
        ?>
       </select>
     <label for="">Firstname :</label>
     <input type="text" name="firstname" placeholder="Enter Firstname">
     <label for="">Lastname :</label>
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
     <label for="">Home Address</label>
     
     <select name="province" id="">
   <option value="">Davao oriental</option>
     </select>
     <select name="municipality" id="">
     <?php
     //municipality
     include "../config/database.php";
      

      $municipality = new Model($conn);
      $municipality->GetMunicipality();
     
        ?>
     </select>
     <select name="barangay" id="">
     <?php
$barangay = new Model($conn);
$barangay->GetBarangay();
     ?>
     </select>
     <label for="">Zip Code</label>
     <input type="text" name="zipcode" placeholder="Enter Zipcode">
     <label for="">Contact Num :</label>
     <input type="text" name="number" placeholder="Enter Contact Num"> 
     <label for="">Institute :</label>
     <select name="institute" id="">
        <!-- <option value="FCDSET">FCDSET</option> -->
        <?php

$c1 = new Model($conn);
$c1->GetInstitute();

?>
     </select>
     <label for="">Course :</label>
     <select name="course" id="">
      <?php

$c1 = new Model($conn);
$c1->GetCourse();

?>
  
     </select>
<label for="">In-case of Emergency</label>
<input type="text" name="gname" placeholder="Enter Name of Guardian">
<input type="text" name="gnumber" placeholder="Enter Contact Number ">
<input type="text" name="address" placeholder="Enter Address">
<input type="submit" name="student">
    </form>
    
    <a href="student.php"><button>Back</button></a>

</body>
</html>



