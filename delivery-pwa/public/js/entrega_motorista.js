
// confirmar recolha
function confirmarRecolha(pedido_id) {

    fetch("/delivery-pwa/entrega/recolher", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "pedido_id=" + pedido_id
    })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
        });
}

// confirmar entrega
function confirmarEntrega(pedido_id) {

    fetch("/delivery-pwa/entrega/entregar", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "pedido_id=" + pedido_id
    })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
        });
}