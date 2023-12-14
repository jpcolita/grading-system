<?php
include "../config/database.php";
include "../model/login.model.php";



class UserController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new UserModel($dbConnection);
    }

    public function handleRequest() {
   
        session_start();
        include "../config/database.php";
    




      

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];



            


        
            $user = $this->userModel->verifyUser($username, $password);

        


            if ($user  ) {
                // echo 'Login successful! Welcome ' . $user['username'];
             
                
               
                $_SESSION["username"] = $username;
               
                echo '<script>
                window.location.href= "../user/users.php";
                 alert("Log In Successfully!!")
                </script>
                "';
            //   header("location: ../user/users.php");
                        } else {
                            echo '<script>
                            window.location.href= "../login.php";
                             alert("Invalid Username Or Password!!")
                            </script>
                            "';
            }

            

           
        } 





        
      
       




        
    }

    public function handleAdmin(){
        session_start();
        if($_SERVER['REQUEST_METHOD'] =="POST"){
            $username = $_POST['username'];
            $password = $_POST['password'];


            $admin = $this->userModel->verifyAdmin($username,$password);
           

            $row = mysqli_fetch_array($admin);

            if ($row["usertype"]=="admin"   ) {
                
                $_SESSION["username"] = $username;

                // echo 'Login successful! Welcome ' . $user['username'];
              header("location: ../admin/admins.php");

            // echo '<script>
            // window.location.href= "../admin/admins.php";
            //  alert("Log In Successfully!!")
            // </script>
            // "';
                        
                        } else {
                            echo '<script>
                            window.location.href= "../login.php";
                             alert("Invalid Username Or Password!!")
                            </script>
                            "';
            }


        }
    }

    public function handleFaculty(){


        session_start();
        if($_SERVER['REQUEST_METHOD'] = "POST"){
            $username = $_POST['username'];
            $password = $_POST['password'];


        $faculty = $this->userModel->verifyFaculty($username,$password);

            $row = mysqli_fetch_array($faculty);

            
            if ($row["usertype"]=="faculty"   ) {
                $_SESSION["username"] = $username;
                // echo 'Login successful! Welcome ' . $user['username'];
           header("location: ../faculty/facultiespage.php");
                        } else {
                            echo '<script>
                            window.location.href= "../login.php";
                             alert("Invalid Username Or Password!!")
                            </script>
                            "';
            }


        }
    }


    




    
    

    
    

}

    
$usercontroller = new UserController($conn);
$usercontroller->handleRequest();
$usercontroller->handleAdmin();
$usercontroller->handleFaculty();













    

?>

