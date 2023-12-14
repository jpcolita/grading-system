<?php

include "../config/database.php";
session_start();

// Check if the user is logged in
if (isset($_SESSION["username"])) {
$username = $_SESSION["username"];



// echo "Welcome, $username!";



} else {
// Redirect to the login page if not logged in
header("Location: logout.php");
exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>User Page </title>
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
/* Apply basic styles to the center-text div */
.center-text {
    text-align: center;
    padding: 20px;
    background-color: transparent; /* Background color */
    color: black; /* Text color */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Add some margin to the div for spacing */
.center-text {
    margin-top: 20px;
}
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

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


    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
    
        <li><a href="profile.php"><?php echo "Welcome, ".$username;?></a></li>
          <li><a href="users.php">Dashboard</a></li>
          <li><a href="grade.php">Grade</a></li>
          

        </ul>
    </div>

    <div class="content">
        <header>
            <h1>Welcome to the Student Dashboard!</h1>
        </header>
        <main>


        <?php

$qry = "    SELECT * FROM school_years ";


$result = mysqli_query($conn,$qry);

while($row = mysqli_fetch_assoc($result)){
    $id = $row['status'];
$year = $row['year'];
    $semester = $row['semester'];
              ?>
                 <div class="center-text">
        <?php echo "School Year:"." ".$year . " " . "Semester :"." ".$semester." "."Status :"." " .$id ;?>
    </div>
              <?php
}        
?>


<form action="users.php" method="POST" class="container">
    <label for="">Enter Student ID to See schedule</label>
      <input type="text" name="id" placeholder="Enter ID ">

    <input type="submit" name="student">

</form>

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
window.location.href="schedule.php";
alert("Welcome!")
</script>
';
}

}

?>

   


        
          <?php
// Start the session


// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // echo 'Logged in as ' . $_SESSION['username'] . '<br>'.'<br>';
    echo ' <a href="logout.php"><button>Log out</button></a>';
} 
?>

        </main>
    </div>



   

 
 
   


</body>

</html>

</body>
</html>













































