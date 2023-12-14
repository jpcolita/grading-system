
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../public/student.css">
    <style>
        form {
    display: grid;
    gap: 15px;
    max-width: 400px;
    margin: 0 auto;
}

label {
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
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
            <h1>Welcome to the Admin Dashboard!</h1>
        </header>
        <main>
            <h2>Insert Admin Here</h2>
           <form action="../controller/admin.controller.php" method="POST">
           <label for="Username">Username : </label>
<input type="text" name="username" placeholder="Enter Username">

<label for="Password">Password</label>
<input type="password" name="password" placeholder="Enter Password">

<label for="Confirmpass">Password Confirmation</label>
<input type="password" name="confirmpass" placeholder="Confirm Password">


<input type="submit" name="admin">
           </form>
           
           <?php
           include "../header/header.php";
   include "../config/database.php";
   
// Check if the delete button is clicked
if (isset($_GET['delete_id'])) {
    $id_to_delete = $_GET['delete_id'];

    // Delete the record from the database
    $query = "DELETE FROM login WHERE id = '$id_to_delete'";
    $result = mysqli_query($conn, $query);

    // Check if the delete operation was successful
    if ($result) {
        echo '<script>
        Swal.fire({
            title: "Successfully Deleted",
            text: "Back To Course Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "admins.php";
            }
        });
    </script>';
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

   $display ="SELECT * FROM login";
   $result = $conn->query($display);

if($result->num_rows > 0){
    echo "<table border='1'>
    <tr >
        <th>ID</th>
        <th>Username</th>
        <th>Delete</th>
     

    </tr>";
    while($row = $result->fetch_assoc()){
        $id  = $row['id'];

        echo "<tr>
        <td>" . $row["id"]. "</td>
        <td>" . $row["username"]. "</td>
        <td><a href='?delete_id={$row['id']}'><button>Delete</button></a></td>
         
      
      
 

    </tr>";
   
    }
    echo "</table>"."<br>";
}else{
    echo "0 results";
}



?>
<?php
// Start the session
session_start();




// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // echo 'Logged in as ' . $_SESSION['username'] . '<br>'.'<br>';
    echo ' <a href="logout.php"><button>Log out</button></a>';
}
else {
   header("location: logout.php");
}
?>


          
        </main>
    </div>


 
 
   


</body>

</html>

</body>
</html>