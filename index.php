<?php
include("db.php");
include("attendance.php");
$flag=0;
if(isset($_POST['submit']))
{

  foreach($_POST['employee_status'] as $id=>$status){
    $name = $_POST['employee_name'][$id];
    $email= $_POST['employee_email'][$id];
    $mobileno = $_POST['employee_mobileno'][$id];
    $date = date("Y-m-d H:i:s");

    $result = mysqli_query($con, "insert into employee_attendance(name,email,mobileno,status)values('$name','$email','$mobileno','$status')");
    if($result){
      $flag=1;
    }
  }

}
?>

<div class="panel panel-default">
  <div class="panel panel-heading">
<h2>
  <a class="btn btn-success" href="add.php">Add Employees </a>
  <a class="btn btn-info pull-right" href="view_all.php"> View All </a>
</h2>

<?php if($flag){ ?>
  <div class="alert alert-success">
  Attendance data inserted successfully
  </div>
<?php } ?>


<H3><div class="well text-center"> Date: <?php echo date("Y-m-d"); ?> </div></H3>
<div class="panel panel-body">


  <div class="panel panel-body">
    <form action="index.php" method="POST">
      <table class="table table-striped">
   <tr>
        <th> ID </th><th> Employee name </th><th> Email </th><th> Mobile No. </th><th> Status </th>
  </tr>
      <?php $result = mysqli_query($con,"select * from employee");

      $counter=0;
      $serial_number=0;
      while($row=mysqli_fetch_array($result))
      {
      $serial_number++;

        ?>
    <tr>
      <td><?php echo $serial_number; ?></td>
      <td><?php echo $row['name']; ?></td>
      <input type="hidden" value="<?php echo $row['name']; ?>" name="employee_name[]"></td>
      <td><?php echo $row['email']; ?>
      <input type="hidden" value="<?php echo $row['email']; ?>" name="employee_email[]"></td>
      <td><?php echo $row['mobileno'];?>
      <input type="hidden" value="<?php echo $row['mobileno'];?>" name="employee_mobileno[]"></td>
      <td>
      <input type="radio" name="employee_status[<?php echo $counter; ?>]"  value="Present"> Present
      <input type="radio" name="employee_status[<?php echo $counter; ?>]"  value="Absent"> Absent
      </td>
    </tr>
       <?php
       $counter++;
      }
      ?>
     </table>

     <input type="submit" name="submit" value="submit" class="btn btn-primary">




</div>
