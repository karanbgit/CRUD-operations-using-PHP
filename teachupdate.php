<?php
include 'connect.php';


$id = 0;
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $address = $_POST['address'];


    $sql = "update `teacher` set id=$id,name='$name',email='$email',mobile='$mobile',
    dob='$dob',class='$class', address='$address' where id=$id";



    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "Updated Success";
        header('location:teachers.php');

    } else {
        die(mysqli_error($con));
    }
}


if (isset($_GET['updateid'])) {

    $id = $_GET['updateid'];

    $sql = "select * from `teacher` where `id` = $id";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($result);

    $name = $row["name"];
    $email = $row["email"];
    $mobile = $row["mobile"];
    $dob = $row["dob"];
    $class = $row["class"];
    $address = $row["address"];

}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Update</title>
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


</head>

<body>
    <div class="container my-5">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p class="fs-2 text-center mt-2 fw-bold">Update Records</p>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-floating">
                        <input type="text" name="name" placeholder="Enter Name" class="form-control" autocomplete="off"
                            value="<?php echo $name; ?>">
                        <label>Name:</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating">
                        <input type="email" name="email" placeholder="Enter gmail" class="form-control"
                            autocomplete="off" value="<?php echo $email; ?>">
                        <label>Email:</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating">
                        <input type="text" name="mobile" placeholder="Enter Mobile No" class="form-control"
                            autocomplete="off" value="<?php echo $mobile; ?>">
                        <label>Mobile No:</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-floating">
                        <input type="date" name="dob" placeholder="Enter DOB" class="form-control" autocomplete="off"
                            value="<?php echo $dob; ?>">
                        <label>Date of Birth:</label>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-floating">
                        <select class="form-select" name="class" value="<?php echo $class; ?>">
                            <option>--Select--</option>
                            <option value="1st" <?php if ($class == '1st')
                                echo 'selected'; ?>>1st</option>
                            <option value="2nd" <?php if ($class == '2nd')
                                echo 'selected'; ?>>2nd</option>
                            <option value="3rd" <?php if ($class == '3rd')
                                echo 'selected'; ?>>3rd</option>
                            <option value="4th" <?php if ($class == '4th')
                                echo 'selected'; ?>>4th</option>
                            <option value="5th" <?php if ($class == '5th')
                                echo 'selected'; ?>>5th</option>
                            <option value="6th" <?php if ($class == '6th')
                                echo 'selected'; ?>>6th</option>
                            <option value="7th" <?php if ($class == '7th')
                                echo 'selected'; ?>>7th</option>
                            <option value="8th" <?php if ($class == '8th')
                                echo 'selected'; ?>>8th</option>
                            <option value="9th" <?php if ($class == '9th')
                                echo 'selected'; ?>>9th</option>
                            <option value="10th" <?php if ($class == '10th')
                                echo 'selected'; ?>>10th</option>

                        </select>
                        <label class="form-label">Class Teacher:</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-floating">
                <input class="form-control" name="address" placeholder="Enter Address" autocomplete="off"
                    value="<?php echo $address; ?>">
                <label>Address:</label>
            </div>
            <hr>
            <button type="submit" class="btn btn-success" name="submit">Update</button>
        </form>

    </div>
</body>

</html>