<?php
error_reporting(E_ERROR | E_PARSE);
$conn=new mysqli('localhost','root','saran','pet_booking');
if($conn->connect_error){
  die('Connection failed: '.$conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body><form action="final.php" method="post" name="form11">
      <?php $name=$_GET['Name'] ?>
<div class="bdetails">
  <div class="bdet">
    <tr>
      Name :
    </tr>
    <input type="text" name="Name" value=<?php echo $name; ?> readonly>
  </div>
    <?php
     $result = mysqli_query($conn, "SELECT * FROM dog_details WHERE Name=$name");
     $row = mysqli_fetch_assoc($result);
    ?>

      <div class="bdet">
        <tr>
          Availability :
        </tr>
        <input type="text" name="In_Stock" value=<?php echo $row['In_Stock']; ?> readonly>


  </div>
  <div class="bdet">
    <tr>
      Cost :
    </tr>
<input type="text" name="Cost" value=<?php echo $row['Cost']; ?> readonly>
  </div>
  <div class="textbox">

    <input type="text" placeholder="Email" name="Email" value="">
  </div>
  <div class="textbox">
    <input type="number" placeholder="Count" name="Count" value="">
  </div>


    <input class="btn" type="submit" name="book" value="Add">

</div>

  <?php
  $name=$_POST['Name'];
  $add1=$_POST['Cost'];
  $email=$_POST['Email'];
  $count=$_POST['Count'];
  $updat=$row['In_Stock']-$count;
  $amt=$row['Cost']*$count;
  if(isset($_POST['book'])){
  $result1 = mysqli_query($conn, "insert into booking_details(Email,Name,Count,Cost) values('$email','$name','$count','$amt')");
  $row1 = mysqli_fetch_assoc($result1);

    echo'<script>
            alert("Booked successfully!!");
            window.open("profile.html", "_self");
        </script>';
      }

  ?>


  </body>
</html>
