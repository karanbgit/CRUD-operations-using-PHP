<?php
include 'connect.php';


$id = 0;
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $work = $_POST['work'];
    $address = $_POST['address'];


    $sql = "update `peon` set id=$id,name='$name',mobile='$mobile',work='$work',
address='$address' where id=$id";



    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "Updated Success";
        header('location:peon.php');

    } else {
        die(mysqli_error($con));
    }
}


if (isset($_GET['updateid'])) {

    $id = $_GET['updateid'];

    $sql = "select * from `peon` where `id` = $id";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $mobile = $row['mobile'];
    $work = $row['work'];
    $address = $row['address'];

}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Peon Update</title>
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


    <link rel="styleSheet" href="peon.css">
</head>

<body>
    <div class="container my-5">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p class="fs-2 text-center mt-2 fw-bold">Update Records</p>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                        <input type="text" name="mobile" placeholder="Enter Mobile No" class="form-control"
                            autocomplete="off" value="<?php echo $mobile; ?>">
                        <label>Mobile No:</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating">
                        <input type="text" name="work" placeholder="Enter Work No" class="form-control"
                            autocomplete="off" value="<?php echo $work; ?>">
                        <label>Work:</label>
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