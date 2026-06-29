let pedido_id = null;

// inicia tracking
function iniciarTracking(id) {
    pedido_id = id;

    setInterval(enviarLocalizacao, 5000);
}

// envia GPS para backend
function enviarLocalizacao() {

    if (!pedido_id) return;

    navigator.geolocation.getCurrentPosition(function (position) {

        fetch("/delivery-pwa/tracking/update", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `
                pedido_id=${pedido_id}&
                lat=${position.coords.latitude}&
                lng=${position.coords.longitude}
            `
        });
    });
}