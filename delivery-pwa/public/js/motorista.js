function ficarOnline() {
    fetch("/delivery-pwa/motorista/setOnline")
        .then(res => res.json())
        .then(data => {
            alert("Motorista online");
        });
}

function ficarOffline() {
    fetch("/delivery-pwa/motorista/setOffline")
        .then(res => res.json())
        .then(data => {
            alert("Motorista offline");
        });
}

// buscar pedidos automaticamente
function carregarPedidos() {
    fetch("/delivery-pwa/pedidomotorista/disponiveis")
        .then(res => res.json())
        .then(pedidos => {

            console.log("Pedidos disponíveis:", pedidos);

            // aqui depois vamos criar UI real
        });
}

// aceitar pedido
function aceitarPedido(id) {

    fetch("/delivery-pwa/pedidomotorista/aceitar", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "pedido_id=" + id
    })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            carregarPedidos();
        });
}

// atualizar pedidos a cada 5 segundos
setInterval(carregarPedidos, 5000);

carregarPedidos();