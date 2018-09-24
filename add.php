
<?php

include("attendance.php");
include("db.php");
$flag=0;


  if(isset($_POST['submit']))
{
      $result=mysqli_query($con,"insert into employee(name,email,mobileno)values('$_POST[name]','$_POST[email]','$_POST[mobileno]')");
      if($result){
      $flag=1;
    }
}

?>

<div class="panel panel-default">
  <?php if($flag){ ?>
  <div class="alert alert-success">
    <strong>!success </strong>attendance data successfully inserted;
  </div>
<?php } ?>
  <div class="panel-heading">
  <h2>
    <a class="btn btn-success" href="add.php"> Add Employee </a>
    <a class="btn btn-info pull-right" href="index.php"> Back </a>
  </h2>
  </div>

<div class="panel-body">
     <form action="add.php" method="post">

          <div class="form-group">
          <label for="name">Employee Name</label>
          <input type="text" name="name" id="id" class="form-control" required>
          </div>

          <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" name="email" id="id" class="form-control" required>
          </div>

          <div class="form-group">
          <label for="mobileno">Mobile No.</label>
          <input type="text" name="mobileno" id="id" class="form-control" required>
          </div>


          <div class="form-group">
          <input type="submit" name="submit" value="submit" class="btn btn-primary" required>
          </div>

  </div>
