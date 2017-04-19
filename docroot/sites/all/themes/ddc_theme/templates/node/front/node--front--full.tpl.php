<?php
/**
 * @file
 * Template file for front full view.
 */
?>
<article class="front-end <?php print $classes ?>" <?php print $attributes; ?>>

    <h1 class="title text-center">Stopwatch</h1>

    <div class="stopwatch" ng-app="Stopwatch">

        <div ng-controller="StopwatchController as ctrl">

            <div class="stopwatch-outer">
                <div class="stopwatch-screen clearfix">
                    <div class="stopwatch-display" ng-bind="ctrl.getDisplayTime(ctrl.ms)"></div>
                    <div class="stopwatch-controls">
                        <button class="btn btn-success" ng-show="!ctrl.running" ng-click="ctrl.start()">Start</button>
                        <button class="btn btn-danger" ng-show="ctrl.running" ng-click="ctrl.stop()">Pause</button>
                        <button class="btn btn-warning" ng-click="ctrl.reset()">Reset</button>
                        <br><br>
                        <button class="btn btn-info" ng-click="ctrl.saveLaps()">Save lap</button>
                        <button class="btn btn-info" ng-click="ctrl.resetLaps();">Clear laps</button>
                    </div>
                    <div class="stopwatch-laps">
                        <h4>Laps:</h4>
                        <div class="lap" ng-repeat="lap in ctrl.laps track by $index">
                            <b>{{ $index }} </b> - {{ ctrl.getDisplayTime(lap) }}
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>


    <h1 class="title text-center">Poster</h1>

    <div class="row poster">

        <div class="col-md-6">
                <div class="background">
                    <div class="bar bar-1"></div>
                    <div class="bar bar-2"></div>
                    <div class="bar bar-3"></div>
                    <div class="bar bar-4"></div>
                    <div class="triangle triangle-1"></div>
                    <div class="triangle triangle-2"></div>
                    <div class="copy copy-1">
                        architecture <br> en <br> france
                    </div>
                    <div class="copy copy-2">
                        30. januar bis 26. februar 1969<br>
                        offnungezeiten 10-12 und 14-18 uhr <br>
                        mittwoch auch 20-22 uhr <br>
                        samstag und sonntag bis 17 uhr <br>
                        montag geschlossen - eintritt frei
                    </div>
                    <div class="copy copy-3">
                        <a href="http://www.museums.ch/org/en/Helmhaus">
                            helmhaus zürich
                        </a>
                    </div>
                </div>
            </div>

        <!-- Quick embed for comparison -->
        <div class="col-md-6 text-center">
            <img src="<?php echo path_to_theme() ?>/images/poster.jpg">
        </div>

    </div>



</article>