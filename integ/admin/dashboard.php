<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/dashboard.css">
    <style>
       /* Basic styling for the forms */
.form1,
.form2,
.form3 {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for form headings */
.form1 h2,
.form2 h2,
.form3 h2 {
    color: #333;
    font-size: 18px;
    margin-bottom: 10px;
}

/* Style for form content */
.form1 p,
.form2 p,
.form3 p {
    color: #555;
    font-size: 16px;
}

/* Additional styling for form3 */
.form3 {
    background-color: #f5f5f5;
}

/* Responsive styling */
@media (max-width: 768px) {
    .form1,
    .form2,
    .form3 {
        margin: 10px;
        padding: 15px;
    }
}
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
            <h1>Welcome to the Dashboard!</h1>
        </header>
        <main>
        <form  class="form1">
            <?php
            include "../config/database.php";
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // SQL query to select all faculty IDs from the table
            $sql = "SELECT id FROM faculty";
            $result = $conn->query($sql);
            
            // Check if the query was successful
            if ($result) {
                // Get the number of rows (faculty IDs)
                $totalFacultyIds = $result->num_rows;
            
                echo "Total Faculty : " . $totalFacultyIds;
            
                // Free the result set
                $result->free_result();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

?>
           </form>

           <form class="form2">
            <?php
            include "../config/database.php";
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // SQL query to select all students IDs from the table
            $sql = "SELECT id FROM students";
            $result = $conn->query($sql);
            
            // Check if the query was successful
            if ($result) {
                // Get the number of rows (faculty IDs)
                $total = $result->num_rows;
            
                echo "Total Students : " . $total . "<br>";
            
                // Free the result set
                $result->free_result();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

?>
           </form>
        
           <form class="form3">
            <?php
            include "../config/database.php";
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // SQL query to select all faculty IDs from the table
            "SELECT COUNT(*) as total FROM students WHERE institute = 'FCDSET'";
            $result = $conn->query($sql);
            
            // Check if the query was successful
            if ($result) {
                // Get the number of rows (faculty IDs)
                $total = $result->num_rows;
            
                echo "Total Student In the Institute of FCDSET : " . $total;
            
                // Free the result set
                $result->free_result();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

?>
           </form>
           
        


            <p>Dashboard content goes here.</p>
            <?php
// Start the session

session_start();
// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // echo 'Logged in as ' . $_SESSION['username'] . '<br>'.'<br>';
    echo ' <a href="logout.php"><button>Log out</button></a>';
} else {
  header("location: logout.php");
}
?>
        </main>
    </div>
</body>

</html>

</body>
</html>