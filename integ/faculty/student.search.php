<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Search </title>
    <style>
        
.btn {
    background-color: #4caf50;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #45a049;
}
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
}

.container {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"] {
    padding: 10px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
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

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #4caf50;
    color: white;
}


    </style>
</head>
<body>
<h1>Search Here</h1>
   
<a href="insertgrade.php"><button class="btn">Insert Grade Here</button></a>
<a href="gpage.php"><button class="btn">Back Here</button></a>
<form  method="get" class="container">
        <label for="search">Search:</label>
        <!-- <input type="text" id="search" name="query" placeholder="Enter ID To Search"> -->
  <input type="text" name="query" placeholder="Enter Student ID">

        <button type="submit">Search</button>
    </form>






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
            window.location.href= "student.search.php";
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
            window.location.href= "student.search.php";
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
       














</body>
</html>