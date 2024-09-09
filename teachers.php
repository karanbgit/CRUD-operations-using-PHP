<?php
include 'connect.php';

// insert data into database code 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $address = $_POST['address'];

    $sql = "insert into `teacher` (name,email,mobile,dob,class,address)
        values('$name','$email','$mobile','$dob','$class','$address')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "Data Inserted Success";
        header('location:teachers.php');

    } else {
        echo "Data Inserted fail";

    }
}


//Delete Data into page delete operation
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from `teacher` where id=$id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo ("deleted successfully");

        header('location:teachers.php');
    } else {
        die(mysqli_error($con));
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Data</title>
    <link rel="shortcut icon" href="images/student management.png" type="image/x-icon">


    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- font-awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Lineicons CDN -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />


    <link rel="styleSheet" href="teachers.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button id="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Student Management</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="home.php" class="sidebar-link">
                        <i class="lni lni-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Task</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed " data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed " data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="index.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center">
                <p class="fs-1 fw-bold">
                    Teachers Data
                </p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-12 mt-3 ">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." class="form-control p-2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12 col-md-12 mt-3">
                        <a href="home.php"> <button class="btn btn-primary p-2">
                                <i class="fa-solid fa-angle-left mx-2"></i>Back
                            </button>
                        </a>
                        <button class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#modal">
                            <i class="fa-solid fa-plus mx-2"></i>Add New Teacher
                        </button>
                    </div>

                </div>

                <div class="modal fade" id="modal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="model-header">
                                <p class="fs-3 text-center mt-2 fw-bold">Add Teachers Data</p>
                            </div>

                            <div class="modal-body ">
                                <form action="teachers.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" name="name" placeholder="Enter Name"
                                                    class="form-control" autocomplete="off">
                                                <label>Name:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="email" name="email" placeholder="Enter gmail"
                                                    class="form-control" autocomplete="off">
                                                <label>Email:</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="text" name="mobile" placeholder="Enter Mobile No"
                                                    class="form-control" autocomplete="off">
                                                <label>Mobile No:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-floating">
                                                <input type="date" name="dob" placeholder="Enter DOB"
                                                    class="form-control" autocomplete="off">
                                                <label>Date of Birth:</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-floating">
                                                <select class="form-select" name="class" id="sel1">
                                                    <option>--Select--</option>
                                                    <option>1st</option>
                                                    <option>2nd</option>
                                                    <option>3rd</option>
                                                    <option>4th</option>
                                                    <option>5th</option>
                                                    <option>6th</option>
                                                    <option>7th</option>
                                                    <option>8th</option>
                                                    <option>9th</option>
                                                    <option>10th</option>

                                                </select>
                                                <label class="form-label">Class Teacher:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input class="form-control" name="address" placeholder="Enter Address"
                                            autocomplete="off">
                                        <label>Address:</label>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered text-center table-striped mt-3" class="col-lg-1">
                    <tr>
                        <th>ID</th>
                        <th>Teacher Name</th>
                        <th>Email</th>
                        <th>Mob No.</th>
                        <th>Date of Birth</th>
                        <th>Class Teacher</th>
                        <th>Address</th>
                        <th>Operations</th>
                    </tr>


                    <?php
                    $sql = "select * from `teacher`";
                    $result = mysqli_query($con, $sql);
                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            $name = $row["name"];
                            $email = $row["email"];
                            $mobile = $row["mobile"];
                            $dob = $row["dob"];
                            $class = $row["class"];
                            $address = $row["address"];

                            echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $mobile . '</td>
                            <td>' . $dob . '</td>
                            <td>' . $class . '</td>
                            <td>' . $address . '</td>
                            
                            <td>
                                <a href="teachupdate.php? updateid=' . $id . '" class="btn btn-primary me-2" title="Update">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <a href="teachers.php? deleteid=' . $id . '" class="btn btn-danger" title="Delete" onClick= "return teacherdelete()" >
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                         </tr>';

                        }
                    }

                    ?>
                </table>

            </div>

        </div>
    </div>



    <script>
        function teacherdelete() {
            return confirm("Are You Sure delete this record?");
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>



    <script src="script.js"></script>
</body>

</html>