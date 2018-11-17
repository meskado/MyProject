<?php
session_start();
if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
    header("location:index.php");
}

function disdept(){
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $con = mysql_connect($host,$user,$pass);
    if(!$con){
       die('couldnt connect');
    }
    $us = $_SESSION['username'];
    $sql = "select Dept from timetableofficer where Username= '$us'";
    mysql_select_db('myproject');
    $query = mysql_query($sql,$con); 
    if(!$query){
       die('couldnt send query');
    }
    $row = mysql_fetch_array($query);
    echo $row['Dept'];
}
if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
}
function save(){
    if(isset($_POST["save"])){
        $us = $_SESSION['username'];
        $sqlc = "SELECT `Dept` FROM `timetableofficer` WHERE `Username`= '$us'";
        $rowc = mysql_fetch_array(mysql_query($sqlc));
        $dep = $rowc["Dept"];
        $dept = $_POST["dept"];
        $code = $_POST["code"];
        $title = $_POST["title"];
        $des = $_POST["des"];
        $num = $_POST["num"];
        $ctype = $_POST["ctype"];
        $level = $_POST["level"];
        $faculty = $_POST["Faculty"];
        $Chr = $_POST["Chr"];
        if(!(($code==""||$title==""||$num=="")||($ctype==""||$level=="")||($Chr==""||$faculty==""))){
            $host = 'localhost:3306';
            $user = 'root';
            $pass = '';
            $con = mysql_connect($host,$user,$pass);
            if($con == false){
                die('cant connect');
            }
            mysql_select_db("myproject");
             if($ctype=="GSS"||$ctype=="COMBINED"){
                  if($row = mysql_fetch_array(mysql_query("SHOW TABLES LIKE '$code'"))){
                    $rowd = mysql_fetch_array(mysql_query("SELECT * FROM `$code` WHERE `dept`='$dept'"));
                    if($rowd == Null){
                      $sql2 = "INSERT INTO `$code` (`dept`, `faculty`, `NoOfStudent`, `status`) VALUES ('$dept', '$faculty', '$num', '')";
                      $query2 = mysql_query($sql2);
                      if(!$query2){echo '<script type="text/javascript"> alert("Sorry the course has already been registered")</script>'; die();} 
                      echo 'Successfully saved';
                      echo '<script type="text/javascript"> alert("Successfully registered")</script>';
                    }
                    else{
                        echo 'The course has already been registered';
                    }
                  }
                  else{
                      $sql3 = "CREATE TABLE `myproject`.`$code` ( `SN` INT NOT NULL AUTO_INCREMENT , "
                              . "`dept` VARCHAR(30) NOT NULL , `faculty` VARCHAR(20) NOT NULL, "
                              . "`NoOfStudent` INT NOT NULL , `status` VARCHAR(3) NOT NULL , `venue` VARCHAR(30) NOT NULL, "
                              . "`time` VARCHAR(6) NOT NULL, `days` VARCHAR(20) NOT NULL, PRIMARY KEY (`SN`)) ENGINE = InnoDB;";
                      $query3 = mysql_query($sql3);
                      if(!$query3){ die("coudnt query3");}
                      $sql1 = "INSERT INTO `$code` (`dept`, `faculty`, `NoOfStudent`, `status`) VALUES ('$dept', '$faculty', '$num', '')";
                      $query1 = mysql_query($sql1);
                      if(!$query1){ echo '<script type="text/javascript"> alert("Sorry the course has already been registered")</script>'; die();}
                      $sql4 = "INSERT INTO `course` (`CourseCode`, `CourseTitle`, "
                      . "`CourseDes`, `NoOfStudents`, `CourseType`, `Level`, `CourseHr`) VALUES ('$code', '$title', "
                      . "'$des','$num','$ctype','$level','$Chr')";
                      mysql_select_db("myproject");
                      $query4 = mysql_query($sql4);
                      if(!$query4){echo '<script type="text/javascript"> alert("Sorry the course has already been registered")</script>'; die();}
                      echo 'Successfully saved';
                      echo '<script type="text/javascript"> alert("Successfully registered")</script>';
                  }
             }
             else{
                $sql5 = "INSERT INTO `course` (`CourseCode`, `CourseTitle`, "
                     . "`CourseDes`, `NoOfStudents`, `CourseType`, `Level`, `CourseHr`) VALUES ('$code', '$title', "
                      . "'$des','$num','$dept','$level','$Chr')";
                mysql_select_db("myproject");
                $query5 = mysql_query($sql5);
                if(!$query5){echo '<script type="text/javascript"> alert("Sorry the course has already been registered")</script>'; die();}
                echo 'Successfully saved';
                echo '<script type="text/javascript"> alert("Successfully registered")</script>';
             }
        }  
        else{
            echo 'Please fill all the spaces';
            echo '<script type="text/javascript"> alert("Please fill all the spaces")</script>';
        }
    }
}

