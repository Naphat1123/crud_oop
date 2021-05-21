<?php

include_once('function.php');

    $update_user = new DB_con();

    if (isset($_POST['update'])){
        
        $userid = $_GET['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
    
        $sql = $update_user->update_data($firstname,    $lastname,    $email,    $phonenumber,    $address, $userid);
    
        if ($sql) {
            echo "<script>alert ('update complete');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert ('Something wrong');</script>";
            echo "<script>window.location.href='update.php';</script>";
        }

    }


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <h1>
            Update Data
        </h1>
        <hr>
        <?php
        $userid = $_GET['id'];
        $updateData = new DB_con();
        $sql = $updateData->fetch_one_record($userid);
        while ($row = mysqli_fetch_array($sql)) {
        ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>" require>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" require>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" require>
                </div>
                <div class="mb-3">
                    <label for="phonenumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $row['phonenumber']; ?>" require>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" cols="30" rows="10"><?php echo $row['address']; ?> </textarea>
                </div>

            <?php  } ?>

            <button type="submit" name="update" class="btn btn-primary">Update</button>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>

</html>