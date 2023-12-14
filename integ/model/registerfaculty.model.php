<?php


class Faculty{



private $conn;


public function __construct($conn)
{
    $this->conn=$conn;
}




public function registerFaculty($username, $password) {
    //  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO loginfaculty (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        return $stmt->execute();
    }


public function checkUsername($username) {
    $checkQuery = "SELECT * FROM loginfaculty WHERE username='$username' ";
    $result = $this->conn->query($checkQuery);

    if ($result->num_rows > 0) {
        return true; // Username or email already taken
    } else {
        return false; // Username and email are available
    }
}

























}

















?>