function lecsave(){
    if(isset($_POST["lecsave"])){
        
        $build = $_POST["build"];
        $room = $_POST["room"];
        $cap = $_POST["capacity"];
        $roomtype = $_POST["roomtype"];
        if(!($build==Null && $room== Null && $cap == Null && $roomtype== Null)){
            $host = 'localhost:3306';
            $user = 'root';
            $pass = '';
            $con = mysql_connect($host,$user,$pass);
            if($con == false){
                die('cant connect');
            }
            if($roomtype=="dept"){
               $us = $_SESSION['username'];
               $sql = "select Dept from timetableofficer where Username= '$us'";
               mysql_select_db('myproject');
               $query = mysql_query($sql,$con); 
               if(!$query){
                die('couldnt send query');
               }
               $row = mysql_fetch_array($query);
               $roomtype = $row['Dept']." Room"; 
            }
            elseif ($roomtype == "fac") {
               $us = $_SESSION['username'];
               $sql = "select Faculty from timetableofficer where Username= '$us'";
               mysql_select_db('myproject');
               $query = mysql_query($sql,$con); 
               if(!$query){
                die('couldnt send query');
               }
               $row = mysql_fetch_array($query);
               $roomtype = $row['Faculty']." Room"; 
            }
            else{
               $roomtype = "General Room"; 
            }
            $sql = "INSERT INTO `lectureroom` (`building`, `room`, `capacity`, `RoomType`) VALUES ('$build', '$room', '$cap', '$roomtype')";
            mysql_select_db("myproject");
            $query = mysql_query($sql);
            if(!$query){
               echo 'The lecture venue has already been registered';
            }
            else{
               $sql1 = "CREATE TABLE `myproject`.`$room` ( `sn` INT NOT NULL , "
                       . "`days` VARCHAR(10) NOT NULL , `8-10` VARCHAR(100) NULL "
                       . "DEFAULT NULL , `10-12` VARCHAR(100) NULL DEFAULT NULL ,"
                       . " `12-2` VARCHAR(100) NULL DEFAULT NULL , `2-4` VARCHAR(100)"
                       . " NULL DEFAULT NULL , `4-6` VARCHAR(100) NULL DEFAULT NULL"
                       . " , PRIMARY KEY (`sn`), UNIQUE (`days`)) ENGINE = InnoDB;";
               $query1 = mysql_query($sql1);
               if(!$query1){
                   echo 'The lecture venue have already been registered';
               }
               else{
                   $sql2 = "INSERT INTO `$room` (`sn`, `days`, `8-10`, `10-12`,"
                           . " `12-2`, `2-4`, `4-6`) VALUES ('1', 'Monday', "
                           . "NULL, NULL, NULL, NULL, NULL), ('2', 'Tuesday',"
                           . " NULL, NULL, NULL, NULL, NULL), ('3', 'Wednesday',"
                           . " NULL, NULL, NULL, NULL, NULL), ('4', 'Thursday',"
                           . " NULL, NULL, NULL, NULL, NULL), ('5', 'Friday', "
                           . "NULL, NULL, NULL, NULL, NULL)";
                   $query2 = mysql_query($sql2);
                   if(!$query2){
                       echo 'couldnt insert into'.$room;
                   }
                   else{
                       echo 'Successfully saved'; 
                       echo '<script type="text/javascript"> alert("Successfully saved")</script>';
                   }
               }
               
            }
        }
        else{
            echo 'Please fill all spaces';
        }
    }
}
function chang(){
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
                $us = $_SESSION['username'];
                $sql="SELECT Password FROM timetableofficer where `Username`='$us'";
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
                        $sql1="UPDATE `timetableofficer` SET `Password`='$new' where `Username`='$us'";
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
function listcourse(){
     $host = 'localhost:3306';
     $user = 'root';
     $pass = '';
     $con = mysql_connect($host,$user,$pass);
     if($con == false){
          die('cant connect');
     }
     mysql_select_db("myproject");
     $us = $_SESSION['username'];
     $sqlc = "SELECT `Dept` FROM `timetableofficer` WHERE `Username`= '$us'";
     $rowc = mysql_fetch_array(mysql_query($sqlc));
     $dep = $rowc["Dept"];
     $sql= "SELECT `CourseCode`,`CourseHr` FROM `course` WHERE `CourseType` = '$dep' or `CourseType` = 'COMBINED'";
     $query = mysql_query($sql);
     if(!$query){
         echo "couldnt query the database";
     }
     else{
         while ($row = mysql_fetch_array($query)) {
             echo '<option value="'.$row['CourseCode'].'">'.$row['CourseCode'].' ('.$row['CourseHr'].' Credit hour)'.'</option>';  
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
     $us = $_SESSION['username'];
     $sqlc = "SELECT `Dept`, `faculty` FROM `timetableofficer` WHERE `Username`= '$us'";
     $rowc = mysql_fetch_array(mysql_query($sqlc));
     $dep = $rowc["Dept"]." Room";
     $fac = $rowc["Faculty"]." Room";
     $sql= "SELECT `room` FROM `lectureroom` WHERE (`RoomType` = 'General Room' or `RoomType` = '$dep') or `RoomType` = '$fac'";
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
function updatecos(){
          $host = 'localhost:3306';
          $user = 'root';
          $pass = '';
          $con = mysql_connect($host,$user,$pass);
          if($con == false){
             die('cant connect');
          }
          mysql_select_db("myproject");
          $sql = "SELECT `CourseCode` FROM `course` WHERE `CourseType` = 'COMBINED' or `CourseType` = 'GSS'";
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
function allocate(){
    updatecos();
    if(isset($_POST["done"])){
       $course=$_POST["course"];
       $venue = $_POST["venue"];
       $day1 = $_POST["day1"];
       $day2 = $_POST["day2"];
       $tim = $_POST["tim"];
       $dept = $_POST["dept"];
       $type = $_POST["type"];
       if(!($course==""||$venue==""||$tim==""||$day1==""||$dept==""||$type=="")){
 
       $host = 'localhost:3306';
       $user = 'root';
       $pass = '';
       $con = mysql_connect($host,$user,$pass);
       if($con == false){
           die('cant connect');
       }
       mysql_select_db("myproject");
       $querya = mysql_query("SELECT `status` FROM `admn`");
       $rowa = mysql_fetch_array($querya);
       if($rowa["status"]== NULL){
           echo '<script type="text/javascript">alert("Please you will to wait for the admin to allocate allocate courses for GSS courses you allocate")</script>'; 
           die();
       }
       $queryv = mysql_query("SELECT `$tim` FROM `$venue` WHERE `days` = '$day1' and `days` = '$day2'");
       while($rowv = mysql_fetch_array($queryv)){
         if($rowv["$tim"] != NULL){
            echo '<script type="text/javascript">alert("The space has been allocated to another course")</script>'; 
            die();  
         }
       }
       $sql = "SELECT `status` FROM `course` WHERE `CourseCode` = '$course'";
       $query = mysql_query($sql);
       $row = mysql_fetch_array($query);
       if($row["status"]!= NULL){
          echo '<script type="text/javascript">alert("This course has been registered")</script>'; 
          die(); 
       }
       if($type=="combined"){
       foreach($_POST["dept"] as $select){
           $query1 = mysql_query("SELECT `status` FROM ".$course." WHERE `dept` = '$select'");
           $row1 = mysql_fetch_array($query1);
           if($row1["status"] != NULL){
              echo '<script type="text/javascript">alert("The department has been allocated a venue")</script>';  
              die();
           }
       }
       $studentNo = 0;
       foreach($_POST["dept"] as $sel){
           $query2 = mysql_query("SELECT `NoOfStudent` FROM ".$course." WHERE `dept` = '$sel'");
           $row2 = mysql_fetch_array($query2);
           $studentNo += $row2["NoOfStudent"];
       }
       echo $studentNo;
       $query3 = mysql_query("SELECT `capacity` FROM `lectureroom` WHERE `room` = '$venue'");
       $row3 = mysql_fetch_array($query3);
       $roomcap = $row3["capacity"];
       if(!($studentNo+30<$roomcap||$studentNo>$roomcap)){
         $depts = "($course) ";
         foreach($_POST["dept"] as $sele){
            $days = $day1.",".$day2;
            $query4 = mysql_query("UPDATE `$course` SET `status` = 'yes', `venue` = '$venue', `time` = '$tim', `days` = '$days' WHERE `dept` = '$sele'");
            if(!$query4){ die("couldnt query4");}
            $depts = $sele.",".$depts;
         }
         $query5 = mysql_query("UPDATE `$venue` SET `$tim` = '$depts' WHERE `days` = '$day1'");
         $query6 = mysql_query("UPDATE `$venue` SET `$tim` = '$depts' WHERE `days` = '$day2'");
         if(!$query5||!$query6){die("couldnt query5");}
          echo '<script type="text/javascript">alert("You have successfully alocated the departments to the venue")</script>'; 
       }
       else{
           echo '<script type="text/javascript">alert("Sorry the total number of students is '
           . 'more than the capacity of the lecture room or the lecture room is too much for the students")</script>';
           die();
       }
      }
      else{
          $days = $day1.",".$day2;
          foreach ($dept as $de) {
              $query7 = mysql_query("SELECT `NoOfStudents` FROM `course` WHERE `CourseType` = '$de'");
              if(!$query7){ die("couldnt query7");}
          }
          $row7 = mysql_fetch_array($query7);
          $studentN = $row7["NoOfStudents"];
          $query3 = mysql_query("SELECT `capacity` FROM `lectureroom` WHERE `room` = '$venue'");
          $row3 = mysql_fetch_array($query3);
          $roomcap = $row3["capacity"];
          if(!($studentN+30<$roomcap||$studentN>$roomcap)){
            $dep = $de."(".$course.")";
            $query4 = mysql_query("UPDATE `course` SET `status` = 'yes', `room` = '$venue', `timeslot` = '$tim', `days` = '$days' WHERE `CourseCode` = '$course'");
            if(!$query4){ die("couldnt query4");}
            $query5 = mysql_query("UPDATE `$venue` SET `$tim` = '$dep' WHERE `days` = '$day1'");
            $query6 = mysql_query("UPDATE `$venue` SET `$tim` = '$dep' WHERE `days` = '$day2'");
            if(!$query5||!$query6){die("couldnt query5");}
            echo '<script type="text/javascript">alert("You have successfully alocated the departments to the venue")</script>'; 
       }
       else{
           echo '<script type="text/javascript">alert("Sorry the total number of students is '
           . 'more than the capacity of the lecture room or the lecture room is too much for the students")</script>';
           die();
       }
       }
       }
       else{
            echo '<script type="text/javascript">alert("Please fill all the spaces")</script>';
            
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
     $us = $_SESSION['username'];
     $sqld = "select Dept from timetableofficer where Username= '$us'";
     mysql_select_db('myproject');
     $queryd = mysql_query($sqld,$con); 
     if(!$queryd){
       die('couldnt send query');
     }
     $rowd = mysql_fetch_array($queryd);
     $de = $rowd['Dept'];
     $sql = "SELECT * FROM `course` WHERE `CourseType` = '$de' or (`CourseType` = 'COMBINED' or `CourseType` = 'GSS')"; 
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
             $query1 = mysql_query("SELECT * FROM `$cos` WHERE `dept` = '$de'");
             $row1 = mysql_fetch_array($query1);
             if($row1["dept"] != ""){
                echo '<tr>'
                     .'<td>'.$row["CourseCode"].'</td>'
                     .'<td>'.$row["CourseTitle"].'</td>'
                     .'<td>'.$row1["NoOfStudent"].'</td>'
                     .'<td>'.$row["CourseType"].'</td>'
                     .'<td>'.$row["CourseHr"].'</td>'
                     .'<td>'.$row["Level"].'</td>';
                echo '</tr';
                echo '<br />'; 
             }
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
function attest(){
  if(isset($_POST["don"])){
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $con = mysql_connect($host,$user,$pass);
    if(!$con){
       die('couldnt connect');
    }
    $us = $_SESSION['username'];
    $sql = "UPDATE `timetableofficer` SET `status` = 'yes' WHERE `Username` = '$us'";
    $query = mysql_query($sql);
    if(!$query){die("couldnt query");}
     echo '<script type="text/javascript">alert("You have successfully registered all courses")</script>'; 
  }
}

