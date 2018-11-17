<?php
  include 'AdminPhp.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="TimetableScript.js"></script>
        <title>Timetable Officer Page</title>
    </head>
    <body style="background-image: url('pictures/Fireworks.jpg')">
       <?php atest()?>
       <div class="container">
            <div class="row" style="background-color: #abdde5">
                <div class="col-2">
                    <img src="pictures/Lion-Tattoo-Free-Download-PNG.png" style="height: 100px; width: 100px" />
                </div>
                <div class="col-10">
                    <div style="font-size: 30px"><center>LECTURE VENUE ALLOCATION SYSTEM</center></div>
                    <div style="font-size: 10px"><center>AN AUTOMATED LECTURE VENUE ALLOCATION SYSTEM </center></div>
                     <div style="float: right"> 
                         <form action="<?php $_PHP_SELF?>" method="GET">
                         <input type="submit" class='btn btn-primary btn-sm active' name="logout" value="logout"/>
                         </form>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3" style="border: 1px solid red; background-color: #17a2b8">
                   
                    <p>Click on button <i>Create</i> to create new session and semester</p>
                    <div>
                        <form role="form" action="<?php $_PHP_SELF?>" method="POST">
                           <div class="form-group">
                               <input type="text" placeholder="Enter Session eg 2018/2019" class="form-control" name="section"/>
                           </div>
                           <div class="form-group">
                                    <select class="form-control" style="background-color:#abdde5 " name="semester">
                                        <option value="" selected="">Select Semester</option>
                                        <option value="First">First</option>
                                        <option value="Second">Second</option>
                                    </select>
                            </div>
                            <center><input type="submit" class='btn btn-primary btn-sm active' name="create" value="create"/></center>
                        </form>
                       
                    </div>
                     
                    <p> <button type="button" class='btn btn-primary btn-sm active' id="change">Change password</button></p>
                    <div style="display: none" id="dischange">
                        <form role="form" action="<?php $_PHP_SELF?>" method="POST">
                            <div class="form-group">
                                <input type="password" placeholder="Enter current password" class="form-control" name="current"/>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Enter new password" class="form-control" name="new"/>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Re-enter password" class="form-control" name="renew"/>
                            </div>
                            <div>
                                <center><input type="submit" class='btn btn-primary btn-sm active' name="chang" value="change"/></center>
                            </div>
                        </form> 
                        
                    </div>
                     <?php change()?>
                    <p> <button type="button" class='btn btn-primary btn-sm active' id="rtime">Register Timetable officer</button></p>
                    <div style="display: none" id="regtime">
                        <form role="form" action="<?php $_PHP_SELF?>" method="POST">
                            <div class="form-group">
                                <input type="text" placeholder="Enter Name" class="form-control" name="name"/>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter phone number" class="form-control" name="phone"/>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter E-mail" class="form-control" name="mail"/>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Username" class="form-control" name="user"/>
                            </div>
                            <div class="form-group">
                                    <select class="form-control" style="background-color:#abdde5 " name="dept">
                                        <option value="" selected="">Select Department</option>
                                        <option value="Mass Communication">Mass Communication</option>
                                        <option value="Language and Linguistic Science">Language and linguistic Sciences</option>
                                        <option value="Electrical/Electronics Engineering">Electrical/Electronics Engineering</option>
                                        <option value="Civil Engineering">Civil Engineering</option>
                                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                                        <option value="Wood Technology Engineering">Wood Technology Engineering</option>
                                        <option value="Computer Science">Computer Sciences</option>
                                        <option value="Biolgical Science">Biological Sciences</option>
                                        <option value="Physics">Physics</option>
                                        <option value="Chemical Science">Chemical Sciences</option>
                                        <option value="Mathematics/Statistics">Mathematics/Statistics</option> 
                                        <option value="Estate Management">Estate Management</option>
                                        <option value="Architecture">Architecture</option>
                                        <option value="Urban and Regional Planning">Urban and Regional Planning</option>
                                        <option value="Visual Art and Technology">Visual Art and Technology</option>
                                        <option value="Curriculum and Instructional Technology">Curriculum and Instructional Technology</option>
                                        <option value="Education Foundation and Administration">Education Foundation and Administration</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Enter Password" class="form-control" name="password"/>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Re-enter Password" class="form-control" name="rpassword"/>
                            </div>
                            <div>
                                <center><input type="submit" class='btn btn-primary btn-sm active' name="reg" value="Register"/></center>
                            </div>
                        </form>    
                    </div>
                    <?php RegisterTime()?>
                    <p><button class="btn btn-primary btn-sm active" id="viewcourse">View courses</button></p>
                    <p><button class="btn btn-primary btn-sm active" id="viewvenue">View Lecture venues</button></p>
                    <p>
                       <button type="button" class='btn btn-primary btn-sm active' id="allocate">Allocate lecture venue</button>
                    </p>
                     <p><button class="btn btn-primary btn-sm active" id="viewallocation">View Allosion</button></p>
                </div>
                <div class="col-lg-9 col-md-9" style="border: 1px solid black; background-color: #ffffff; overflow: auto" id="main">
                    
                    Welcome <?php echo $_SESSION['use'];?><br />
                    <div><img src="pictures/crutech.png" height="110px" width="110px" style="float: right"/></div>
                    <br /><br />
                    <div class="row" id="detail"> 
                        <p>
                          <u>NOTE</u><BR />
                          Before allocating a hall to courses there are some constraints that need to be considered before
                          the allocation; they are
                        </p>
                        <p>
                          <ul>
                              <li>Before the allocation it is assumed that students have done there course registration in order to get the data needed for the allocation</li>
                              <li>Confirmation of the present session, semester and time slots</li>
                              <li>List of courses and number of students offering them</li>
                              <li>List of lecture venues and there capacity</li>
                              <li>Also course credit hours should be considered</li>
                          </ul>
                        </p>
                    </div>
                    <div class="row" style="display: none; margin: 10px" id="view">
                       <div style="margin:10px"><b>Course Information</b></div>
                       <?php ViewCourse()?>
                    </div>
                    <div class="row" id="venue" style="display:none; margin: 10px">
                        <div style="margin:10px"><b>Lecture venue information</b></div>
                        <?php ViewVenue()?>
                    </div>
                    <div class="row" id="allo" style="display: none">
                        <?php savecos()?>
                        <form role="form" actio="<?php $_PHP_SELF?>" method="POST">
                           <div><b>Allocate venue here</b></div>
                           <div class="form group">
                               <select class="form-control" name="cos">
                                    <option value="" selected="">Course Code</option>
                                    <?php listcourse()?>
                               </select>
                           </div>
                            <p><div class="form-group">
                              <select class="form-control" name="tim">
                                    <option value="" selected>Select time-slot</option>
                                    <option value="8-10">8-10</option>
                                    <option value="10-12">10-12</option>
                                    <option value="12-2">12-2</option>
                                    <option value="2-4">2-4</option>
                                    <option value="4-6">4-6</option>
                              </select>
                            </div></P>
                           <div class="form group">
                              <select class="form-control" name="ven">
                                  <option value="" selected="">lecture venue</option>
                                  <?php listv()?>
                              </select>
                           </div>
                            <p><div class="form-group">
                              <select class="form-control" name="day">
                                 <option value="" selected>Select Day 1</option>
                                 <option value="Monday">Monday</option>
                                 <option value="Tuesday">Tuesday</option>
                                 <option value="Wednesday">Wednesday</option>
                                 <option value="Thursday">Thursday</option>
                                 <option value="Friday">Friday</option>
                              </select>
                            </div></P>
                           <div class="form-group">
                               <select class="form-control" name="dept[]" multiple>
                                  <option value="Mass Communication">Mass Communication</option>
                                  <option value="Language and Linguistic Science">Language and linguistic Sciences</option>
                                  <option value="Education Administration and Planning (EFA)">Education Administration and Planning (Education Foundation and Administration)</option>
                                  <option value="Elementary Education (EFA)">Elementary Education (Education Foundation and Administration)</option>
                                  <option value="Guidance and Counselling (EFA)">Guidance and Counselling (Education Foundation and Administration)</option>
                                  <option value="Business Education (CIT)">Business Education (Curriculum and Instructional Technology)</option>
                                  <option value="Biology Education (CIT)">Biology Education (Curriculum and Instructional Technology)</option>
                                  <option value="Chemistry Education (CIT)">Chemistry Education (Curriculum and Instructional Technology)</option>
                                  <option value="Mathematics Education (CIT)">Mathematics Education (Curriculum and Instructional Technology)</option>
                                  <option value="Physics Education (CIT)">Physics Education (Curriculum and Instructional Technology)</option>
                                  <option value="Technical Education (CIT)">Technical Education (Curriculum and Instructional Technology)</option>
                                  <option value="Electrical/Electronics Engineering">Electrical/Electronics Engineering</option>
                                  <option value="Civil Engineering">Civil Engineering</option>
                                  <option value="Mechanical Engineering">Mechanical Engineering</option>
                                  <option value="Wood Technology Engineering">Wood Technology Engineering</option>
                                  <option value="Computer Science">Computer Sciences</option>
                                  <option value="Biology (Biolgical Science)">Biology (Biological Sciences) </option>
                                  <option value="Microbiology (Biolgical Science)">Microbiology (Biological Sciences) </option>
                                  <option value="Physics">Physics</option>
                                  <option value="Chemistry (Chemical Science)">Chemistry (Chemical Sciences)</option>
                                  <option value="Biochemistry (Chemical Science)">Biochemistry(Chemical Sciences)</option>
                                  <option value="Mathematics/Statistics">Mathematics/Statistics</option> 
                                  <option value="Estate Management">Estate Management</option>
                                  <option value="Architecture">Architecture</option>
                                  <option value="Urban and Regional Planning">Urban and Regional Planning</option>
                                  <option value="Visual Art and Technology">Visual Art and Technology</option>
                               </select>
                           </div>
                           <input type="submit" class='btn btn-primary btn-sm active' name="done" value="done"/>
                        </form>
                        <p><i>In windows hold ctrl for multiple selection and in mac hold command for multiple selection</i></p>
                    </div>
                    <div class="row" id="viewallo" style="display: none">
                        <div class="row">GSS COURSES</div>
                        <?php ViewAllo()?>
                    </div>
                    <div> <img src="pictures/obi1.png" alt="" height="100px" width="100px"/></div>
                    <?php Newsec()?>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
