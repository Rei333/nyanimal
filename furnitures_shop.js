function selected_article(id, img) {
    let articles=document.getElementsByTagName("article");
    let product=document.getElementById(`product_${id}`);

    // Borders of all products turn black
    for(let i=0; i<articles.length; i++) {
        articles[i].style.border="solid black 2px";
    }

    product.style.border="solid white 2px";

    // Selected furniture appears on screen
    document.getElementById("selected_product").style.display="flex";
    selected_product.firstElementChild.src = img;

    // Purchase button appears
    document.getElementById("button").style.display="flex";
    button.firstElementChild.value = id;
}