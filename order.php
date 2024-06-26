<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/order.css">
    <script src="javascript/script.js"></script>
    <script src="javascript/profile.js"></script>
    <script src="javascript/order.js"></script>
</head>

<body>
    <main>
        <div id="OrderUp" class="orderBox" style="display:block">
            <div>
                <div>
                    <img class="backButton" src="Images/Icons/BackButton.svg" onclick="closeOrder()" alt="Hmmmm Coffee"
                        width="50" height="50" style="cursor: pointer;">
                </div>
                <input id="inputQuant" class="inputQuantity" type="number" placeholder="Quantity" value="0"></input>
                <button id="addAmount" class="addButton" onclick="increment()">+</button>
                <button id="minusAmount" class="minusButton" onclick="decrement()">-</button>
                
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
                <input id="Size" class="dropbtn" type="text" readonly placeholder="Size" style="cursor:default"></input>
                <div class="dropdown-content">
                    <a onclick="Size(1)" style="cursor: pointer;">Small</a>
                    <a onclick="Size(2)" style="cursor: pointer;">Medium</a>
                    <a onclick="Size(3)" style="cursor: pointer;">Large</a>
                </div>
            </div>

            <div class="BorderLine"> </div>

            <div class="OrderProduct">
                <img src="Images/CoffeeImage/Hot/HOT COFFEE 1 .jpg" alt="Hmmmm Coffee" class="OrderProduct" width="400"
                    height="400">
            </div>

            <p id="orderTitle" class="ProductOrderName"></p>
            <div class="ProductOrderDesc ellipsis">
                <span id="orderDescription" class="ProductOrderDesc-concat">
                
                </span>
            </div>
            <button id="addCart" class="addToCart">Add To Cart</input>

        </div>
    </main>
</body>

</html>