window.onload = function () {
    image = document.getElementById("thumbnails").getElementsByTagName("img");
    bigImage = document.getElementById("featured").getElementsByTagName("img")[0];
    caption = document.getElementsByTagName("figcaption")[0];

    function click() {
        image[0].onclick = function (){
            bigImage.src = "images/medium/5855774224.jpg";
            bigImage.title = "Battle";
            caption.innerText = bigImage.title;
        }
        image[1].onclick = function (){
            bigImage.src = "images/medium/5856697109.jpg";
            bigImage.title = "Luneburg";
            caption.innerText = bigImage.title;

        }
        image[2].onclick = function (){
            bigImage.src = "images/medium/6119130918.jpg";
            bigImage.title = "Bermuda";
            caption.innerText = bigImage.title;
        }
        image[3].onclick = function (){
            bigImage.src = "images/medium/8711645510.jpg";
            bigImage.title = "Athens";
            caption.innerText = bigImage.title;
        }
        image[4].onclick = function (){
            bigImage.src = "images/medium/9504449928.jpg";
            bigImage.title = "Florence";
            caption.innerText = bigImage.title;
        }
    }

    function hover() {
        caption.style.transition = "opacity,1s";
        bigImage.onmouseover = function () {
            caption.style.opacity = 0.8;
        }
        bigImage.onmouseout = function () {
            caption.style.opacity = 0;
        }
    }
    click();
    hover();
}