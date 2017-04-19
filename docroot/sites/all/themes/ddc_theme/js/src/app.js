/**
 * Main app
 * Simplified angular app, for more complex examples take a look at
 * https://github.com/Kelsay/Portfolio
 */

angular.module("Stopwatch", []);

/**
 * Stopwatch controller
 */

angular.module("Stopwatch").controller("StopwatchController", StopwatchController);

StopwatchController.$inject = ["$interval"];

function StopwatchController($interval) {

    var vm = this;

    // Current number of milliseconds
    vm.ms = 0;

    // The time when stopwatch started
    vm.lastTime = 0;

    /**
     * Initialize the controller with the saved laps
     * Use empty array if there is no saved lap data
     */
    vm.laps = localStorage.getItem("laps") ? JSON.parse(localStorage.getItem("laps")) : [];


    /**
     * Start the timer
     */
    vm.start = function() {
        vm.interval = $interval(step, 10);
        vm.running = true;
        vm.lastTime = new Date();
        console.log('start');
    }

    /**
     * Stop (pause) the time
     */
    vm.stop = function() {
        $interval.cancel(vm.interval);
        vm.running = false;
        console.log('stop');
    }

    /**
     * Stop the timer and reset it to zero
     */
    vm.reset = function() {
        vm.stop();
        vm.ms = 0;
    }

    /**
     * Save current lap to the array and update the local storage
     */
    vm.saveLaps = function() {
        if (vm.ms > 0) {
            vm.laps.push(vm.ms);
            localStorage.setItem("laps", JSON.stringify(vm.laps));
        }
    }

    /**
     * Clear laps list
     */

    vm.resetLaps = function() {
        vm.laps = [];
        localStorage.setItem("laps", JSON.stringify(vm.laps));
    }

    /**
     * Update the timer
     * The setInterval method in JS is not reliable so we need to calculate the time diff in ms
     */
    function step() {
        var currentTime = new Date();
        vm.ms += currentTime - vm.lastTime;
        vm.lastTime = currentTime;
    }

    /**
     * Get formatted human readable timer string for display
     * @param time time elapsed expressed as number of milliseconds
     * @returns {string} formatted time display
     */
    vm.getDisplayTime = function(duration) {
        var milliseconds = parseInt((duration%1000)),
            seconds = parseInt((duration/1000)%60),
            minutes = parseInt((duration/(1000*60)) % 60),
            hours = parseInt((duration/(1000*60*60))%24);

        hours = addLeadingZeros(hours, 2);
        minutes = addLeadingZeros(minutes, 2);
        seconds = addLeadingZeros(seconds, 2);
        milliseconds = addLeadingZeros(milliseconds, 3);

        return hours + ":" + minutes + ":" + seconds + ":" + milliseconds;
    }

    /**
     * Pad the number with leading zeros
     * @param number to pad (e.g. 2)
     * @param length of the string needed, e.g. 4 for 0002
     * @returns {string}
     */
    function addLeadingZeros(number, length) {
        var s = number + "";
        while (s.length < length) s = "0" + s;
        return s;
    }

}
