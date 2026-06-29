let map;
let marker;

function iniciarMapaCliente() {

    map = L.map('map').setView([-25.9653, 32.5892], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'OpenStreetMap'
    }).addTo(map);

    setInterval(atualizarMotorista, 5000);
}

function atualizarMotorista() {

    let pedido_id = document.getElementById("pedido_id").value;

    fetch("/delivery-pwa/tracking/get?pedido_id=" + pedido_id)
        .then(res => res.json())
        .then(data => {

            if (!data) return;

            let lat = data.lat;
            let lng = data.lng;

            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker([lat, lng]).addTo(map)
                .bindPopup("Motorista em rota")
                .openPopup();

            map.setView([lat, lng], 15);
        });
}

iniciarMapaCliente();