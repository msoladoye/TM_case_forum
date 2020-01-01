
<head>
    <meta charset="UTF-8">
    <link href="../stylesheets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="../stylesheets/jquery.min.js" type="text/javascript"></script>
    <script src="../stylesheets/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="../stylesheets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<?php
require_once '../db_connection.php';
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

$editSql = "SELECT * FROM $tableName WHERE ID = $caseId";
$editQuery = sqlsrv_query($con, $editSql);
$editRow = sqlsrv_fetch_array($editQuery);

$zohoCodeID = $editRow['ZohoCaseID'];
$loggedBy = $editRow['LoggedBy'];
$handledBy = $editRow['HandledBy'];
$securityLevel = $editRow['SecurityLevel'];
$status = $editRow['Status'];
$category = $editRow['Category'];
if (trim($status) == "Resolved") {
    echo '<script>$("#status").attr({"disabled":"true"});</script>';
}
$_SESSION['currentCaseID'] = $caseId;
echo ''
 . '<form method="post" action="edit_processing.php">
        <div class="modal-body">
            <div class="form-group">
                <label for="ZohoCaseID" class="text-primary" >Zoho Case ID :<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="ZohoCaseID" name="ZohoCaseID" placeholder="' . $zohoCodeID . '" disabled>
           </div>
            <div class="form-group" >
                <label for="CaseLoggedBy" class="text-primary">Case Logged By:<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="LoggedBy" name="LoggedBy" placeholder="' . $loggedBy . '" disabled>
            </div>

            <div class="form-group">
                <label for="HandledBy" class="text-primary">Handled By:<span class="text-danger"> *</span></label>
                <select type="text" class="form-control" id="handledBy" name="HandledBy" placeholder="Handled By" required>
                    <option id="default" value="default">--SELECT--</option>';
$getCategorySQL = "SELECT * FROM $tableName2 WHERE Type = 'TM' ORDER BY Name";
$getCategoryResult = sqlsrv_query($con, $getCategorySQL);
//$rows = sqlsrv_num_rows($pendingCasesResult);
while ($rows = sqlsrv_fetch_array($getCategoryResult)) {
    $name = $rows['Name'];
    echo '<option value="' . $name . '">' . $name . '</option>';
}
echo '</select>
    <div class="form-group">
                <label for="Status" class="text-primary">Status<span class="text-danger"> *</span></label>
                <div id="statusDisplay">
                    <select type="text" class="form-control" id="status" name="Status" placeholder="Status" required>
                        <option id="default" value="default">' . $status . '</option>
                        <option id="resolve" value="Resolved">Resolve</option>
                        <option id="await" value="Logged">Logged</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="SecurityLevel" class="text-primary">Security Level:<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="SecurityLevel" name="SecurityLevel" placeholder="' . $securityLevel . '" disabled/>
            </div>
            <div class="form-group">
                <label for="Category" class="text-primary">Category:<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="Category" name="Category" value="' . $category . '" placeholder="' . $category . '" disabled/>
            </div>
            </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-sm-5"></div>
                                <button type="submit" class="btn btn-success col-sm-2" name="update" id="update" style="margin: 5px 5px 5px 5px ">Update</button>
                                <div class="col-sm-5"></div>
                            </div>
                        </div>
                    </form>'
 . '<script>sessionStorage.setItem("pass", "tmpass");</script>';
