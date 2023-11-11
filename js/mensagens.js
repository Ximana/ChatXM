const barra_pesquisa = document.querySelector(".usuarios .pesquisa input");
botao_pesquisa = document.querySelector(".usuarios .pesquisa button");
mensagens = document.querySelector(".chat-historico .mensagens-lista");

botao_pesquisa.onclick = () => {
    barra_pesquisa.classList.toggle("active");
    barra_pesquisa.focus();
    botao_pesquisa.classList.toggle("active");
    barra_pesquisa.value = "";

}

setInterval(() => {
    //iniciar o ajax
    let xhr = new XMLHttpRequest(); //criar objecto XML 
    xhr.open("GET", "../index.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpResquest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                mensagens.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500); // esta funcao vai rodar frequentemente depois de 500s
