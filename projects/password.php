<?php
error_reporting(E_ERROR | E_PARSE);

$con = mysqli_connect("localhost","root","saran","pet_booking");


if (mysqli_connect_errno()){
  echo "MySQLi Connection was not established: " . mysqli_connect_error();
}
if(isset($_POST) & !empty($_POST)){
	$email =  $_POST['email'];
  if(empty($email)){
    echo '<script>
    alert("Enter Valid Details");
    window.open("login.html","_self")
      </script>';
  }else{
	$sql = mysqli_query($con,"SELECT * FROM register WHERE Email = '$email'");
$r = mysqli_fetch_assoc($sql);
$password = $r['Password'];?>
<div class="det">
   <output type="text" name="name" >Password: <?php echo $password; ?></output>

</div>
<?php
if(empty($password)){
  echo "User not exist";
}
}
}
 ?>
