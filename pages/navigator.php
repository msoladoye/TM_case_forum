<?php
require_once 'db_connection.php';
session_start();
?>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <script src="stylesheets/jquery.min.js" type="text/javascript"></script>
        <script src="stylesheets/js/bootstrap.min.js" type="text/javascript"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="stylesheets/js/script.js" type="text/javascript"></script>
        <style>
            .row{
                margin: 1%;
            }
            ul li ul li a:hover{
                text-decoration: none;
            }
            ul li ul li{
                margin: 3%;
                text-decoration: none;
                overflow: visible; 
                //text-overflow: ellipsis;
                white-space: nowrap;
            }
            textarea{
                height: 300em;
            }
        </style>
        <script>
        sessionStorage.setItem("pass","generalpass")
        </script>
    </head>

    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">

                    <a class="navbar-brand" href="index.php"><b>Welcome To TMSpider</b></a>
                </div>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="">
                                <img src="images/TMSpider.png" width="100%"/>
                            </li>
                            <li>
                                <a href="index.php" class="active"><i class=""></i> STATISTICS</a>
                            </li>
                            <li>
                                <a href="#" onclick="forPredatorsAction()"><i class="side-nav"></i> PREDATOR'S FUNCTIONS <span class="fa fa-caret-down"></span></a>
                                <ul id="predatorFunction" style="display: none;  list-style: none;">
                                    <li><a href="add_new_case.php"><i class="side-nav"></i> ADD NEW CASE</a></li>
                                    <li><a href="general_case_view.php"><i class="side-nav"></i> USERS CASE VIEW</a></li>
                                    <li><a href="reopen_resolved_php.php"><i class="side-nav"></i>REOPEN CASE</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="tm/index.php" onclick=""><i class="side-nav"></i> TM'S FUNCTIONS </a>
                            </li>
                            <li>
                                <a href="admin/index.php" onclick=""><i class="side-nav"></i> ADMIN'S FUNCTIONS </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


