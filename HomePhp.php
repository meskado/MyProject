<?php
session_start();
function admin(){
if(isset($_GET["Adminlog"])){
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $con = mysql_connect($host,$user,$pass);
    if(!$con){
       die('couldnt connect');
    }
    $sql = 'select * from admn';
    mysql_select_db('myproject');
    $query = mysql_query($sql,$con); 
    if(!$query){
       die('couldnt send query');
    }
    $use = $_GET["use"];
    $pas = $_GET["pas"];
    while($row = mysql_fetch_array($query)){
       if($use== $row["UserName"] && $pas==$row["Password"]){
           $_SESSION["use"]=$use; $_SESSION["pas"]=$pas;
           header("Location: Admin.php");
       }
    }
    echo 'Wrong password or username';
}
}
function timeofficer(){
if(isset($_POST["officer"])){
    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $con = mysql_connect($host,$user,$pass);
    if(!$con){
       die('couldnt connect');
    }
    $sql = 'select * from timetableofficer';
    mysql_select_db('myproject');
    $query = mysql_query($sql,$con); 
    if(!$query){
       die('couldnt send query');
    }
    $use = $_POST["user"];
    $pas = $_POST["password"];
    while($row = mysql_fetch_array($query)){
       if($use== $row["Username"] && $pas==$row["Password"]){
            $_SESSION['username']= $use;
            $_SESSION['password']=$pas;
            echo "<script type='text/javascript'>window.location='TimetableOfficer.php'</script>";
       }
     
    }
    echo 'Wrong password or username'; 
}
}
function displayTime(){
     $host = 'localhost:3306';
     $user = 'root';
     $pass = '';
     $con = mysql_connect($host,$user,$pass);
     if($con == false){
          die('cant connect');
     }
     $sql="SELECT `room` FROM `lectureroom`";
     mysql_select_db("myproject");
     $query = mysql_query($sql);
     if(!$query){
          die("couldnt query");
     }
     $query1 = mysql_query("SELECT `status` FROM `admn`");
     if(!$query1){ die("couldnt query1");}
     $row1 = mysql_fetch_array($query1);
     if($row1["status"] == ""){
         echo 'The lecture venues has not been allocated a course for the present semester'; 
     }
     else{
         while($row = mysql_fetch_array($query)){
             $room = $row["room"];
             echo '<table class="table table-bordered table-striped table-hover " style="margin: 10px">';
             echo '<thead>';
             echo '<tr>';
             echo '<th>days</th>';
             echo '<th>8-10</th>';
             echo '<th>10-12</th>';
             echo '<th>12-2</th>';
             echo '<th>2-4</th>';
             echo '<th>4-6</th>';
             echo '</tr>';
             echo '</thead>';
             echo '<thody>';
             echo $room;
             $query2 = mysql_query("SELECT * FROM `$room`");
             if(!$query2){ die("couldnt query2");}
             while ($row2 = mysql_fetch_array($query2)) {
                 echo '<tr>'
                       .'<td>'.$row2["days"].'</td>'
                       .'<td>'.$row2["8-10"].'</td>'
                       .'<td>'.$row2["10-12"].'</td>'
                       .'<td>'.$row2["12-2"].'</td>'
                       .'<td>'.$row2["2-4"].'</td>'
                       .'<td>'.$row2["4-6"].'</td>';
                  echo '</tr';
                  echo '<br />';
             }
            echo '</tbody>';
            echo '</table>';
         }
     }
}
