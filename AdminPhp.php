<?php
session_start();
if (!(isset($_SESSION['use']) && isset($_SESSION['pas']))) {
    header("location:index.php");
}
function change(){
    if(isset($_POST["chang"])){
        $current = $_POST["current"];
        $new = $_POST["new"];
        $renew = $_POST["renew"];
        if($current==NULL&&$new==NULL&&$renew==NULL){
            echo 'Please you must fill the spaces';
        }
        else{
           if(!($new==$renew)){
                echo 'Your passwords are not matching';
            }
            else{
                $host = 'localhost:3306';
                $user = 'root';
                $pass = '';
                $con = mysql_connect($host,$user,$pass);
                if($con == false){
                    die('cant connect');
                }
                $us = $_SESSION['use'];
                $sql="SELECT `Password` FROM admn where `Username`='$us'";
                mysql_select_db("myproject");
                $query = mysql_query($sql);
                if(!$query){
                    echo 'couldnt query the database';
                }
                else{
                    $row = mysql_fetch_array($query);
                    $pas = $row['Password'];
                    if($current!=$pas){
                        echo 'Your current password is not correct';
                    }
                    else{
                        $sql1="UPDATE `admn` SET `Password`='$new' where `Username`='$us'";
                        $query1 = mysql_query($sql1);
                        if(!$query1){
                            echo 'couldnt update';
                        }
                        echo 'You have successfully changed your password';
                    }
                }
            }
        }
    }
}
function RegisterTime(){
    if(isset($_POST['reg'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $use = $_POST['user'];
        $dept = $_POST['dept'];
        $pas = $_POST['password'];
        $rpas = $_POST['rpassword'];
        if(($name==''||$phone==''||$mail=='')||($use==''||$dept==''||$pas=='')||$rpas==''){
            echo 'Please fill all the spaces';
        }
        else{
            if($pas!=$rpas){
                echo 'Your passwords are not matching';
            }
            else{
                $host = 'localhost:3306';
                $user = 'root';
                $pass = '';
                $con = mysql_connect($host,$user,$pass);
                if($con == false){
                    die('cant connect');
                }
                mysql_select_db("myproject");
                $quer = mysql_query("SELECT `Dept` FROM `timetableofficer` WHERE `Dept` = '$dept'");
                if(!$quer){ die("couldnt quer");}
                if($row = mysql_fetch_array($quer)){
                  echo '<script type="text/javascript">alert("You have already registered a timetable officer to this department")</script>'; 
                  die();
                }
                $sql="INSERT INTO `timetableofficer` (`Name`, `PhoneNumber`,"
                     . " `Mail`, `Username`, `Password`, `Dept`) VALUES "
                     . "('$name', '$phone', '$mail', '$use', '$pas', '$dept')";
               
                $query = mysql_query($sql);
                if(!$query){
                    echo 'couldnt query the database';
                }
                else{
                    echo 'You have successfully registered a timetable officer';
                }
            }
        }
    }
}
function ViewCourse(){
     $host = 'localhost:3306';
     $user = 'root';
     $pass = '';
     $con = mysql_connect($host,$user,$pass);
     if($con == false){
          die('cant connect');
     }
     $sql = "SELECT * FROM `course`"; 
     mysql_select_db("myproject");
     $query = mysql_query($sql);
     echo '<table class="table table-bordered table-striped table-hover ">';
     echo '<thead>';
     echo '<tr>';
     echo '<th>Course Code</th>';
     echo '<th>Course Title</th>';
     echo '<th>Number of Students</th>';
     echo '<th>Course Type</th>';
     echo '<th>Course Hour</th>';
     echo '<th>Level</th>';
     echo '</tr>';
     echo '</thead>';
     echo '<thody>';
     while ($row = mysql_fetch_array($query)) {
         if($row["CourseType"]== 'GSS' || $row["CourseType"] == 'COMBINED'){
             $cos = $row["CourseCode"];
             $query1 = mysql_query("SELECT SUM(NoOfStudent) FROM `$cos`");
             $row1 = mysql_fetch_array($query1);
                echo '<tr>'
                     .'<td>'.$row["CourseCode"].'</td>'
                     .'<td>'.$row["CourseTitle"].'</td>'
                     .'<td>'.$row1["SUM(NoOfStudent)"].'</td>'
                     .'<td>'.$row["CourseType"].'</td>'
                     .'<td>'.$row["CourseHr"].'</td>'
                     .'<td>'.$row["Level"].'</td>';
                echo '</tr';
                echo '<br />'; 
         }
         else{
         echo '<tr>'
              .'<td>'.$row["CourseCode"].'</td>'
              .'<td>'.$row["CourseTitle"].'</td>'
              .'<td>'.$row["NoOfStudents"].'</td>'
              .'<td>'.$row["CourseType"].'</td>'
              .'<td>'.$row["CourseHr"].'</td>'
              .'<td>'.$row["Level"].'</td>';
         echo '</tr';
         echo '<br />';
         }
     }
     echo '</tbody>';
     echo '</table>';
}
function ViewVenue(){
     $host = 'localhost:3306';
     $user = 'root';
     $pass = '';
     $con = mysql_connect($host,$user,$pass);
     if($con == false){
          die('cant connect');
     }
     $sql = "SELECT * FROM `lectureroom`"; 
     mysql_select_db("myproject");
     $query = mysql_query($sql);
     echo '<table class="table table-bordered table-striped table-hover ">';
     echo '<thead>';
     echo '<tr>';
     echo '<th>Building</th>';
     echo '<th>Lecture room</th>';
     echo '<th>Capacity</th>';
     echo '</tr>';
     echo '</thead>';
     echo '<thody>';
     while ($row = mysql_fetch_array($query)) {
         echo '<tr>'
              .'<td>'.$row["building"].'</td>'
              .'<td>'.$row["room"].'</td>'
              .'<td>'.$row["capacity"].'</td>';
         echo '</tr';
         echo '<br />';
     }
     echo '</tbody>';
     echo '</table>';
}
if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
}
function listcourse(){
     $host = 'localhost:3306';
     $user = 'root';
     $pass = '';
     $con = mysql_connect($host,$user,$pass);
     if($con == false){
          die('cant connect');
     }
     $sql= "SELECT `CourseCode`,`CourseHr` FROM `course` WHERE `CourseType` = 'GSS'";
     mysql_select_db("myproject");
     $query = mysql_query($sql);
     if(!$query){
         echo "couldnt query the database";
     }
     else{
         while ($row = mysql_fetch_array($query)) {
             echo '<option value="'.$row['CourseCode'].'">'.$row['CourseCode'].' ('.$row[CourseHr].' Credit hour)'.'</option>';  
         }
     }
}
function listv(){
     $host = 'localhost:3306';
     $user = 'root';
     $pass = '';
     $con = mysql_connect($host,$user,$pass);
     if($con == false){
          die('cant connect');
     }
     $sql= "SELECT `room` FROM `lectureroom` WHERE `RoomType` = 'General Room'";
     mysql_select_db("myproject");
     $query = mysql_query($sql);
     if(!$query){
         echo "couldnt query the database";
     }
     else{
         while ($row = mysql_fetch_array($query)) {
             echo '<option value="'.$row['room'].'">'.$row['room'].'</option>';  
         }
     }
}

function alloc(){
  if(isset($_POST["done"])){
      $host = 'localhost:3306';
      $user = 'root';
      $pass = '';
      $con = mysql_connect($host,$user,$pass);
      if($con == false){
          die('cant connect');
      } 
      $sql="SELECT `status` FROM `course`";
      mysql_select_db("myproject");
      $query = mysql_query($sql);
      if(!$query){
          die("couldnt query");
      }
      while ($row = mysql_fetch_array($query)) {
          if($row['status']==""){
             echo '<script type="text/javascript">alert("You have not allocated venue for all courses")</script>';
              die();
          }
      }
       echo '<script type="text/javascript">alert("You have succesfully allocated venue for all courses")</script>';
    }  
}
function ViewAllo(){
     $host = 'localhost:3306';
     $user = 'root';
     $pass = '';
     $con = mysql_connect($host,$user,$pass);
     if($con == false){
          die('cant connect');
     }
     $sql="SELECT * FROM `course`";
     mysql_select_db("myproject");
     $query = mysql_query($sql);
     if(!$query){
          die("couldnt query");
     }
     while ($row = mysql_fetch_array($query)) {
          if($row['status']==""){
             echo 'You have not allocated venue for all courses';
             die();
          }
     }
     $queryg = mysql_query("SELECT * FROM `course` WHERE `CourseType` = 'GSS'");
     if(!$queryg){ die("couldnt queryg");}
     while($rowg = mysql_fetch_array($queryg)){
         
             echo '<div style="margin: 10px"><b>'.$rowg["CourseCode"].' ('.$rowg["CourseHr"].'Credit hour)</b></div>';
             $query1 = mysql_query("SELECT * FROM `".$rowg["CourseCode"]."`");
             if(!$query1){ die("couldnt qery1");}
             echo '<table class="table table-bordered table-striped table-hover " style="margin: 10px">';
             echo '<thead>';
             echo '<tr>';
             echo '<th>Department</th>';
             echo '<th>No of Students</th>';
             echo '<th>Lecture room</th>';
             echo '<th>Time</th>';
             echo '<th>Days of lecture</th>';
             echo '</tr>';
             echo '</thead>';
             echo '<thody>';
             while($row1 = mysql_fetch_array($query1)){
                  echo '<tr>'
                       .'<td>'.$row1["dept"].'</td>'
                       .'<td>'.$row1["NoOfStudent"].'</td>'
                       .'<td>'.$row1["venue"].'</td>'
                       .'<td>'.$row1["time"].'</td>'
                       .'<td>'.$row1["days"].'</td>';
                  echo '</tr';
                  echo '<br />';
             }
            echo '</tbody>';
            echo '</table>';
         
     }
     echo '<div style="margin: 10px"><b><center>COMBINED COURSES</center></b></div>';
     $queryc = mysql_query("SELECT * FROM `course` WHERE `CourseType` = 'COMBINED'");
     while($rowc = mysql_fetch_array($queryc)){
             echo '<div style="margin: 10px"><b>'.$rowc["CourseCode"].' ('.$rowc["CourseHr"].'Credit hour)</b></div>';
             $query2 = mysql_query("SELECT * FROM `".$rowc["CourseCode"]."`");
             if(!$query2){ die("couldnt query1");}
             echo '<table class="table table-bordered table-striped table-hover " style="margin: 10px">';
             echo '<thead>';
             echo '<tr>';
             echo '<th>Department</th>';
             echo '<th>No of Students</th>';
             echo '<th>Lecture room</th>';
             echo '<th>Time</th>';
             echo '<th>Days of lecture</th>';
             echo '</tr>';
             echo '</thead>';
             echo '<thody>';
             while($row2 = mysql_fetch_array($query2)){
                  echo '<tr>'
                       .'<td>'.$row2["dept"].'</td>'
                       .'<td>'.$row2["NoOfStudent"].'</td>'
                       .'<td>'.$row2["venue"].'</td>'
                       .'<td>'.$row2["time"].'</td>'
                       .'<td>'.$row2["days"].'</td>';
                  echo '</tr';
                  echo '<br />';
             }
            echo '</tbody>';
            echo '</table>';
     }
     echo '<div style="margin: 10px"><b><center>Other Courses</center></b></div>';
     $sql3 = "SELECT * FROM `course` WHERE `CourseType` != 'GSS' and `CourseType` != 'COMBINED'"; 
     $query3 = mysql_query($sql3);
     echo '<table class="table table-bordered table-striped table-hover " style="margin: 10px">';
     echo '<thead>';
     echo '<tr>';
     echo '<th>Course Code</th>';
     echo '<th>Course Hour</th>';
     echo '<th>Lecture room</th>';
     echo '<th>Department</th>';
     echo '<th>Days of lecture</th>';
     echo '<th>Time</th>';
     echo '</tr>';
     echo '</thead>';
     echo '<thody>';
     while ($row = mysql_fetch_array($query3)) {
         echo '<tr>'
              .'<td>'.$row["CourseCode"].'</td>'
              .'<td>'.$row["CourseHr"].'</td>'
              .'<td>'.$row["room"].'</td>'
              .'<td>'.$row["CourseType"].'</td>'
              .'<td>'.$row["Days"].'</td>'
              .'<td>'.$row["timeslot"].'</td>';
         echo '</tr';
         echo '<br />';
     }
     echo '</tbody>';
     echo '</table>';
}
function updatecos(){
          $host = 'localhost:3306';
          $user = 'root';
          $pass = '';
          $con = mysql_connect($host,$user,$pass);
          if($con == false){
             die('cant connect');
          }
          mysql_select_db("myproject");
          $sql = "SELECT `CourseCode` FROM `course` WHERE `CourseType` = 'GSS'";
          $query = mysql_query($sql);
          if(!$query){ die("couldnt query");}
          
          while ($row = mysql_fetch_array($query)) {
              $cos = $row["CourseCode"];
              $queryd = mysql_query("SELECT `status` FROM ".$cos);
              $i=0; $j = 0;
              while($rowd = mysql_fetch_array($queryd)){
                  if($rowd["status"] != NULL){
                      $i++;
                  }
                 $j++; 
              }
               if($i==$j){
               $queryw = mysql_query("UPDATE `course` SET `status` = 'yes' WHERE `CourseCode` = '$cos'");
               if(!$queryw){ echo 'couldnt queryw';};
               }
          }
}
function savecos(){
    updatecos();
    if(isset($_POST["done"])){
       $course=$_POST["cos"];
       $venue = $_POST["ven"];
       $day = $_POST["day"];
       $tim = $_POST["tim"];
       $dept = $_POST["dept"];
       if(!($course==""||$venue==""||$tim==""||$day==""||$dept=="")){
          $host = 'localhost:3306';
          $user = 'root';
          $pass = '';
          $con = mysql_connect($host,$user,$pass);
          if($con == false){
              die('cant connect');
          }
          mysql_select_db("myproject");
          $queryl = mysql_query("SELECT `status` FROM `timetableofficer`");
          while ($rowl = mysql_fetch_array($queryl)){
             if($rowl["status"]== NULL){
                echo '<script type="text/javascript">alert("Sorry you cannot allocate courses where the timetable officers have not registered courses")</script>';
                die();
             }
          }
          $queryv = mysql_query("SELECT `$tim` FROM `$venue` WHERE `days` = '$day'");
          $rowv = mysql_fetch_array($queryv);
          if($rowv["$tim"] != NULL){
             echo '<script type="text/javascript">alert("The space has been allocated to another course")</script>'; 
             die();  
          }
          $sql = "SELECT `status` FROM `course` WHERE `CourseCode` = '$course'";
          $query = mysql_query($sql);
          $row = mysql_fetch_array($query);
          if($row["status"]!= NULL){
            echo '<script type="text/javascript">alert("This course has been registered")</script>'; 
            die(); 
          }
          foreach($_POST["dept"] as $select){
             $query1 = mysql_query("SELECT `status` FROM ".$course." WHERE `dept` = '$select'");
             $row1 = mysql_fetch_array($query1);
             if($row1["status"] != NULL){
                echo '<script type="text/javascript">alert("The department has been allocated a venue")</script>';  
                die();
             }
          }
          $studentNo =0;;
          foreach($_POST["dept"] as $sel){
              $query2 = mysql_query("SELECT `NoOfStudent` FROM ".$course." WHERE `dept` = '$sel'");
              $row2 = mysql_fetch_array($query2);
              $studentNo = $studentNo + $row2["NoOfStudent"];
          }
          echo $studentNo;
          $query3 = mysql_query("SELECT `capacity` FROM `lectureroom` WHERE `room` = '$venue'");
          $row3 = mysql_fetch_array($query3);
          $roomcap = $row3["capacity"];
          if(!($studentNo+30<$roomcap||$studentNo>$roomcap)){
            $depts = "($course) ";
            foreach($_POST["dept"] as $sele){
               $query4 = mysql_query("UPDATE `$course` SET `status` = 'yes', `venue` = '$venue', `time` = '$tim', `days` = '$day' WHERE `dept` = '$sele'");
               if(!$query4){ die("couldnt query4");}
               $depts = $sele.",".$depts;
            }
            $query5 = mysql_query("UPDATE `$venue` SET `$tim` = '$depts' WHERE `days` = '$day'");
            if(!$query5){die("couldnt query5");}
            echo '<script type="text/javascript">alert("You have successfully alocated the departments to the venue")</script>'; 
          }
          else{
             echo '<script type="text/javascript">alert("Sorry the total number of students is '
             . 'more than the capacity of the lecture room or the lecture room is too much for the students")</script>';
             die();
          }
       }
       else{
           echo '<script type="text/javascript">alert("Please fill all the spaces")</script>';
       }
    }
}
function Newsec(){
    if(isset($_POST["create"])){
       $sec = $_POST["section"];
       $sesc = $_POST["semester"];
       $host = 'localhost:3306';
       $user = 'root';
       $pass = '';
       $con = mysql_connect($host,$user,$pass);
       if(!$con){
        die('couldnt connect');
       }
       mysql_select_db("myproject");
       $queryc = mysql_query("SELECT * FROM `course`");
       $rowc = mysql_fetch_array($queryc);
       if(!($sec== NULL || $sesc==NULL)){
       if($rowc == NULL){
          $query3 = mysql_query("UPDATE `admn` SET `session` = '$sec', `semester` = '$sesc'");
          if(!$query3){ die("couldnt query3");}
          $query4 = mysql_query("UPDATE `timetableofficer` SET `status` = ''");
          if(!$query4){ die("couldnt update");}
          echo '<script type="text/javascript">alert("You have successfully created a session")</script>'; 
       }
       else{
         $query = mysql_query("SELECT * FROM `course`");
         while ($row = mysql_fetch_array($query)) {
            $cos = $row["CourseCode"];
            if($row["CourseType"]== 'GSS' || $row["CourseType"]=='COMBINED'){
                echo $cos;
                $query1 = mysql_query("DROP TABLE $cos");
                if(!$query1){ die("couldnt query1");}
            }
            $query2 = mysql_query( "DELETE FROM `course` WHERE `course`.`CourseCode` = '$cos'");
            if(!$query2){ die("couldnt query2");}
         }
         $query3 = mysql_query("UPDATE `admn` SET `session` = '$sec', `semester` = '$sesc'");
         if(!$query3){ die("couldnt query3");}
         $query5 = mysql_query("UPDATE `timetableofficer` SET `status` = ''");
         if(!$query5){ die("couldnt update");}
         echo '<script type="text/javascript">alert("You have successfully created a session")</script>'; 
        }
       }
       else{
            echo '<script type="text/javascript">alert("Please fill all the spaces")</script>'; 
       }
    }
}
function atest(){
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $con = mysql_connect($host,$user,$pass);
    if(!$con){
       die('couldnt connect');
    }
    mysql_select_db("myproject");
    $sql = "SELECT `status` FROM `course` WHERE `CourseType`= 'GSS'";
    $query = mysql_query($sql);
    if(!$query){die("couldnt query");}
    $i=0; $j=0;
    while($row = mysql_fetch_array($query)){
      if($row["status"] != NULL){
         $i++;
      }
      $j++; 
    }
    if($i == $j){
        $query1 = mysql_query("UPDATE `admn` SET `status` = 'yes'");
    }
}


