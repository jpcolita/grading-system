<?php
  include "../config/database.php";


  class Model{


private $conn;

public function __construct($conn)
{
    $this->conn=$conn;
}

public function GetProvince(){
    $qry = "SELECT * FROM province";


$result = mysqli_query($this->conn,$qry);

if(!$result){
die("Error");
}

while($row = mysqli_fetch_assoc($result)){

    $id = $row['province'];

    echo "<option value='$id'>$id</option>";
}


}

public function GetMunicipality(){
    $municipality = "SELECT * FROM municipality";
    

    $result = mysqli_query($this->conn,$municipality);

    while($row = mysqli_fetch_assoc($result)){

        $id = $row['municipality'];
    
        echo "<option value='$id'>$id</option>";
    }


}


public function GetBarangay(){
    $barangay = "SELECT * FROM barangay";


    $result = mysqli_query($this->conn,$barangay);

    while($row = mysqli_fetch_assoc($result)){

        $id = $row['barangay'];
    
        echo "<option value='$id'>$id</option>";
    }
} 




public function GetCourse(){
    $qry = "SELECT * FROM course";

    $result = mysqli_query($this->conn,$qry);
    
    while($row = mysqli_fetch_assoc($result)){
       $id = $row['course'];
       echo "<option value='$id'>$id</option>";
    }
    
} 

public function GetSubject(){
    $qry = "SELECT * FROM subject";
    $result = mysqli_query($this->conn,$qry);

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['code'];
        echo "<option value='$id'>$id</option>";
     }

}

public function GetFaculty(){
    $qry = "SELECT * FROM faculty";
    $result = mysqli_query($this->conn,$qry);

    while($row = mysqli_fetch_assoc($result)){

        $id =  $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}


public function GetStudent(){
    $qry = "SELECT * FROM students";
    $result = mysqli_query($this->conn,$qry);

    while($row = mysqli_fetch_assoc($result)){

        $id =  $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}


public function GetInstitute(){
    $qry = "SELECT * FROM institute";
    $result = mysqli_query($this->conn,$qry);

    while($row = mysqli_fetch_assoc($result)){

        $id =  $row['institute'];
        echo "<option value='$id'>$id</option>";
    }
}



public function GetMember(){
    $qry = "SELECT * FROM assignsubject";
    $result = mysqli_query($this->conn,$qry);

    while($row = mysqli_fetch_assoc($result)){

        $id =  $row['faculty'];
        echo "<option value='$id'>$id</option>";
    }
}


  }



    












?>