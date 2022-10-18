/* global moment */

$(document).ready(function () {
    
    
    $('#footer-time').text(getTime());
    $('#footer-date').text(getDate());
    setInterval(function () {
        $('#footer-time').text(getTime());
        $('#footer-date').text(getDate());
    }, 1000);

});

function getDate() {
    var result = moment().format('DD MMMM YYYY');
    return result;
}

function getTime() {
    var result = moment().format('hh:mm:ss A');
    return result;
}

