function selected_article(id, img) {
    let articles=document.getElementsByTagName("article");
    let product=document.getElementById(`product_${id}`);

    for(let i=0; i<articles.length; i++) {
        articles[i].style.border="solid black 2px";
    }

    product.style.border="solid white 2px";
    document.getElementById("selected_product").style.display="flex";
    selected_product.firstElementChild.src = img;
    document.getElementById("button").style.display="flex";
    button.firstElementChild.value = id;
}