<?php
require 'navigator.php';
?>
<style>
    #tmKey > ul > li{
        color: blue;
        list-style: none;
        
    }
    #tmKey > ul > li:hover{
        color: black;
        list-style: none;
        cursor: none;
        
    }
    #predatorKey > ul > li{
        color: blue;
        list-style: none;
        
    }
    #predatorKey > ul > li:hover{
        color: black;
        list-style: none;
        cursor: none;
        
    }
</style>
<title>Home Page - TMSpider</title>
<div id="page-wrapper" style="padding: 1.5%;">
    <em style="color: #0075b0;"><h4>Leader's Board</h4></em>
    <div class="container-fluid row">
        <div class="col-sm-4" style="text-align: center; background-color: whitesmoke">
            <img  class="span4" src="images/last_case_logged.jpg" width="50%" height="10%"/>
            <h4><b>Last Case Logged</b></h4>
            <div style="text-align: left;">

                <b>Case ID:<b style="color: #0075b0;"><?php echo $lastCaseID; ?></b></b>
                <br/>
                <b>Date:<b style="color: #0075b0;"><?php echo $lastLoggedDate; ?></b></b>

            </div>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-info" style="text-align: center; background-color: whitesmoke">
            </span><img  class="span4" src="images/today_case_count.png" width="50%" height="10%"/>
            <h4><b>Today's Case Count</b></h4>
            <b style="color: #0075b0;"><?php echo $todayCaseCount; ?></b>
        </div>
    </div>
    <div class="container-fluid row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-info" style="text-align: center; background-color: whitesmoke">
            </span><img  class="span4" src="images/average_response_time.png" width="50%" height="15%"/>
            <h4><b>Average Response Time</b></h4>
            <b style="color: #0075b0;"><?php echo $avgTime." Min"; ?></b>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="container-fluid row">
        <div class="col-sm-4 bg-info" style="text-align: center; background-color: whitesmoke">
            </span><img  class="span4" src="images/tm_key_guy.png" width="50%" height="15%"/>
            <h4><b>TM KEY GUYS</b></h4>
            <div style="text-align: left;" id="tmKey">
                <ul>
                    <li id="tmToday" onclick="tmKeyAction('today')">Today</li>
                        <ol id="tmTodayList" style="display: none;">
                            <li><?php echo $tmToday[0];?></li>
                            <li><?php echo $tmToday[1];?></li>
                            <li><?php echo $tmToday[2];?></li>
                        </ol>
<!--                    <li id="tmWeek" onclick="tmKeyAction('week')">This Week So Far</li>
                        <ol id="tmWeekList" style="display: none;">
                            <li>First</li>
                            <li>First</li>
                            <li>First</li>
                        </ol>-->
                    <li id="tmMonth" onclick="tmKeyAction('month')">This Month So Far</li>
                        <ol id="tmMonthList" style="display: none;">
                            <li><?php echo $tmMonth[0];?></li>
                            <li><?php echo $tmMonth[1];?></li>
                            <li><?php echo $tmMonth[2];?></li>
                        </ol>
                </ul>
            </div>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-info" style="text-align: center; background-color: whitesmoke">
            </span><img  class="span4" src="images/most_troublesome.png" width="50%" height="15%"/>
            <h4><b>MOST TROUBLESOME PREDATORS</b></h4>
            <div style="text-align: left;" id="predatorKey">
                <ul>
                    <li id="predatorToday" onclick="predatorKeyAction('today')">Today</li>
                        <ol id="predatorTodayList" style="display: none;">
                            <li><?php echo $predatorToday[0];?></li>
                            <li><?php echo $predatorToday[1];?></li>
                            <li><?php echo $predatorToday[2];?></li>
                        </ol>
                    <li id="predatorMonth" onclick="predatorKeyAction('month')">This Month So Far</li>
                        <ol id="predatorMonthList" style="display: none;">
                            <li><?php echo $predatorMonth[0];?></li>
                            <li><?php echo $predatorMonth[1];?></li>
                            <li><?php echo $predatorMonth[2];?></li>
                        </ol>
                    <li id="predatorOverall" onclick="predatorKeyAction('overall')">Overall</li>
                        <ol id="predatorOverallList" style="display: none;">
                            <li><?php echo $predatorOverall[0];?></li>
                            <li><?php echo $predatorOverall[1];?></li>
                            <li><?php echo $predatorOverall[2];?></li>
                        </ol>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>

</html>
