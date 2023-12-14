<?php




class Assign{


    private $conn;

    function __construct($conn)
    {
        $this->conn=$conn;
    }



    public function AssignSubject($faculty, $subject)
    {
        $stmt = $this->conn->prepare("INSERT INTO assignsubject (faculty, subject) VALUES (?, ?)");
        $stmt->bind_param("ss", $faculty, $subject);
    
        // Execute the query
        $result = $stmt->execute();
    
        // Close the statement
        $stmt->close();
    
        return $result;
    }


    public function check($faculty, $subject) {
        $checkQuery = "SELECT * FROM assignsubject WHERE faculty='$faculty' AND subject='$subject'";
        $result = $this->conn->query($checkQuery);
    
        if ($result->num_rows > 0) {
            return true; // Combination of faculty and subject already exists
        } else {
            return false; // Combination of faculty and subject is available
        }
    }

    public function AssignStudent($fassigns, $assignstudent)
{
    $stmt = $this->conn->prepare("INSERT INTO assignstudent (fassigns, assignstudents) VALUES (?, ?)");
    $stmt->bind_param("ss", $fassigns, $assignstudent);

    // Execute the query
    $result = $stmt->execute();

    // Close the statement
    $stmt->close();

    return $result;
}



public function checkstudent($fassigns, $assignstudent) {
    $checkQuery = "SELECT * FROM assignstudent WHERE fassigns='$fassigns' AND assignstudents='$assignstudent'";
    $result = $this->conn->query($checkQuery);

    if ($result->num_rows > 0) {
        return true; // Combination of faculty and subject already exists
    } else {
        return false; // Combination of faculty and subject is available
    }
}

}








?>