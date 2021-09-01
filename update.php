<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Update marks</title>
  </head>

<style>
    .forms{
    margin-top: 200px;
      }

</style>
 
<body>

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


 <?php 
     if($_SERVER['REQUEST_METHOD'] == 'POST'){

        include 'connection.php'; 
        $engm = $_POST['engm'];
        $hinm = $_POST['hinm'];
        $marm = $_POST['marm'];
        $rollno = $_GET['rollno'];
       

        $totall = $engm+$hinm+$marm;
        $per = $totall/300 * 100;

        if($per>50){
        $result = "passed";
        }else{
        $result = "failed";
        }

        $sql = "UPDATE `class` SET  `English` = '$engm',`Hindi` = '$hinm' , `Marathi` = '$marm' , `Totallmarks` = '$totall', `percentage` = '$per',`result` = '$result'
        WHERE `rollno` = $rollno";
        $result1 = mysqli_query($conn,$sql);


        if($result1){
            echo "updated succssfully";
            header("location:http://localhost/shubham/classcrud/index.php?#");
        }
        

     }
 ?>


  <div class="forms">  
   <form class="navbar-form container my-5" Method="post" action="<?php $_SERVER['SERVER_NAME']; ?>">

    <h3>update marks</h3>

    <div class="row">

      <div class="col">
        <!-- Name input -->
        <div class="form-outline">
          <input type="number" id="form8Example3" class="form-control" name="engm" placeholder="out of 100" />
          <label class="form-label" for="form8Example3">English</label>
        </div>
      </div>

      <div class="col">
        <!-- Name input -->
        <div class="form-outline">
          <input type="number" id="form8Example4" class="form-control" name="hinm"  placeholder="out of 100" />
          <label class="form-label" for="form8Example4">Hindi</label>
        </div>
      </div>

      <div class="col">
        <!-- Email input -->
        <div class="form-outline">
          <input type="number" id="form8Example5" class="form-control" name="marm"   placeholder="out of 100"/>
          <label class="form-label" for="form8Example5">Marathi</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>


</html>
