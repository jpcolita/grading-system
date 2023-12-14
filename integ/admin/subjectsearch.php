<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Subject</title>
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
    $sql = "SELECT * FROM subject WHERE code LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

   if(empty($searchQuery)){
    echo '<script>
    window.location.href= "subject.php";
     alert("Text Field Is Empty.")
   </script>
    "';
   }else{
     // Display search results
     if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr >
            <th>Code</th>
            <th>Description</th>
            <th>Unit</th>
            <th>Type</th>
            <th>Course</th>
            <th>Institute</th>
           
    
        </tr>";

        while ($row = $result->fetch_assoc()) {
            // Output or format the search results as needed
                    
        echo "<tr>
        <td>" . $row["code"]. "</td>
        <td>" . $row["description"]. "</td>
        <td>" . $row["unit"]. "</td>
        <td>" . $row["type"]. "</td>
        <td>" . $row["course"]. "</td>
        <td>" . $row["institute"]. "</td>
     
 

    </tr>";
        }
    } else {
        echo '<script>
        window.location.href= "subject.php";
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
       
           
     
           <a href="subject.php"><button>Back To Student Page</button></a>

        </main>
    </div>
</body>

</html>

</body>
</html>