const btntoogle = document.querySelector('.toogle-btn');
const container = document.querySelector('.container');

btntoogle.addEventListener('click', function(){
    document.getElementById('sidebar').classList.toggle('active');
    container.classList.toggle('mover');
});




