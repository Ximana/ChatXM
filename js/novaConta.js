const form = document.querySelector(".novaConta form");
btnContinuar = form.querySelector(".button input");

form.onsubmit = (e) =>{
    e.preventDefault();
} 

btnContinuar.onClick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/novaConta.php", true);
    xhr.onload = ()=>{
        
        
    }
    xhr.send();
}