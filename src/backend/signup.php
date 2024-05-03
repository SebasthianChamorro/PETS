<?php
  include('../../config/database.php');
  
  $fullname = $_POST['fname'];
  $email = $_POST['email'];
  $passwd = trim($_POST['passwd']);
  $enc_pass = trim(md5($passwd));

  /* echo "Your fullname: ". $fullname."<br>";
  echo "Your email: ". $email."<br>";
  echo "Your password: ". $passwd."<br>";
  echo "Your password enc: ".$enc_pass."<br>";*/

  $sql_validate_email = "SELECT * FROM users WHERE email = '$email'";
  $result = pg_query($conn,$sql_validate_email);
  $total = pg_num_rows( $result);

  if($total > 0){
      echo"<script>alert('Email already exists')</script>";
      header("refresh:0;url=../signup.html");
  }else{
      $sql = "INSERT INTO users (fullname, email, password) values ('$fullname' , '$email', '$enc_pass')";

      $ans =pg_query($conn,$sql);
      if ($ans){
        echo"<script>alert('User has been registered')</script>";
        header("refresh:0;url=../signin.html");
      }else{
        echo "ERROR:" . pg_last_error();
      }
  }
  // close conection database
  pg_close($conn)

?>