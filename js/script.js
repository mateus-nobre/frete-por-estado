// Aqui nada mais faço que importar o mapa e me retornar em console dados de mapa "Descrição" e "UF"


BrMap.Draw({
    wrapper: '#br_mine',
    callbacks: {
        click: (element, uf) => {
            console.log(element.querySelector('desc').textContent);
            console.log(uf);
        
        },
    }
});
