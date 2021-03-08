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
    location.replace('?page=home');
}

function login(formData) {
    authPetition('login', formData)
    .then(result => {
        console.log(result);
        changeSession('login', {username: result[1].username, type: result[0], image: result[1].avatar})
    })
    .catch((e) => {
        console.log(e);
    });
}

function register(formData) {
    console.log(formData);
    authPetition('register', formData)
    .then(result => {
        console.log(result);
        changeSession('login', {username: result[1][1], type: result[0], image: result[1][3]})
    })
    .catch((e) => {
        console.log(e);
    });
}

function printHeaderAuthButton() {
    return new Promise(resolve => {
        if(localStorage.getItem('username')) {
            resolve('<li class="nav-item" id="logoutButton"><a class="nav-link">Logout</a></li>');
        } else {
            resolve('<li class="nav-item"><a class="nav-link" href="/?page=login">Login</a></li>');
        }
    })
}