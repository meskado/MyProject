<?php 
   include 'HomePhp.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="TimetableScript.js" type="text/javascript"></script>
        <title>Home page</title>
    </head>
    <body style="background-image: url('pictures/Fireworks.jpg')">
        <div class="container">
            <div class="row" style="background-color: #abdde5">
                <div class="col-2">
                    <img src="pictures/Lion-Tattoo-Free-Download-PNG.png" style="height: 100px; width: 100px" />
                </div>
                <div class="col-10">
                    <div style="font-size: 30px"><center>LECTURE VENUE ALLOCATION SYSTEM</center></div>
                    <div style="font-size: 10px"><center>AN AUTOMATED LECTURE VENUE ALLOCATION SYSTEM </center></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2" style="border: 1px solid red; background-color: #17a2b8">
                    <div> <button type="button" class='btn btn-primary btn-sm active' id="timeb">Click to see timetables</button></div>
                    <div>
                        <p>Admin login</p> 
                    </div>
                    <form role="form" action="<?php $_PHP_SELF?>" method="GET">
                        <div class="form-group">
                            <input type="text" placeholder="Enter username" class="form-control" name="use" />
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Enter password"  class="form-control" name="pas" />
                        </div>
                        <div class='form-group'>
                            <input type="submit" class="btn btn-primary btn-sm active" name="Adminlog" value="login"/>
                        </div>
                    </form>
                    <div><?php admin()?></div>
                    <div>forgot your password?</div>
                    <div><button type="button" class='btn btn-primary btn-sm active'>click here</button></div>
                    
                </div>
                <div class="col-lg-8 col-md-8" style="border: 1px solid black; background-color: #ffffff">
                    Welcome
                    <div><center><img src="pictures/crutech.png" height="110px" width="110px"</center></div>
                    <div id="hnormal">
                        <p style='color: #0c5460'>
                            <img src="pictures/131567-566x848r1-Anxious.jpg" alt="" height="30px" width="30px"/>
                            Lecture venue timetabling is an important problem in any educational institution 
                            The quality of a solution is of great importance to a number of parties including lecturers,
                            students and administrators
                        </p>
                        <p>Did you know?</p>
                        <p style='color: #0c5460'>
                            The problem of timetabling is of much interest and concern to academic institution.
                            The basic problem is to allocate the time slot and room for all event(exams,lectures,seminars and tutorial)
                            within a limited number of permitted time slots and rooms in order to find a feasible timetable 
                        </p>
                        <p style='color: #0c5460'>
                            In addition, it is also important to build a good quality lecture timetable
                            that considers not only the administration requirements, but also takes into account 
                            lecturer's and students preferences. It is generally desirable (but not essential)
                            to satisfy this preferences, and as such, they are termed soft constraints 
                        </p>
                    </div>
                    <div style="display: none" id="time"><?php displayTime()?></div>
                    <div> <img src="pictures/obi1.png" alt="" height="100px" width="100px"/></div>
                    
                </div>
                <div class="col-lg-2 col-md-2" style="border: 1px solid red; background-color: #17a2b8">
                     <div>
                        <p>Timetable Officer login</p> 
                    </div>
                    <form role="form" action="<?php $_PHP_SELF?>" method="POST">
                        <div class="form-group">
                            <input type="text" placeholder="Enter username" name="user" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Enter password" name="password" class="form-control"/>
                        </div>
                        <div class='form-group'>
                            <input type="submit" class="btn btn-primary btn-sm active" name="officer" value="login"/>
                        </div>
                    </form>
                    <div><?php timeofficer()?></div>
                    <div>forgot your password?</div>
                        <div><button type="button" class='btn btn-primary btn-sm active'>click here</button></div>
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
