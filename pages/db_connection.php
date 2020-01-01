<?php

$DBServername = 'OS';
$DBUsername = 'tunji';
$databaseName = "TM_Case_forum";
$DBConnection = array('Database' => $databaseName, 'UID' => $DBUsername, 'PWD' => "tmpassword");
$tmToday = array();
$tmMonth = array();
$predatorToday = array();
$predatorMonth = array();
$predatorOverall = array();
$con = sqlsrv_connect($DBServername, $DBConnection) or die(print_r(sqlsrv_errors(), true)); //or die(print_r(sqlsrv_errors(), TRUE));
$tableName = "[TM_Case_forum].[dbo].[LoggedCasses]";
$tableName2 = "[TM_Case_forum].[dbo].[Score_Board]";
//Home page details
$dateYear = Date("Y");
$dateMonth = Date("m");
$dateDate = Date("d");
$dayStart = "$dateYear-$dateMonth-$dateDate 00:00:00";
$dayEnd = "$dateYear-$dateMonth-$dateDate 23:59:59";
$daysInTheMonth = cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear);
$monthStart = "$dateYear-$dateMonth-01 00:00:00";
$monthEnd = "$dateYear-$dateMonth-$daysInTheMonth 23:59:59";
$newMonthPoint;
$newTodayPoint;
//Taday and Month Score

$clearScoredQuery = sqlsrv_query($con, "UPDATE $tableName2 SET Scored_This_Month = 0, Scored_Today = 0");
//Today fro TM

$getAllTMMenberTodayQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE Status = 'Resolved' and TimeResolved between '$dayStart' and '$dayEnd'") or die(print_r(sqlsrv_errors(), true));
if ($getAllTMMenberTodayQuery) {
    while ($getAllTMMenberTodayRow = sqlsrv_fetch_array($getAllTMMenberTodayQuery)) {
        $memberName = $getAllTMMenberTodayRow['HandledBy'];
        $categoryName = $getAllTMMenberTodayRow['Category'];
        //get category point
        $getCategoryPointTodayQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE CategoryCode = '$categoryName'") or die(print_r(sqlsrv_errors(), true));
        $getCategoryPointTodayRow = sqlsrv_fetch_array($getCategoryPointTodayQuery);
        if ($getCategoryPointTodayRow) {
            $categoryPointToday = $getCategoryPointTodayRow['CategoryPoint'];
        }
        //set point
        $setTodaypointQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = '$memberName'") or die(print_r(sqlsrv_errors(), true));
        $setTodaypointRow = sqlsrv_fetch_array($setTodaypointQuery);
        if ($setTodaypointRow) {
            $currentTodayPoint = $setTodaypointRow['Scored_Today'];
            //echo $setTodaypointRow['Scored_Today'];
            $newTodayPoint = $currentTodayPoint + $categoryPointToday;
            sqlsrv_query($con, "UPDATE $tableName2 SET Scored_today = $newTodayPoint WHERE Name  = '$memberName'");
        }
    }
}
//today for predator

$getAllPredatorMenberTodayQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE LogDate between '$dayStart' and '$dayEnd'") or die(print_r(sqlsrv_errors(), true));
if ($getAllPredatorMenberTodayQuery) {
    while ($getAllPredatorMenberTodayRow = sqlsrv_fetch_array($getAllPredatorMenberTodayQuery)) {
        $memberName = $getAllPredatorMenberTodayRow['LoggedBy'];
        //set point
        $setTodaypointQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = '$memberName'") or die(print_r(sqlsrv_errors(), true));
        $setTodaypointRow = sqlsrv_fetch_array($setTodaypointQuery);
        if ($setTodaypointRow) {
            $currentTodayPoint = $setTodaypointRow['Scored_Today'];
            //echo $setTodaypointRow['Scored_Today'];
            $newTodayPoint = $currentTodayPoint + 1;
            sqlsrv_query($con, "UPDATE $tableName2 SET Scored_today = $newTodayPoint WHERE Name  = '$memberName'");
        }
    }
}

//For Month
//TM Month
$getAllTMMenberMonthQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE Status = 'Resolved' and TimeResolved between '$monthStart' and '$monthEnd'") or die(print_r(sqlsrv_errors(), true));
if ($getAllTMMenberMonthQuery) {
    while ($getAllTMMenberMonthRow = sqlsrv_fetch_array($getAllTMMenberMonthQuery)) {
        $memberName = $getAllTMMenberMonthRow['HandledBy'];
        $categoryName = $getAllTMMenberMonthRow['Category'];
        //get category point
        $getCategoryPointMonthQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE CategoryCode = '$categoryName'") or die(print_r(sqlsrv_errors(), true));
        if ($getCategoryPointMonthQuery) {
            $getCategoryPointMonthRow = sqlsrv_fetch_array($getCategoryPointMonthQuery);
            $categoryMonthPoint = $getCategoryPointMonthRow['CategoryPoint'];
        }
        //set point
        $setMonthpointQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = '$memberName'") or die(print_r(sqlsrv_errors(), true));
        if ($setMonthpointQuery) {
            $setMonthpointRow = sqlsrv_fetch_array($setMonthpointQuery);
            $currentMonthPoint = $setMonthpointRow['Scored_This_Month'];
            //echo $setTodaypointRow['Scored_Today'];
            $newMonthPoint = $currentMonthPoint + $categoryMonthPoint;
            sqlsrv_query($con, "UPDATE $tableName2 SET Scored_This_Month = $newMonthPoint WHERE Name  = '$memberName'");
        }
    }
}

//predator Month

$getAllPredatorMenberMonthQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE LogDate between '$monthStart' and '$monthEnd'") or die(print_r(sqlsrv_errors(), true));
if ($getAllPredatorMenberMonthQuery) {
    while ($getAllPredatorMenberMonthRow = sqlsrv_fetch_array($getAllPredatorMenberMonthQuery)) {
        $memberName = $getAllPredatorMenberMonthRow['LoggedBy'];
        //set point
        $setMonthpointQuery = sqlsrv_query($con, "SELECT * FROM $tableName2 WHERE Name = '$memberName'") or die(print_r(sqlsrv_errors(), true));
        $setMonthpointRow = sqlsrv_fetch_array($setMonthpointQuery);
        if ($setMonthpointRow) {
            $currentMonthPoint = $setMonthpointRow['Scored_This_Month'];
            //echo $setTodaypointRow['Scored_Today'];
            $newMonthPoint = $currentMonthPoint + 1;
            sqlsrv_query($con, "UPDATE $tableName2 SET Scored_This_Month = $newMonthPoint WHERE Name  = '$memberName'");
        }
    }
}


//row count
$todayCaseCountQuery = sqlsrv_query($con, "SELECT * FROM $tableName WHERE TimeResolved between '$dayStart' and '$dayEnd'", array(), array("Scrollable" => 'static')) or die(print_r(sqlsrv_errors(), true));
$todayCaseCount = sqlsrv_num_rows($todayCaseCountQuery);
//key guys
//TM
$tmTodayKeyGuysQuery = sqlsrv_query($con, "SELECT TOP 3 * FROM $tableName2 WHERE Type = 'TM' ORDER BY Scored_Today desc");
if ($tmTodayKeyGuysQuery) {
    $count = 0;
    while ($tmTodayKeyGuysRow = sqlsrv_fetch_array($tmTodayKeyGuysQuery)) {
        $tmToday[$count] = $tmTodayKeyGuysRow['Name'] . " " . $tmTodayKeyGuysRow['Scored_Today'];
        $count++;
    }
}
$tmMonthKeyGuysQuery = sqlsrv_query($con, "SELECT TOP 3 * FROM $tableName2 WHERE Type = 'TM' ORDER BY Scored_This_Month desc");
if ($tmMonthKeyGuysQuery) {
    $count = 0;
    while ($tmMonthKeyGuysRow = sqlsrv_fetch_array($tmMonthKeyGuysQuery)) {
        $tmMonth[$count] = $tmMonthKeyGuysRow['Name'] . " " . $tmMonthKeyGuysRow['Scored_This_Month'];
        $count++;
    }
}
//predator
$predatorTodayKeyGuysQuery = sqlsrv_query($con, "SELECT TOP 3 * FROM $tableName2 WHERE Type = 'Predator' ORDER BY Scored_Today desc");
if ($predatorTodayKeyGuysQuery) {
    $count = 0;
    while ($predatorTodayKeyGuysRow = sqlsrv_fetch_array($predatorTodayKeyGuysQuery)) {
        $predatorToday[$count] = $predatorTodayKeyGuysRow['Name'] . " " . $predatorTodayKeyGuysRow['Scored_Today'];
        $count++;
    }
}
$predatorMonthKeyGuysQuery = sqlsrv_query($con, "SELECT TOP 3 * FROM $tableName2 WHERE Type = 'Predator' ORDER BY Scored_This_Month desc");
if ($predatorMonthKeyGuysQuery) {
    $count = 0;
    while ($predatorMonthKeyGuysRow = sqlsrv_fetch_array($predatorMonthKeyGuysQuery)) {
        $predatorMonth[$count] = $predatorMonthKeyGuysRow['Name'] . " " . $predatorMonthKeyGuysRow['Scored_This_Month'];
        $count++;
    }
}
$predatorOverallKeyGuysQuery = sqlsrv_query($con, "SELECT TOP 3 * FROM $tableName2 WHERE Type = 'Predator' ORDER BY Total_Score desc");
if ($predatorOverallKeyGuysQuery) {
    $count = 0;
    while ($predatorOverallKeyGuysRow = sqlsrv_fetch_array($predatorOverallKeyGuysQuery)) {
        $predatorOverall[$count] = $predatorOverallKeyGuysRow['Name'] . " " . $predatorOverallKeyGuysRow['Total_Score'];
        $count++;
    }
}
//average time response
$averageResponseQuery = sqlsrv_query($con, "select Avg(datediff(MINUTE, LogDate,TimeResolved)) as AVG into #Temp from TM_Case_forum.dbo.LoggedCasses where Status = 'Resolved'");
$getFromTemp = sqlsrv_query($con,"select AVG from #temp");
if($getFromTemp){
    while ($avgRow = sqlsrv_fetch_array($getFromTemp)) {
        $avgTime = $avgRow['AVG'];
    }
}
$dropTemp = sqlsrv_query($con,"drop table #temp");
//$averageResponse = sqlsrv_free_result($con,"select Avg(datediff(MINUTE, LogDate,TimeResolved)) from TM_Case_forum.dbo.LoggedCasses where Status = 'Resolved'",array(), array("Scrollable" => 'static'));
//last logged
$lastLoggedQuery = sqlsrv_query($con, "SELECT * FROM $tableName");
if ($lastLoggedQuery) {
    while ($lastLoggedRow = sqlsrv_fetch_array($lastLoggedQuery)) {
        $lastCaseID = $lastLoggedRow['ZohoCaseID'];
        $lastLoggedDate = $lastLoggedRow['LogDate']->format("d-m-Y H:i:s");
    }
}
