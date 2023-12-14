<?php


class SubjectModel{

    private $conn;



    public function __construct($conn)
    {
        $this->conn=$conn;
    }

    public function InsertSubject($code,$description,$unit,$type,$course,$institute){
        $stmt = $this->conn->prepare("INSERT INTO subject (code,description, unit, type,course ,institute) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $code,$description, $unit, $type,$course,$institute);
        return $stmt->execute();
    }

   
    public function CheckCode($code){
        $checkQuery = "SELECT * FROM subject WHERE code='$code'  ";
        $result = $this->conn->query($checkQuery);
    
    
        if($result->num_rows > 0){
               return true;
        }else{
            return false;
        }
    }


    public function UpdateSubject($description,$unit,$type,$course,$institute,$code){
        $stmt = $this->conn->prepare("UPDATE subject SET description=?, unit=?, type=?, course=?, institute=?   WHERE code=?");
        $stmt->bind_param("ssssss",$description,$unit,$type,$course,$institute,$code);
        return $stmt->execute();
        }
    



    
}





?>