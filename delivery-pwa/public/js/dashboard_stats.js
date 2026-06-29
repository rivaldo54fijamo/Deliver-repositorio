fetch("/delivery-pwa/report/stats")
    .then(res => res.json())
    .then(data => {

        new Chart(document.getElementById("graficoPedidos"), {
            type: "bar",
            data: {
                labels: ["Clientes", "Motoristas", "Pedidos", "Entregues"],
                datasets: [{
                    label: "Estatísticas",
                    data: [
                        data.clientes,
                        data.motoristas,
                        data.pedidos,
                        data.entregues
                    ]
                }]
            }
        });

    });