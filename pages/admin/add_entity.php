<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
require './admin_navigator.php';
if (isset($_REQUEST['submitTM'])) {
    $newTM = filter_input(INPUT_POST, 'fullNameTM');
    $addNewTMSQL = "INSERT INTO $tableName2(Name,Total_Score,Badge,Type) VALUES('$newTM',0,'','TM')";
    $addnewTMQuery = sqlsrv_query($con, $addNewTMSQL); //or die(print_r(sqlsrv_errors(), true));
    if ($addnewTMQuery) {
        echo '<script>alert("New TM Member Added");</script>';
    } else {
        echo '<script>alert("Try again");</script>';
    }
}
if (isset($_REQUEST['submitPredator'])) {
    $addNewPredator = filter_input(INPUT_POST, 'fullNamePredator');
    $addNewPredatorSQL = "INSERT INTO $tableName2(Name,Total_Score,Type) VALUES('$addNewPredator',0,'Predator')";
    $addNewPredatorQuery = sqlsrv_query($con, $addNewPredatorSQL); //or die(print_r(sqlsrv_errors(), true))
    if ($addNewPredatorQuery) {
        echo '<script>alert("New TM Member Added");</script>';
    } else {
        echo "<script>alert('Try again'');</script>";
    }
}
if (isset($_REQUEST['submitCategory'])) {
    $addNewCategory = filter_input(INPUT_POST, 'categoryName');
    $categoryCode = filter_input(INPUT_POST, 'categoryCode');
    $categoryPoint = filter_input(INPUT_POST, 'categoryPoint');
    $addNewCategorySQL = "INSERT INTO $tableName2(Name,Type,CategoryCode,categoryPoint) VALUES('$addNewCategory','Category','$categoryCode', $categoryPoint)";
    $addNewCategoryQuery = sqlsrv_query($con, $addNewCategorySQL); //or die(print_r(sqlsrv_errors(), true))
    if ($addNewCategoryQuery) {
        echo '<script>alert("New TM Member Added");</script>';
    } else {
        echo "<script>alert('Try again'');</script>";
    }
}
//password 

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
    var login = sessionStorage.getItem("pass");
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
        <em style="color: #0075b0;"><h4>Add Entity</h4></em>
        <em style="color: #0075b0;"><h5>Add new TM member</h5></em>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group row">
                <input type="text" class="form-control col-sm-5" style="width: 30%" id="fullNameTM" name="fullNameTM" placeholder="Enter Full Name" required/>
                <div class="col-lg-1"></div>
                <input type="submit" name="submitTM" class="btn btn-success col-lg-2"/>
            </div>
        </form>

        <em style="color: #0075b0;"><h5>Add predator</h5></em>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group row">
                <input type="text" class="form-control col-sm-5" style="width: 30%" id="fullNamePredator" name="fullNamePredator" placeholder="Enter Full Name" required/>
                <div class="col-lg-1"></div>
                <input type="submit" name="submitPredator" class="btn btn-success col-lg-2"/>
            </div>
        </form>

        <em style="color: #0075b0;"><h5>Add new Category</h5></em>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group row">
                <input type="text" class="form-control col-sm-4" style="width: 30%" id="categoryName" name="categoryName" placeholder="Category Name" required/>
                <div class="col-lg-1"></div>
                <input type="text" class="form-control col-sm-4" style="width: 30%" id="categoryCode" name="categoryCode" placeholder="Category Code" required/>
                <div class="col-lg-1"></div>
                <input type="number" name="categoryPoint" id="categoryPoint" class="col-lg-2"/>
            </div>
            <input type="submit" name="submitCategory" class="btn btn-success col-lg-2"/>
        </form>

    </div>
</div>
</body>
</html>