<?php
require 'navigator.php';
if (@$_SESSION['reopen'] == "TRUE") {
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
            <h3>Case Re-opened</h3>
        </div>'
    . '';
}
?>
<script>
    function reOpen(id) {
//                alert(id);
        $.ajax({
            url: 'reopen.php',
            data: {id: id},
            success: function (data, status, xhq) {
                $("#runReopen").html(data);
            },
            dataType: 'text'
        });
        window.location.reload();
    }
</script>
<title>Reopen Case - TMSpider</title>
<div id="page-wrapper" style="padding: 1.5%;">
    <em style="color: #0075b0;"><h4>Recently Resolved Cases</h4></em>
    <?php
    ?>
    <div class="row">
        <div class="col-sm-10"></div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>ZOHO CASE ID</th>
                <th>CASE LOGGED BY</th>
                <th>CASE HANDLED BY</th>
                <th>SECURITY LEVEL</th>
                <th>STATUS</th>
                <th>LOG TIME</th>
                <th>TIME RESOLVED</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            $pendingCasesSql = "SELECT TOP 20 * FROM $tableName WHERE Status = 'Resolved' ORDER BY TimeResolved DESC";
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
                            <td>' . $rows['SecurityLevel'] . '</td>
                            <td>' . $rows['Status'] . '</td>
                            <td>' . $rows['LogDate']->format("d-m-Y H:i:s") . '</td>
                            <td>' . $timeResolved . '</td>
                            <td><a  class="btn btn-sm btn-danger" onclick="reOpen(' . $rows['ID'] . ')" href="#">Re-open</a></td>
                        </tr>';
            }

            unset($_SESSION['reopen']);
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
