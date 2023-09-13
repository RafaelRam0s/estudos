

window.onload = () => {
    let ev = '';
    let allEvents = [];

    // Busca todos os eventos disponiveis no navegador
    for (ev in window) {
        if (/^on/.test(ev)) 
        {
            // Adiciona cada evento disponivel
            window.addEventListener(
                '' + ev.replace('on', ''), 
                function(event) {
                    console.log('Event: ', event.type);
                }, 
                false
            );
        }
    }
}

