<?php
session_start();
$errorMessage = '';
if(isset($_POST['search']))
{    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM assignments WHERE CONCAT(`Title`, `tag1`,`tag2`,`tag3`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}
 else {
     $errorMessage = "No Searchs";
 }
// function to connect and execute the query
function filterTable($query)
{    $connect = mysqli_connect("localhost", "root", "", "iprojectt");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;}
?>