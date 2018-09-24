<?php
 include("dp2.php");
 include("attendance.php");

 ?>
 <div class="panel panel-default">
   <div class="panel panel-heading">
 <h2>
   <a class="btn btn-success" href="add.php">Add Employees </a>
   <a class="btn btn-info pull-right" href="index.php"> Back </a>
 </h2>

 <H3><div class="well text-center"> Date: <?php echo date("Y-m-d"); ?> </div></H3>
 <div class="panel panel-body">


   <div class="panel panel-body">
     <form action="index.php" method="POST">
       <table class="table table-striped">
    <tr>
         <th>ID</th><th>Dates</th>
   </tr>
       <?php $result = mysqli_query($con,"select * from employee_attendance");
       $id=0;
       while($row=mysqli_fetch_array($result))
       {
       $id++;
        ?>
     <tr>
       <td><?php echo $id; ?></td>
       <td><?php echo $row['date']; ?></td>
     </tr>
        <?php
       }
       ?>
      </table>

      <input type="submit" name="submit" value="submit" class="btn btn-primary">




 </div>
