<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Year Insertion Page</title>
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
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Style form labels */
label {
    display: block;
    margin-bottom: 8px;
}

/* Style form input and select elements */
input,
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
    









<h1>School Years</h1>
    <form action="../controller/school.controller.php" method="post">
        <label for="year">School Year:</label>
        <input type="text" name="year" required>

        <label for="semester">Semester:</label>
        <select name="semester" required>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="Summer">Summer</option>
        </select>

        <button type="submit" name="add">Add School Year</button>
    
           
    </form>

   
   <div class="classbutton">
   <a href="school.php"><button >Back Here</button></a>
   </div>



</body>
</html>