<?php


includE "../header/header.php   ";
include "../config/database.php";
include "../model/admin.model.php";
include "../model/signup.model.php";



if(isset($_POST['admin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['confirmpass'];


    $admin = new Admin($conn);

if(empty($username) || empty($password) || empty($repeatPassword) || $password!=$repeatPassword){
    echo '<script>
    Swal.fire({
        title: "The Text Field Is Empty Or Password Did Not ",
        text: "Required to Input Data",
        icon: "error",
        showConfirmButton: true,
        onClose: () => {
            window.location.href = "../admin/admins.php";
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
            window.location.href = "../admin/admins.php";
        }
    });
</script>';

}else{
    $result = $admin->registerAdmin($username,$password);

    if($result){
        echo '<script>
        Swal.fire({
            title: "Successfully Added",
            text: "Back To Admin Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "../admin/admins.php";
            }
        });
    </script>';
    }
}


}


if(isset($_POST['inss'])){
$institute = $_POST['institute'];





$ins = new Admin($conn);



if(empty($institute)){
    echo '<script>
    Swal.fire({
        title: "The Text Field Is Empty",
        text: "Required to Input Data",
        icon: "error",
        showConfirmButton: true,
        onClose: () => {
            window.location.href = "../admin/institute.php";
        }
    });
</script>';
}elseif($ins->checkInstitute($institute)){







    echo '<script>
    Swal.fire({
        title: "Institute Is Already Taken",
        text: "Please choose Another Institue",
        icon: "error",
        showConfirmButton: true,
        onClose: () => {
            window.location.href = "../admin/institute.php";
        }
    });
</script>';




}else{
   $result =  $ins->AddInstitute($institute);

    if($result){
        echo '<script>
        Swal.fire({
            title: "Successfully Added",
            text: "Back To Institute Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "../admin/institute.php";
            }
        });
    </script>';
    }
}


}



if(isset($_POST['Click'])){
$course = $_POST['course'];



$c =new Admin($conn);



if(empty($course)){
    echo '<script>
    Swal.fire({
        title: "The Text Field Is Empty",
        text: "Required to Input Data",
        icon: "error",
        showConfirmButton: true,
        onClose: () => {
            window.location.href = "../admin/course.php";
        }
    });
</script>';
}elseif($c->checkCourse($course)){
    echo '<script>
    Swal.fire({
        title: "Course Is Already Taken",
        text: "Please Choose a Different Course",
        icon: "error",
        showConfirmButton: true,
        onClose: () => {
            window.location.href = "../admin/course.php";
        }
    });
</script>';
}else{
    $result = $c->AddCourse($course);

    if($result){
        echo '<script>
        Swal.fire({
            title: "Successfully Added",
            text: "Back To Course Page",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            onClose: () => {
                window.location.href = "../admin/course.php";
            }
        });
    </script>';
    }
}


}


if(isset($_POST['profile'])){
    $id = $_POST['id'];
    $email = $_POST['email'];

    



    $user = new User($conn);


    $profile = $user->UpdateUser($email,$id);
    

if($profile){
    echo '<script>
    Swal.fire({
        title: "Successfully Updated",
        text: "Back To Edit Page",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
        onClose: () => {
            window.location.href = "../user/edit.php";
        }
    });
</script>';
}else{
    echo '<script>
    Swal.fire({
        title: "Not Updated",
        text: "Please Try Again",
        icon: "error",
        showConfirmButton: true,
        onClose: () => {
            window.location.href = "../user/edit.php";
        }
    });
</script>';
}

}




?>