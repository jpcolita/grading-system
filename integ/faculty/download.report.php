    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
}

button {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 10px;
}

button:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #4caf50;
    color: white;
}

        </style>
    </head>
    <body>


    <a href="export.php"><button>Export Here</button></a>
        <?php

    include "../config/database.php";
    session_start();
    // Check if the user is logged in
    if (isset($_SESSION["id_number"])) {
    $faculty_name = $_SESSION["id_number"];

    echo "ID Number: ". $faculty_name;

    $qry = "SELECT name,course,section,yearlevel,code,description,time,grade FROM grades WHERE id = '$faculty_name' GROUP BY name,course,section,yearlevel,code,description,time,grade";
    $result = mysqli_query($conn, $qry);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr >
        
            <th>Name</th>
            <th>Course</th>
            <th>Section</th>
            <th>Year Level</th>
            <th>Code</th>
            <th>Description</th>
            <th>Time</th>
            <th>Grade</th>
            <th>Remarks</th>
        

        </tr>";
        while( $row = mysqli_fetch_assoc($result)){

    // Determine the remarks based on the grade
    if ($row['grade'] == 1 || $row['grade'] == 1.25 || $row['grade'] == 1.75) {
        $remarks = "Pass";
    }elseif($row['grade'] == 2 || $row['grade'] == 2.25 || $row['grade'] == 2.75){
        $remarks = "Pass";
    }elseif($row['grade'] == 3){
        $remarks = "Pass";
    }elseif($row['grade'] == 4){
        $remarks = "Need To Have A Exam";
    }
    else {
        $remarks = "Fail";
    }

    // Output each row of the report


            echo "<tr>
            <td>" . $row["name"]. "</td>
            <td>" . $row["course"]. "</td>
            <td>" . $row["section"]. "</td>
            <td>" . $row["yearlevel"]. "</td>
            <td>" . $row["code"]. "</td>
            <td>" . $row["description"]. "</td>
            <td>" . $row["time"]. "</td>
            <td>" . $row["grade"]. "</td>
            <td>$remarks</td>
        
        
    

        </tr>";
        }
        // $row = mysqli_fetch_assoc($result);
        // echo "Your email is: " . $row['faculty'];

    } else {
        echo '<script> 
        window.location.href="report.php";
        alert("The ID did Not Exist")
        </script>
        ';
    }

    }else{
    header("location : report.php");

    // if (isset($_SESSION['username'])) {
    //     // echo 'Logged in as ' . $_SESSION['username'] . '<br>'.'<br>'  ;

    // } else {
    //   header("location: logout.php");
    // }
    }

    ?>

    <a href="report.php"><button>Back</button></a>
    </body>
    </html>