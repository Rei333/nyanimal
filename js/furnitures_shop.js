function selected_article(id, img) {
    let articles=document.getElementsByTagName("article");
    let product=document.getElementById(`product_${id}`);

    // Turn black borders of all products
    for(let i=0; i<articles.length; i++) {
        articles[i].style.border="solid black 2px";
    }

    product.style.border="solid white 2px";

    // Display selected furniture
    document.getElementById("selected_product").style.display="flex";
    selected_product.firstElementChild.src = img;

    // Display purchase button
    document.getElementById("button").style.display="flex";
    button.firstElementChild.value = id;
}