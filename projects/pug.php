<?php
error_reporting(E_ERROR | E_PARSE);
$con = mysqli_connect("localhost","root","saran","pet_booking");
 if($con->connect_error){
   die("connection failed:".$conn->connection_error);
   }
	$result = mysqli_query($con, "SELECT * FROM dog_details WHERE Name= 'Pug'");
  ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>DOG DETAILS</title>
     <link rel="stylesheet" href="style2.css">
   </head>
   <body>
     <?php $row = mysqli_fetch_assoc($result)?>
     <div class="details">
       <div class="det">
          <output type="text" name="name" value="Name :">Name : <?php echo $row['Name']; ?></output>
       </div>
       <div class="det">
          <output type="text" name="name" value="Name :">Gender : <?php echo $row['Gender']; ?></output>
       </div>
       <div class="det">
          <output type="text" name="name" value="Name :">Height : <?php echo $row['Height']; ?></output>
       </div>
       <div class="det">
          <output type="text" name="name" value="Name :">Weight : <?php echo $row['Weight']; ?></output>
       </div>
       <div class="det">
          <output type="text" name="name" value="Name :">Colour : <?php echo $row['Colour']; ?></output>
       </div>
       <div class="det">
          <output type="text" name="name" value="Name :">Heath Condition : <?php echo $row['Health_condition'];?></output>
       </div>
       <div class="det">
          <output type="text" name="name" value="Name :">Live Expentancy : <?php echo $row['Live_expectency']; ?></output>
       </div>
       <div class="det">
          <output type="text" name="name" value="Name :">In_Stock : <?php echo $row['In_Stock']; ?></output>
       </div>
       <div class="det">
          <output type="text" name="name" value="Name :">Cost : <?php echo $row['Cost']; ?></output>
       </div>

       
</div>

   </body>
 </html>
 <?>
