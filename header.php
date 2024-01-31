<?php
session_start();

// echo $_SERVER['SCRIPT_NAME'];
// ECHO "<br>";

//basename ke madad se last wala file nikalenge

$current_file = basename($_SERVER['SCRIPT_NAME']);

$is_index = $current_file == 'index.php';
?>

<style>
    .loginbtn {
        background: #316478;
        border-radius: 10px;
        border: none;
        color: white;
        padding: 4px 12px 4px 13px;
        font-weight: 600;
    }

    .signupbtn {
        background: rgb(210, 210, 89);
        border-radius: 10px;
        border: none;
        color: white;
        padding: 3px 12px 3px 12px;
        font-weight: 600;
    }
</style>


<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="<?php echo ($is_index ? 'active nav-item' : 'nav-item') ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="<?php echo ($current_file == 'shop.php' ? 'active nav-item' : '') ?>"><a class="nav-link"
                        href="shop.php">Shop</a></li>
                <li class="<?php echo ($current_file == 'about.php' ? 'nav-item active' : '') ?>"><a class="nav-link"
                        href="about.php">About us</a></li>
                <li class="<?php echo ($current_file == 'services.php' ? 'nav-item active' : '') ?>"><a class="nav-link"
                        href="services.php">Services</a></li>
                <li class="<?php echo ($current_file == 'blog.php' ? 'nav-item active' : 'nav-item') ?>"><a
                        class="nav-link" href="blog.php">Blog</a></li>
                <li class="<?php echo ($current_file == 'contact.php' ? 'nav-item active' : 'nav-item') ?>"><a
                        class="nav-link" href="contact.php">Contact us</a></li>
            </ul>

            <ul class="d-flex  mb-md-0" style="list-style: none;">
                <?php if (empty($_SESSION['user_name'])) { ?>
                    <li style="padding: 0px 5px"><a href="login.php"><button class="loginbtn"type="button">Login</button></a></li>
                    <li style="padding: 0px 5px"><a href="sign.php"><button class="signupbtn" type="button">Singin</button></a></li>
                    <?php } else { ?>
                    <li style="padding: 0px 5px"><button type="button" class="loginbtn"><?php echo $_SESSION['user_name']; ?></button></li>
                    <li style="padding: 0px 5px"><a href="logout.php"><button type="button"class="signbtn">Logout</button></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->