<?php 
// Load the database configuration file 
include "../config/database.php";
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('NAME', 'COURSE', 'SECTION', 'YEARLEVEL', 'CODE', 'DESCRIPTION', 'TIME', 'GRADE'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 

session_start();
// Check if the user is logged in
if (isset($_SESSION["id_number"])) {
$faculty_name = $_SESSION["id_number"];


 
// Fetch records from database 
$query = $conn->query("SELECT name,course,section,yearlevel,code,description,time,grade FROM grades WHERE id = '$faculty_name' GROUP BY name,course,section,yearlevel,code,description,time,grade"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['name'], $row['course'], $row['section'], $row['yearlevel'], $row['code'], $row['description'], $row['time'],$row['grade']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
}
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;