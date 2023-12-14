<?php
include "../config/database.php";
include "../model/school.model.php";
include "../header/header.php";
include "../model/assign.model.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        // Handle adding a new school year
        $year = $_POST['year'];
        $semester = $_POST['semester'];
        // addSchoolYear($year, $semester);

        $add = new School($conn);

        $result = $add->addSchoolYear($year,$semester);


              if($result){
             
                echo '<script>
                Swal.fire({
                    title: "Successfully Added",
                    text: "Back To School Page",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                    onClose: () => {
                        window.location.href = "../admin/school.php";
                    }
                });
            </script>';


              }  else{
                echo "Not Yet";
              }  





    } elseif (isset($_POST['update'])) {
        session_start();

        // Handle updating the status of a school year
        $update_id = $_POST['update_id'];
        $update_status = $_POST['update_status'];
        // updateStatus($update_id, $update_status);

        $update = new School($conn);

        $result = $update->updateStatus($update_id,$update_status);


        if($result){

            $_SESSION["update_status"] = $update_status;
            echo '<script>
            Swal.fire({
                title: "Successfully Updated",
                text: "Back To School Page",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                onClose: () => {
                    window.location.href = "../admin/school.php";
                }
            });
        </script>';
        }else{
            echo "Di pa";
        }
    }
    // Add logic for other form submissions (remove, set status)
    elseif (isset($_POST['assignsubject'])) {
        $faculty = $_POST['faculty'];
        $subject = $_POST['subject'];
    
        $assign = new Assign($conn);
    
      

        if($assign->check($faculty,$subject)){
            echo '<script>
            Swal.fire({
                title: "Faculty  and Subject Are Already Assign ",
                text: "Please choose Another One",
                icon: "error",
                showConfirmButton: true,
                onClose: () => {
                    window.location.href = "../admin/grade.php";
                }
            });
        </script>';
        }else{
            $result = $assign->AssignSubject($faculty, $subject);
            if($result){
                echo '<script>
                Swal.fire({
                    title: "Successfully Assigned",
                    text: "Back To Grade Page",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000,
                    onClose: () => {
                        window.location.href = "../admin/grade.php";
                    }
                });
            </script>';
            }else{
                echo "Di pa";
            }
        }
    }

if(isset($_POST['assignstudents'])){

    $fassigns = $_POST['fassigns'];
    $assignstudent = $_POST['assignstudent'];



    $student = new Assign($conn);
    
    
   if($student->checkstudent($fassigns,$assignstudent)){
    echo '<script>
            Swal.fire({
                title: "Ooppss Double Entry  ",
                text: "Please choose Another One",
                icon: "error",
                showConfirmButton: true,
                onClose: () => {
                    window.location.href = "../admin/grade.php";
                }
            });
        </script>';
   }else{
    $result = $student->AssignStudent($fassigns,$assignstudent);

    if($result){
        echo '<script>
        Swal.fire({
            title: "Successfully Assigned",
            text: "Back To Grade Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "../admin/grade.php";
            }
        });
    </script>';
    }else{
        echo "Wala pa";
    }
   }
}






}








?>