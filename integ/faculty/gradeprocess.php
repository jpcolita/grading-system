<?php
include "../header/header.php";
include "../config/database.php";

if(isset($_POST['gradeinsert'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $yearLevel = $_POST['yearlevel'];
    $subjectCode = $_POST['code'];
    $subjectDescription = $_POST['description'];
    $time = $_POST['time'];
    $grade = $_POST['grade'];


    $insertSql = "INSERT INTO grades (id, name, course, section, yearlevel, code, description, time, grade)
    VALUES ('$id','$name', '$course', '$section', '$yearLevel', '$subjectCode', '$subjectDescription', '$time', '$grade')";

if ($conn->query($insertSql) === TRUE) {
    echo '<script>
    Swal.fire({
        title: "Successfully Added",
        text: "Back To School Page",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
        onClose: () => {
            window.location.href = "insertgrade.php";
        }
    });
</script>';
} else {
echo "Error: " . $insertSql . "<br>" . $conn->error;
}
}


?>