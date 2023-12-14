<?php


include "../config/database.php";
include "../model/subject.model.php";





if($_SERVER['REQUEST_METHOD'] = "POST"){
    $code = $_POST['code'];   
            $description = $_POST['description'];  
            $unit = $_POST['unit'];  
            $type = $_POST['type'];  
            $course = $_POST['course'];  
            $institute = $_POST['institute'];  

            $subject = new SubjectModel($conn);






          

            if(empty($code) || empty($description)){
                echo '<script>
                             window.location.href= "../admin/addsubject.php";
                             alert("Other Text Field are Blank PLease Fill Out Again.")
                           </script>
                            "';
            }elseif($subject->CheckCode($code)){

                echo '<script>
                             window.location.href= "../admin/addsubject.php";
                             alert("Code Is Already Taken!.")
                           </script>
                            "';
            }else{
                $result = $subject->InsertSubject($code,$description,$unit,$type,$course,$institute);

                if($result){
                    header("location: ../admin/subject.php ");
                }
            }
            
}


?>


