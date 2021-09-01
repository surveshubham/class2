<?php
 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database="class";
 
 $conn = mysqli_connect($servername,$username,$password,$database);
 
 if(!$conn){
     echo "connection falied";
 }else{
     echo "";
 }

?>