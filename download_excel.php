<?php 
define ("DB_HOST", "localhost");
define ("DB_USER", "root");
define ("DB_PASS","205cuPA!");
define ("DB_NAME","CS4342");


session_start();

//$id =$_REQUEST['id'];


// Create a connection
$link = mysqli_connect( DB_HOST, DB_USER, DB_PASS, DB_NAME );

$setCounter = 0;

$setExcelName = "download_project_scores";

//Your SQL QUERY GOES HERE
$setSql = "SELECT * FROM student_projects_total;";

$setRec = mysqli_query($link,$setSql);

$setCounter = mysqli_num_fields($setRec);

$setMainHeader= $setData="";

for ($i = 0; $i < $setCounter; $i++) {
    $setMainHeader .= mysqli_field_name($setRec, $i)."\t";
}

while($rec = mysqli_fetch_row($setRec))  {
  $rowLine = '';
  foreach($rec as $value)       {
    if(!isset($value) || $value == "")  {
      $value = "\t";
    }   else  {
//It escape all the special charactor, quotes from the data.
      $value = strip_tags(str_replace('"', '""', $value));
      $value = '"' . $value . '"' . "\t";
    }
    $rowLine .= $value;
  }
  $setData .= trim($rowLine)."\n";
}
  $setData = str_replace("\r", "", $setData);

if ($setData == "") {
  $setData = "\nno matching records found\n";
}

$setCounter = mysqli_num_fields($setRec);



//This Header is used to make data download instead of display the data
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=".$setExcelName."_Report.xls");

header("Pragma: no-cache");
header("Expires: 0");

//It will print all the Table row as Excel file row with selected column name as header.
echo ucwords($setMainHeader)."\n".$setData."\n";

function mysqli_field_name($result, $field_offset) {
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->name : null;
}

?>

