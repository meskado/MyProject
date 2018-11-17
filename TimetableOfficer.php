<?php
 include 'TimetablePhp.php';
 
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
            <div class="row" >
                <div class="col-lg-3 col-md-3" style="border: 1px solid red; background-color: #17a2b8">
                    <p> <button type="button" class='btn btn-primary btn-sm active' id="change">Change password</button></p>
                    <p> <button type="button" class='btn btn-primary btn-sm active' id="reg">Register Courses and Lecture venues</button></p>
                    <p> <button type="button" class='btn btn-primary btn-sm active' id="allo">Allocate lecture venue</button></p>
                    <p> <button type="button" class='btn btn-primary btn-sm active' id="viewlec">View lecture venues</button></p>
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
                    <div><?php chang()?></div>
                </div>
                <div class="col-lg-9 col-md-9" style="border: 1px solid black; background-color: #ffffff">
                    
                    Welcome <?php echo $_SESSION['username'];?><br />
                    Faculty of sciences <br />
                    Department of <?php disdept()?>
                    <div><center><img src="pictures/crutech.png" height="110px" width="110px"</center></div>
                    <div>
                        <p>
                            <b>NOTE</b>
                        </p>
                        <p>
                            When registering for a course you have to specify the type of the the course to be registered; the following below 
                           are types of courses offered in faculty of sciences
                        </p>
                        <p>
                        <ul>
                            <li>GSS Courses- these are courses offered by the whole departments in CRUTECH when registering for
                                GSS courses register the course with the exact number of students offering the course in your department.
                            </li>
                            <li>
                                Combined Course- These are courses offered by some departments in CRUTECH but not all, same thing to GSS should be applied here
                            </li>
                            <li>
                                Departmental Courses- These are courses offered by a specific department. So the Timetable officer aught to 
                                register the course with the exact number of students offering the course
                            </li>
                        </ul>
                         </p><br />
                    </div>
                    <div class="row" id="register" style="display: none"> 
                        <div class="col-lg-6 col-md-6">
                            <p>Register courses below</p>
                            <form role="form" action="<?php $_PHP_SELF?>" method="POST">
                                <div class="form-group" >
                                    <input type="text" placeholder="Enter Course Code" class="form-control" name="code" style="width:50%; background-color: #abdde5"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Course Tittle " class="form-control" name="title" style="width:50%;  background-color: #abdde5"/>
                                 </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Course description" class="form-control" name="des" style="width:50%;  background-color: #abdde5"/>
                                 </div>
                                <div class="form-group">
                                    <input type="number" placeholder="Number of students" class="form-control" name="num" style="width:50%;  background-color: #abdde5"/>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" style="width: 50%; background-color:#abdde5 " name="ctype">
                                        <option value="" selected="">Select course type</option>
                                        <option value="GSS">GSS COURSE</option>
                                        <option value="COMBINED">COMBINED COURSE</option>
                                        <option value="DEPT">DEPARTMENTAL COURSE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" style="width: 50%; background-color:#abdde5 " name="level">
                                        <option value="" selected="">Select Level</option>
                                        <option value="Year1">Year 1</option>
                                        <option value="Year2">Year 2</option>
                                        <option value="Year3">Year 3</option>
                                        <option value="Year4">Year 4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" style="width: 50%; background-color:#abdde5 " name="dept">
                                       <option value="" selected="">Select department/Unit</option>
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
                                <div class="form-group">
                                    <select class="form-control" style="width: 50%; background-color:#abdde5 " name="Faculty">
                                        <option value="" selected="">Select Faculty</option>
                                        <option value="Communication Technology">Communication Technology</option>
                                        <option value="Education">Education</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Environmental">Environmental Sciences</option>
                                        <option value="sciences">Sciences</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="Number" placeholder="Course hour" class="form-control" name="Chr" style="width:50%;  background-color: #abdde5"/>
                                </div>
                                <div class='form-group'>
                                   <input type="submit" class='btn btn-primary btn-sm active' name="save" value="save"/>
                                </div>
                            </form>
                            <div><?php save()?></div>
                            <div class="row" style="margin: 10px">
                                  <?php attest()?>
                                    <p><i>Please click on the button below if you are done registering courses</i>
                                    <form role="form" action="<?php $_PHP_SELF?>" method="POST">
                                        <input type="submit" class='btn btn-primary btn-sm active' name="don" value="DONE"/>
                                    </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <p>Register Venues below</p>
                            <form role="form" action="<?php $_PHP_SELF?>" method="POST">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Building Name" class="form-control" name="build" style="width:50%;  background-color: #abdde5"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter lecture room" class="form-control" name="room" style="width:50%;  background-color: #abdde5"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Capacity" class="form-control" name="capacity" style="width:50%;  background-color: #abdde5"/> 
                                </div>
                                <div class="form-group">
                                    <select class="form-control" style="width: 50%; background-color:#abdde5 " name="roomtype">
                                        <option value="" selected="">Select Room Type</option>
                                        <option value="dept">Departmental Assigned Room</option>
                                        <option value="fac">Faculty Assigned Room</option>
                                        <option value="gen">General Room</option>
                                    </select>
                                </div>
                                <div class='form-group'>
                                   <input type="submit" class='btn btn-primary btn-sm active' name="lecsave" value="save"/>
                                </div>
                            </form>
                             <div><?php lecsave()?></div>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px; display: none" id="alloca">
                        <?php allocate()?>
                        <form role="form" action="<?php $_PHP_SELF?>" method="POST">
                            <div style="margin:10px"><b>Allocate Lecture Venue</b></div>
                            <div class="form group">
                               <select class="form-control" name="course">
                                    <option value="" selected="">Course Code</option>
                                    <?php listcourse()?>
                               </select>
                            </div>
                            <p><div class="form group">
                               <select class="form-control" name="type">
                                    <option value="" selected="">Course Type</option>
                                    <option value="dept" >Departmental Course</option>
                                    <option value="combined">Combined Course</option>
                               </select>
                            </div></p>
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
                              <select class="form-control" name="venue">
                                  <option value="" selected="">lecture venue</option>
                                  <?php listv()?>
                              </select>
                           </div>
                            <p><div class="form-group">
                              <select class="form-control" name="day1">
                                 <option value="" selected>Select Day 1 (compulsory)</option>
                                 <option value="Monday">Monday</option>
                                 <option value="Tuesday">Tuesday</option>
                                 <option value="Wednesday">Wednesday</option>
                                 <option value="Thursday">Thursday</option>
                                 <option value="Friday">Friday</option>
                              </select>
                            </div></P>
                            <p><div class="form-group">
                              <select class="form-control" name="day2">
                                 <option value="" selected>Select Day 2(optional if course hour is less than 3)</option>
                                 <option value="Monday">Monday</option>
                                 <option value="Tuesday">Tuesday</option>
                                 <option value="Wednesday">Wednesday</option>
                                 <option value="Thursday">Thursday</option>
                                 <option value="Friday">Friday</option>
                              </select>
                            </div></P>
                             <div class="form-group">
                               <select class="form-control" name="dept[]" multiple>
                                  <option value="" selected="">Please select the departments that will be allocated to this venue</option>
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
                        <p><i>In windows hold ctrl for multiple selection and in mac hold command for multiple selection</i></p>
                        </form>
                    </div>
                    <div class="row"  id="view" style="margin: 10px; display: none">
                       <div style="margin:10px"><b>Course Information</b></div>
                       <?php ViewCourse()?>
                    </div>
                    <div class="row" id="venue" style="margin: 10px; display: none;">
                        <div style="margin:10px"><b>Lecture venue information</b></div>
                        <?php ViewVenue()?>
                    </div>
                    <div class="row" style="display: none">
                        <?php attest()?>
                        
                    </div>
                    <div> <img src="pictures/obi1.png" alt="" height="100px" width="100px"/></div>
                     
                </div>
                 
                  
           
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
