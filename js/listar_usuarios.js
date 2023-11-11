const barra_pesquisa = document.querySelector(".usuarios .pesquisa input");
botao_pesquisa =  document.querySelector(".usuarios .pesquisa button");
lista_usuarios =  document.querySelector(".usuarios .usuarios-lista");

botao_pesquisa.onclick = ()=>{
    barra_pesquisa.classList.toggle("active");
    barra_pesquisa.focus();
    botao_pesquisa.classList.toggle("active");
    barra_pesquisa.value = "";
    
}

barra_pesquisa.onkeyup = ()=>{
    let searchTerm = barra_pesquisa.value;
    if (searchTerm != "") {
        barra_pesquisa.classList.add("active");
    }else{
        barra_pesquisa.classList.remove("active");
    }
    //iniciar o ajax
    let xhr = new XMLHttpRequest(); //criar objecto XML 
    xhr.open("POST", "../pesquisar_usuarios.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpResquest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                lista_usuarios.innerHTML = data;
            }
        }
    }
    xhr.seRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm" + searchTerm); 
}




setInterval(()=>{
    //iniciar o ajax
    let xhr = new XMLHttpRequest(); //criar objecto XML 
    xhr.open("GET", "../index.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpResquest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if (!barra_pesquisa.classList.contains("active")) {
                    lista_usuarios.innerHTML = data;
                }
            }
        }
    }
    xhr.send(); 
}, 500); // esta funcao vai rodar frequentemente depois de 500s
