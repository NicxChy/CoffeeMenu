<?php
    session_start();

    include("DataBase.php");

    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER["REQUEST_METHOD"] == 'GET' && !is_admin()){

        $email = $_POST['email']; 
        $password = $_POST['password'];

        try {
            if (!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $query = "SELECT * FROM registered WHERE Email = '$email' LIMIT 1";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);

                    if ($user_data['Password'] == $password) {
                        $_SESSION['user_id'] = $user_data['id']; 
                        $_SESSION['email'] = $user_data['Email']; 
                        echo "<script type='text/javascript'>alert('Login successful!'); window.location.href = 'index.php';</script>";
                        exit();
                    } else {
                        echo "<script type='text/javascript'>alert('Wrong password. Please try again.');</script>";
                    }
                } else {
                    echo "<script type='text/javascript'>alert('No account found with this email. Please try again.');</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Login failed! Must input valid information.');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "<script type='text/javascript'>alert('An error occurred: " . $e->getMessage() . "');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel='stylesheet' media='screen and (min-width: 300px) and (max-width: 700px)' href='css/mobilenavigation.css' />
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' media='screen and (min-width: 300px) and (max-width: 700px)' href='css/mobile.css' />

    <script src="javascript/profile.js"></script>
    <script src="javascript/script.js"></script>
</head>


<body onload="getRandomImage()">
    
    <h1></h1>
    <nav class="navbar">
        <ul>
            <li><a href="index.php" class="navTitles">Home</a> </li>
            <li><a href="menu.php" class="navTitles">Menu</a> </li>
            <li><a href="blog.php" class="navTitles">Blog</a> </li>
            <li><a href="about.php" class="navTitles">About Us</a> </li>
            <li> <img class="profile" src="Images/Icons/ProfileIcon.png" onclick="showProfile()" alt="Hmmmm Coffee"
                    width="25" height="25"> </li>
            <li>
                <a href="basket.php?MenuBack=mainPage">
                    <img class="basket" src="Images/Icons/paperbag.png" alt="Hmmmm Coffee" width="25" height="25">
                </a>
            </li>
        </ul>
    </nav>




    <main>

    <?php if (isset($_SESSION['email'])): ?>
            <div id="showLogin">
                <div class="Profilecontainer">
                    <h1>
                        <div class="heading">Logged in As</div>
                    </h1>

                    <div class="centerText"><?php echo htmlspecialchars($_SESSION['email']); ?></div>
                    
                    <form method="POST" action="logout.php" class="form">
                        <input class="login-button" type="submit" value="Logout">
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div id="showLogin">
                <div class="Profilecontainer">
                    <div class="heading">Login</div>
                    <div class="centerText">Welcome Back! Sign in to your Account</div>
                    
                    <form method="POST" class="form">
                        <input required class="input" type="email" name="email" id="email" placeholder="E-mail">
                        <input required class="input" type="password" name="password" id="password" placeholder="Password">
                        <input class="login-button" type="submit" value="Sign In">
                        <div>
                            <div class="forgot-password"><a href="#">Forgot Password ?</a></div>
                            <div class="register"><a href="Register.php">Register</a></div>
                        </div>
                    </form>

                    <div class="social-account-container">
                        <span class="title">Or Sign in with</span>
                        <div class="social-accounts">
                            <button class="social-button google">
                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                                    <path
                                        d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                    </path>
                                </svg></button>
                            <button class="social-button apple">
                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                    <path
                                        d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z">
                                    </path>
                                </svg>
                            </button>
                            <button class="social-button twitter">
                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    <?php endif; ?>
        
        <!-- Welcome Box-->
        <div class="box">

            <p class="coffee">Coffee</p>
            <p class="menuFont">I Don't drink coffee to Wake Up, I wake up to Drink <b class="menuFont2">Coffee</b></p>


            <div class="second">
                <div class="wrapper">
                    <div id="img-1"></div>
                    <div id="img-2"></div>
                    <div id="img-3"></div>
                    <div id="img-4"></div>
                </div>
            </div>

            <div class="coffeeImage">
                <img id="image_shower" alt="Hmmmm Coffee" width="450">
            </div>

        </div>


    </main>
</body>


</html>