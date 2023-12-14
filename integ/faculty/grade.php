
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculties Grad Page</title>
    <link rel="stylesheet" href="../public/student.css">
    <link rel="stylesheet" href="../public/dashboard.css">
    <style>
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
/* Apply basic styles to the form */
.formclass {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style form labels */
.formclass label {
    display: block;
    margin-bottom: 8px;
}

/* Style form input and select elements */
.formclass input,
.formclass select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  
}
.formclass input{
    background-color: #4caf50 ;
}

/* Style the submit button */
.formclass button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

/* Style the submit button on hover */
.formclass button:hover {
    background-color: #0056b3;
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


        <form action="grade.php" method="POST" class="formclass">
    <label for="" >Faculty Name</label>
   <select name="fname" id="">
    <?php
        include "../config/database.php";
        // include "../model/select.model.php";

        // $choose = new Model($conn);
        // $choose->GetInstitute();


        function getSomeFaculty() {
            global $conn;
            $result = $conn->query("SELECT * FROM faculty");
            $schoolYears = [];
            while ($row = $result->fetch_assoc()) {
                $schoolYears[] = $row;
            }
            return $schoolYears;
        }

        $schoolYears = getSomeFaculty();

        foreach ($schoolYears as $schoolYear) {
            echo "<option>{$schoolYear['lastname']} {$schoolYear['firstname']} {$schoolYear['middlename']}</option>";
        }

?>
   </select>

    <input type="submit" name="faculty"> 

</form>
   











        </main>
    </div>


 
 



</body>

</html>



<?php

include "../config/database.php";
if(isset($_POST['faculty'])){
    $faculty_name= $_POST['fname'];
session_start();
$sel = "SELECT faculty FROM assignsubject GROUP BY faculty";


$qry = mysqli_query($conn,$sel);

if($qry){
    $_SESSION["faculty_name"] = $faculty_name;

//  header("location: gpage.php");
echo '<script> 
window.location.href="gpage.php";
alert("Welcome, ' . $faculty_name . '!")
</script>
';
}else{
   
}

}




?>




















































































<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculties Grade Page</title>
</head>
<body>
    




<form action="grade.php" method="POST">
    <label for="">Faculty Name</label>
   <select name="fname" id="">
    <?php
        // include "../config/database.php";
        // // include "../model/select.model.php";

        // // $choose = new Model($conn);
        // // $choose->GetInstitute();


        // function getSomeFaculty() {
        //     global $conn;
        //     $result = $conn->query("SELECT * FROM faculty");
        //     $schoolYears = [];
        //     while ($row = $result->fetch_assoc()) {
        //         $schoolYears[] = $row;
        //     }
        //     return $schoolYears;
        // }

        // $schoolYears = getSomeFaculty();

        // foreach ($schoolYears as $schoolYear) {
        //     echo "<option>{$schoolYear['lastname']} {$schoolYear['firstname']} {$schoolYear['middlename']}</option>";
        // }

?>
   </select>

    <input type="submit" name="faculty">

</form>
</body>
</html>



<?php

// include "../config/database.php";
// if(isset($_POST['faculty'])){
//     $faculty_name= $_POST['fname'];
// session_start();
// $sel = "SELECT faculty FROM assignsubject GROUP BY faculty";


// $qry = mysqli_query($conn,$sel);

// if($qry){
//     $_SESSION["faculty_name"] = $faculty_name;

// //  header("location: gpage.php");
// echo '<script> 
// window.location.href="gpage.php";
// alert("Welcome, ' . $faculty_name . '!")
// </script>
// ';
// }

// }

?>