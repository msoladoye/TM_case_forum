<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../db_connection.php';
//
//$query = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE CategoryCode = 'CNL'");
//$row = sqlsrv_fetch_array($query);
//if ($row) {
//    $point = $row['CategoryPoint'];
//    echo "<p>" . $point;
//} else {
//    echo 'nothong';
//}
//
////echo 'nothong';
//$newQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = 'Ola Soladoye'");
//$newRow = sqlsrv_fetch_array($newQuery);
//if ($newRow) {
//    $currentScore = $newRow['Total_Score'];
//    echo "<p>" . $currentScore;
//    $newScore = $currentScore + $point;
//    echo '<p>New Score = ' .$newScore;
//    $updateScore = sqlsrv_query($con, "UPDATE $tableName2 SET Total_Score = $newScore WHERE Name = 'Ola Soladoye'");
//    
//    echo "<p>" . $newRow['Total_Score'];
//} else {
//    
//}
//
//$name1 = "Ola Soladoye";
//$name2 = " Ola Soladoye ";
//$newName1 = trim($name1);
//$newName2 = trim($name2);
//
//echo '<p>'.$name1;
//echo '<p>'.$newName1;
//echo '<p>'.$name2;
//echo '<p>'.$newName2;
//$getHandledByQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE ID = 2");
//$getHandledByRow = sqlsrv_fetch_array($getHandledByQuery) or die(print_r(sqlsrv_errors(), true));
//if ($getHandledByRow) {
//    $handledBy = $getHandledByRow['HandledBy'];
//}
////reopen and clear name
//$editSql = "UPDATE $tableName SET Status = 'Open', HandledBy = NULL WHERE ID = 2";
//$editQuery = sqlsrv_query($con, $editSql);
//$editRow = sqlsrv_fetch_array($editQuery);
//$_SESSION['reopen'] = "TRUE";
////get category
//$getReopenCategoryQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE ID = 2");
//$getReopenCategoryRow = sqlsrv_fetch_array($getReopenCategoryQuery) or die(print_r(sqlsrv_errors(), true));
//if ($getReopenCategoryRow) {
//    $category = $getReopenCategoryRow['Category'];
//}
////get category score
//$getCategoryQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE CategoryCode = '$category'") or die(print_r(sqlsrv_errors(), true));
//$getCategoryRow = sqlsrv_fetch_array($getCategoryQuery);
//if ($getCategoryRow) {
//    $categoryPoint = $getCategoryRow['CategoryPoint'];
//}
//
////deduct score
//$getMemberQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = '$handledBy'") or die(print_r(sqlsrv_errors(), true));
//$getMemberRow = sqlsrv_fetch_array($getMemberQuery);
//if ($getMemberRow) {
//    $currentScore = $getMemberRow['Total_Score'];
////                        echo "<p>" . $currentScore;
//    $newScore = $currentScore - $categoryPoint;
////                        echo '<p>New Score = ' . $newScore;
//    $updateScore = sqlsrv_query($con, "UPDATE $tableName2 SET Total_Score = $newScore WHERE Name = '$handledBy'");
////                        echo "<p>" . $newRow['Total_Score'];
//} else {
//    
//}
//$dateYear = Date("Y");
//$dateMonth = Date("m");
//$dateDate = Date("d");
//$dayStart = "$dateYear-$dateMonth-$dateDate 00:00:00";
//$dayEnd = "$dateYear-$dateMonth-$dateDate 23:59:59";
//$daysInTheMonth = cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear);
//$monthStart = "$dateYear-$dateMonth-01 00:00:00";
//$monthEnd = "$dateYear-$dateMonth-$daysInTheMonth 23:59:59";
//$newMonthPoint;
//$newTodayPoint;
//$clearScoredQuery = sqlsrv_query($con, "UPDATE $tableName2 SET Scored_This_Month = 0, Scored_Today = 0");
//$getAllTMMenberTodayQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE Status = 'Resolved' and TimeResolved between '$dayStart' and '$dayEnd'") or die(print_r(sqlsrv_errors(), true));
//if ($getAllTMMenberTodayQuery) {
//    while ($getAllTMMenberTodayRow = sqlsrv_fetch_array($getAllTMMenberTodayQuery)) {
//        $memberName = $getAllTMMenberTodayRow['HandledBy'];
//        $categoryName = $getAllTMMenberTodayRow['Category'];
//        //get category point
//        $getCategoryPointTodayQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE CategoryCode = '$categoryName'") or die(print_r(sqlsrv_errors(), true));
//        $getCategoryPointTodayRow = sqlsrv_fetch_array($getCategoryPointTodayQuery);
//        if ($getCategoryPointTodayRow) {
//            $categoryPointToday = $getCategoryPointTodayRow['CategoryPoint'];
//        } 
//        //set point
//        $setTodaypointQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = '$memberName'") or die(print_r(sqlsrv_errors(), true));
//        $setTodaypointRow = sqlsrv_fetch_array($setTodaypointQuery);
//        if ($setTodaypointRow) {
//            $currentTodayPoint = $setTodaypointRow['Scored_Today'];
//            //echo $setTodaypointRow['Scored_Today'];
//            $newTodayPoint = $currentTodayPoint + $categoryPointToday;
//            sqlsrv_query($con,"UPDATE $tableName2 SET Scored_today = $newTodayPoint WHERE Name  = '$memberName'");
//        }
//
//        echo "<p>" . $memberName;
//        echo "<p>" . $categoryName;
//        echo "<p>" . $categoryPointToday;
//        echo "<p>" . $newTodayPoint;
//        
//    }
//}
////For Month
//
//$getAllTMMenberMonthQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE Status = 'Resolved' and TimeResolved between '$monthStart' and '$monthEnd'") or die(print_r(sqlsrv_errors(), true));
//if ($getAllTMMenberMonthQuery) {
//    while ($getAllTMMenberMonthRow = sqlsrv_fetch_array($getAllTMMenberMonthQuery)) {
//        $memberName = $getAllTMMenberMonthRow['HandledBy'];
//        $categoryName = $getAllTMMenberMonthRow['Category'];
//        //get category point
//        $getCategoryPointMonthQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE CategoryCode = '$categoryName'") or die(print_r(sqlsrv_errors(), true));
//        if ($getCategoryPointMonthQuery) {
//            $getCategoryPointMonthRow = sqlsrv_fetch_array($getCategoryPointMonthQuery);
//            $categoryMonthPoint = $getCategoryPointMonthRow['CategoryPoint'];
//        }
//        //set point
//        $setMonthpointQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = '$memberName'") or die(print_r(sqlsrv_errors(), true));
//        if ($setMonthpointQuery) {
//            $setMonthpointRow = sqlsrv_fetch_array($setMonthpointQuery);
//            $currentMonthPoint = $setMonthpointRow['Scored_This_Month'];
//            //echo $setTodaypointRow['Scored_Today'];
//            $newMonthPoint = $currentMonthPoint + $categoryMonthPoint;
//            sqlsrv_query($con, "UPDATE $tableName2 SET Scored_This_Month = $newMonthPoint WHERE Name  = '$memberName'");
//        }
//
//        echo "<p>" . $memberName;
//        echo "<p>" . $categoryName;
//        echo "<p>" . $categoryMonthPoint;
//        echo "<p>" . $newMonthPoint;
//    }
//}
?>
<script>
    sessionStorage.setItem("name", "Ola");
    alert(sessionStorage.getItem("name"));
    sessionStorage.setItem("name", "Soladoye");
    alert(sessionStorage.getItem("name"));
</script>
