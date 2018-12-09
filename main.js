var li = document.querySelectorAll('.effect ul img');
var ul = document.querySelector('.effect ul');
var show = document.querySelector('.shows');




for (var i = 0; i < li.length; i++) {
    li[i].addEventListener('click', showImg);
}


function showImg() {
    document.querySelector('.close1').addEventListener('click', close);
    show.childNodes[1].src = this.src;
    show.style.visibility = "visible";
    show.style.opacity = "1";
}
 function close() {
        console.log('diział');
        show.style.visibility = "hidden";
        show.style.opacity = "0";
    }


