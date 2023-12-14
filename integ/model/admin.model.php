<?php


class Admin{
    private $conn;


    public function __construct($conn)
    {
        $this->conn=$conn;
    }


    public function registerAdmin($username, $password) {
        //  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            return $stmt->execute();
        }

        public function checkUsername($username) {
            $checkQuery = "SELECT * FROM login WHERE username='$username' ";
            $result = $this->conn->query($checkQuery);
    
            if ($result->num_rows > 0) {
                return true; // Username or email already taken
            } else {
                return false; // Username and email are available
            }
        }


        public function AddInstitute($institute){
            $stmt = $this->conn->prepare("INSERT INTO institute (institute) VALUES (?)");
            $stmt->bind_param("s", $institute);
            return $stmt->execute();

        }
        public function checkInstitute($institute) {
            $checkQuery = "SELECT * FROM institute WHERE institute='$institute' ";
            $result = $this->conn->query($checkQuery);
    
            if ($result->num_rows > 0) {
                return true; // Username or email already taken
            } else {
                return false; // Username and email are available
            }
        }


        public function AddCourse($course){
            $stmt = $this->conn->prepare("INSERT INTO course (course) VALUES (?)");
            $stmt->bind_param("s", $course);
            return $stmt->execute();

        }
        public function checkCourse($course) {
            $checkQuery = "SELECT * FROM course WHERE course='$course' ";
            $result = $this->conn->query($checkQuery);
    
            if ($result->num_rows > 0) {
                return true; // Username or email already taken
            } else {
                return false; // Username and email are available
            }
        }


   
}












?>