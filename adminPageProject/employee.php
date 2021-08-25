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
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Employee Details</title>
        <!-- <link rel="stylesheet" href="home.css"> -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <!-- <style><?php include "css/home.css" ?></style> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <style>
            p{
                font-family: 'Poppins', sans-serif;
                color: #20b2aa;
                font-weight: bolder;
                text-align: center;
                font-size: 2em;
            }

            #desc{
                text-align: center;
                font-family: 'Poppins', sans-serif;
                color:black;
                font-weight: bold;
                font-size: larger;
            }

        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
            <a role="button" name="logout" class="navbar-brand" href="logout.php">Logout</a>
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
        <p>Welcome To Employee Details</p>
        <p id = "desc">This is Employee Page Here you can add employee and see the details of all Employees</p>

        <div class="container">
            <div class="services">
                <div class="btns">
                    <span style="padding-left: 2em;"><a href="addemp.php"><button name="addemp" style="padding-right: 1em;text-align:center;" type="submit">Add Employee</button></a></span>
                    <span style="padding-left: 2em;"><a href="removemp.php"><button id = "myModal" name="rmemp" style="padding-right: 1em;text-align:center;" type="button">Remove Employee</button></a></span>
                    <span style="padding-left: 2em;"><a href="editemp.php"><button name="edidemp" style="padding-right: 1em;text-align:center;" type="submit" >Edit Employee Details</button></a></span>
                    <form method="post" style="padding-left: 51em;"><input name="searchemp" type="text" placeholder="FirstName/Lastname/Email/Designation/MobileNO" style="width: 80%;"><button name="searchbtn" id = "btn2" type="submit">Search</button></from>   
                </div>  
            </div>

            <div class="emp-table" style="padding-left: 2em;padding:2em;">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Emp_id</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Designation</th>
                    <th scope="col">MobileNO.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("connection.php");

                        if(isset($_POST['searchemp']))
                        {   
                            $choice = $_POST['searchemp'];

                            $sql = "SELECT `emp_id`, `empfname`, `emplname`, `empemail`, `empdesig`, `emphno` FROM `emp_details` WHERE `empfname` = '$choice' OR `emplname`='$choice' OR `empdesig`='$choice' OR `emphno`='$choice' OR `empemail`='$choice'";
                            $data = mysqli_query($conn, $sql);

                            $num = mysqli_num_rows($data);

                            if($num > 0)
                            {
                                while($num--)
                                {
                                    $row = mysqli_fetch_assoc($data);
                                    echo "<tr>
                                    <th scope='row'>$row[emp_id]</th>
                                    <td>$row[empfname] $row[emplname]</td>
                                    <td>$row[empemail]</td>
                                    <td>$row[empdesig]</td>
                                    <td>$row[emphno]</td>
                                    </tr>";
                                }
                            }

                            else
                            {
                                echo "<b>No Elements in Database!..\n</b>";
                            }


                        }
                        else
                        {
                            $sql = "SELECT `emp_id`, `empfname`, `emplname`, `empemail`, `empdesig`, `emphno` FROM `emp_details`";

                            $data = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($data);

                            if($num > 0)
                            {
                                while($num--)
                                {
                                    $row = mysqli_fetch_assoc($data);
                                    echo "<tr>
                                    <th scope='row'>$row[emp_id]</th>
                                    <td>$row[empfname] $row[emplname]</td>
                                    <td>$row[empemail]</td>
                                    <td>$row[empdesig]</td>
                                    <td>$row[emphno]</td>
                                    </tr>";
                                }
                            }

                            else
                            {
                                echo "No Elements in Database!..\n";
                            }
                        }

                    ?>
                </tbody>
                </table>
            </div>
        <script src="employee.js"></script>
    </body>
    <footer>&copy; Copyright 2021</footer>
</html>
