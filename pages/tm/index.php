<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
require 'tm_navigator.php';
if (filter_input(INPUT_POST, 'submit')) {
    if (filter_input(INPUT_POST, 'password') == 'password') {
        echo "
            <script>
            login = 'tmpass';
            </script>";
    } else {
        echo '<script>window.location = "../index.php";</script>';
    }
}
?>
<script>
    var login = sessionStorage.getItem("pass");
    if (login !== "tmpass") {
        $(window).load(function () {
            $('#login').modal('show');
            $('#body').hide();
            login = "tmpass";
            sessionStorage.setItem("pass", "tmpass");
        });
    }
    function viewRow(id) {
        $.ajax({
            url: 'view.php',
            data: {id: id},
            success: function (data, status, xhq) {
                $("#viewRun").html(data);
                $("#view").modal();
            },
            dataType: 'text'
        });
    }
    function editRow(id) {
        $.ajax({
            url: 'edit.php',
            data: {id: id},
            success: function (data, status, xhq) {
                $("#editRun").html(data);
                $("#edit").modal();
            },
            dataType: 'text'
        });
    }
    function cancel() {
        var confirm = window.confirm("Click OK to confirm canceling");
        if (confirm === true) {
            //window.location = "index.php";
        }
        //window.prompt("Click Yes to confirm canceling");
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
<title>TM Case View - TMSpider</title>
<div id="page-wrapper" style="padding: 1.5%;">
    <em style="color: #0075b0;"><h4>TM Case View</h4></em>
    <div id="body">
        <div class="row">
            <div class="col-sm-11"></div>
            <div class="col-sm-1">
                <!--a href="#" onclick="" class="btn btn-lg btn-success">SAVE</a-->
            </div>
        </div>
        <table class="table table-hover table-striped" id="cases" on>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ZOHO CASE ID</th>
                    <th>CASE LOGGED BY</th>
                    <th>CASE HANDLED BY</th>
                    <th>SECURITY LEVEL</th>
                    <th>STATUS</th>
                    <th>LOG TIME</th>
                    <th>TIME LEFT</th>
                    <th>TIME RESOLVED</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                $pendingCasesSql = "SELECT * FROM $tableName WHERE Status = 'Open' ORDER BY ID DESC";
                $pendingCasesResult = sqlsrv_query($con, $pendingCasesSql);
                //$rows = sqlsrv_num_rows($pendingCasesResult);
                while ($rows = sqlsrv_fetch_array($pendingCasesResult)) {
                    $count++;
                    if ($rows['TimeResolved'] == NULL) {
                        $timeResolved = "";
                    } else {
                        $timeResolved = $rows['TimeResolved']->format("d-m-Y H:i:s");
                    }
                    if ($rows['DueDate'] == NULL) {
                        $dueDate = "";
                    } else {
                        $dueDate = $rows['DueDate']->format("Y,m,d H:i:s");
                    }
                    //'. $rows['DueDate']->format("d-m-Y H:i:s") .'
                    //array_push($rowArray, $rows['ZohoCaseID']);
                    echo '
                        <script>
                    setInterval(function(){
                        $("#row' . $rows['ID'] . '").ready(function () {
                            var status = "' . $rows['Status'] . '".trim();
                            var now = new Date();
                            var dueDate = new Date("' . $dueDate . '");
                            var nowMil = now.getTime();
                            var dueDateMil = dueDate.getTime();
                            var timeLeftMil = dueDateMil - nowMil;
                            var seconds = Math.floor(timeLeftMil / 1000);
                            var minutes = Math.floor(seconds / 60);
                            var hours = Math.floor(minutes / 60);
                            var days = Math.floor(hours / 24);
                            seconds %= 60;
                            minutes %= 60;
                            hours %= 24;
                            $("#' . $rows['ID'] . 'Timer").css("color","green");
                            if(days < 0 && days > -10){
                                days = "-0"+Math.abs(days);
                                seconds = Math.abs(Math.floor(timeLeftMil / 1000));
                                minutes = Math.abs(Math.floor(seconds / 60));
                                hours = Math.abs(Math.floor(minutes / 60));
                                seconds %= 60;
                                minutes %= 60;
                                hours %= 24;
                                if(hours < 10){hours = ""+hours;}
                                if(minutes < 10){minutes = ""+minutes;}
                                if(seconds < 10){seconds = ""+seconds;}
                                $("#' . $rows['ID'] . 'Timer").css("color","red");
                            }else if(days < 0 && days < -10){
                                days = "-"+Math.abs(days);
                                seconds = Math.abs(Math.floor(timeLeftMil / 1000));
                                minutes = Math.abs(Math.floor(seconds / 60));
                                hours = Math.abs(Math.floor(minutes / 60));
                                seconds %= 60;
                                minutes %= 60;
                                hours %= 24;
                                if(hours < 10){hours = ""+hours;}
                                if(minutes < 10){minutes = ""+minutes;}
                                if(seconds < 10){seconds = ""+seconds;}
                                $("#' . $rows['ID'] . 'Timer").css("color","red");
                            }else if(days > 10){
                                days = Math.abs(days);
                                seconds = Math.abs(Math.floor(timeLeftMil / 1000));
                                minutes = Math.abs(Math.floor(seconds / 60));
                                hours = Math.abs(Math.floor(minutes / 60));
                                seconds %= 60;
                                minutes %= 60;
                                hours %= 24;
                                if(hours < 10){hours = ""+hours;}
                                if(minutes < 10){minutes = ""+minutes;}
                                if(seconds < 10){seconds = ""+seconds;}
                            }
                            if(hours < 10){hours = "0"+hours;}
                            if(minutes < 10){minutes = ""+minutes;}
                            if(seconds < 10){seconds = ""+seconds;}
                            var timeLeft = days+":"+hours+":"+minutes+":"+seconds;
                            if(status !== "Resolved"){
                                document.getElementById("' . $rows['ID'] . 'Timer").innerHTML = timeLeft;
                            }else{
                                document.getElementById("' . $rows['ID'] . 'Timer").innerHTML = "";
                            }
                        });
                    },1000);
                        </script>
                        <tr id="row' . $rows['ID'] . '">
                            <th>' . $count . '.</th>
                            <td>' . $rows['ZohoCaseID'] . '</td>
                            <td>' . $rows['LoggedBy'] . '</td>
                            <td>' . $rows['HandledBy'] . '</td>
                            <td>' . $rows['SecurityLevel'] . '</td>
                            <td>' . $rows['Status'] . '</td>
                            <td>' . $rows['LogDate']->format("d-m-Y H:m:s") . '</td>
                            <td id="' . $rows['ID'] . 'Timer"></td>
                            <td>' . $timeResolved . '</td>
                             
                            <td class="row">
                                <form method="post" action="" class="row">
                                <a href="#"  onclick="viewRow(' . $rows['ID'] . ')" class="btn btn-xs btn-info col-xs-6" data-toggle="modal" data-target="#view">view</a>
                                <a href="#"  onclick="editRow(' . $rows['ID'] . ')" class="btn btn-xs btn-warning col-xs-6" data-toggle="modal" data-target="">edit</a>
                                </form>
                            </td>
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