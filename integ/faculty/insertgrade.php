<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Grade </title>
    <style>
 body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

form {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}
select{
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
.center-text {
    text-align: center;
    font-size: 24px; /* Adjust the font size as needed */
    color: #333;
}
.classbutton {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    margin-top: 20px; /* Adjust as needed */
}


    </style>
</head>
<body>
    




  <?php
include "../config/database.php";


// // Destroy the session

// session_start();

// // Check if the user is logged in
// if (isset($_SESSION["update_status"])) {
// $update_status = $_SESSION["update_status"];


// $qry = "SELECT * FROM school_years WHERE status = '$update_status'";
//     $result = mysqli_query($conn, $qry);

//     if ($result->num_rows > 0) {
//        while( $row = mysqli_fetch_assoc($result)){
//   echo "The School Year Is: " . $row['year'];
//         echo "The Semester is " . $row['semester'];
//         if ($update_status == 'active') {
//             // Allow faculty to input grades
        
//             // Your grading input form and logic go here
//             echo '<form action="process_grades.php" method="post">';
//             // Your form fields for grading input
//             echo '<label for="student_id">Student ID:</label>';
//             echo '<input type="text" name="student_id" required>';
        
//             echo '<label for="grade">Grade:</label>';
//             echo '<input type="text" name="grade" required>';
        
//             echo '<button type="submit" name="submit_grade">Submit Grade</button>';
//             echo '</form>';
         
        
//         } else {
//             // Inform faculty that they cannot input grades because the school year is inactive
//             echo '<p>Grading input is currently disabled as the school year is inactive.</p>';
//         }
//        }


//         // echo "The School Year Is: " . $row['year'];
//         // echo "The Semester is " . $row['semester'];
//     } else {
//         echo "User not found in the database.";
//     }







// } else {
// // Redirect to the login page if not logged in
// // header("Location: logout.php");
// echo '<script>
// window.location.href="student.search.php";
// alert("Let The Admin First Activate The School Year For you to Input Grades")
// <script>;
// ';

// }


$qry = "    SELECT * FROM school_years ";


$result = mysqli_query($conn,$qry);

while($row = mysqli_fetch_assoc($result)){
    $id = $row['status'];
$year = $row['year'];
    $semester = $row['semester'];
    ?>
              
    <div class="center-text">
     <!-- echo "School Year:"." ".$year . " " . "Semester :"." ".$semester;  -->
    </div>
    <?php
                
    if ($id == 'active') {
                    // Allow faculty to input grades
                
                    // Your grading input form and logic go here
                    // echo '<form action="process_grades.php" method="post">';
                    // // Your form fields for grading input
                    // echo '<label for="student_id">Student ID:</label>';
                    // echo '<input type="text" name="student_id" required>';
                
                    // echo '<label for="grade">Grade:</label>';
                    // echo '<input type="text" name="grade" required>';
                
                    // echo '<button type="submit" name="submit_grade">Submit Grade</button>';
                    // echo '</form>';
?>
             
             <h2>Insert Grade</h2>
 <h2>Student Information Form</h2>
    
    <form action="gradeprocess.php" method="post">

    <label for="">ID Number:
        <input type="text" name="id" placeholder="Enter ID Number">
    </label>
        <label for="name">Name:</label>
     <input type="text" name="name" placeholder="Enter Student Fullname" required>

        <label for="">Course:</label>
      
      <select name="course" id="">
        <option value="BSCE">BSCE</option>
        <option value="BSIT">BSIT</option>
        <option value="BSM">BSM</option>
        <option value="BITM">BITM</option>
      </select>

        <label for="">Section:</label>
      <input type="text" name="section" placeholder="Enter Section">

        <label for="">Year Level:</label>
        <!-- <input type="text" name="yearlevel" placeholder="Enter Year Level"> -->
      <select name="yearlevel" id="">
        <option value="1st Year">1st Year</option>
        <option value="2nd Year">2nd Year</option>
        <option value="3rd Year">3rd Year</option>
        <option value="4th Year">4th Year</option>
        <option value="5th Year">5th Year</option>
      </select>

        <label for="">Subject Code:</label>
      <input type="text" name="code" placeholder="Enter Subject Code">

        <label for="">Subject Description:</label>
      <input type="text" name="description" placeholder="Enter Subject Description">

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>

        <label for="grade">Grade:</label>
      <input type="text" name="grade" placeholder="Enter Student Grade">

        <button type="submit" name="gradeinsert">Submit</button>
        
    </form>
  

             <?php


                 
                
                } else {
                    // Inform faculty that they cannot input grades because the school year is inactive
                    // echo '<p>Grading input is currently disabled as the school year is inactive.</p>';
                    ?>
              
                
          <?php
                }
               }
             
  












?>
   <div class="classbutton">
   <a href="student.search.php"><button >Back Here</button></a>
   </div>


</body>
</html>