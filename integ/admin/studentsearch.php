<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
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
      
    </div>

    <div class="content">
        <header>
            <h1>Welcome to the Dashboard!</h1>
        </header>
        <main>

       <?php

include "../config/database.php";




// Process the search query
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Use the search query in your SQL query
    $sql = "SELECT * FROM students WHERE id LIKE '%$searchQuery%'";
    $result = $conn->query($sql);



    if(empty($searchQuery)){
         
        echo '<script>
        window.location.href= "student.php";
         alert("Text Field Is Empty.")
       </script>
        "';
    }else{
         // Display search results
    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr >
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Middlename</th>
            <th>Date Of Birth</th>
            <th>Gender</th>
            <th>Province</th>
            <th>Municipality</th>
            <th>Barangay</th>
            <th>Zipcode</th>
            <th>Phone Number</th>
            <th>Institute</th>
            <th>Course</th>
            <th>Guardian Name</th>
            <th>Guardian Number</th>
            <th>Address</th>
            
          
    
        </tr>";
        while ($row = $result->fetch_assoc()) {
            // Output or format the search results as needed
            echo "<tr>
            <td>" . $row["id"]. "</td>
            <td>" . $row["firstname"]. "</td>
            <td>" . $row["lastname"]. "</td>
            <td>" . $row["middlename"]. "</td>
            <td>" . $row["dbirth"]. "</td>
            <td>" . $row["gender"]. "</td>
            <td>" . $row["province"]. "</td>
            <td>" . $row["municipality"]. "</td>
            <td>" . $row["barangay"]. "</td>
            <td>" . $row["zipcode"]. "</td>
            <td>" . $row["number"]. "</td>
            <td>" . $row["institute"]. "</td>
            <td>" . $row["course"]. "</td>
            <td>" . $row["gname"]. "</td>
            <td>" . $row["gnumber"]. "</td>
            <td>" . $row["address"]. "</td>
         
          
     
    
        </tr>";
        }
    }
     else {
       
        echo '<script>
        window.location.href= "student.php";
         alert("The Id Number Did Not Exist.")
       </script>
        "';
    }

    }

   

    // Free the result set
    $result->free_result();
}

// Close the database connection
$conn->close();
?>
       
           
     
           <a href="student.php"><button>Back To Student Page</button></a>
        </main>
    </div>
</body>

</html>

</body>
</html>