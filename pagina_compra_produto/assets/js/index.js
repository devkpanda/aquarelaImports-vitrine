var btn = document.querySelector('#show-hide')
var conteudo = document.querySelector('.product-details')

btn.addEventListener('click', function(){
    if(conteudo.style.display === 'flex' ){
        conteudo.style.display = 'none';
        } else{
            conteudo.style.display = 'flex';
        }
})