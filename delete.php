<?php

 $rollno = $_GET['rollno'];
 
 include 'connection.php';
 $sql = "DELETE FROM `class` WHERE `rollno` = $rollno";
 $result = mysqli_query($conn,$sql);

 if($result){
     echo "deleted succssfully";
     header("location:http://localhost/shubham/classcrud/index.php?#");
 }

?>