 
 <?php


class UserStudent{




    private $conn;

    public function __construct($conn)
    {
        $this->conn=$conn;
    }

public function InsertStudent($id,$firstname,$lastname,$middlename,$dbirth,$gender,$province,
$municipality,$barangay,$zipcode,$number,$institute,$course,$gname,$gnumber,$address){
$stmt = $this->conn->prepare("INSERT INTO students (id,firstname,lastname,middlename,dbirth,gender,province,
municipality,barangay,zipcode,number,institute,course,gname,gnumber,address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssssss", $id,$firstname,$lastname,$middlename,$dbirth,$gender,$province,
$municipality,$barangay,$zipcode,$number,$institute,$course,$gname,$gnumber,$address);
    return $stmt->execute();
}



public function CheckID($id){
    $checkQuery = "SELECT * FROM students WHERE id='$id'  ";
    $result = $this->conn->query($checkQuery);


    if($result->num_rows > 0){
           return true;
    }else{
        return false;
    }

}




public function UpdateStudent($firstname, $lastname, $middlename, $dbirth, $gender, $province,
    $municipality, $barangay, $zipcode, $number, $institute, $course, $gname, $gnumber, $address, $id)
{
    $stmt = $this->conn->prepare("UPDATE students SET firstname=?, lastname=?, middlename=?, dbirth=?, gender=?, province=?, municipality=?, barangay=?, zipcode=?, number=?, institute=?, course=?, gname=?, gnumber=?, address=? WHERE id=?");
    $stmt->bind_param("ssssssssssssssss", $firstname, $lastname, $middlename, $dbirth, $gender, $province,
        $municipality, $barangay, $zipcode, $number, $institute, $course, $gname, $gnumber, $address, $id);
    return $stmt->execute();
}


}








?>