const barra_pesquisa = document.querySelector(".usuarios .pesquisa input");
botao_pesquisa =  document.querySelector(".usuarios .pesquisa button");
lista_usuarios =  document.querySelector(".usuarios .usuarios-lista");

botao_pesquisa.onclick = ()=>{
    botao_pesquisa.classList.toggle(active);
    botao_pesquisa.focus();
    botao_pesquisa.classList.toggle(active);
}

setInterval(()=>{
    //iniciar o ajax
    let xhr = new XMLHttpRequest(); //criar objecto XML 
    xhr.open("GET", "./usuariosLogados.php", true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpResquest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                lista_usuarios.innerHTML = data;
            }
        }
    }
    xhr.send(); 
}, 500); // esta funcao vai rodar frequentemente depois de 500s
