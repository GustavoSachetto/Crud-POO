const button = document.querySelector('#logout');

if (button) {
    button.addEventListener('click', () => {
        window.location.replace(baseUrl+'/view/page/logout.php');
    });
}
