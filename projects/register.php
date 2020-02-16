<?php
error_reporting(E_ERROR | E_PARSE);
$name=$_POST['name'];
$age=$_POST['age'];
$add1=$_POST['add1'];
$add2=$_POST['add2'];
$add3=$_POST['add3'];
$phno=$_POST['phn'];
$email=$_POST['email'];
$password=$_POST['pass'];
$conn=new mysqli('localhost','root','saran','pet_booking');
if($conn->connect_error){
  die('Connection failed: '.$conn->connect_error);
}
if(empty($_SESSION)) // if the session not yet started
   session_start();
if(isset($_POST['register'])){
  if(empty($name)||empty($age)||empty($add1)||empty($add2)||empty($add3)||empty($phno)||empty($email)||empty($password)){
    echo '<script>
    alert("Enter Valid Details");
    window.open("register.html","_self")
      </script>';
  }else{
  $stmt=$conn->prepare("insert into register(Name,Age,Address1,Address2,Address3,Phone,Email,Password) values('$name','$age','$add1','$add2','$add3','$phno','$email','$password')");
  $stmt->execute();
  echo'<script>
          alert("signed up successfully!!");
          window.open("login.html", "_self");
      </script>';
      $stmt->close();
    }
  }
else {
  echo '<script>
  alert("Enter Valid Details");
  window.open("register.html","_self")
    </script>';
}
?>
