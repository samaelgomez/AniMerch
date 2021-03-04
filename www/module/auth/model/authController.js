function getFormElements() {
    // return ["register", ["client", ['test@gmail.com', 'pepe', 'xd', 'ruta/imagen', '69420']]];
    return ['login', ['client', ['pepe', 'xd']]];
}

window.onload = () =>{
    document.getElementById("registerButton").addEventListener("click",()=>{
        formResults = getFormElements();
        authPetition(formResults[0], formResults[1])
        .then(result => {
            console.log(result);
            changeSession('login', {username: result[1][1][1], type: result[1][0], image: result[1][1][3]})
        })
        .catch((e) => {
            console.log(e);
        });
    })

    document.getElementById("loginButton").addEventListener("click",()=>{
        formResults = getFormElements();
        authPetition(formResults[0], formResults[1])
        .then(result => {
            console.log(result);
            changeSession('login', {username: result[1][0].username, type: result[0], image: result[1][0].avatar})
        })
        .catch((e) => {
            console.log(e);
        });
    })

    document.getElementById("logoutButton").addEventListener("click",()=>{
        changeSession('logout');
    })
}