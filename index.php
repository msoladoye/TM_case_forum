<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="stylesheets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th> <th>ZOHO CASE ID</th> <th>CASE LOGGED BY</th> <th>CASE LOGGED TO</th> <th>STATUS</th> <th>LOG TIME</th> <th>TIME RESOLVED</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
                <tr>
                    <th>2</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
                <tr>
                    <th>3</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
                <tr>
                    <th>4</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
                <tr>
                    <th>5</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
                <tr>
                    <th>6</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
                <tr>
                    <th>7</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
                <tr>
                    <th>8</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
                <tr>
                    <th>9</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
                <tr>
                    <th>10</th> <td>ZOHO CASE ID</td> <td>CASE LOGGED BY</td> <td>CASE LOGGED TO</td> <td>STATUS</td> <td>LOG TIME</td> <td>TIME RESOLVED</td>
                </tr>
            </tbody>
        </table>
        
        <?php
        phpinfo();
        //$conn = mysqli_connect('localhost', '', '');
           //$conn =  mssql_connect('10.1.3.11', 'TMUser1', 'P@ssw0rd') or die('not connected');
           //$conn =  sqlsrv_connect('10.1.3.11', 'TMUser1', 'P@ssw0rd') or die('not connected');
           $con =  mssql_connect('localhost', 'localhost\SoladoyeolaOS', '') or die('not connected');
           //$conn =  ('localhost', 'localhost\SoladoyeolaOS', '')  or die('not connected');
         //mssql_s
           //if ($conn){
          //     echo 'connected';
           //}
           if ($con){
               echo 'connected';
           }
        ?>
    </body>
</html>
