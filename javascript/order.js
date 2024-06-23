

function increment() {
  const input = document.getElementById("inputQuant");
  input.value = Number(input.value) + 1;
}
function decrement() {
  const input2 = document.getElementById("inputQuant");
  if (Number(input2.value) > 0) {
    input2.value = Number(input2.value) - 1;
  }
}

function Size(Size) {
  if (Size == 1) {
    const input = document.getElementById("Size");
    input.value = "Small";
  }
  if (Size == 2) {
    const input = document.getElementById("Size");
    input.value = "Medium";
  }
  if (Size == 3) {
    const input = document.getElementById("Size");
    input.value = "Large";
  }
}

function Sugar(Sugar) {
  if (Sugar == 1) {
    const input = document.getElementById("Sugar");
    input.value = "0%";
  }
  if (Sugar == 2) {
    const input = document.getElementById("Sugar");
    input.value = "25%";
  }
  if (Sugar == 3) {
    const input = document.getElementById("Sugar");
    input.value = "50%";
  }
  if (Sugar == 4) {
    const input = document.getElementById("Sugar");
    input.value = "75%";
  }
  if (Sugar == 5) {
    const input = document.getElementById("Sugar");
    input.value = "100%";
  }
}


function Milk(Milk) {
  if (Milk == 1) {
    const input = document.getElementById("Milk");
    input.value = "Fresh";
  }
  if (Milk == 2) {
    const input = document.getElementById("Milk");
    input.value = "Fortified";
  }
  if (Milk == 3) {
    const input = document.getElementById("Milk");
    input.value = "Fertilized";
  }

}


function showOrder(product, name, desc, price) {
  //Display Order System
  var y = document.getElementById("OrderUp");
  y.style.display = "block";
  //For Image
  var x = document.getElementById(product);
  document.getElementById("orderImage").src = x.src;
  //For Title and Description

  var Title = document.getElementById(name).innerHTML;
  var Description = document.getElementById(desc).innerHTML;
  var Price = document.getElementById(price).innerHTML;

  document.getElementById("orderTitle").innerHTML = Title;
  document.getElementById("orderDescription").innerHTML = Description;
  document.getElementById("OrderPrice").innerHTML = Price;
}



function closeOrder() {
  var y = document.getElementById("OrderUp");
  y.style.display = "none";
}




function moveOrder() {
  const input2 = document.getElementById("inputQuant");
  let num = localStorage.getItem('number');
  if (Number(input2.value) > 0 && num == 0) {
    // Get the element to move
    var orderImage = document.getElementById('orderImage').src;
    var orderTitle = document.getElementById('orderTitle').innerHTML;
    var orderAmount = document.getElementById('inputQuant').value;
    // Store the element's HTML in localStorage
    localStorage.setItem('elementHTML', orderImage);
    localStorage.setItem('elementHTML2', orderTitle);
    localStorage.setItem('elementHTML3', orderAmount);
    localStorage.removeItem('number');
    // Optionally, navigate to the second page
    window.location.href = 'basket.php';
    
  } else if(Number(input2.value) > 0 && num == 1){
    // Get the element to move
    var orderImage2 = document.getElementById('orderImage').src;
    var orderTitle2 = document.getElementById('orderTitle').innerHTML;
    var orderAmount2 = document.getElementById('inputQuant').value;
    // Store the element's HTML in localStorage
    localStorage.setItem('elementHTML4', orderImage2);
    localStorage.setItem('elementHTML5', orderTitle2);
    localStorage.setItem('elementHTML6', orderAmount2);
    // Optionally, navigate to the second page
    window.location.href = 'basket.php';
  } 
  else {
    alert("You can't Order Nothing");
  }

}

function retrieveOrder() {
  // Get the stored element's HTML from localStorage
  var Image = localStorage.getItem('elementHTML');
  var Title = localStorage.getItem('elementHTML2');
  var Amount = localStorage.getItem('elementHTML3');
  
  var Image2 = localStorage.getItem('elementHTML4');
  var Title2 = localStorage.getItem('elementHTML5');
  var Amount2 = localStorage.getItem('elementHTML6');

  var Image3 = localStorage.getItem('elementHTML7');
  var Title3 = localStorage.getItem('elementHTML8');
  var Amount3 = localStorage.getItem('elementHTML9');
  
  if (localStorage.getItem('number') == 0){
    localStorage.setItem('number', 1);
  } else {
    localStorage.setItem('number', 0);
  }
  // If there is stored HTML, insert it into the target div

    if (Image) {
      const ele = document.getElementById('cartBox');
      const newDiv = document.createElement('div');
      newDiv.innerHTML +=
        ` <div class="box" id="order0">
                            <img class="cancelButton" src="Images/Icons/CancelButton.png" onclick="DeleteOrder('order0')" alt="Hmmmm Coffee" width="50"
                                height="50">
                            <div class="BasketProduct">
                                <img src=` + Image + ` alt="Hmmmm Coffee"
                                    class="OrderProduct" width="300" height="250">
                            </div>
                            
                            <div class="centerText">
                                <p>`+ Title + `</p>
                            </div>
                            <div class="amountNumber"><p id="amountQuant" >`+ Amount + `</p0></div>
                            <button id="addAmount" class="addButton" onclick="incrementAmount()">+</button>
                            <button id="minusAmount" class="minusButton" onclick="decrementAmount()">-</button>
                            <div class="amountNumber2"><p>  </p0></div>
                        </div>
    `;
      ele.appendChild(newDiv);
    } if (Image2){
      const ele = document.getElementById('cartBox');
      const newDiv = document.createElement('div');
      newDiv.innerHTML +=
        ` <div class="box" id="order1">
                            <img class="cancelButton" src="Images/Icons/CancelButton.png" onclick="DeleteOrder('order1')" alt="Hmmmm Coffee" width="50"
                                height="50">
                            <div class="BasketProduct">
                                <img src=` + Image2 + ` alt="Hmmmm Coffee"
                                    class="OrderProduct" width="300" height="250">
                            </div>
                            
                            <div class="centerText">
                                <p>`+ Title2 + `</p>
                            </div>
                            <div class="amountNumber"><p id="amountQuant1" >`+ Amount2 + `</p0></div>
                            <button id="addAmount" class="addButton" onclick="incrementAmount1()">+</button>
                            <button id="minusAmount" class="minusButton" onclick="decrementAmount1()">-</button>
                            <div class="amountNumber2"><p>  </p0></div>
                        </div>
    `;
      ele.appendChild(newDiv);
    }
  }

  function DeleteOrder(order){
    const ele = document.getElementById(order);
    ele.remove();
    if(order == 'order0'){
        localStorage.removeItem('elementHTML');
        localStorage.removeItem('elementHTML2');
        localStorage.removeItem('elementHTML3');
        localStorage.setItem('number', 0);
    } else if (order == 'order1'){
      localStorage.removeItem('elementHTML4');
      localStorage.removeItem('elementHTML5');
      localStorage.removeItem('elementHTML6');
      localStorage.setItem('number', 1);
  } 

    
  }