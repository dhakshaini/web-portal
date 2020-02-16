<?php
error_reporting(E_ERROR | E_PARSE);
 // establishing the MySQLi connection
 $con = mysqli_connect("localhost","root","saran","pet_booking");
 if (mysqli_connect_errno()){
   echo "MySQLi Connection was not established: " . mysqli_connect_error();
 }
 // checking the user
 if(empty($_SESSION)) // if the session not yet started
    session_start();
 if(isset($_POST['login'])){
   $email = mysqli_real_escape_string($con,$_POST['email']);
   $pass = mysqli_real_escape_string($con,$_POST['pass']);
   if(empty($email)||empty($pass)){
     echo '<script>
     alert("Enter Valid Details");
     window.open("login.html","_self")
       </script>';
   }else{

 $result = mysqli_query($con,"SELECT * FROM register WHERE Email='$email' and Password='$pass'");
 $check_user=mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);
      echo $row;
      mysqli_close($link);
   if($check_user>0){
     $_SESSION['email']=$email;
     $_SESSION['name']=$row['name'];
     $_SESSION['Phno']=$row['phno'];
     echo'<script>
       window.open("profile.html", "_self");
          </script>';
   }
   if (isset($_POST['gotoregister'])) {
      // code...
      echo '<script>
      window.open("Register.html","_self")
      </script>';
    }
 }
}
?>
