<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel='stylesheet' media='screen and (min-width: 400px) and (max-width: 700px)' href='css/mobilenavigation.css' />
    <link rel="stylesheet" href="css/order.css">
    <script src="javascript/script.js"></script>
    <script src="javascript/profile.js"></script>
    <script src="javascript/order.js"></script>
</head>

<body>
    <h1></h1>
    <nav class="navbar">
        <ul>
            <li><a href="index.php" class="navTitles">Home</a> </li>
            <li><a href="menu.php" class="navTitles">Menu</a> </li>
            <li><a href="blog.php" class="navTitles">Blog</a> </li>
            <li><a href="about.php" class="navTitles">About Us</a> </li>
            <li> <img class="profile" src="Images/Icons/ProfileIcon.png" onclick="showProfile()" alt="Hmmmm Coffee" width="25" height="25"> </li>
            <li> <a href="basket.php"><img class="basket" src="Images/Icons/paperbag.png" alt="Hmmmm Coffee" width="25" height="25"></a></li>
        </ul>
    </nav>

    <div id="showLogin" style="display:none">
        <div class="Profilecontainer">
            <div class="heading">Login</div>
            <div class="centerText">Welcome Back! Sign in to your Account</div>
            <form action="" class="form">
                <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
                <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
                <input class="login-button" type="submit" value="Sign In">

                <div>
                    <div class="forgot-password"><a href="#">Forgot Password ?</a></div>
                    <div class="register"><a href="#">Register</a></div>
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

   
    <div class="container">
        <main>

             <!--ORDER -->
            <div id="OrderUp" class="orderBox" style="display:none">
                <div>
                    <div>
                        <img class="backButton" src="Images/Icons/BackButton.svg"  onclick="closeOrder()" alt="Hmmmm Coffee" width="50"
                            height="50" style="cursor: pointer;">
                    </div>
                    <input id="inputQuant" class="inputQuantity" type="number" placeholder="Quantity" value="0"></input>
                    <button id="addAmount" class="addButton" onclick="increment()">+</button>
                    <button id="minusAmount" class="minusButton" onclick="decrement()">-</button>
                </div>
    
                <div class="dropdown-Milk">
                    <input id="Milk" class="dropbtn-Milk" type="text" readonly placeholder="Milk Addition" style="cursor:default"></input>
                    <div class="dropdown-content-Milk">
                        <a onclick="Milk(1)" style="cursor: pointer;">Fresh</a>
                        <a onclick="Milk(2)" style="cursor: pointer;">Fortified</a>
                        <a onclick="Milk(3)" style="cursor: pointer;">Fertilized</a>
                    </div>
                </div>
    
                <div class="dropdown-Sugar">
                    <input id="Sugar" class="dropbtn-Sugar" type="text" readonly placeholder="Sugar Level" style="cursor:default"></input>
                    <div class="dropdown-content-Sugar">
                        <a onclick="Sugar(1)" style="cursor: pointer;">0%</a>
                        <a onclick="Sugar(2)" style="cursor: pointer;">25%</a>
                        <a onclick="Sugar(3)" style="cursor: pointer;">50%</a>
                        <a onclick="Sugar(4)" style="cursor: pointer;">75%</a>
                        <a onclick="Sugar(5)" style="cursor: pointer;">100%</a>
                    </div>
                </div>
    
                <div class="dropdown">
                    <input id="Size" class="dropbtn" type="text" readonly placeholder="Size" style="cursor:default"></input>
                    <div class="dropdown-content">
                        <a onclick="Size(1)" style="cursor: pointer;">Small</a>
                        <a onclick="Size(2)" style="cursor: pointer;">Medium</a>
                        <a onclick="Size(3)" style="cursor: pointer;">Large</a>
                    </div>
                </div>
    
                <div class="BorderLine"> </div>
    
                <div class="OrderProduct">
                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 1 .jpg" alt="Hmmmm Coffee" class="OrderProduct" width="400" height="400">
                </div>
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
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 1 .jpg" alt="Hmmmm Coffee" class="prod1" style="cursor: pointer;" onclick="showOrder()" width="400">
                                </div>
                            </div>
                            <p class="prod1name"><b>Product Name </b><br><br> I think this Coffee is Kopiko and many
                                more
                                will come</p>
                        </div>
                        <div class="containerprod2">
                            <div class="boxprod2">
                                <div class="prod2">
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 2.jpg" alt="Hmmmm Coffee" class="prod2" width="250">
                                </div>
                            </div>
                            <p class="prod2name"><b>Product Name </b><br><br> I think this tHE cOFfee Is A coffee</p>
                        </div>
                        <div class="containerprod3">
                            <div class="boxprod3">
                                <div class="prod3">
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 3.jpg" alt="Hmmmm Coffee" class="prod3" width="400">
                                </div>
                            </div>
                            <p class="prod3name"><b>Product Name </b><br><br> Might be Almond Coffee, That's a thing?
                            </p>
                        </div>
                        <div class="containerprod4">
                            <div class="boxprod4">
                                <div class="prod4">
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 4.jpg" alt="Hmmmm Coffee" class="prod4" width="400">
                                </div>
                            </div>
                            <p class="prod4name"><b>Product Name </b><br><br> That's just Art right there</p>
                        </div>
                        <div class="containerprod5">
                            <div class="boxprod5">
                                <div class="prod5">
                                    <img src="Images/CoffeeImage/Hot/HOT COFFEE 5.jpg" alt="Hmmmm Coffee" class="prod5" width="355">
                                </div>
                            </div>
                            <p class="prod5name"><b>Product Name </b><br><br> Creamy, no no not that kind of Cream</p>
                        </div>
                    </div>

                    <!--ICE COFFEELIST -->
                    <div id="icedCoffeeList" style="display:none">
                        <div class="containerprod1">
                            <div class="boxprod1">
                                <div class="prod1">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 1.jpg" alt="Hmmmm Coffee" class="prod1" width="250">
                                </div>
                            </div>
                            <p class="prod1name"><b>Product Name </b><br><br> Very Cold</p>
                        </div>
                        <div class="containerprod2">
                            <div class="boxprod2">
                                <div class="prod2">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 2.jpeg" alt="Hmmmm Coffee" class="prod2" width="250">
                                </div>
                            </div>
                            <p class="prod2name"><b>Product Name </b><br><br> IT'S OUT OF THE SCREEN</p>
                        </div>
                        <div class="containerprod3">
                            <div class="boxprod3">
                                <div class="prod3">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 3.jpeg" alt="Hmmmm Coffee" class="prod3" width="235">
                                </div>
                            </div>
                            <p class="prod3name"><b>Product Name </b><br><br> Looks like a cocktail</p>
                        </div>
                        <div class="containerprod4">
                            <div class="boxprod4">
                                <div class="prod4">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 4.jpeg" alt="Hmmmm Coffee" class="prod4" width="320">
                                </div>
                            </div>
                            <p class="prod4name"><b>Product Name </b><br><br> Refreshing Cold Coffee for the Weather</p>
                        </div>
                        <div class="containerprod5">
                            <div class="boxprod5">
                                <div class="prod5">
                                    <img src="Images/CoffeeImage/Cold/COLD COFFEE 5.jpeg" alt="Hmmmm Coffee" class="prod5" width="235">
                                </div>
                            </div>
                            <p class="prod5name"><b>Product Name </b><br><br> Thai Ice Cream, I mean Ice Coffee</p>
                        </div>
                    </div>

                    <!--COFFEE BAG LIST -->
                    <div id="CBList" style="display:none">
                        <div class="containerprod1">
                            <div class="boxprod1">
                                <div class="prod1">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 1.jpg" alt="Hmmmm Coffee" class="prod1" width="250">
                                </div>
                            </div>
                            <p class="prod1name"><b>Product Name </b><br><br> Xbox live</p>
                        </div>
                        <div class="containerprod2">
                            <div class="boxprod2">
                                <div class="prod2">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 2.jpg" alt="Hmmmm Coffee" class="prod2" width="350">
                                </div>
                            </div>
                            <p class="prod2name"><b>Product Name </b><br><br> Grenade in the Gravy</p>
                        </div>
                        <div class="containerprod3">
                            <div class="boxprod3">
                                <div class="prod3">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 3.jpg" alt="Hmmmm Coffee" class="prod3" width="255">
                                </div>
                            </div>
                            <p class="prod3name"><b>Product Name </b><br><br> Napalm in the Nachos</p>
                        </div>
                        <div class="containerprod4">
                            <div class="boxprod4">
                                <div class="prod4">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 4.jpg" alt="Hmmmm Coffee" class="prod4" width="350">
                                </div>
                            </div>
                            <p class="prod4name"><b>Product Name </b><br><br> Refreshing Cold Coffee for the Weather</p>
                        </div>
                        <div class="containerprod5">
                            <div class="boxprod5">
                                <div class="prod5">
                                    <img src="Images/CoffeeImage/Bag/COFFEE BAG 5.JPG" alt="Hmmmm Coffee" class="prod5" width="235">
                                </div>
                            </div>
                            <p class="prod5name"><b>Product Name </b><br><br> Thai Ice Cream, I mean Ice Coffee</p>
                        </div>
                    </div>

                    <!--BAKED LIST -->
                    <div id="BakedList" style="display:none">
                        <div class="containerprod1">
                            <div class="boxprod1">
                                <div class="prod1">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 1.jpg" alt="Hmmmm Coffee" class="prod1" width="250">
                                </div>
                            </div>
                            <p class="prod1name"><b>Product Name </b><br><br> There's a gun in the grits</p>
                        </div>
                        <div class="containerprod2">
                            <div class="boxprod2">
                                <div class="prod2">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 2.jpg" alt="Hmmmm Coffee" class="prod2" width="350">
                                </div>
                            </div>
                            <p class="prod2name"><b>Product Name </b><br><br> Explosives in the eggs</p>
                        </div>
                        <div class="containerprod3">
                            <div class="boxprod3">
                                <div class="prod3">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 3.jpg" alt="Hmmmm Coffee" class="prod3" width="235">
                                </div>
                            </div>
                            <p class="prod3name"><b>Product Name </b><br><br> Jizzin' in the jelly</p>
                        </div>
                        <div class="containerprod4">
                            <div class="boxprod4">
                                <div class="prod4">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 4.jpg" alt="Hmmmm Coffee" class="prod4" width="300">
                                </div>
                            </div>
                            <p class="prod4name"><b>Product Name </b><br><br> Refreshing Cold Coffee for the Weather</p>
                        </div>
                        <div class="containerprod5">
                            <div class="boxprod5">
                                <div class="prod5">
                                    <img src="Images/CoffeeImage/Flavored/BAKED FLAVORED 5.jpg" alt="Hmmmm Coffee" class="prod5" width="235">
                                </div>
                            </div>
                            <p class="prod5name"><b>Product Name </b><br><br> Thai Ice Cream, I mean Ice Coffee</p>
                        </div>
                    </div>
                </div><!--End of ORDER div -->
            </div><!--End of BOX div -->
        </main>
</body>

</html>