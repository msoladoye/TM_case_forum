/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Dropdown
var forPredators = 0;
var forTM = 0;
var forAdmin = 0;
var tmKey = 0;
function forPredatorsAction() {
    if (forPredators === 0) {
        $('#predatorFunction').show();
        forPredators = 1;
    } else {
        $('#predatorFunction').hide();
        forPredators = 0;
    }
}
function forTMAction() {
    if (forTM === 0) {
        $('#tmFunction').show();
        forTM = 1;
    } else {
        $('#tmFunction').hide();
        forTM = 0;
    }
}
function forAdminAction() {
    if (forAdmin === 0) {
        $('#adminFunction').show();
        forAdmin = 1;
    } else {
        $('#adminFunction').hide();
        forAdmin = 0;
    }
}
function tmKeyAction(when) {
    if (tmKey === 0) {
        switch (when) {
            case 'today':
                $('#tmTodayList').show();
                $('#tmWeek').hide();
                $('#tmMonth').hide();
                tmKey = 1;
                break;
            case 'week':
                $('#tmToday').hide();
                $('#tmWeekList').show();
                $('#tmMonth').hide();
                tmKey = 1;
                break;
            case 'month':
                $('#tmToday').hide();
                $('#tmWeek').hide();
                $('#tmMonthList').show();
                tmKey = 1;
                break;
            default:
                break;
        }
    }
    else {
        switch (when) {
            case 'today':
                $('#tmTodayList').hide();
                $('#tmWeek').show();
                $('#tmMonth').show();
                tmKey = 0;
                break;
            case 'week':
                $('#tmToday').show();
                $('#tmWeekList').hide();
                $('#tmMonth').show();
                tmKey = 0;
                break;
            case 'month':
                $('#tmToday').show();
                $('#tmWeek').show();
                $('#tmMonthList').hide();
                tmKey = 0;
                break;
            default:
                break;
        }
    }
}
function predatorKeyAction(when) {
    if (tmKey === 0) {
        switch (when) {
            case 'today':
                $('#predatorTodayList').show();
                $('#predatorMonth').hide();
                $('#predatorOverall').hide();
                tmKey = 1;
                break;
            case 'month':
                $('#predatorToday').hide();
                $('#predatorMonthList').show();
                $('#predatorOverall').hide();
                tmKey = 1;
                break;
            case 'overall':
                $('#predatorToday').hide();
                $('#predatorMonth').hide();
                $('#predatorOverallList').show();
                tmKey = 1;
                break;
            default:
                break;
        }
    }
    else {
        switch (when) {
            case 'today':
                $('#predatorTodayList').hide();
                $('#predatorMonth').show();
                $('#predatorOverall').show();
                tmKey = 0;
                break;
            case 'month':
                $('#predatorToday').show();
                $('#predatorMonthList').hide();
                $('#predatorOverall').show();
                tmKey = 0;
                break;
            case 'overall':
                $('#predatorToday').show();
                $('#predatorMonth').show();
                $('#predatorOverallList').hide();
                tmKey = 0;
                break;
            default:
                break;
        }
    }
}