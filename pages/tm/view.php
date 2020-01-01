<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../db_connection.php';
$caseId = filter_input(INPUT_GET, 'id');

//connect to db
//query your db
//process your db result
//echo response

$viewSql = "SELECT * FROM $tableName WHERE ID = $caseId";
$viewQuery = sqlsrv_query($con, $viewSql);
$viewRow = sqlsrv_fetch_array($viewQuery);

$zohoCodeID = $viewRow['ZohoCaseID'];
$loggedBy = $viewRow['LoggedBy'];
$handledBy = $viewRow['HandledBy'];
$category = $viewRow['Category'];
$securityLevel = $viewRow['SecurityLevel'];
$status = $viewRow['Status'];
$logDate = $viewRow['LogDate']->format("d/m/y h:m:s a");

if ($viewRow['TimeResolved'] == NULL) {
    $timeResolved = "";
} else {
    $timeResolved = $viewRow['TimeResolved']->format("d-m-Y H:m:s");
}
/*if ($viewRow['TimeLeft'] == NULL) {
    $timeLeft = "";
} else {
    $timeLeft = $viewRow['TimeLeft']->format("H:m:s");
}*/
$details = $viewRow['Details'];
echo '<div class="row">
    <div class="col-sm-4 text-info">Zoho Case ID:</div>
    <div class="col-sm-8">' . $zohoCodeID . '</div>
    <hr/>
</div>
<div class="row">
    <div class="col-sm-4 text-info">Handled By:</div>
    <div class="col-sm-8">' . $handledBy . '</div>
    <hr/>
</div>
<div class="row">
    <div class="col-sm-4 text-info">Category:</div>
    <div class="col-sm-8">' . $category . '</div>
    <hr/>
</div>
<div class="row">
    <div class="col-sm-4 text-info">Security Level:</div>
    <div class="col-sm-8">' . $securityLevel . '</div>
    <hr/>
</div>
<div class="row">
    <div class="col-sm-4 text-info">Status:</div>
    <div class="col-sm-8">' . $status . '</div>
    <hr/>
</div>
<div class="row">
    <div class="col-sm-4 text-info">Log Date:</div>
    <div class="col-sm-8">' . $logDate . '</div>
    <hr/>
</div>
<div class="row">
    <div class="col-sm-4 text-info">Time Left:</div>
    <div class="col-sm-8"></div>
    <hr/>
</div>
<div class="row">
    <div class="col-sm-4 text-info"> Time Resolved:</div>
    <div class="col-sm-8">' . $timeResolved . '</div>
    <hr/>
</div>
<div class="row">
    <div class="col-sm-4 text-info">Details:</div>
    <div class="col-sm-8">' . $details . '</div>
    <hr/>
</div>';
