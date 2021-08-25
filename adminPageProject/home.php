<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Home</title>
      <link rel="stylesheet" href="home.css">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
         <?php include "css/home.css" ?>
      </style>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
   </head>
   <body style="background: #F5FFFA;">
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Admin Login Form
            </div>
            <div class="title signup">
               Admin Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="#" class="login" method="post">
                  <div class="field">
                     <input name="email" type="text" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input name="pass" type="password" placeholder="Password" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input name="login" type="submit" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form action="home.php" class="signup" method="post">
                  <div class="field">
                     <input name="semail" type="text" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input name="spass" type="password" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input name="conspass" type="password" placeholder="Confirm password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input name="signup" type="submit" value="Signup">                  </div>
               </form>
            </div>
         </div>
      </div>
      <script src="home.js"></script>
   </body>
   <footer>&copy; Copyright 2021</footer>
</html>
<?php

       include('connection.php');

      if(isset($_POST['signup']))
      {

         $semail = $_POST['semail'];
         $spass = $_POST['spass'];
         $cpass = $_POST['conspass'];

         $sql = "INSERT INTO `empdetails_signup` (`email`,`password`,`conpassword`) VALUES ('$semail','$spass','$cpass')";

         $data = mysqli_query($conn, $sql);

         if($data)
         {
            //header("Location: home.php");
            echo "SIGNUP SUCESSFUL !..\n"; 
            die;               
         }

         else
         {
            echo "Data Insertion Failed!...".mysqli_error($conn);
         }
      }

      if(isset($_POST['login']))
      {
         $email = $_POST['email'];
         $pass = $_POST['pass'];

         $sql = "SELECT `email`, `password` FROM `empdetails_signup` WHERE `email` = '$email' AND `password` = '$pass'";
         //$sql = "SELECT * FROM `empdetails_signup` WHERE `email`='$email'";
         $data = mysqli_query($conn, $sql);

         if(mysqli_num_rows($data) == 1)
         {
            // $row = mysqli_fetch_assoc($data);
              
            // if(password_verify($pass, $row['password']))
            // {
            //    session_start();
            //    $_SESSION['loggedIn'] = true;
            //    $_SESSION['useremail'] = $email;
            //    header("Location: employee.php");
            // }
      
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['pass'] = $_POST['pass'];
            header("Location: employee.php");
            //echo "LOGIN SUCESSFUL!...\n";

            // else
            // {
            //    echo "<script>alert('Invalid login!');</script>";
            // }
         
         }
         else
         {
            echo "<script>alert('Invalid login!');</script>";
         }
      }
   ?>