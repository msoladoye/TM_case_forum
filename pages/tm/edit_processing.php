<?php

require_once '../db_connection.php';
session_start();
$handledBy;
$status;
$currentCaseID;
$timeResolved;
$category;// = filter_input(INPUT_POST, 'Category');

if (isset($_POST['update'])) {
//if(filter_input(INPUT_POST, 'update')){
    $currentCaseID = $_SESSION['currentCaseID'];
    if (filter_input(INPUT_POST, 'HandledBy') == 'default') {
        
    } else {
        $handledBy = trim(filter_input(INPUT_POST, 'HandledBy'));
        $handledBySql = "UPDATE $tableName SET HandledBy = '$handledBy' WHERE ID = '$currentCaseID'";
        $handledByQuery = sqlsrv_query($con, $handledBySql) or die(print_r(sqlsrv_errors(), true));
        if ($handledByQuery) {
            echo 'added';
        }
    }
    if (filter_input(INPUT_POST, 'HandledBy') == 'default') {
        
    } else {

        if (filter_input(INPUT_POST, 'Status') == 'default') {
            
        } else {
            if (!filter_input(INPUT_POST, 'Status') == '') {
                if (filter_input(INPUT_POST, 'Status') == 'Resolved') {
                    //update resovlved time
                    $timeResolved = date("Y-m-d H:i:s a");
                    $timeResolvedSql = "UPDATE $tableName SET TimeResolved = '$timeResolved' WHERE ID = $currentCaseID";
                    $timeResolvedQuery = sqlsrv_query($con, $timeResolvedSql) or die(print_r(sqlsrv_errors(), true));
                    
                    //get category
                    $getCategoryWhichQuery = sqlsrv_query($con,"SELECT * FROM $tableName WHERE ID = $currentCaseID");
                    $getCategoryWhichRow = sqlsrv_fetch_array($getCategoryWhichQuery);
                    $category = $getCategoryWhichRow['Category'];
                    //get category Score
                    $getCategoryQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE CategoryCode = '$category'") or die(print_r(sqlsrv_errors(), true));
                    $getCategoryRow = sqlsrv_fetch_array($getCategoryQuery);
                    if ($getCategoryRow) {
                        $categoryPoint = $getCategoryRow['CategoryPoint'];
                    }

                    //Update Score

                    $getMemberQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = '$handledBy'") or die(print_r(sqlsrv_errors(), true));
                    $getMemberRow = sqlsrv_fetch_array($getMemberQuery);
                    if ($getMemberRow) {
                        $currentScore = $getMemberRow['Total_Score'];
//                        echo "<p>" . $currentScore;
                        $newScore = $currentScore + $categoryPoint;
//                        echo '<p>New Score = ' . $newScore;
                        $updateScore = sqlsrv_query($con, "UPDATE $tableName2 SET Total_Score = $newScore WHERE Name = '$handledBy'");
//                        echo "<p>" . $newRow['Total_Score'];
                    } else {
                        
                    }
                } else {
                    
                }
                $status = filter_input(INPUT_POST, 'Status');
                $statusSql = "UPDATE $tableName SET Status = '$status' WHERE ID = $currentCaseID";
                $statusQuery = sqlsrv_query($con, $statusSql) or die(print_r(sqlsrv_errors(), true));
            }
        }
    }
    header("Location: tm_case_view.php");
} else {
    echo 'nothing';
}
session_unset();
