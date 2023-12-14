<?php


include "../config/database.php";
include "../model/faculty.model.php";
include "../model/student.model.php";
include "../model/subject.model.php";


if(isset($_POST['faculty'])){
      
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $dbirth = $_POST['dbirth'];
    $gender = $_POST['gender'];
    $institute = $_POST['institute'];
    $course = $_POST['course'];
    $number = $_POST['number'];


    $faculty = new FacultyModel($conn);

    if(empty($id) || empty($lastname) || empty($firstname) || empty($middlename) || empty($dbirth) || empty($number)){
        echo '<script>
        window.location.href= "../admin/updatefaculty.php";
         alert("Other Text Field are Blank PLease Fill Out Again.")
       </script>
        "';
    }else{
        $result = $faculty->UpdateFaculty($lastname,$firstname,$middlename,$dbirth,$gender,$institute,$course,$number,$id);

        if($result){
            echo '<script>
            window.location.href= "../admin/faculty.php";
             alert("Update Complete.")
           </script>
            "';
        }
    }

   

   
    


}










if(isset($_POST['subject'])){
    $code = $_POST['code'];   
    $description = $_POST['description'];  
    $unit = $_POST['unit'];  
    $type = $_POST['type'];  
    $course = $_POST['course'];  
    $institute = $_POST['institute'];  

$subject = new SubjectModel($conn);


if(empty($code) || empty($description)){
    echo '<script>
    window.location.href= "../admin/updatesubject.php";
    alert("Other Text Field are Blank PLease Fill Out Again.")
  </script>
   "';
}else{

$result = $subject->UpdateSubject($description,$unit,$type,$course,$institute,$code);


if($result){
    echo '<script>
    window.location.href= "../admin/subject.php";
     alert("Update Complete.")
   </script>
    "';
}
}
    
}





if(isset($_POST['student'])){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $dbirth = $_POST['dbirth'];
    $gender = $_POST['gender'];
    $province = $_POST['province'];
$municipality = $_POST['municipality'];
$barangay = $_POST['barangay'];
$zipcode = $_POST['zipcode'];
$number = $_POST['number'];
$institute = $_POST['institute'];
$course = $_POST['course'];
$gname = $_POST['gname'];
$gnumber = $_POST['gnumber'];
$address = $_POST['address'];


$student = new UserStudent($conn);


if(empty($id) || empty($lastname) || empty($firstname) || empty($middlename) || empty($dbirth) || empty($zipcode) || empty($number) 
|| empty($gname) || empty($gnumber) || empty($address)){
    echo '<script>
    window.location.href= "../admin/updatestudent.php";
     alert("Other Text Field are Blank PLease Fill Out Again!!")
    </script>
    "';
}else{

$result = $student->UpdateStudent($firstname,$lastname,$middlename,$dbirth,$gender,$province,
$municipality,$barangay,$zipcode,$number,$institute,$course,$gname,$gnumber,$address,$id);

if($result){
    echo '<script>
    window.location.href= "../admin/student.php";
     alert("Update Complete.")
   </script>
    "';

}
}



}







?>