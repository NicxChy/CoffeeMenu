<?php
session_start();

include("DataBase.php");

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER["REQUEST_METHOD"] == 'POST' && !is_admin()) {
    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
    $lastname = $_POST['lname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        if (!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = "INSERT INTO registered (Email, Password, Fname, Mname, Lname, Address) VALUES ('$email', '$hashed_password', '$firstname', '$middlename', '$lastname', '$address')";
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
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
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #1A2731;
        }
        .container {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #5E3D31;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #987F62;
            border-radius: 4px;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .form-section.border-bottom {
            border-bottom: 2px solid #987F62;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        .buttons button, .buttons a {
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .buttons button {
            background-color: #5E3D31;
        }
        .buttons a {
            background-color: #987F62;
        }
    </style>
</head>
<body>
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