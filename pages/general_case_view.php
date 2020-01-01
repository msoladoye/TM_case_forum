<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
require 'navigator.php';
?>
<title>Case View - TMSpider</title>
<div id="page-wrapper" style="padding: 1.5%;">
    <em style="color: #0075b0;"><h4>General Open Case View</h4></em>
    <?php
    if (@$_SESSION['success'] == "TRUE") {
        echo ''
        . '<div class="alert alert-success alert-dismissible fade in" style="position: absolute;font-size:2px;  height: 20%; width: 20%; bottom: 1%; right: 1%; text-align: center;" id="alert">
            <script>
                $(document).ready(function (){
                    window.setTimeout(function (){
                        $("#alert").alert("close");
                    }, 3000);
                });
                
            </script>
            <a class="close" data-dismiss="alert" arial-lable="close">&times;</a>
            <h1>Row updated</h1>
        </div>'
        . '';
    }
    ?>
    <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <a href="add_new_case.php" class="btn btn-lg btn-success">Add New Case</a>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ZOHO CASE ID</th>
                <th>CASE LOGGED BY</th>
                <th>CASE HANDLED BY</th>
                <th>CATEGORY</th>
                <th>SECURITY LEVEL</th>
                <th>STATUS</th>
                <th>LOG TIME</th>
                <th>TIME RESOLVED</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            $pendingCasesSql = "SELECT * FROM $tableName WHERE Status = 'Open'ORDER BY SecurityLevel";
            $pendingCasesResult = sqlsrv_query($con, $pendingCasesSql);
            $rows = sqlsrv_num_rows($pendingCasesResult);

            while ($rows = sqlsrv_fetch_array($pendingCasesResult)) {
                if ($rows['TimeResolved'] == NULL) {
                    $timeResolved = "";
                } else {
                    $timeResolved = $rows['TimeResolved']->format("d-m-Y H:i:s");
                }
                $count++;
                echo '
                        <tr>
                            <th>' . $count . '.</th>
                            <td>' . $rows['ZohoCaseID'] . '</td>
                            <td>' . $rows['LoggedBy'] . '</td>
                            <td>' . $rows['HandledBy'] . '</td>
                            <td>' . $rows['Category'] . '</td>
                            <td>' . $rows['SecurityLevel'] . '</td>
                            <td>' . $rows['Status'] . '</td>
                            <td>' . $rows['LogDate']->format("d-m-Y H:i:s") . '</td>
                            <td>' . $timeResolved . '</td>
                        </tr>';
            }
            unset($_SESSION['success']);
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
