
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculties Grad Page</title>
    <link rel="stylesheet" href="../public/student.css">
    <link rel="stylesheet" href="../public/dashboard.css">
    <style>

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 16px;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: lightgreen;
}

/* Add additional styling as needed */
button {
    background-color: #4caf50;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}


    </style>
</head>


<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="facultiespage.php">Faculty</a></li>
            <li><a href="student.php">Students</a></li>
            <li><a href="grade.php">Grades</a></li>
            <li><a href="report.php">Reports</a></li>

        </ul>
    </div>

    <div class="content">
        <header>
            <h1>Welcome to the Faculties Grade!</h1>
        </header>
        <main>


        <form action="report.php" method="POST" class="container">
    <label for="">Student ID</label>
      <input type="text" name="id" placeholder="Enter ID Number OF The Student" required>

    <input type="submit" name="student">

</form>
   





        </main>
    </div>


 
 
   


</body>

</html>



<?php

include "../config/database.php";
if(isset($_POST['student'])){
    $id_number= $_POST['id'];
session_start();
$sel = "SELECT id FROM grades GROUP BY id";


$qry = mysqli_query($conn,$sel);



    if($qry){
        $_SESSION["id_number"] = $id_number;
    
     header("location: download.report.php");
  
    }




}

?>







