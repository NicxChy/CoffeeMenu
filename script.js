var images_array = ['Images/Coffee Top View.png','Images/CoffeeMain.png','Images/Coffee Top View 2.png'];
        function getRandomImage()
        {
          random_index = Math.floor(Math.random() * images_array.length);
          selected_image = images_array[random_index];
          document.getElementById('image_shower').src=selected_image;
        }


function showHot(){
    var y = document.getElementById("icedCoffeeList");
    var x = document.getElementById("hotCoffeeList");
    var z = document.getElementById("CBList");
    var w = document.getElementById("BakedList");
    y.style.display = "none";
    x.style.display = "block";
    z.style.display = "none";
    w.style.display = "none";
}

function showIced(){
    var y = document.getElementById("icedCoffeeList");
    var x = document.getElementById("hotCoffeeList");
    var z = document.getElementById("CBList");
    var w = document.getElementById("BakedList");
    y.style.display = "block";
    x.style.display = "none";
    z.style.display = "none";
    w.style.display = "none";
}

function showCB(){
    var y = document.getElementById("icedCoffeeList");
    var x = document.getElementById("hotCoffeeList");
    var z = document.getElementById("CBList");
    var w = document.getElementById("BakedList");
    y.style.display = "none";
    x.style.display = "none";
    z.style.display = "block";
    w.style.display = "none";
}

function showBaked(){
    var y = document.getElementById("icedCoffeeList");
    var x = document.getElementById("hotCoffeeList");
    var z = document.getElementById("CBList");
    var w = document.getElementById("BakedList");
    y.style.display = "none";
    x.style.display = "none";
    z.style.display = "none";
    w.style.display = "block";
}