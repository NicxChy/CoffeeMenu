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