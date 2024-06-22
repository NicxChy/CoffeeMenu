

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


function showOrder(product, name, desc) {
  //Display Order System
  var y = document.getElementById("OrderUp");
  y.style.display = "block";
  //For Image
  var x = document.getElementById(product);
  document.getElementById("orderImage").src = x.src;
  //For Title and Description

  var Title = document.getElementById(name).innerHTML;
  var Description = document.getElementById(desc).innerHTML;

  document.getElementById("orderTitle").innerHTML = Title;
  document.getElementById("orderDescription").innerHTML = Description;
}



function closeOrder() {
  var y = document.getElementById("OrderUp");
  y.style.display = "none";
}