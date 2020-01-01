<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
require 'tm_navigator.php';
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

<title>Ground Rules - TMSpider</title>
<div id="body">
    <div id="page-wrapper" style="padding: 1.5%;">
        <em style="color: #0075b0;"><h4>Ground Rules</h4></em>

    </div>
</div>
</body>
</html>