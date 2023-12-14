<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schoo Updation Page</title>
    <style>
        /* Reset some default styles and provide a clean slate */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Apply a background color and set font styles for the entire body */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

/* Center the form on the page */
form {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style the heading */
h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Style form labels */
label {
    display: block;
    margin-bottom: 8px;
}

/* Style form select elements */
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Style the submit button */
button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

/* Style the submit button on hover */
button:hover {
    background-color: #0056b3;
}
.classbutton {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    margin-top: 20px; /* Adjust as needed */
}

    </style>
</head>
<body>
<form action="../controller/school.controller.php" method="post">
        <h2>Update School Year Status</h2>
        <label for="update_id">Select School Year:</label>
        <select name="update_id" required>
            <?php
           include "../config/database.php";


            function getSchoolYears() {
    global $conn;

    $result = $conn->query("SELECT * FROM school_years");
    $schoolYears = [];

    while ($row = $result->fetch_assoc()) {
        $schoolYears[] = $row;
    }

    return $schoolYears;
}



                  
            $schoolYears=getSchoolYears();
            
            foreach ($schoolYears as $schoolYear) {
                echo "<option value=\"{$schoolYear['id']}\">{$schoolYear['year']} {$schoolYear['semester']}</option>";
            }



            ?>
        </select>

        <label for="update_status">Status:</label>
        <select name="update_status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <button type="submit" name="update">Activate Status Status</button>
    </form>
    
   <div class="classbutton">
   <a href="school.php"><button >Back Here</button></a>
   </div>

</body>
</html>