

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>School Page</title>

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
            <h1>Welcome to the School Year Page!</h1>
        </header>
        <main>
        <?php
   include "../header/header.php";
   include "../config/database.php";
   
// Check if the delete button is clicked
if (isset($_GET['delete_id'])) {
    $id_to_delete = $_GET['delete_id'];

    // Delete the record from the database
    $query = "DELETE FROM school_years WHERE id = '$id_to_delete'";
    $result = mysqli_query($conn, $query);

    // Check if the delete operation was successful
    if ($result) {
        echo '<script>
        Swal.fire({
            title: "Successfully Deleted",
            text: "Back To Faculty Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "school.php";
            }
        });
    </script>';
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

   $display ="SELECT * FROM school_years";
   $result = $conn->query($display);

if($result->num_rows > 0){
    echo "<table border='1'>
    <tr >
        <th>ID</th>
        <th>Year</th>
        <th>Semester</th>
        <th>Statuse</th>
        <th>Delete</th>
        <th>Update</th>
        

    </tr>";
    while($row = $result->fetch_assoc()){
        $id  = $row['id'];

        echo "<tr>
        <td>" . $row["id"]. "</td>
        <td>" . $row["year"]. "</td>
        <td>" . $row["semester"]. "</td>
        <td>" . $row["status"]. "</td>
        <td><a href='?delete_id={$row['id']}'><button>Delete</button></a></td>
          <td> <a href='updateschoolyear.php'><button>Activate Status</button></a></td>
         
      
      
 

    </tr>";
   
    }
    echo "</table>";
}else{
    echo "0 results";
}



?>

   
         
           <a href="addschoolyear.php"><button>Add School Year</button></a>
          
        </main>
    </div>


 
 
   


</body>

</html>

