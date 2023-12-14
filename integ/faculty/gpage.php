
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculties Grad Page</title>
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
.fname {
    background-color: transparent;
    color: black;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.fsubject {
    background-color: transparent;
    color: black;
    padding: 10px;
    margin-top: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            <li><a href="facultiespage.php">Faculty</a></li>
            <li><a href="student.php">Students</a></li>
            <li><a href="grade.php">Grades</a></li>
            <li><a href="report.php">Reports</a></li>

        </ul>
    </div>

    <div class="content">
        <header>
            <h1>Welcome to the Faculties Grade!</h1>
        </header>
        <main>



        <?php

        include "../config/database.php";
        session_start();
// Check if the user is logged in
if (isset($_SESSION["faculty_name"])) {
    $faculty_name = $_SESSION["faculty_name"];

    ?>
    <div class="fname">
    <?php   echo "Welcome : ".$faculty_name;?>
    </div>
    
    <?php
  

    $qry = "SELECT subject FROM assignsubject WHERE faculty = '$faculty_name' GROUP BY subject";
        $result = mysqli_query($conn, $qry);
    
        if ($result->num_rows > 0) {

            while( $row = mysqli_fetch_assoc($result)){
                ?>
                <div class="fsubject">
                    <?php
                     echo "Here Are the Subjects That You Handle " . $row['subject'];
                    ?>
                </div>
                <?php
               
            }
            // $row = mysqli_fetch_assoc($result);
            // echo "Your email is: " . $row['faculty'];

        } else {
            echo "User not found in the database.";
        }
     
}else{
    session_unset();

    // if (isset($_SESSION['username'])) {
    //     // echo 'Logged in as ' . $_SESSION['username'] . '<br>'.'<br>'  ;
      
    // } else {
    //   header("location: logout.php");
    // }
    }


?>
     
   


     <a href="student.search.php"><button>View Here</button></a>
          <?php
// Start the session

// session_start();
// Check if the user is logged in
// if (isset($_SESSION['username'])) {
//     // echo 'Logged in as ' . $_SESSION['username'] . '<br>'.'<br>'  ;
//     echo ' <a href="logout.php"><button>Log out</button></a>';
// } else {
//   header("location: logout.php");
// }
echo ' <a href="grade.php"><button>Back</button></a>';
?>
         


        </main>
    </div>


 
 
   


</body>

</html>

</body>
</html>