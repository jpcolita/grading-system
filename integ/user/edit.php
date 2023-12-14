
<?php




include "../config/database.php";


// session_start();

// if (isset($_SESSION["username"])) {
//     $username = $_SESSION["username"];

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




session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    // echo "Welcome, $username!";

    // Assuming you have a database connection named $conn
    $qry = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        // echo "Your email is: " . $row['email'];
        $email = $row['email'];
        $id = $row['id'];
    } else {
        echo "User not found in the database.";
    }
} else {
    // Redirect to the login page if not logged in
  echo "Mali";
    exit();
}






      
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../public/dashboard.css">
    <link rel="stylesheet" href="../public/edit.css">

   
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
<h2>My Profile</h2>
</div>
<hr>

<form action="../controller/admin.controller.php" method="POST" >

<div class="profile1">
<label for="">Username</label>
</div>

<div class="profile2">
<?php
  echo '<input type="text" readonly name="id" value="' . $username . '" class="input1">';

  ?>
</div>
    
<div class="profile3">
    <label for="">Email</label>
    </div>
    
    <div class="profile4">
    <?php
   echo '<input type="text" name="email" value="' . $email . '">';
   

?>
</div>



<input type="submit" name="profile" value="edit">

<!-- <a href=""><Button>Delete</Button></a> -->

</form>
<?php
include "../config/database.php";
include "../header/header.php";





// if (isset($_GET['delete_id'])) {
//     $id_to_delete = $_GET['delete_id'];

//     // Delete the record from the database
//     $query = "DELETE FROM users WHERE id = '$id_to_delete'";
//     $result = mysqli_query($conn, $query);

//     // Check if the delete operation was successful
//     if ($result) {
//         echo '<script>
//         Swal.fire({
//             title: "Successfully Deleted",
//             text: "Redirecting to Login Page...",
//             icon: "success",
//             showConfirmButton: false,
//             timer: 2000,
//             onClose: () => {
//                 window.location.href = "../login.php";
//             }
//         });
//     </script>';
//     } else {
//         echo "Error deleting record: " . mysqli_error($connection);
//     }
// }

// $display = "SELECT * FROM users";


// $result = mysqli_query($conn,$display);

// if($row = mysqli_fetch_assoc($result)){
//    echo " <a href='?delete_id={$row['id']}'><button>Delete</button></a>";
// }




































if (isset($_GET['delete_id'])) {
    $id_to_delete = $_GET['delete_id'];

    // Display confirmation dialog using JavaScript
    echo '<script>
        var userConfirmed = confirm("Are you sure you want to delete this record?");
        if (userConfirmed) {
            // User confirmed, proceed with deletion
            window.location.href = "edit.php?confirmed_delete_id=' . $id_to_delete . '";
        } else {
            // User canceled the deletion
            window.location.href = "edit.php"; 
        }
    </script>';
}




// Check for confirmed deletion
if (isset($_GET['confirmed_delete_id'])) {
    $id_to_delete = $_GET['confirmed_delete_id'];

    // Delete the record from the database
    $query = "DELETE FROM users WHERE id = '$id_to_delete'";
    $result = mysqli_query($conn, $query);

    // Check if the delete operation was successful
    if ($result) {
        echo '<script>
            Swal.fire({
                title: "Successfully Deleted",
                text: "Redirecting to Login Page...",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                onClose: () => {
                    window.location.href = "../login.php"; // 
                }
            });
        </script>';
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}




// Display records
$display = "SELECT * FROM users";
$result = mysqli_query($conn, $display);

while ($row = mysqli_fetch_assoc($result)) {
    echo "
        <div>
           
            <a href='?delete_id={$row['id']}'><button>Delete</button></a>
        </div>
    ";
}

?>

</div>
        </main>
    </div>


 
 
   



</body>
</html>



































































































































    









