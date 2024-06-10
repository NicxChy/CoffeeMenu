function increment() {
    const input = document.getElementById("inputQuant");
    input.value = Number(input.value) + 1;
  }
  function decrement() {
    const input = document.getElementById("inputQuant");
    input.value = Number(input.value) - 1;
  }

function showOrder(){
    var y = document.getElementById("OrderUp");
    y.style.display = "block";
}