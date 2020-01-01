<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'tm_navigator.php';
//if (isset($_REQUEST['submit'])) {
    //echo 'good
    //
//    $zohoCodeID = filter_input(INPUT_POST, 'ZohoCaseID');
//    $loggedBy = filter_input(INPUT_POST, 'LoggedBy');
//    $securityLevel = filter_input(INPUT_POST, 'SecurityLevel');
//    $details = filter_input(INPUT_POST, 'Details');
//    $logDate = date("Y-m-d H:i:s a");
//    $category = filter_input(INPUT_POST, 'Category');
//    $dueDate;
//    if ($securityLevel == 1) {
//        $logDate = date('Y-m-d H:i:s');
//        $logDateMil = strtotime($logDate);
//        $dueDateMil = $logDateMil + (60 * 60 * 5);
//        $dueDate = date('Y-m-d H:i:s', $dueDateMil);
//    } elseif ($securityLevel == 2) {
//        $logDate = date('Y-m-d H:i:s');
//        $logDateMil = strtotime($logDate);
//        $dueDateMil = $logDateMil + (60 * 60 * 40);
//        $dueDate = date('Y-m-d H:i:s', $dueDateMil);
//    } elseif ($securityLevel == 3) {
//        $logDate = date('Y-m-d H:i:s');
//        $logDateMil = strtotime($logDate);
//        $dueDateMil = $logDateMil + (60 * 60 * 24 * 5);
//        $dueDate = date('Y-m-d H:i:s', $dueDateMil);
//    } else if ($securityLevel == 4) {
//        $logDate = date('Y-m-d H:i:s');
//        $logDateMil = strtotime($logDate);
//        $dueDateMil = $logDateMil + (60 * 60 * 24 * 7 * 4);
//        $dueDate = date('Y-m-d H:i:s', $dueDateMil);
//    }
//    //echo $logDate;
//    $insertSql = "insert into TM_Case_forum.dbo.LoggedCasses
// (
// ZohoCaseID,
// LoggedBy ,
// Category,
// SecurityLevel,
// Status,
// LogDate,
// DueDate,
// Details
// )
// 
// values ('" . $zohoCodeID . "','" . $loggedBy . "','" . $category . "','" . $securityLevel . "','Open','" . $logDate . "','" . $dueDate . "','" . $details . "')";
//    $insertQuery = sqlsrv_query($con, $insertSql); //or die(print_r(sqlsrv_errors(), true));
//    if ($insertQuery) {
//        $_SESSION['success'] = "TRUE";
//        header("Location: general_case_view.php");
//    } else {
//
//        echo ''
//        . '<div class="alert alert-danger alert-dismissible fade in" style="position: absolute;font-size:2px; width: 40%; width: 20%; right: 1%; text-align: center;" id="alert">
//            <script>
//                $(document).ready(function (){
//                    window.setTimeout(function (){
//                        $("#alert").alert("close");
//                    }, 3000);
//                });
//                
//            </script>
//            <a class="close" data-dismiss="alert" arial-lable="close">&times;</a>
//            <h1>Row not updated, please try again</h1>
//        </div>'
//        . '';
//    }
//    //echo $assignedTo;
//} else {
//    
//}

//password
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
<title>Add Case TM - TMSpider</title>
<div id="body">
    <div id="page-wrapper" style="padding: 1.5%;">
        <em style="color: #0075b0;"><h4>ADD NEW CASE</h4></em>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ZohoCaseID" class="text-primary">Zoho Case ID :<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" style="width: 30%" id="ZohoCaseID" name="ZohoCaseID" placeholder="Zoho Case ID" required>
            </div>

            <div class="form-group" >
                <label for="CaseLoggedBy" class="text-primary">Case Logged By:<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" style="width: 30%" id="LoggedBy" name="LoggedBy" placeholder="Case Logged By" required>
            </div>

            <!--div class="form-group">
                <label for="AssignedTo" class="text-primary">Assign To:<span class="text-danger"> *</span></label>
                <select type="text" class="form-control" id="AssignedTo" name="AssignedTo" placeholder="Assigned To" required>
                    <option id="selectPersonal">-- Assign To --</option>
                    <option id="Ese" value="Precious Ogunje">Precious Ogunje</option>
                    <option id="Simbi" value="Simbiat Ayobami">Simbiat Ayobami</option>
                    <option id="Aniekan" value="Aniekan Umoh">Aniekan Umoh</option>
                    <option id="Kayinsola" value="Kayinsola Olajide">Kayinsola Olajide</option>
                    <option id="Ola" value="Ola Soladoye">Ola Soladoye</option>
                </select>
            </div-->

            <div class="form-group">
                <label for="Category" class="text-primary">Category:<span class="text-danger"> *</span></label>
                <select type="text" class="form-control" style="width: 30%" id="SecurityLevel" name="Category" placeholder="Category" required>
                    <option id="selectLevel">-- Category --</option>
                    <option id="level1" value="1">Level 1</option>
                    <option id="level2" value="2">Level 2</option>
                    <option id="level3" value="3">Level 3</option>
                    <option id="level4" value="4">Level 4</option>
                </select>
            </div>

            <div class="form-group">
                <label for="SecurityLevel" class="text-primary">Security Level:<span class="text-danger"> *</span></label>
                <select type="text" class="form-control" style="width: 30%" id="SecurityLevel" name="SecurityLevel" placeholder="SecurityLevel" required>
                    <option id="selectLevel">-- Security Level --</option>
                    <option id="level1" value="1">Level 1</option>
                    <option id="level2" value="2">Level 2</option>
                    <option id="level3" value="3">Level 3</option>
                    <option id="level4" value="4">Level 4</option>
                </select>
            </div>

            <div class="form-group">
                <span class="text-danger"> *</span>
                <textarea type="text" rows="10" class="form-control" style="width: 30%" id="Details" name="Details" placeholder="Case Details" required></textarea>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success col-sm-1" name="submit" id="submit" style="margin: 5px 5px 5px 5px ">Save</button>
                <button type="clear" class="btn btn-primary col-sm-1" style="margin: 5px 5px 5px 5px ">Clear</button>
                <a href="#" onclick="cancel()" type="clear" class="btn btn-danger col-sm-1" style="margin: 5px 5px 5px 5px ">Cancel</a>
                <div class="col-sm-8"></div>
            </div>
        </form>
    </div>
</div>
<script>
    function cancel() {
        var confirm = window.confirm("Click OK to confirm canceling");
        if (confirm === true) {
            window.location = "general_case_view.php";
        }
        //window.prompt("Click Yes to confirm canceling");
    }
</script>
</body>
</html>
