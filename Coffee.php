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
                        echo "<script type='text/javascript'>alert('Login successful!'); window.location.href = 'menu.php';</script>";
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
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel='stylesheet' media='screen and (min-width: 300px) and (max-width: 700px)' href='css/mobilenavigation.css' />
    <link rel="stylesheet" href="css/order.css">
    <link rel='stylesheet' media='screen and (min-width: 300px) and (max-width: 700px)' href='css/mobile.css' />
    
    <script src="javascript/script.js"></script>
    <script src="javascript/profile.js"></script>
    <script src="javascript/order.js"></script>

</head>


<script>
    window.onload = function () {
        const params = new URLSearchParams(window.location.search);
        if (params.get('CoffeeBack') === 'HotPage') {
            showHot();
        } else if (params.get('CoffeeBack') === 'IcePage'){
            showIced();
        } else if (params.get('CoffeeBack') === 'BagPage'){
            showCB();
        } else if (params.get('CoffeeBack') === 'BakedPage'){
            showBaked();
        } 
    };
</script>


<body>
    <h1></h1>
    <nav class="navbar">
        <ul>
            <li><a href="index.php" class="navTitles">Home</a> </li>
            <li><a href="menu.php" class="navTitles">Menu</a> </li>
            <li><a href="blog.php" class="navTitles">Blog</a> </li>
            <li><a href="about.php" class="navTitles">About Us</a> </li>
            <li> <img class="profile" src="Images/Icons/ProfileIcon.png" onclick="showProfile()" alt="Hmmmm Coffee"
                    width="25" height="25"> </li>
            <li> <a href="basket.php?MenuBack=coffeePage"><img class="basket" src="Images/Icons/paperbag.png" alt="Hmmmm Coffee" width="25"
                        height="25"></a></li>
        </ul>
    </nav>

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


    <div class="container">
        <main>

            <!--ORDER -->
            <div id="OrderUp" class="orderBox" style="display:none">

                <div>
                    <div>
                        <img class="backButton" src="Images/Icons/BackButton.svg" onclick="closeOrder()"
                            alt="Hmmmm Coffee" width="50" height="50" style="cursor: pointer;">
                    </div>
                    <input id="inputQuant" class="inputQuantity" type="number" placeholder="Quantity" value="0"></input>
                    <button id="addAmount" class="addButton" onclick="increment()">+</button>
                    <button id="minusAmount" class="minusButton" onclick="decrement()">-</button>
                </div>

                <div class="dropdown-Milk">
                    <input id="Milk" class="dropbtn-Milk" type="text" readonly placeholder="Milk Addition"
                        style="cursor:default"></input>
                    <div class="dropdown-content-Milk">
                        <a onclick="Milk(1)" style="cursor: pointer;">Fresh</a>
                        <a onclick="Milk(2)" style="cursor: pointer;">Fortified</a>
                        <a onclick="Milk(3)" style="cursor: pointer;">Fertilized</a>
                    </div>
                </div>

                <div class="dropdown-Sugar">
                    <input id="Sugar" class="dropbtn-Sugar" type="text" readonly placeholder="Sugar Level"
                        style="cursor:default"></input>
                    <div class="dropdown-content-Sugar">
                        <a onclick="Sugar(1)" style="cursor: pointer;">0%</a>
                        <a onclick="Sugar(2)" style="cursor: pointer;">25%</a>
                        <a onclick="Sugar(3)" style="cursor: pointer;">50%</a>
                        <a onclick="Sugar(4)" style="cursor: pointer;">75%</a>
                        <a onclick="Sugar(5)" style="cursor: pointer;">100%</a>
                    </div>
                </div>

                <div class="dropdown">
                    <input id="Size" class="dropbtn" type="text" readonly placeholder="Size"
                        style="cursor:default"></input>
                    <div class="dropdown-content">
                        <a onclick="Size(1)" style="cursor: pointer;">Small</a>
                        <a onclick="Size(2)" style="cursor: pointer;">Medium</a>
                        <a onclick="Size(3)" style="cursor: pointer;">Large</a>
                    </div>
                </div>

                <div class="BorderLine"> </div>

                <div class="OrderProduct">
                    <img id="orderImage" alt="Hmmmm Coffee" class="OrderProduct" width="450" height="400">
                </div>
                <div><p id="orderTitle" class="ProductOrderName"></p></div>
                
                <div><p id="OrderPrice" class="ProductOrderPrice">50 Pesos</p></div>
                
                <div class="ProductOrderDesc ellipsis">
                    <span id="orderDescription" class="ProductOrderDesc-concat">
                    </span>
                </div>
                
                <button id="addCart" class="addToCart" onclick="moveOrder()">Place Order</input>


                
            </div>
            <!--ORDER END -->


            <div class="box" style="display:block">
                <div class="HC" onclick="showHot()">
                    <p class="pp">Hot Coffee</p>
                </div>
                <div class="IC" onclick="showIced()">
                    <p class="pp">Iced Coffee</p>
                </div>
                <div class="CB" onclick="showCB()">
                    <p class="pp">Coffee in Bag</p>
                </div>
                <div class="FC" onclick="showBaked()">
                    <p class="pp2">Coffee-Flavored Baked Goods</p>
                </div>

                <div class="Order">
                    <!--HOT COFFEE LIST -->
                    <div id="hotCoffeeList" style="display:block">
                        <div class="containerprod1">
                            <div class="boxprod1">
                                <div class="prod1">
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 1 .jpg" id="prod1" alt="Hmmmm Coffee"
                                        class="prod1" style="cursor: pointer;"
                                        onclick="showOrder('prod1', 'prod1name', 'prod1desc', 'prod1price')" width="400">
                                </div>
                            </div>
                            <p id="prod1name" class="prod1name"><b>Espresso </b></p>
                            <p id="prod1price" class="prod1price">Price: ₱50</p>
                            <p id="prod1desc" class="prod1name">A strong and concentrated coffee made by forcing hot
                                water through finely-ground coffee beans.
                            </p>
                            
                        </div>
                        <div class="containerprod2">
                            <div class="boxprod2">
                                <div class="prod2">
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 2.jpg" id="prod2" alt="Hmmmm Coffee"
                                        class="prod2" style="cursor: pointer;"
                                        onclick="showOrder('prod2', 'prod2name', 'prod2desc', 'prod2price')" width="250">
                                </div>
                            </div>
                            <p id="prod2name" class="prod2name"><b>French Vanilla Cappucino </b></p>
                            <p id="prod2price" class="prod1price">Price: ₱69</p>
                            <p id="prod2desc" class="prod2name"> Espresso combined with steamed milk, foam, and French
                                vanilla flavoring
                            </p>
                        </div>
                        <div class="containerprod3">
                            <div class="boxprod3">
                                <div class="prod3">
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 3.jpg" id="prod3" alt="Hmmmm Coffee"
                                        class="prod3" style="cursor: pointer;"
                                        onclick="showOrder('prod3', 'prod3name', 'prod3desc', 'prod3price')" width="400">
                                </div>
                            </div>
                            <p id="prod3name" class="prod3name"><b>Americano </b></p>
                            <p id="prod3price" class="prod1price">Price: ₱91</p>
                            <p id="prod3desc" class="prod3name"> Espresso diluted with hot water, creating a coffee
                                similar in strength to drip coffee.
                            </p>
                        </div>
                        <div class="containerprod4">
                            <div class="boxprod4">
                                <div class="prod4">
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 4.jpg" id="prod4" alt="Hmmmm Coffee"
                                        class="prod4" style="cursor: pointer;"
                                        onclick="showOrder('prod4', 'prod4name', 'prod4desc', 'prod4price')" width="400">
                                </div>
                            </div>
                            <p id="prod4name" class="prod4name"><b>Coffee with Tablea (tablet chocoalate made with cacao
                                    beans)</b></p>
                                    <p id="prod4price" class="prod1price">Price: ₱100</p>
                            <p id="prod4desc" class="prod4name"> Traditional Filipino-style coffee made with tablea,
                                which are cocoa tablets dissolved in hot water or milk.
                            </p>
                        </div>
                        <div class="containerprod5">
                            <div class="boxprod5">
                                <div class="prod5">
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 5.jpg" id="prod5" alt="Hmmmm Coffee"
                                        class="prod5" style="cursor: pointer;"
                                        onclick="showOrder('prod5', 'prod5name', 'prod5desc', 'prod5price')" width="355">
                                </div>
                            </div>
                            <p id="prod5name" class="prod5name"><b>Black Coffee </b></p>
                            <p id="prod5price" class="prod1price">Price: ₱70</p>
                            <p id="prod5desc" class="prod5name"> Straightforward coffee made from ground coffee beans
                                and hot water, without milk or sugar.
                            </p>
                        </div>
                    </div>

                    <!--ICE COFFEELIST -->
                    <div id="icedCoffeeList" style="display:none">
                        <div class="containerprod1">
                            <div class="boxprod1">
                                <div class="prod1">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 1.jpg" id="Iceprod1"
                                        alt="Hmmmm Coffee" class="prod1" style="cursor: pointer;"
                                        onclick="showOrder('Iceprod1', 'Iceprod1name', 'Iceprod1desc', 'Iceprod1price')" width="400">
                                </div>
                            </div>
                            <p id="Iceprod1name" class="prod1name"><b>Caramel Cold Brew Latte </b></p>
                            <p id="Iceprod1price" class="prod1price">Price: ₱99</p>
                            <p id="Iceprod1desc" class="prod1name">Cold brew coffee with milk, flavored with caramel
                                syrup for a sweet taste.
                            </p>
                        </div>
                        <div class="containerprod2">
                            <div class="boxprod2">
                                <div class="prod2">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 2.jpeg" id="Iceprod2"
                                        alt="Hmmmm Coffee" class="prod2" style="cursor: pointer;"
                                        onclick="showOrder('Iceprod2', 'Iceprod2name', 'Iceprod2desc', 'Iceprod2price')" width="250">
                                </div>
                            </div>
                            <p id="Iceprod2name" class="prod2name"><b>Classic Cold Brew </b></p>
                            <p id="Iceprod2price" class="prod1price">Price: ₱89</p>
                            <p id="Iceprod2desc" class="prod2name">Coffee brewed with cold water over an extended
                                period, resulting in a smooth and less acidic flavor.
                            </p>
                        </div>
                        <div class="containerprod3">
                            <div class="boxprod3">
                                <div class="prod3">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 3.jpeg" id="Iceprod3"
                                        alt="Hmmmm Coffee" class="prod3" style="cursor: pointer;"
                                        onclick="showOrder('Iceprod3', 'Iceprod3name', 'Iceprod3desc', 'Iceprod3price')" width="250">
                                </div>
                            </div>
                            <p id="Iceprod3name" class="prod3name"><b>Iced Caffe Latte </b></p>
                            <p id="Iceprod3price" class="prod1price">Price: ₱399</p>
                            <p id="Iceprod3desc" class="prod3name">Cold espresso with chilled milk and often sweetened.
                            </p>
                        </div>
                        <div class="containerprod4">
                            <div class="boxprod4">
                                <div class="prod4">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 4.jpeg" id="Iceprod4"
                                        alt="Hmmmm Coffee" class="prod4" style="cursor: pointer;"
                                        onclick="showOrder('Iceprod4', 'Iceprod4name', 'Iceprod4desc', 'Iceprod4price')" width="250">
                                </div>
                            </div>
                            <p id="Iceprod4name" class="prod4name"><b>Iced Classic with Fresh milk </b></p>
                            <p id="Iceprod4price" class="prod1price">Price: ₱199</p>
                            <p id="Iceprod4desc" class="prod4name">Cold brewed coffee served over ice with fresh milk.
                            </p>
                        </div>
                        <div class="containerprod5">
                            <div class="boxprod5">
                                <div class="prod5">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 5.jpeg" id="Iceprod5"
                                        alt="Hmmmm Coffee" class="prod5" style="cursor: pointer;"
                                        onclick="showOrder('Iceprod5', 'Iceprod5name', 'Iceprod5desc', 'Iceprod5price')" width="250">
                                </div>
                            </div>
                            <p id="Iceprod5name" class="prod5name"><b>Dalgona </b></p>
                            <p id="Iceprod5price" class="prod1price">Price: ₱79</p>
                            <p id="Iceprod5desc" class="prod5name">A frothy whipped coffee made by whipping equal parts
                                of instant coffee, sugar, and hot water until fluffy, then served over cold milk.
                            </p>
                        </div>
                    </div>

                    <!--COFFEE BAG LIST -->
                    <div id="CBList" style="display:none">
                        <div class="containerprod1">
                            <div class="boxprod1">
                                <div class="prod1">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 1.jpg" id="Bagprod1" alt="Hmmmm Coffee"
                                        class="prod1" style="cursor: pointer;"
                                        onclick="showOrder('Bagprod1', 'Bagprod1name', 'Bagprod1desc', 'Bagprod1price')" width="400">
                                </div>
                            </div>
                            <p id="Bagprod1name" class="prod1name"><b>Brazilian Santos Bagged Coffee </b></p>
                            <p id="Bagprod1price" class="prod1price">Price: ₱79</p>
                            <p id="Bagprod1desc" class="prod1name">Smooth, mild, nutty sweetness.
                            </p>
                        </div>
                        <div class="containerprod2">
                            <div class="boxprod2">
                                <div class="prod2">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 2.jpg" id="Bagprod2" alt="Hmmmm Coffee"
                                        class="prod2" style="cursor: pointer;"
                                        onclick="showOrder('Bagprod2', 'Bagprod2name', 'Bagprod2desc', 'Bagprod2price')" width="400">
                                </div>
                            </div>
                            <p id="Bagprod2name" class="prod2name"><b>Kenyan AA Bagged Coffee </b></p>
                            <p id="Bagprod2price" class="prod1price">Price: ₱179</p>
                            <p id="Bagprod2desc" class="prod2name">Description: Bright acidity, wine-like, fruity
                                undertones.
                            </p>
                        </div>
                        <div class="containerprod3">
                            <div class="boxprod3">
                                <div class="prod3">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 3.jpg" id="Bagprod3" alt="Hmmmm Coffee"
                                        class="prod3" style="cursor: pointer;"
                                        onclick="showOrder('Bagprod3', 'Bagprod3name', 'Bagprod3desc', 'Bagprod3price')" width="400">
                                </div>
                            </div>
                            <p id="Bagprod3name" class="prod3name"><b>Sumatra Mandheling Bagged Coffee </b></p>
                            <p id="Bagprod3price" class="prod1price">Price: ₱209</p>
                            <p id="Bagprod3desc" class="prod3name">Earthy, full-bodied, hints of chocolate and spice.
                            </p>
                        </div>
                        <div class="containerprod4">
                            <div class="boxprod4">
                                <div class="prod4">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 4.jpg" id="Bagprod4" alt="Hmmmm Coffee"
                                        class="prod4" style="cursor: pointer;"
                                        onclick="showOrder('Bagprod4', 'Bagprod4name', 'Bagprod4desc', 'Bagprod4price')" width="350">
                                </div>
                            </div>
                            <p id="Bagprod4name" class="prod4name"><b>Ethiopian Yirgacheffe Bagged Coffee </b></p>
                            <p id="Bagprod4price" class="prod1price">Price: ₱149</p>
                            <p id="Bagprod4desc" class="prod4name">Floral aroma, citrusy brightness, complex flavor
                                profile.
                            </p>
                        </div>
                        <div class="containerprod5">
                            <div class="boxprod5">
                                <div class="prod5">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 5.JPG" id="Bagprod5" alt="Hmmmm Coffee"
                                        class="prod5" style="cursor: pointer;"
                                        onclick="showOrder('Bagprod5', 'Bagprod5name', 'Bagprod5desc', 'Bagprod5price')" width="250">
                                </div>
                            </div>
                            <p id="Bagprod5name" class="prod5name"><b>Colombian Single-Origin Bagged Coffee </b></p>
                            <p id="Bagprod5price" class="prod1price">Price: ₱319</p>
                            <p id="Bagprod5desc" class="prod5name">Rich Colombian beans, medium-bodied with nutty and
                                fruity notes.
                            </p>
                        </div>
                    </div>

                    <!--BAKED LIST -->
                    <div id="BakedList" style="display:none">
                        <div class="containerprod1">
                            <div class="boxprod1">
                                <div class="prod1">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 1.jpg" id="Bakedprod1"
                                        alt="Hmmmm Coffee" class="prod1" style="cursor: pointer;"
                                        onclick="showOrder('Bakedprod1', 'Bakedprod1name', 'Bakedprod1desc', 'Bakedprod1price')"
                                        width="400">
                                </div>
                            </div>
                            <p id="Bakedprod1name" class="prod1name"><b>Coffee Bean Bark </b></p>
                            <p id="Bakedprod1price" class="prod1price">Price: ₱50</p>
                            <p id="Bakedprod1desc" class="prod1name">Chocolate bark with coffee beans embedded for
                                flavor and texture.
                            </p>
                        </div>
                        <div class="containerprod2">
                            <div class="boxprod2">
                                <div class="prod2">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 2.jpg" id="Bakedprod2"
                                        alt="Hmmmm Coffee" class="prod2" style="cursor: pointer;"
                                        onclick="showOrder('Bakedprod2', 'Bakedprod2name', 'Bakedprod2desc', 'Bakedprod2price')"
                                        width="400">
                                </div>
                            </div>
                            <p id="Bakedprod2name" class="prod2name"><b>Coffee Cheesecake </b></p>
                            <p id="Bakedprod2price" class="prod1price">Price: ₱150</p>
                            <p id="Bakedprod2desc" class="prod2name">Cheesecake flavored with coffee, often with a
                                coffee-infused crust or topping.
                            </p>
                        </div>
                        <div class="containerprod3">
                            <div class="boxprod3">
                                <div class="prod3">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 3.jpg" id="Bakedprod3"
                                        alt="Hmmmm Coffee" class="prod3" style="cursor: pointer;"
                                        onclick="showOrder('Bakedprod3', 'Bakedprod3name', 'Bakedprod3desc', 'Bakedprod3price')"
                                        width="400">
                                </div>
                            </div>
                            <p id="Bakedprod3name" class="prod3name"><b>Crispy Coffee Cookies</b></p>
                            <p id="Bakedprod3price" class="prod1price">Price: ₱90</p>
                            <p id="Bakedprod3desc" class="prod3name">Cookies with a crispy texture and coffee flavor.
                            </p>
                        </div>
                        <div class="containerprod4">
                            <div class="boxprod4">
                                <div class="prod4">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 4.jpg" id="Bakedprod4"
                                        alt="Hmmmm Coffee" class="prod4" style="cursor: pointer;"
                                        onclick="showOrder('Bakedprod4', 'Bakedprod4name', 'Bakedprod4desc', 'Bakedprod4price')"
                                        width="400">
                                </div>
                            </div>
                            <p id="Bakedprod4name" class="prod4name"><b>White Chocolate-Cappuccino Cookies </b></p>
                            <p id="Bakedprod4price" class="prod1price">Price: ₱70</p>
                            <p id="Bakedprod4desc" class="prod4name">Cookies with white chocolate and cappuccino flavor.
                            </p>
                        </div>
                        <div class="containerprod5">
                            <div class="boxprod5">
                                <div class="prod5">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 5.jpg" id="Bakedprod5"
                                        alt="Hmmmm Coffee" class="prod5" style="cursor: pointer;"
                                        onclick="showOrder('Bakedprod5', 'Bakedprod5name', 'Bakedprod5desc', 'Bakedprod5price')"
                                        width="400">
                                </div>
                            </div>
                            <p id="Bakedprod5name" class="prod5name"><b>Spiced Cappuccino Kiss Cookies </b></p>
                            <p id="Bakedprod5price" class="prod1price">Price: ₱120</p>
                            <p id="Bakedprod5desc" class="prod5name">Cookies flavored with spices reminiscent of a
                                cappuccino.
                            </p>
                        </div>
                    </div>
                </div><!--End of ORDER div -->
            </div><!--End of BOX div -->
        </main>
</body>

</html>