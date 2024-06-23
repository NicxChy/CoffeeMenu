<?php
session_start();

include("DataBase.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
    $lastname = $_POST['lname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        if (!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = "INSERT INTO registered (Email, Password, Fname, Mname, Lname, Address) VALUES ('$email', '$password', '$firstname', '$middlename', '$lastname', '$address')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script type='text/javascript'>alert('Successfully registered!'); window.location.href = 'index.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Registration failed. Please try again.')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Registration failed !! Must input valid information')</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo ($e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel='stylesheet' media='screen and (min-width: 300px) and (max-width: 700px)'
        href='css/mobilenavigation.css' />
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' media='screen and (min-width: 300px) and (max-width: 700px)' href='css/mobile.css' />
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/Register.css">

</head>
<body>

    <div class="box">

            <p class="coffee">Le Coffee</p>
            <p class="menuFont">Register Now! To Order Your First <b class="menuFont2">Coffee</b> from Us</p>


            <div class="second">
                <div class="wrapper">
                    <div id="img-1"></div>
                    <div id="img-2"></div>
                    <div id="img-3"></div>
                    <div id="img-4"></div>
                </div>
            </div>

    </div>

    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="#">
            <div class="form-section border-bottom">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
            </div>
            <div class="form-section">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="fname" name="fname">
                </div>
                <div class="form-group">
                    <label for="middlename">Middle Name</label>
                    <input type="text" id="mname" name="mname" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lname" name="lname" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
            </div>
            <div class="buttons">
                <button type="submit">Register</button>
                <a href="index.php">Back</a>
            </div>
        </form>
    </div>

</body>
</html>