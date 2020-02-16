<?php
error_reporting(E_ERROR | E_PARSE);
$con=new mysqli('localhost','root','saran','pet_booking');
if($con->connect_error){ 
  die('Connection failed: '.$con->connect_error);
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="style2.css">
   </head>
   <body>
     <form action="print.php" method="post" >
         <div class="details1">
         <div class="textbox">
      
           <input type="text" placeholder="Email" name="email" value="">
         </div>
         <input class="btn" type="submit" name="book" value="Show">
       </div>
       <?php
       $email=$_POST['email'];

       $result = mysqli_query($con,"SELECT * FROM booking_details WHERE email='$email' ");
       	$check_user=mysqli_num_rows($result);
              $row = mysqli_fetch_assoc($result);
           if($check_user>0){

               $ticket_id=$row['Bookingid'];
               $name=$row['Name'];
           		$email=$row['Email'];
              $count=$row['Count'];
           		$cost=$row['Cost'];
       	?><p style="color:black">
       	<br>TICKET ID:<br><?php echo $ticket_id; ?><br>
       	<br>NAME :<br><?php echo $name ?><br>
       	<br>EMAIL :<br><?php echo $email; ?><br>
<br>COUNT :<br><?php echo $count;?><br>
       	<br>AMOUNT:<br><?php echo $cost;?><br>

       	<br><br>
       	<?php echo"YOU HAVE TO PAY THE AMOUNT AT THE TIME OF DELIVERY!!";
       	?>

       	<?php }
       	?>
