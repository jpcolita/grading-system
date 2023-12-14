<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../public/student.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/dashboard.css">
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
            <h1>Welcome to the Institute Page!</h1>
        </header>
        <main>

 
        <h2>Insert institute Here</h2>
           <form action="../controller/admin.controller.php" method="POST">
                   <label for="">institute:</label>
                   <input type="text" name="institute" placeholder="Enter Institute Here">

                   <input type="submit" name="inss">
           </form>

           <?php
   include "../config/database.php";
   
// Check if the delete button is clicked
if (isset($_GET['delete_id'])) {
    $id_to_delete = $_GET['delete_id'];

    // Delete the record from the database
    $query = "DELETE FROM institute WHERE id = '$id_to_delete'";
    $result = mysqli_query($conn, $query);

    // Check if the delete operation was successful
    if ($result) {
         echo '<script>
        Swal.fire({
            title: "Successfully Deleted",
            text: "Back To Institute Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "institute.php";
            }
        });
    </script>';
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

   $display ="SELECT * FROM institute";
   $result = $conn->query($display);

if($result->num_rows > 0){
    echo "<table border='1'>
    <tr >
        <th>ID</th>
        <th>Institute</th>
        <th>Delete</th>
     

    </tr>";
    while($row = $result->fetch_assoc()){
        $id  = $row['id'];

        echo "<tr>
        <td>" . $row["id"]. "</td>
        <td>" . $row["institute"]. "</td>
        <td><a href='?delete_id={$row['id']}'><button>Delete</button></a></td>
         
      
      
 

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

</body>
</html>