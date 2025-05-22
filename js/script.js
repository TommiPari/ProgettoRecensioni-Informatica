function confermaLogout() {
    document.getElementById("confermaLogout").classList.remove("d-none");
    document.getElementById("background").classList.add("opacity-50");
}

function chiudiLogout() {
    document.getElementById("confermaLogout").classList.add("d-none");
    document.getElementById("background").classList.remove("opacity-50");
}

var map = L.map('map').setView([43.7576688433964, 11.18602647629901], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

function impostaMarker(lat, lon) {
    var marker = L.marker([lat, lon]).addTo(map);
}