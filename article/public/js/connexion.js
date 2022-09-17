const displayForm = _('displayForm');
const forLogin = _('forLogin');
const formLogin = _('formLogin');
const forRegister = _('forRegister');
const formRegister = _('formRegister');
const formContainer = _('formContainer');

displayForm.addEventListener('click', showForm);

forRegister.addEventListener('click', () => {
    forLogin.classList.remove('active');
    forRegister.classList.add('active');

    if (formRegister.classList.contains('toggleForm')) {
        formContainer.style.transform = 'translate(-100%)';
        formContainer.style.transition = 'transform 0.5s';
        formRegister.classList.remove('toggleForm');
        formLogin.classList.add('toggleForm');
    }

})



forLogin.addEventListener('click', () => {
    forLogin.classList.add('active');
    forRegister.classList.remove('active');

    if (formLogin.classList.contains('toggleForm')) {
        formContainer.style.transform = 'translate(0%)';
        formContainer.style.transition = 'transform 0.5s';
        formRegister.classList.add('toggleForm');
        formLogin.classList.remove('toggleForm');
    }

})

function _(e) {
    return document.getElementById(e);
}

function showForm() {
    document.querySelector('.form-wrapper .card').classList.toggle('show');
}
