const button = document.querySelector('#logout');

if (button) {
    button.addEventListener('click', () => {
        console.log(baseUrl+'/view/page/logout.php');
        
        window.location.replace(baseUrl+'/view/page/logout.php');
    });
}
