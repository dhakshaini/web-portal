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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="file:///C:/Users/HP/Documents/App%20lab/demo/fontawesome-free-5.10.2-web/css/all.css">

      <link rel="stylesheet" href="style2.css">
  </head>
  <body>
    <form action="demo.php" method="post" name="form11">

    <div class="details">
      <p style="color.pink">
        <div class="textbox">
      <select name='Name'>
<option value="0">---select dog--</option>
<option value="German_Sepherd">GERMAN SEPHERD</option>
<option value="Pug">PUG</option>
<option value="Beagle">BEAGLE</option>
<option value="Labrador">LARADOR</option>
</select></p>
    </div>
    <div class="textbox">

      <input type="text" placeholder="Email" name="Email" value="">
    </div>
    <div class="textbox">
      <input type="number" placeholder="Count" name="Count" value="">
    </div>
<br><input class="btn" type="submit" name="booking" value="BOOKING"><br>
  </div>
</form>
      <?php
      $name=$_POST['Name'];
      $email=$_POST['Email'];
      $count=$_POST['Count'];
  if(isset($_POST['booking'])){
    if(empty($name)||empty($email)||empty($count)){
      echo '<script>
      alert("Enter Valid Details");
      window.open("demo.php","_self")
        </script>';
    }else{
    $temp=mysqli_query($conn,"Select * from dog_details where Name='$name'");
    $row2 = mysqli_fetch_assoc($temp);
  $cost=$row2['Cost']*$count;
  $avail=$row2['In_Stock']-$count;


      $result1 = mysqli_query($conn, "insert into booking_details(Email,Name,Count,Cost) values('$email','$name','$count','$cost')");
      $row1 = mysqli_fetch_assoc($result1);
$result=mysqli_query($conn,"update dog_details set In_Stock=$avail where Name='$name'");

      echo'<script>
                alert("Booked successfully!!");
                window.open("profile.html", "_self");
            </script>';
          }
}
      ?>

      </body>
    </html>                                        
