function incrementAmount() {
    let d = parseInt(document.getElementById("amountQuant").innerHTML);
    document.getElementById("amountQuant").innerHTML = d + 1;
}
function decrementAmount() {
    let d = parseInt(document.getElementById("amountQuant").innerHTML);
    if (d > 0) {
        document.getElementById("amountQuant").innerHTML = d - 1;
    }
}

function incrementAmount1() {
    let d = parseInt(document.getElementById("amountQuant1").innerHTML);
    document.getElementById("amountQuant1").innerHTML = d + 1;
}
function decrementAmount1() {
    let d = parseInt(document.getElementById("amountQuant1").innerHTML);
    if (d > 0) {
        document.getElementById("amountQuant1").innerHTML = d - 1;
    }
}

function incrementAmount2() {
    let d = parseInt(document.getElementById("amountQuant2").innerHTML);
    document.getElementById("amountQuant2").innerHTML = d + 1;
}
function decrementAmount2() {
    let d = parseInt(document.getElementById("amountQuant2").innerHTML);
    if (d > 0) {
        document.getElementById("amountQuant2").innerHTML = d - 1;
    }
}


