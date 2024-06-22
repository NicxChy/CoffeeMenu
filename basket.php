<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/basket.css">
    <script src="javascript/cart.js"></script>

</head>

<body>
    <main>
        <div id="OrderUp" class="orderBox" style="display:block">
            <nav class="navbar">
                <ul>
                    <li> <a href="index.php">
                            <img class="backButton" src="Images/Icons/BackButton.svg" alt="Hmmmm Coffee" width="50"
                                height="50">
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <img class="favorite" src="Images/Icons/HeartIcon.png" alt="Hmmmm Coffee" width="50"
                                height="50">
                        </a>
                    </li>
                </ul>
            </nav>


            <div class="container">
                <div id="scrollArea" class="scroll" style="overflow-y:scroll; overflow-x:hidden; height:630px;">
                    <ul>
                        <div class="box">
                            
                            <img class="cancelButton" src="Images/Icons/CancelButton.png" alt="Hmmmm Coffee" width="50"
                                height="50">
                            <div class="BasketProduct">
                                <img src="Images/CoffeeImage/Hot/HOT COFFEE 3.jpg" alt="Hmmmm Coffee"
                                    class="OrderProduct" width="300" height="250">
                            </div>
                            
                            <div class="centerText">
                                <p>Kopiko</p>
                            </div>
                            <div class="amountNumber"><p id="amountQuant" >0</p0></div>
                            <button id="addAmount" class="addButton" onclick="incrementAmount()">+</button>
                            <button id="minusAmount" class="minusButton" onclick="decrementAmount()">-</button>
                            <div class="amountNumber2"><p >₱99</p0></div>
                        </div>


                        <div class="box">
                            
                            <img class="cancelButton" src="Images/Icons/CancelButton.png" alt="Hmmmm Coffee" width="50"
                                height="50">
                            <div class="BasketProduct">
                                <img src="Images/CoffeeImage/Hot/HOT COFFEE 1 .jpg" alt="Hmmmm Coffee"
                                    class="OrderProduct" width="300" height="250">
                            </div>
                            
                            <div class="centerText">
                                <p>Kopiko</p>
                            </div>
                            <div class="amountNumber"><p id="amountQuant" >0</p0></div>
                            <button id="addAmount" class="addButton" onclick="incrementAmount()">+</button>
                            <button id="minusAmount" class="minusButton" onclick="decrementAmount()">-</button>
                            <div class="amountNumber2"><p >₱129</p0></div>
        
                        </div>

                    </ul>
                </div>
            </div>


        </div>

    </main>
</body>

</html>