function enviarPedido(origem, destino, distancia, valor) {

    let telefone = prompt("Número de telefone do destinatário:");

    fetch("/delivery-pwa/pedido/store", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `
            origem_lat=${origem.lat}&
            origem_lng=${origem.lng}&
            destino_lat=${destino.lat}&
            destino_lng=${destino.lng}&
            distancia=${distancia}&
            valor=${valor}&
            telefone=${telefone}
        `
    })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            location.reload();
        });
}