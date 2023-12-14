<?php
include "../header/header.php";
include "../config/database.php";
include "../model/faculty.model.php";






if($_SERVER['REQUEST_METHOD'] == "POST"){
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
                            window.location.href= "../admin/addfaculty.php";
                             alert("Other Text Field are Blank PLease Fill Out Again.")
                           </script>
                            "';
                    }elseif($faculty->CheckID($id)){
                      
                      echo '<script>
                            window.location.href= "../admin/addfaculty.php";
                             alert("This Id Is Aready Taken!.")
                           </script>
                            "';
                        }else{
                          $result = $faculty->InsertFaculty($id,$lastname,$firstname,$middlename,$dbirth,$gender,$institute,$course,$number);

                          if($result){
                            echo '<script>
                            window.location.href= "../admin/faculty.php";
                             alert("Insertion Complete.")
                           </script>
                            "';
                                

                                
                          }
                        }
                      
                    





}



?>