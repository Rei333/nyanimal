function black_borders() {
    let articles=document.getElementsByTagName("article");

    for(let i=0; i<articles.length; i++) {
        articles[i].style.border="solid black 2px";
    }
}

function close_popup() {
    black_borders();
    document.getElementById("tel_selected_product").style.display="none";
}

function selected_article(id, img) {
    let product=document.getElementById(`product_${id}`);

    // Turn black borders of all products
    black_borders()

    product.style.border="solid white 2px";

    // Display selected furniture
    document.getElementById("selected_product").style.display="flex";
    document.getElementById("tel_selected_product").style.display="flex";
    // Phone view
    selected_product.firstElementChild.src = img;
    tel_selected_product.firstElementChild.src = img;

    // Display purchase button
    document.getElementById("button").style.display="flex";
    button.firstElementChild.value = id;
    // Phone view
    document.getElementById("tel_button").style.display="flex";
    tel_button.firstElementChild.value = id;
}