
<?php




include "../config/database.php";


session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    // echo "Welcome, $username!";

    // Assuming you have a database connection named $conn
//     $qry = "SELECT * FROM users WHERE username = '$username'";
//     $result = mysqli_query($conn, $qry);

//     if ($result->num_rows > 0) {
//         $row = mysqli_fetch_assoc($result);
//         echo "Your email is: " . $row['email'];
//     } else {
//         echo "User not found in the database.";
//     }
// } else {
//     // Redirect to the login page if not logged in
//   echo "Mali";
//     exit();
// }







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../public/dashboard.css">
    <link rel="stylesheet" href="../public/profile.css">
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
      
        <li><a href="profile.php"><?php echo "Welcome, $username";?></a></li>
          <li><a href="users.php">Dashboard</a></li>
          <li><a href="grade.php">Grade</a></li>
          

        </ul>
    </div>

    <div class="content">
        <header>
            <h1>Welcome to the Dashboard!</h1>
        </header>
        <main>
            
<div class="main">

<div class="profile">
<h2>My Profile(<a href="edit.php">edit</a>)</h2>

</div>
<hr>



<div class="profile1">
    <label for="">Name</label>
</div>

<div class="profile2">
    <?php
echo  $username;
    ?>
    
</div>






<?php


$qry = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $qry);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);

    ?>


<div class="profile3">
    <label for="">Email</label>
</div>

<div class="profile4">
    <?php
    echo  $row['email'];
    ?>
</div>
</div>

<?php
} else {
    echo "User not found in the database.";
}
} else {
// Redirect to the login page if not logged in
header("location: ../login.php");
exit();
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



































































































































    









