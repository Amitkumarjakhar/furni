<?php
session_start();
require "connection.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
        <?php
        $email_err = "";
        $password_err = "";

        echo $email_err;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $pass = $_POST["password"];

            if (empty($email)) {
                $email_err = "please enter your email *";
            }

            if (empty($pass)) {
                $password_err = "please enter your password *";
            }

            if (empty($email_err) && empty($password_err)) {
                $sql = "SELECT name, email, phone, image_url, password FROM users WHERE email = '$email'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    if (password_verify($pass, $row['password'])) {
                        $_SESSION['user_name'] = $row['name'];
                        $_SESSION['user_email'] = $row['email'];
                        $_SESSION['user_phone'] = $row['phone'];
                        $_SESSION['profile_img'] = $row['image_url'];
                        header("Location : index.php");
                    }else{
                        echo "Your Password Is Wrong";
                    }
                }

            }

        }

        ?>

        <form method="post">

            <div class="container">
            <h2 style="color:skyblue; padding-bottom:21px;">Login</h2>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="enter your email" name="email">
                </div>
                <p class=text-danger>
                    <?php
                    echo $email_err;
                    ?>
                </p>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="enter your password"
                        name="password">
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