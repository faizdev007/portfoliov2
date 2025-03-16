import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


document.addEventListener('DOMContentLoaded', function() {
    var menuBtn = document.querySelector('#menubtn');
    if(menuBtn){
        menuBtn.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    
        document.getElementById('windomenubtn').addEventListener('click', function() {
            let spans = document.querySelectorAll('nav a span');
    
            spans.forEach(span => {
                span.classList.toggle('hidden');
            });
        });
    }
});