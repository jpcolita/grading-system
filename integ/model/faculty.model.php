<?php


class FacultyModel{

    private $conn;



    public function __construct($conn)
    {
        $this->conn=$conn;
    }

    public function InsertFaculty($id,$lastname,$firstname,$middlename,$dbirth,$gender,$institute,$course,$number){
        $stmt = $this->conn->prepare("INSERT INTO faculty (id,lastname, firstname, middlename, dbirth,gender,institute,course,number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $id,$lastname, $firstname, $middlename,$dbirth,$gender,$institute,$course,$number);
        return $stmt->execute();
    }

    public function CheckID($id){
        $checkQuery = "SELECT * FROM faculty WHERE id='$id'  ";
        $result = $this->conn->query($checkQuery);


        if($result->num_rows > 0){
               return true;
        }else{
            return false;
        }

    }

    public function UpdateFaculty($lastname,$firstname,$middlename,$dbirth,$gender,$institute,$course,$number,$id){
        $stmt = $this->conn->prepare("UPDATE faculty SET lastname=?, firstname=?, middlename=?, dbirth=? , gender=? , institute=?, course=?, number=?    WHERE id=?");
        $stmt->bind_param("sssssssss",$lastname,$firstname,$middlename,$dbirth,$gender,$institute,$course,$number,$id);
        return $stmt->execute();
        }

   

}






?>