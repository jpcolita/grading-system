<?php


class School{

private $conn;


public function __construct($conn)
{
    $this->conn=$conn;
}

// Function to add a new school year
function addSchoolYear($year, $semester) {
    global $conn;
    $status = 'inactive'; // By default, new school years are inactive

    $stmt = $conn->prepare("INSERT INTO school_years (year, semester, status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $year, $semester, $status);

    return $stmt->execute();
}
    
function updateStatus($id, $status) {
    global $conn;

    $stmt = $conn->prepare("UPDATE school_years SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);

    return $stmt->execute();
}







}









?>