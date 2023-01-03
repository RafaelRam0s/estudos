


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



