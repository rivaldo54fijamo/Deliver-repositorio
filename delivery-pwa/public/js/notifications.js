function checkNotifications() {

    fetch("/delivery-pwa/api/notificacoes")
        .then(res => res.json())
        .then(data => {

            data.forEach(n => {
                alert(n.mensagem);
            });

        });

}

setInterval(checkNotifications, 5000);