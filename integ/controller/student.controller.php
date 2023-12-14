<?php

include "../header/header.php";
include "../config/database.php";
include "../model/student.model.php";




if($_SERVER['REQUEST_METHOD'] == "POST"){
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
        window.location.href= "../admin/addstudent.php";
         alert("Other Text Field are Blank PLease Fill Out Again!!")
        </script>
        "';
    }elseif($student->CheckID($id)){

echo '<script>
        window.location.href= "../admin/addstudent.php";
         alert("This Id Is Already Taken!!")
        </script>
        "';
    }  else{
        $result = $student->InsertStudent($id,$firstname,$lastname,$middlename,$dbirth,$gender,$province,
        $municipality,$barangay,$zipcode,$number,$institute,$course,$gname,$gnumber,$address);


        if($result){
            echo '<script>
        Swal.fire({
            title: "Successfully Added",
            text: "Back To Admin Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "../admin/student.php";
            }
        });
    </script>';

        }
    }




}


?>