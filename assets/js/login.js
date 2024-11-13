const signUp = document.querySelector("#signUp");
const signIn = document.querySelector("#signIn");
const changeForm =document.querySelector("#change") ;
const passwordIcon = document.querySelectorAll('.password__icon')
const authPassword = document.querySelectorAll('.auth__password')

// when click sign up button
signUp.addEventListener('click', () => {
    document.querySelector('.login__form').classList.remove('active')
    document.querySelector('.register__form').classList.add('active')
    document.querySelector('.ball').classList.add('register')
    document.querySelector('.ball').classList.remove('login')
});

changeForm.addEventListener('click', () => {
    document.querySelector('.login__form').classList.remove('active')
    document.querySelector('.register__form').classList.add('active')
    document.querySelector('.ball').classList.add('register')
    document.querySelector('.ball').classList.remove('login')
});

// when click sign in button
signIn.addEventListener('click', () => {
    document.querySelector('.login__form').classList.add('active')
    document.querySelector('.register__form').classList.remove('active')
    document.querySelector('.ball').classList.add('login')
    document.querySelector('.ball').classList.remove('register')
});

// change hidden password to visible password
for (var i = 0; i < passwordIcon.length; ++i) {
    passwordIcon[i].addEventListener('click', (i) => {
        const lastArray = i.target.classList.length - 1
        if (i.target.classList[lastArray] == 'bi-eye-slash') {
            i.target.classList.remove('bi-eye-slash')
            i.target.classList.add('bi-eye')
            i.currentTarget.parentNode.querySelector('input').type = 'text'
        } else {
            i.target.classList.add('bi-eye-slash')
            i.target.classList.remove('bi-eye')
            i.currentTarget.parentNode.querySelector('input').type = 'password'
        }
    });
}

function validatePassword(password) {
    // Minimum 8 characters, maximum 12 characters, at least one letter, one number, and one uppercase letter, no special characters
    const re = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,12}$/;
    return re.test(password);
}

function validateRegister() {
    const password = document.getElementById('registerPassword').value;

    if (!validatePassword(password)) {
        alert('Password must be 8-12 characters long, contain at least one uppercase letter, and one number, and no special characters.');
        return false;
    }

    // other validation checks...

    return true;
}

function validateLogin() {
    const password = document.getElementById('loginPassword').value;

    if (!validatePassword(password)) {
        alert('Password must be 8-12 characters long, contain at least one uppercase letter, and one number, and no special characters.');
        return false;
    }

    // other validation checks...

    return true;
}