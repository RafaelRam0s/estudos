

(function configurarPaginaNoPreloader() {
    if (document.querySelectorAll('div#preloader')[0] != undefined){
        document.addEventListener(
            'load',
            function() {
                setTimeout(() => {
                    document.querySelectorAll('div#corpo')[0].style.display = 'block';
                    document.querySelectorAll('div#preloader')[0].style.opacity = 0;
                }, 500);
            },
            true
        );
    }
})();

(function configurarMenuDeLinks() {
                
    for(
        let contador = 0; 
        document.querySelectorAll('#_menu_links ul li.aba_de_categorias')[contador] != undefined; 
        contador++
    ) 
    {
        document.querySelectorAll('#_menu_links ul li.aba_de_categorias')[contador].addEventListener(
            'click',
            function () {
                if (this.querySelectorAll('ul')[0].style.display == 'none' || this.querySelectorAll('ul')[0].style.display == '')
                {
                    this.querySelectorAll('ul')[0].style.display = 'block';
                    setTimeout(() => {this.querySelectorAll('ul')[0].style.maxHeight = 'none';}, 50);
                } else {
                    this.querySelectorAll('ul')[0].style.maxHeight = '0vh';
                setTimeout(() => {this.querySelectorAll('ul')[0].style.display = 'none';}, 50);
                }
            },
            true
        );
    }

})();

(function configurarAnimacaoDoHeader() {
    window.addEventListener(
        'scroll',
        function() {
            if (window.scrollY >= 1)
            {
                document.querySelectorAll('header#cabecalho > div')[0].style.padding = '1px 15px 1px 15px';
            } else if (window.scrollY < 1) {
                document.querySelectorAll('header#cabecalho > div')[0].style.padding = '10px 15px 10px 15px';
            }
        },
        true
    );
})();

