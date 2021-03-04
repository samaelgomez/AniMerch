function authPetition(petitionType, data) {
    return new Promise((resolve, reject) => {
        ajaxPromise("module/auth/controller/authController.php", "POST", {authPetition: petitionType, data: data})
        .then((result)=>{
            if (result) {
                resolve(result);
            } else {
                reject("Petition error");
            }
        })
    })
}

function changeSession(action, data={}) {
    switch (action) {
        case 'login':
            localStorage.setItem('username', data.username);
            localStorage.setItem('userType', data.type);
            localStorage.setItem('userImage', data.image);
            break;

        case 'logout':
            localStorage.removeItem('username');
            localStorage.removeItem('userType');
            localStorage.removeItem('userImage');
            break;
    
        default:
            break;
    }
}