<?php
class UserModel {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }


    // public function verifyUser($username, $password) {
    //     // Prepare the SQL statement using a prepared statement
    //     $sql = "SELECT * FROM users WHERE username = ?";
    //     $stmt = $this->dbConnection->prepare($sql);

    //     // Bind the parameters and execute the statement
    //     $stmt->bind_param("s", $username);
    //     $stmt->execute();

    //     // Get the result set
    //     $result = $stmt->get_result();

    //     // Check if a user with the given username exists
    //     if ($result->num_rows > 0) {
    //         // Fetch the user data from the result set
    //         $row = $result->fetch_assoc();

    //         // Verify the password using password_verify function
    //         if (password_verify($password, $row['password'])) {
    //             // Password is correct, return the user data
    //             return $row;
    //         } else {
    //             // Password is incorrect, return false
    //             return false;
    //         }
    //     } else {
    //         // User with the given username does not exist, return false
    //         return false;
    //     }
    // }


   public function verifyUser($username, $password) {
        // Implement your database logic to verify the user here
        // Return true if the user is valid, false otherwise
        // Example code assuming users table has columns: id, username, password
        
        $sql="select * from users where username = '" .$username."' and  password = '" .$password ."'";
        $result = $this->dbConnection->query($sql);

        return $result->fetch_assoc();



        
    }
  

    public function verifyAdmin($username, $password) {
        // Implement your database logic to verify the user here
        // Return true if the user is valid, false otherwise
        // Example code assuming users table has columns: id, username, password
        
        $sql="select * from login where username = '" .$username."' and  password = '" .$password ."'";
        $result = $this->dbConnection->query($sql);

        return $result;



        
    }


    public function verifyFaculty($username, $password) {
        // Implement your database logic to verify the user here
        // Return true if the user is valid, false otherwise
        // Example code assuming users table has columns: id, username, password
        
        $sql="select * from loginfaculty where username = '" .$username."' and  password = '" .$password ."'";
        $result = $this->dbConnection->query($sql);

        return $result;



        
    }

    
    







}












 











?>