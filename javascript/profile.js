function showProfile() {
    
    var x = document.getElementById("showLogin");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }

}

function toggleProfile() {
    var showLogin = document.getElementById('showLogin');
    if (showLogin.style.display === 'none' || showLogin.style.display === '') {
        showLogin.style.display = 'block';
    } else {
        showLogin.style.display = 'none';
    }
}