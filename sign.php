<?php
require 'connection.php';

$name_err = "";
$email_err = "";
$phone_err = "";
$password_err = "";
// $name_reg = "";

echo $name_err;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $name_err = "please enter your name *";
    } else {
        $name_r = "/^[a-zA-Z]+/";
        if (!preg_match($name_r, $_POST["name"])) {
            $name_err = " enter a valid name";
        }
    }

    if (empty($_POST["email"])) {
        $email_err = "please enter your email *";
    } else {
        $email_r = "/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/";
        if (!preg_match($email_r, $_POST["email"])) {
            $email_err = " enter a valid email";
        }
    }

    if (empty($_POST["phone"])) {
        $phone_err = "please enter your phone *";
    } else {
        $phone_r = "^[0-9]{10}^";
        if (!preg_match($phone_r, $_POST["phone"])) {
            $_err = " enter a valid number";
        }
    }
    if (empty($_POST["password"])) {
        $password_err = "please enter your password *";
    }

    // echo "<pre>";
    // echo print_r($_FILES["file"]);
    // echo "<pre>";
    $folder = "profilephoto/";
    $path = $folder . $_FILES["file"]["name"];
    $temp = $_FILES["file"]["tmp_name"];

    // if ($_FILES["file"]["size"] < 1024000) {
    //     move_uploaded_file($temp, $path);
    // } else {
    //     echo "<h2 style='color:red;'>img size should bee leas than 1mb</h2>";
    // }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $imgUrl = $path;

    $sql = "INSERT INTO users (name, email, phone, password, image_url) VALUES ('$name', '$email', '$phone', '$pass', '$imgUrl')";

    if (empty($name_err) && empty($email_err) && empty($phone_err)) {
        if ($_FILES["file"]["size"] < 1024000) {
            move_uploaded_file($temp, $path);

            if ($conn->query($sql)) {
                echo "user created";
            } else {
                echo "something went wrong";
            }
        } else {
            echo "<h2 style='color:red;'>img size should bee leas than 1mb</h2>";
        }

    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .mean {
            width: 50%;
            margin: auto;
            padding: 30px;
            border: 4px solid #161313;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="mean">
        <!--<img src="http://localhost/furni/profilephoto/jai-shri-krishna-krishna-janmashtami-design_557703-5.avif" alt="">-->
        <form method="post" enctype="multipart/form-data">
            <div class="container">
                <h2 style="color:skyblue; padding-bottom:21px;">Registration</h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <p class=text-danger>
                    <?php
                    echo $name_err;
                    // echo $name_reg;
                    ?>
                </p>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div>
                <p class=text-danger>
                    <?php
                    echo $email_err;
                    ?>
                </p>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
                </div>
                <p class=text-danger>
                    <?php
                    echo $phone_err;
                    ?>
                </p>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Profile image </label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="file"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" placeholder="enter your password"
                        name="password" aria-describedby="emailHelp">
                </div>
                <p class=text-danger>
                    <?php
                    echo $password_err;
                    ?>
                </p>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>