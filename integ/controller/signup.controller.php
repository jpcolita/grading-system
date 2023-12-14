<?php
include '../config/database.php';
include '../model/signup.model.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['confirmpass'];

    $user = new User($conn);

if($password != $repeatPassword){
    echo '<script>
    window.location.href= "../signup.php";
     alert("Passwords do not match. Please try again.")
    </script>
    "';
}elseif($user->checkUsernameAndEmail($username, $email)){
    echo '<script>
    window.location.href= "../signup.php";
     alert("Username or email already taken. Please choose another username and email.")
    </script>
    "';
}else {
        // Register the new user
        $result = $user->registerUser($username, $password, $email);

        if ($result) {
            // echo "Registration successful!";
            // header("location: ../view/login.php");
            
              echo '<script>
    window.location.href= "../login.php";
     alert("Sign Up Successfully.")
    </script>
    "';
        } 
    
}

   

}














?>
