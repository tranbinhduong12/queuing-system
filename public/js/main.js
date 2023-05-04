document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.fa-solid.fa-bell').addEventListener('click', function() {
        document.querySelector('.pop-up-alert').classList.toggle('active-alert');
    });
    // Khi ấn vào khu vực khác thì ẩn đi
    document.addEventListener('click', function(e) {
        if (e.target.closest('.bell-alert') == null) {
            document.querySelector('.pop-up-alert').classList.remove('active-alert');
        }
    });
});

function submit(){
    document.getElementById('btn-submit').click();
}