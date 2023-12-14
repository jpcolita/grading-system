<?php
include "../header/header.php";
include "../config/database.php";
include "../model/registerfaculty.model.php";



if(isset($_POST['faculty'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['confirmpass'];


    $admin = new Faculty($conn);

if(empty($username) || empty($password) || empty($repeatPassword) || $password!=$repeatPassword){
    echo '<script>
    Swal.fire({
        title: "The Text Field Is Empty Or Password Did Not ",
        text: "Required to Input Data",
        icon: "error",
        showConfirmButton: true,
        onClose: () => {
            window.location.href = "../faculty/facultiespage.php";
        }
    });
</script>';
}elseif($admin->checkUsername($username)){
    echo '<script>
    Swal.fire({
        title: "Username Is Already Taken",
        text: "Please choose Another One",
        icon: "error",
        showConfirmButton: true,
        onClose: () => {
            window.location.href = "../faculty/facultiespage.php";
        }
    });
</script>';

}else{
    $result = $admin->registerFaculty($username,$password);

    if($result){
        echo '<script>
        Swal.fire({
            title: "Successfully Added",
            text: "Back To Faculty Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "../faculty/facultiespage.php";
            }
        });
    </script>';
    }
}


}







?>