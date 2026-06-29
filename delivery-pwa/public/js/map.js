let map;
let origem;
let destino;
let routeLine;

// Inicializar mapa
function initMap() {

    map = L.map('map').setView([-25.9653, 32.5892], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'OpenStreetMap'
    }).addTo(map);

    // GPS origem
    navigator.geolocation.getCurrentPosition(function (position) {

        origem = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };

        L.marker([origem.lat, origem.lng]).addTo(map)
            .bindPopup("Sua localização")
            .openPopup();

        map.setView([origem.lat, origem.lng], 14);
    });

    // clicar no mapa = destino
    map.on('click', function (e) {

        destino = {
            lat: e.latlng.lat,
            lng: e.latlng.lng
        };

        L.marker([destino.lat, destino.lng]).addTo(map)
            .bindPopup("Destino selecionado")
            .openPopup();

        calcular();
    });
}

// cálculo simples (distância Haversine)
function calcular() {

    if (!origem || !destino) return;

    const R = 6371;

    const dLat = (destino.lat - origem.lat) * Math.PI / 180;
    const dLng = (destino.lng - origem.lng) * Math.PI / 180;

    const a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(origem.lat * Math.PI / 180) *
        Math.cos(destino.lat * Math.PI / 180) *
        Math.sin(dLng / 2) * Math.sin(dLng / 2);

    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    const distancia = R * c;

    const preco = distancia * 35;

    document.getElementById("distancia").innerText = distancia.toFixed(2);
    document.getElementById("preco").innerText = preco.toFixed(2);
}

// confirmar pedido 
function confirmarPedido() {

    if (!origem || !destino) {
        alert("Selecione destino primeiro");
        return;
    }

    let R = 6371;

    let dLat = (destino.lat - origem.lat) * Math.PI / 180;
    let dLng = (destino.lng - origem.lng) * Math.PI / 180;

    let a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(origem.lat * Math.PI / 180) *
        Math.cos(destino.lat * Math.PI / 180) *
        Math.sin(dLng / 2) * Math.sin(dLng / 2);

    let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    let distancia = R * c;
    let valor = distancia * 35;

    enviarPedido(origem, destino, distancia.toFixed(2), valor.toFixed(2));
}

initMap();