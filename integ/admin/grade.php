
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Grade Page</title>

    <link rel="stylesheet" href="../public/student.css">
    <link rel="stylesheet" href="../public/dashboard.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="script.js"></script>
    <style>
        /* Add your custom styles here */
body {
    font-family: Arial, sans-serif;
}

.custom-form {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f5f5f5;
}

label {
    display: block;
    margin-bottom: 8px;
}

select {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Add more styles as needed */
input[type="submit"] {
    background-color: gray; /* Green background color */
    color: white; /* White text color */
    padding: 10px 15px; /* Padding around the text */
    font-size: 16px; /* Font size of the text */
    border: none; /* Remove default border */
    border-radius: 4px; /* Add a slight border radius */
    cursor: pointer; /* Add a pointer cursor on hover */
}

/* Style the button on hover */
input[type="submit"]:hover {
    background-color: #45a049; /* Darker green on hover */
}
.container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="admins.php">Admin</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="student.php">Student</a></li>
            <li><a href="faculty.php">Faculty</a></li>
            <li><a href="subject.php">Subject</a></li>
            <li><a href="course.php">Course</a></li>
            <li><a href="institute.php">Institute</a></li>
            <li><a href="grade.php">Grade</a></li>
            <li><a href="school.php">School Year</a></li>

        </ul>
    </div>

    <div class="content">
        <header>
            <h1>Welcome to the Grade Page!</h1>
        </header>
        <main>
        <?php


include "../config/database.php";

// Query to retrieve data from the database
$query = "SELECT fassigns, COUNT(*) AS total_students FROM assignstudent GROUP BY fassigns  ";
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the results and display the summary
    echo "Summary of Total Students per Subject:\n"."<br>";
    while ($row = $result->fetch_assoc()) {
        

?>
<div class="container">
<?php 
 echo "{$row['fassigns']} {$row['total_students']} students\n"."<br>";
       

       ?>

</div>
       <?php 
    }

    // Close the result set
    $result->close();
} else {
    echo "Error executing the query: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

            <h2>Assign Subject Here</h2>
            <form action="../controller/school.controller.php" method="POST" class="custom-form">
       
            <label for="subject">Choose Faculty</label>
        <select name="faculty" id="faculty" required>
            <option value="">Select Here</option>
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
        <br>
        <label for="subject">Assign Subject</label>
        <select name="subject" id="subject" required>
        <option value="">Select Here</option>

            <?php
                function getSomesubject() {
                    global $conn;
                    $result = $conn->query("SELECT * FROM subject");
                    $schoolYears = [];
                    while ($row = $result->fetch_assoc()) {
                        $schoolYears[] = $row;
                    }
                    return $schoolYears;
                }

                $schoolYears = getSomesubject();

                foreach ($schoolYears as $schoolYear) {
                    echo "<option>{$schoolYear['code']} {$schoolYear['description']}</option>";
                }
            ?>
        </select>
        <input type="submit" name="assignsubject">
    </form>


    <?php
   include "../header/header.php";
   include "../config/database.php";
   
// Check if the delete button is clicked
if (isset($_GET['delete_id'])) {
    $id_to_delete = $_GET['delete_id'];

    // Delete the record from the database
    $query = "DELETE FROM assignsubject WHERE id = '$id_to_delete'";
    $result = mysqli_query($conn, $query);

    // Check if the delete operation was successful
    if ($result) {
        echo '<script>
        Swal.fire({
            title: "Successfully Deleted",
            text: "Back To Grade Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "grade.php";
            }
        });
    </script>';
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

   $display ="SELECT * FROM assignsubject";
   $result = $conn->query($display);

if($result->num_rows > 0){
    echo "<table border='1'>
    <tr >
        <th>ID</th>
        <th>Faculty </th>
        <th>Assigned Subject</th>
        <th>Delete</th>

    </tr>";
    while($row = $result->fetch_assoc()){
        $id  = $row['id'];

        echo "<tr>
        <td>" . $row["id"]. "</td>
        <td>" . $row["faculty"]. "</td>
        <td>" . $row["subject"]. "</td>
        <td><a href='?delete_id={$row['id']}'><button>Delete</button></a></td>
      </a>
         
      
      
 

    </tr>";
   
    }
    echo "</table>"."<br>"."<br>";
}else{
    echo "0 results";
}



?>






    


        <h2>Assign Student Here </h2><br>
        
<form action="../controller/school.controller.php" method="POST">


<label for="">Choose Faculty Based on the Assigned Subject</label>
<select name="fassigns" id="" required>
<option value="">Select Here</option>

<?php

function fassigns() {
    global $conn;
    $result = $conn->query("SELECT * FROM assignsubject
    ORDER BY faculty ASC");
    $schoolYears = [];
    while ($row = $result->fetch_assoc()) {
        $schoolYears[] = $row;
    }
    return $schoolYears;
}

$schoolYears = fassigns();

foreach ($schoolYears as $schoolYear) {
    echo "<option>{$schoolYear['faculty']} === {$schoolYear['subject']}</option>";
}
?>
</select>
<label for="">Assign Student Here</label>
<select name="assignstudent" id="" required>
<option value="">Select Here</option>


<?php

function assignstudent() {
    global $conn;
    $result = $conn->query("SELECT * FROM students");
    $schoolYears = [];
    while ($row = $result->fetch_assoc()) {
        $schoolYears[] = $row;
    }
    return $schoolYears;
}

$schoolYears = assignstudent();

foreach ($schoolYears as $schoolYear) {
    echo "<option> {$schoolYear['id']} {$schoolYear['firstname']}   {$schoolYear['lastname']} </option>";
}
?>
</select>
<input type="submit" name="assignstudents">

</form>



<?php
   include "../header/header.php";
   include "../config/database.php";
   
// Check if the delete button is clicked
if (isset($_GET['delete_id'])) {
    $id_to_delete = $_GET['delete_id'];

    // Delete the record from the database
    $query = "DELETE FROM assignstudent WHERE id = '$id_to_delete'";
    $result = mysqli_query($conn, $query);

    // Check if the delete operation was successful
    if ($result) {
        echo '<script>
        Swal.fire({
            title: "Successfully Deleted",
            text: "Back To Grade Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "grade.php";
            }
        });
    </script>';
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

   $display ="SELECT * FROM assignstudent";
   $result = $conn->query($display);

if($result->num_rows > 0){
    echo "<table border='1'>
    <tr >
        <th>ID</th>
        <th>Subject Assigned To The Faculty </th>
        <th>Assigned Student</th>
        <th>Delete</th>

    </tr>";
    while($row = $result->fetch_assoc()){
        $id  = $row['id'];

        echo "<tr>
        <td>" . $row["id"]. "</td>
        <td>" . $row["fassigns"]. "</td>
        <td>" . $row["assignstudents"]. "</td>
        <td><a href='?delete_id={$row['id']}'><button>Delete</button></a></td>
      </a>
         
      
      
 

    </tr>";
   
    }
    echo "</table>";
}else{
    echo "0 results";
}



?>




        
         








          
        </main>
    </div>

 



</body>

</html>

