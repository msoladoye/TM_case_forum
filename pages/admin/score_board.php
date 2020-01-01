<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<?php
require './admin_navigator.php';
if (filter_input(INPUT_POST, 'submit')) {
    if (filter_input(INPUT_POST, 'password') == 'password') {
        echo "
            <script>
            login = 'adminpass';
            </script>";
    } else {
        echo '<script>window.location = "../index.php";</script>';
    }
}
?>
<script>
    var login = sessionStorage.getItem("pass");;
    if (login !== "adminpass") {
        $(window).load(function () {
            $('#login').modal('show');
            $('#body').hide();
            login = "adminpass";
            sessionStorage.setItem("pass", "adminpass");
        });
    }
</script>
<div id="login" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="col-sm-11 tetx-primary">LOGIN</h3>
                <a href="#" class="btn btn-danger close col-sm-1" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-body">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input class="form-control" type="password" name="password" placeholder="Enter your login password" required/>
                    <br/>
                    <input class="btn btn-xs btn-primary form-control" type="submit" name="submit"/>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="page-wrapper" style="padding: 1.5%;">
    <div id="body">
        <div class="row">
            <div class="col-sm-11"></div>
            <div class="col-sm-1">
                <!--a href="#" onclick="" class="btn btn-lg btn-success">SAVE</a-->
            </div>
        </div>
        <em style="color: #0075b0;"><h4>TM Score Board</h4></em>
        <table class="table table-hover table-striped" id="cases" on>
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>OVER ALL SCORE</th>
                    <!--th>CASE ASSIGNED TO</th-->
                    <th>SCORE <small>(THIS MONTH)</small></th>
                    <th>SCORE <small>(TODAY)</small></th>
                    <th>BADGE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $countTM = 1;
                $scoreBoardTMSQL = "SELECT * FROM $tableName2 WHERE Type = 'TM'  ORDER BY Name";
                $scoreBoardTMResult = sqlsrv_query($con, $scoreBoardTMSQL);
                //$rows = sqlsrv_num_rows($pendingCasesResult);
                while ($rows = sqlsrv_fetch_array($scoreBoardTMResult)) {
                    $name = $rows['Name'];
                    $totalScore = $rows['Total_Score'];
                    $scoreMonth = $rows['Scored_This_Month'];
                    $scoreToday = $rows['Scored_Today'];
                    $badge = $rows['Badge'];
                    echo '
                        <tr id="row' . $rows['ID'] . '">
                            <th>' . $countTM++ . '.</th>
                            <td>' . $name . '</td>
                            <td>' . $totalScore . '</td>
                            <td>' . $scoreMonth . '</td>
                            <td>' . $scoreToday . '</td>
                            <td>' . $badge . '</td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
        <em style="color: #0075b0;"><h4>Scavengers Score Board</h4></em>
        <table class="table table-hover table-striped" id="cases" on>
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>OVER ALL SCORE</th>
                    <!--th>CASE ASSIGNED TO</th-->
                    <th>SCORE <small>(THIS MONTH)</small></th>
                    <th>SCORE <small>(TODAY)</small></th>
                    <th>BADGE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                $scoreBoardSQL = "SELECT * FROM $tableName2 WHERE Type = 'Predator' ORDER BY Name";
                $scoreBoardResult = sqlsrv_query($con, $scoreBoardSQL);
                //$rows = sqlsrv_num_rows($pendingCasesResult);
                while ($rows = sqlsrv_fetch_array($scoreBoardResult)) {
                    $name = $rows['Name'];
                    $totalScore = $rows['Total_Score'];
                    $scoreMonth = $rows['Scored_This_Month'];
                    $scoreToday = $rows['Scored_Today'];
                    $badge = $rows['Badge'];
                    echo '
                        <tr id="row' . $rows['ID'] . '">
                            <th>' . $count++ . '.</th>
                            <td>' . $name . '</td>
                            <td>' . $totalScore . '</td>
                            <td>' . $scoreMonth . '</td>
                            <td>' . $scoreToday . '</td>
                            <td>' . $badge . '</td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>

        <div id="view" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row">
                        <h3 class="col-sm-11 tetx-primary">Case View</h3>
                        <a href="#" class="btn btn-danger close col-sm-1" data-dismiss="modal">&times;</a>
                    </div>
                    <div class="modal-body">
                        <div id="viewRun"></div>
                    </div>
                    <div class="modal-footer"><a href="#" class="btn btn-primary brn-md">OK</a></div>
                </div>
            </div>
        </div>

        <div id="edit" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="col-sm-11 tetx-primary">Edit</h3>
                        <a href="#" class="btn btn-danger close col-sm-1" data-dismiss="modal">&times;</a>
                    </div>
                    <div id="editRun"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
