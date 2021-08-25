<?php
    session_start();
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
    {
    }
    else{
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="addemp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
       
</head>
<?php
    if(isset($_POST['fname']))
    {
        include("connection.php");

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $desig = $_POST['designation'];
        $phno = $_POST['phoneno'];

        $sql =  "INSERT INTO `emp_details` (`empfname`, `emplname`, `empemail`, `empdesig`,`emphno`) VALUES('$fname', '$lname', '$email', '$desig', '$phno')";
        $data = mysqli_query($conn, $sql);
        if($data)
        {
            echo "<script>alert('Data Entered Sucessfully!');</script>";
        }
        else
        {
            echo "Failed to enter data : ".mysqli_error();
        }
    }

?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
            <a class="navbar-brand" href="home.php">Logout</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="employee.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="employee.php">Employee Details</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="addemp.php">Add Employee</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="editemp.php">Edit Employee</a>
               </li>
               </ul>
            </div>
         </div>
         </nav>
    <p>You Can Add Employee Here</p>
    <div class="container">
        <div class="form" style="text-align: center;">
            <form name = "addempform" action = "addemp.php" method="post">
                <div class="from-in"><input name="fname" type="text" placeholder="First Name" required></div>
                <div class="from-in"><input name="lname" type="text" placeholder="Last Name" required></div>
                <div class="from-in"><input name="email" type="text" placeholder="Email" required></div>
                <div class="from-in"><input name="phoneno" type="text" placeholder="PhoneNo" required></div>
                <div class="from-in">
                    <select name="designation" id="designation" required>
                        <option value="select">--Select--</option>
                        <option value="Engineer">Engineer</option>
                        <option value="Associate Engineer">Associate Engineer</option>
                        <option value="Quality  Aanalyst">Quality  Aanalyst</option>
                        <option value="Associate Quality Aanalyst">Associate Quality Aanalyst</option>
                    </select>
                </div>
                <div class="submit-btn">
                    <button type='submit' id='btn'>Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
<footer>&copy; Copyright 2021</footer>
</html>