<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>class crud</title>
</head>

<!-- internal style -->
<Style>

 .tabLLe{
  margin-top: 33px;
  text-align: center;
 }

 form.navbar-form.container.my-5 {
    border: 2px solid black;
    padding: 23px;
 }

 button.btn.btn-success {
    padding: 2px;
 }

 button.btn.btn-danger {
    padding: 2px;
 }
</style>

<body>


  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Class 10th A</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">


      </div>
    </div>
  </nav>







  <!-- php script for inserting data into database -->
<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connection.php';
    
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];

    $engm = $_POST['engm'];
    $hinm = $_POST['hinm'];
    $marm = $_POST['marm'];
     
    $totall = $engm+$hinm+$marm;
    $per = $totall/300 * 100;

    if($per>50){
      $result = "passed";
    }else{
      $result = "failed";
    }
    
    include 'connection.php';
    $sql2 = "SELECT * FROM `class` Where `rollno` = $rollno ";
    $result2 = mysqli_query($conn,$sql2);
    $row = mysqli_num_rows($result2);
     
    //SEARCHING FOR SAME ROLL NO OR INSERTING NEW 
    if($row>0){
      echo 'roll no exist';
    }else{
      $sql = "INSERT INTO `class`(`rollno`, `name`, `English`, `Hindi`, `Marathi`, `Totallmarks`, `percentage`,`result`) VALUES (' $rollno','$name','$engm','$hinm','$marm','$totall','$per','$result')";

         $result1 = mysqli_query($conn,$sql);
          if($result1){
            echo "";
            }else{
            echo "sry some error occured";
           }

           }
        }
?>






  <!-- form created here -->
<div class="forms">  
  <form class="navbar-form container my-5" Method="post" action="<?php $_SERVER['SERVER_NAME']; ?>">

    <h3>Insert Student info</h3>

    <div class="mb-3">
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name" 1
        name="name">
    </div>

    <div class="mb-3">
      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
        placeholder="rollno" 2 name="rollno">
    </div>

    <div class="row">

      <div class="col">
        <!-- Name input -->
        <div class="form-outline">
          <input type="number" id="form8Example3" class="form-control" name="engm" placeholder="out of 100"/>
          <label class="form-label" for="form8Example3">English</label>
        </div>
      </div>

      <div class="col">
        <!-- Name input -->
        <div class="form-outline">
          <input type="number" id="form8Example4" class="form-control" name="hinm" placeholder="out of 100"/>
          <label class="form-label" for="form8Example4">Hindi</label>
        </div>
      </div>

      <div class="col">
        <!-- Email input -->
        <div class="form-outline">
          <input type="number" id="form8Example5" class="form-control" name="marm" placeholder="out of 100"/>
          <label class="form-label" for="form8Example5">Marathi</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>





 <!-- table to display result -->
<div class="tabLLe container">
  <H3>RESULT</H3>
    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th scope="col">rollno</th>
          <th scope="col">name</th>
          <th scope="col">English</th>
          <th scope="col">Hindi</th>
          <th scope="col">Marathi</th>
          <th scope="col">Totall</th>
          <th scope="col">percentage</th>
          <th scope="col">result</th>
          <th scope="col">action</th>
        </tr>
      </thead>

 <?php
  include 'connection.php';
  $sql = "SELECT * FROM `class`";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);

  while($row = mysqli_fetch_assoc($result)){
  echo '
  <tbody>
  <tr>
   <th scope="row">'.$row['rollno'].'</th>
  <td>'.$row['name'].'</td>
  <td>'.$row['English'].'</td>
  <td>'.$row['Hindi'].'</td>
  <td>'.$row['Marathi'].'</td>
  <td>'.$row['Totallmarks'].'/300</td>
  <td>'.$row['percentage'].'%</td>
   <td>'.$row['result'].'</td>
   <td> <a href="http://localhost/shubham/classcrud/update.php?rollno='.$row['rollno'].'"> <button type="button" class="btn btn-success">update</button></a> 
   <a href="http://localhost/shubham/classcrud/delete.php?rollno='.$row['rollno'].'"><button type="button" class="btn btn-danger">Delete</button></a> </td>
  
  </tr>
  </tbody>
   ';
   }
 ?>


  </table>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>