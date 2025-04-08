function confermaLogout() {
    document.getElementById("confermaLogout").classList.remove("d-none");
    document.getElementById("background").classList.add("opacity-50");
}

function chiudiLogout() {
    document.getElementById("confermaLogout").classList.add("d-none");
    document.getElementById("background").classList.remove("opacity-50");
}