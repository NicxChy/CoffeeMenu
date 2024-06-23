<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/basket.css">
    <script src="javascript/order.js"></script>
    <script src="javascript/cart.js"></script>
</head>


<script>

    window.onload = function () {
        const params = new URLSearchParams(window.location.search);
        retrieveOrder();
        var x;
        if (params.get('MenuBack') === 'menuPage') {
            var x = "menu.php";
        } else if (params.get('MenuBack') === 'mainPage'){
            var x = "index.php";
        } else if (params.get('MenuBack') === 'coffeePage'){
            var x = "coffee.php";
        } else {
            var x = "coffee.php";
        }
            const ele = document.getElementById('BackButton');
            const remo = document.getElementById('Remove');
            const newDiv = document.createElement('div');
            newDiv.innerHTML =
                `<a href="` + x + `">
                        <img class="backButton" src="Images/Icons/BackButton.svg" alt="Hmmmm Coffee" width="50"
                        height="50">
                      </a> `;

            ele.appendChild(newDiv);
            remo.remove();
        
            
    };
</script>

<body>
    <main>
        <div id="OrderUp" class="orderBox" style="display:block">
            <nav class="navbar">
                <ul>
                    <li id="BackButton">
                    <a href="index.php" id="Remove">
                        <img class="backButton" src="Images/Icons/BackButton.svg" alt="Hmmmm Coffee" width="50"
                        height="50">
                      </a> 
                    </li>
                    <li>

                        <!-- <img class="favorite" src="Images/Icons/HeartIcon.png" alt="Hmmmm Coffee" onclick="ToCart()"
                            width="50" height="50"> -->

                    </li>
                </ul>
            </nav>


            <div class="container">
                <div id="scrollArea" class="scroll" style="overflow-y:scroll; overflow-x:hidden; height:630px;">
                    <ul id="cartBox">



                       


                    </ul>
                </div>
            </div>


        </div>

    </main>
</body>

</html>