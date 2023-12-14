<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Subject</title>
    <link rel="stylesheet" href="../public/dashboard.css">
    <link rel="stylesheet" href="../public/student.css">
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
            <h1>Welcome to the Subject Page!</h1>
        </header>
        <main>

        <h1>Search Here</h1>
    <form action="subjectsearch.php" method="get">
        <label for="search">Search:</label>
        <input type="text" id="search" name="query" placeholder="Enter Code To Search">
        <button type="submit">Search</button>
    </form>
        
            <?php
 include "../config/database.php";
 include "../header/header.php";
 


// Check if the delete button is clicked
if (isset($_GET['delete_id'])) {
    $id_to_delete = $_GET['delete_id'];

    // Delete the record from the database
    $query = "DELETE FROM subject WHERE code = '$id_to_delete'";
    $result = mysqli_query($conn, $query);

    // Check if the delete operation was successful
    if ($result) {
        echo '<script>
        Swal.fire({
            title: "Successfully Deleted",
            text: "Back To Subject Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "subject.php";
            }
        });
    </script>';
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}


 $display ="SELECT * FROM subject";
 $result = $conn->query($display);
 if($result->num_rows > 0){
    echo "<table border='1'>
    <tr >
        <th>Code</th>
        <th>Description</th>
        <th>Unit</th>
        <th>Type</th>
        <th>Course</th>
        <th>Institute</th>
        <th>Action</th>
        <th>Update</th>

    </tr>";
    while($row = $result->fetch_assoc()){
        $id  = $row['code'];
             
        echo "<tr>
        <td>" . $row["code"]. "</td>
        <td>" . $row["description"]. "</td>
        <td>" . $row["unit"]. "</td>
        <td>" . $row["type"]. "</td>
        <td>" . $row["course"]. "</td>
        <td>" . $row["institute"]. "</td>
        <td><a href='?delete_id={$row['code']}'><button>Delete</button></a></td>
        <td> <a href='updatesubject.php'><button>Update</button></a>
      
 

    </tr>";
    }
    echo "</table>";
}else{
    echo "0 results";
}




?>


           
            
<a href="addsubject.php"><button>Insert</button></a>
 

        </main>
    </div>
</body>

</html>

</body>
</html>