'use strict';
let dt = new Date();

function renderDate() {
    let dateString = new Date();

    dt.setDate(1);
    let day = dt.getDay();

    let endDate = new Date(
        dt.getFullYear(),
        dt.getMonth() + 1,
        0
    ).getDate();

    let prevDate = new Date(
        dt.getFullYear(),
        dt.getMonth(),
        0
    ).getDate();

    let today = new Date();

    let months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    document.getElementById("icalendarMonth").innerHTML = months[dt.getMonth()] + " , " + dt.getFullYear();
    // document.getElementById("icalendarDateStr").innerHTML = dateString.toDateString();

    let cells = "";
    let countDate = 0;

    for (let x = day; x > 0; x--) {
        cells += "<div class='icalendar__prev-date'>" + (prevDate - x + 1) + "</div>";
    }

    for (let i = 1; i <= endDate; i++) {
        if (i === today.getDate() && dt.getMonth() === today.getMonth() && dt.getFullYear() === today.getFullYear()) {
            cells += "<input class='d-none' type='radio' name='calander_date' id='calander_check"+ i +"'><label for='calander_check"+ i +"'><div class='icalendar__today'>" + i + "</div></label>";
        } 
        else if(i<4) {
            cells += "<input class='d-none'' type='radio' name='calander_date' id='calander_check"+ i +"'><label for='calander_check"+ i +"'><div class='group_event'>" + i + "</div></label>";
        }
        else {
            cells += "<input class='d-none'' type='radio' name='calander_date' id='calander_check"+ i +"'><label for='calander_check"+ i +"'><div>" + i + "</div></label>";
        }

        countDate = i;
    }

    let reservedDateCells = countDate + day + 1;
    for (let j1 = reservedDateCells, j2 = 1; j1 <= 42; j1++, j2++) {
        cells += "<div class='icalendar__next-date'>" + j2 + "</div>";
    }

    document.getElementsByClassName("icalendar__days")[0].innerHTML = cells;
}

renderDate();


function moveDate(param) {
    if (param === 'prev') {
        dt.setMonth(dt.getMonth() - 1);
    } else if (param === 'next') {
        dt.setMonth(dt.getMonth() + 1);
    }

    renderDate();
}