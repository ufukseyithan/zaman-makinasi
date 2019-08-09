$(function() {
    //Countdown
    const dateTime = $(".countdown-counter").data("date");

    let dateTimeParts= dateTime.split(/[- :]/);
    dateTimeParts[1]--; 

    const goal = new Date(...dateTimeParts).getTime();

    function countDown() {
        var now = new Date().getTime();
        var distance = goal - now;

        if (distance <= 0) {
            location.reload(true);
        } else {
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $(".countdown-days").html(days);
            $(".countdown-hours").html(hours);
            $(".countdown-minutes").html(minutes);
            $(".countdown-seconds").html(seconds);
        }
    }
    countDown();

    setInterval(countDown, 1000);
});