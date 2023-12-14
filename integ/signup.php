<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Sign Up</title>
    <link rel="stylesheet" href="./public/style.css">
</head>
<body>
    




<form action="./controller/signup.controller.php" method="POST">

<label for="Username">Username : </label>
<input type="text" name="username" placeholder="Enter Username" required>

<label for="Password">Password</label>
<input type="password" name="password" placeholder="Enter Password" required>

<label for="Confirmpass">Password Confirmation</label>
<input type="password" name="confirmpass" placeholder="Confirm Password" required>

<label for="Email">Email</label>
<input type="email" name="email" placeholder="Enter Email" required>

<input type="submit" id="register">

<div>
<p>Already have an Acoount?</p><a href="login.php">Login here.</a>
</div>


</form>


</body>
</html>