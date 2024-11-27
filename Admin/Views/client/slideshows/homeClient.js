document.getElementById('next').onclick = function(){
    // alert('qqq');
    let list = document.querySelectorAll('.product_one');
    document.getElementById('box-product').appendChild(list[0]);
    
}
document.getElementById('next2').onclick = function(){
    // alert('qqq');
    let list = document.querySelectorAll('.product_one');
    document.getElementById('box-product').prepend(list[list.length - 1]);
}
