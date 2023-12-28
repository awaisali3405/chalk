function calculateTimeDifference(time1, time2) {
    // Convert times to minutes
    var minutes1 = convertToMinutes(time1);
    var minutes2 = convertToMinutes(time2);

    // Find the absolute difference in minutes
    var differenceInMinutes = Math.abs(minutes2 - minutes1);

    // Convert total difference back to hours and minutes
    var hours = Math.floor(differenceInMinutes / 60);
    var minutes = differenceInMinutes % 60;

    return { hours: hours, minutes: minutes };
}

// Function to convert time to minutes
function convertToMinutes(time) {
    var parts = time.split(":");
    return parseInt(parts[0]) * 60 + parseInt(parts[1]);
}

$('#start_time').add('#end_time').on('change keyup', function () {
    var day = '1/1/1970 '; // 1st January 1970
    var start = $('#start_time').val();
    var end = $('#end_time').val();
    if (start && end) {

        var timeDifference = calculateTimeDifference(start, end);
        var calculatedTime = timeDifference['hours'] + '.' + timeDifference['minutes'];
        $('#calculated_time').val(calculatedTime);
    }
    // var start_time = Date.parse(start, "hh:mm tt");  //Convert Time from A/PM to time
    // var end_time = Date.parse(end, "hh:mm tt"); //Convert Time from A/PM to time

    // var startDate = new Date("1/1/1900 " + start_time);
    // var endDate = new Date("1/1/1900 " + end_time);
    // diff_in_min = (Date.parse(day + end) - Date.parse(day + start)) //diff in milliseconds'

    console.log(timeDifference,);
})
$('.start_time1').add('.end_time1').on('change keyup', function () {
    var day = '1/1/1970 '; // 1st January 1970
    var start = $('#start_time1').val();
    var end = $('#end_time1').val();
    if (start && end) {

        var timeDifference = calculateTimeDifference(start, end);
        var calculatedTime = timeDifference['hours'] + '.' + timeDifference['minutes'];
        $('.calculated_time1').val(calculatedTime);
    }
    // var start_time1 = Date.parse(start, "hh:mm tt");  //Convert Time from A/PM to time
    // var end_time = Date.parse(end, "hh:mm tt"); //Convert Time from A/PM to time

    // var startDate = new Date("1/1/1900 " + start_time);
    // var endDate = new Date("1/1/1900 " + end_time);
    // diff_in_min = (Date.parse(day + end) - Date.parse(day + start)) //diff in milliseconds'

    console.log(timeDifference,);
})
