
<?php

require_once './db_connection.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$caseId = filter_input(INPUT_GET, 'id');

//connect to db
//query your db
//process your db result
//echo response
//if()
//echo "Welcome, you entered $caseId";
//get handledby name
$getHandledByQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE ID = $caseId");
$getHandledByRow = sqlsrv_fetch_array($getHandledByQuery) or die(print_r(sqlsrv_errors(), true));
if ($getHandledByRow) {
    $handledBy = $getHandledByRow['HandledBy'];
}
//reopen and clear name
$editSql = "UPDATE $tableName SET Status = 'Open', HandledBy = NULL WHERE ID = $caseId";
$editQuery = sqlsrv_query($con, $editSql);
$editRow = sqlsrv_fetch_array($editQuery);
$_SESSION['reopen'] = "TRUE";
//get category
$getReopenCategoryQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE ID = $caseId");
$getReopenCategoryRow = sqlsrv_fetch_array($getReopenCategoryQuery) or die(print_r(sqlsrv_errors(), true));
if ($getReopenCategoryRow) {
    $category = $getReopenCategoryRow['Category'];
}
//get category score
$getCategoryQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE CategoryCode = '$category'") or die(print_r(sqlsrv_errors(), true));
$getCategoryRow = sqlsrv_fetch_array($getCategoryQuery);
if ($getCategoryRow) {
    $categoryPoint = $getCategoryRow['CategoryPoint'];
}

//deduct score
$getMemberQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = '$handledBy'") or die(print_r(sqlsrv_errors(), true));
$getMemberRow = sqlsrv_fetch_array($getMemberQuery);
if ($getMemberRow) {
    $currentScore = $getMemberRow['Total_Score'];
//                        echo "<p>" . $currentScore;
    $newScore = $currentScore - ($categoryPoint + 1);
//                        echo '<p>New Score = ' . $newScore;
    $updateScore = sqlsrv_query($con, "UPDATE $tableName2 SET Total_Score = $newScore WHERE Name = '$handledBy'");
//                        echo "<p>" . $newRow['Total_Score'];
} else {
    
}
//echo '<script></script>';
//header("Location:reopen_resolved_php.php");
