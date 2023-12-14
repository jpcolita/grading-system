<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 16px;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: lightgreen;
}

/* Add additional styling as needed */
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

button {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 10px;
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

<form action="student.grade.info.php" method="POST" class="container">
    <label for="">Enter Student ID to See Grade</label>
      <input type="text" name="id" placeholder="Enter ID ">

    <input type="submit" name="student">

</form>
<?php

include "../config/database.php";
session_start();
// Check if the user is logged in
if (isset($_SESSION["id_number"])) {
$faculty_name = $_SESSION["id_number"];

echo "ID Number: ". $faculty_name;

$qry = "SELECT name,course,yearlevel,code,description,time FROM grades WHERE id = '$faculty_name' GROUP BY name,course,yearlevel,code,description,time";
$result = mysqli_query($conn, $qry);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr >
    
        <th>Name</th>
        <th>Course</th>
        <th>Year Level</th>
        <th>Code</th>
        <th>Description</th>
        <th>Time</th>
     
    
    

    </tr>";
    while( $row = mysqli_fetch_assoc($result)){

        echo "<tr>
        <td>" . $row["name"]. "</td>
        <td>" . $row["course"]. "</td>
        <td>" . $row["yearlevel"]. "</td>
        <td>" . $row["code"]. "</td>
        <td>" . $row["description"]. "</td>
        <td>" . $row["time"]. "</td>
    
    


    </tr>";
    }
    // $row = mysqli_fetch_assoc($result);
    // echo "Your email is: " . $row['faculty'];

} else {
    echo "User not found in the database.";
}

}else{
header("location : report.php");

// if (isset($_SESSION['username'])) {
//     // echo 'Logged in as ' . $_SESSION['username'] . '<br>'.'<br>'  ;

// } else {
//   header("location: logout.php");
// }
}

?>

<a href="grade.php"><button>Back</button></a>
</body>
</html>



<?php

include "../config/database.php";
if(isset($_POST['student'])){
    $id_number= $_POST['id'];
session_start();
$sel = "SELECT id FROM grades GROUP BY id";


$qry = mysqli_query($conn,$sel);

if($qry){
    $_SESSION["id_number"] = $id_number;

//  header("location: gpage.php");
echo '<script> 
window.location.href="subject.grade.php";
alert("Welcome!")
</script>
';
}

}

?>
   