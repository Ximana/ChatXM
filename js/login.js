const form = document.querySelector(".login form");
btn_continuar =  form.querySelector(".loginForm input");
texto_erro =  form.querySelector(".text-erro");

form.onsubmit = (e)=>{
    e.preventDefault();
    
}

btn_contnuar.onclick = ()=>{
    
    let xhr = new XMLHttpRequest(); //criar objecto XML 
    xhr.open("POST", "include/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpResquest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") {
                    location.href = "index.php";
                }
                else {
                    texto_erro.textContent = data;
                    texto_erro.style.dysplay = "block";
                }

            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData); 
}

