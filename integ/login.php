<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./public/login.css">
</head>
<body>
    <form action="./controller/login.controller.php" method="POST">

      <h2>Log in</h2>

      <label for="Username">username</label>
      <input type="text" name="username">
      <label for="Password">Password</label>
      <input type="password" name="password">
      <input type="submit">



    </form>
    <a href="signup.php">signup</a>
   
</body>
</html>